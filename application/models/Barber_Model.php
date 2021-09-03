<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Barber_Model extends CI_Model
{

	function getProfileBarber($sess)
	{
		$this->db->select('*')
			->from('barber')
			->join('login', 'login.Username = barber.Username', 'left')
			->where('barber.Username', $sess);

		$query = $this->db->get();
		return $query->result();
	}
	function setProfile($data)
	{
		$sess =  $this->session->userdata('Username'); //นำข้อมูล session เก็บไว้ในตัวแปร $id
		$query = $this->db->where('barber.Username', $sess) //ค้นหาจาก C_ID ถ้าตรงกับ $id ให้เก็บค่าไว้ใน $query
			->update('barber', $data); //จากนั้นอัปเดรตข้อมูล
		if ($query) //เมื่อ query สำเร็จ
		{
			return TRUE;
		} else {
			return FALSE;
		}
	}

	function getAdminProfile($id)
	{
		$query = $this->db->where('C_ID', $id)
			->get('customer');
		return $query->row();
	}

	function getBarberBooking($sess)
	{
		$where = "status_queue.Q_ID='1' AND barber.Username='$sess'and BK_Year = YEAR(CURDATE()) and BK_Month = MONTH(CURDATE()) and BK_Day = DAY(CURDATE())";

		$this->db->select('*')
			->join('customer', 'booking.C_ID = customer.C_ID', 'left')
			->join('barber', 'booking.B_ID = barber.B_ID', 'left')
			->join('slot_time', 'booking.ST_ID = slot_time.ST_ID', 'left')
			->join('status_queue', 'booking.Q_ID = status_queue.Q_ID', 'inner')
			->order_by('slot_time.ST_ID', "ASC")
			->order_by('booking.BK_Year', "ASC")
			->order_by('booking.BK_Month', "ASC")
			->order_by('booking.BK_Day', "ASC")
			->where($where);
		$query = $this->db->get('booking');
		return $query->result();
	}

	function getBarberBookingHistory($sess)
	{
		$where = "status_queue.Q_ID='2' AND barber.Username='$sess'";

		$this->db->select('*')
			->join('customer', 'booking.C_ID = customer.C_ID', 'left')
			->join('barber', 'booking.B_ID = barber.B_ID', 'left')
			->join('slot_time', 'booking.ST_ID = slot_time.ST_ID', 'left')
			->join('status_queue', 'booking.Q_ID = status_queue.Q_ID', 'inner')
			->where($where);
		$query = $this->db->get('booking');
		return $query->result();
	}

	function getBarberBookingHistoryCurdate($sess)
	{
		$where = "status_queue.Q_ID=2 and BK_Year = YEAR(CURDATE()) and BK_Month = MONTH(CURDATE()) and BK_Day = DAY(CURDATE()) AND barber.Username='$sess'";

		$this->db->select('*')
			->join('customer', 'booking.C_ID = customer.C_ID', 'left')
			->join('barber', 'booking.B_ID = barber.B_ID', 'left')
			->join('slot_time', 'booking.ST_ID = slot_time.ST_ID', 'left')
			->join('status_queue', 'booking.Q_ID = status_queue.Q_ID', 'inner')
			->order_by('booking.BK_Year', "DESC")
			->order_by('booking.BK_Month', "DESC")
			->order_by('booking.BK_Day', "DESC")
			->order_by('booking.ST_ID', "DESC")
			->where($where);

		$query = $this->db->get('booking');
		return $query->result();
	}

	function getPortfolio()
	{
		$this->db->select('*')
			->join('barber', 'portfolio.B_ID = barber.B_ID', 'left');
		$query = $this->db->get('portfolio');
		return $query->result();
	}
	function addPortfolio($data)
	{
		$sess =  $this->session->userdata('Username');
		$query = $this->db->where('portfolio.Username', $sess)
			->insert('portfolio', $data);
		if ($query) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

	function getCustomerShow($id)
	{
		$query = $this->db->where('C_ID', $id)
			->get('customer');
		return $query->row();
	}

	function getBarberIncomeByID($sess)
	{
		$q = $this->db->query("SELECT B_ID FROM `barber` WHERE Username = '$sess'");

		$id = $q->row('B_ID');

		$query = $this->db->query("SELECT barber.*,
		cast((price.Price*barber.B_Percent/100*
		SUM( BK_Year = YEAR(CURDATE()) AND BK_Month = MONTH(CURDATE()) and booking.B_ID='$id' and Q_ID=2 )+barber.B_Salary )
		as decimal(18,0)) AS B_Total
		FROM booking,price,barber
		WHERE barber.B_ID='$id'");
		return $query->result();
	}
}
