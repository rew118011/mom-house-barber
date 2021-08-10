<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_Model extends CI_Model
{
	function getCustomer()
	{
		$query = $this->db->query("SELECT * FROM `customer` WHERE C_ID NOT IN (SELECT C_ID FROM customer WHERE `C_ID` = 'c00000')");
		return $query->result();

		$this->db->select('*');
		$query = $this->db->get('customer');
		return $query->result();
	}

	function getBarberAll()
	{
		$this->db->select('*');	//ค้นหาจากฟิลด์ทั้งหมด
		$query = $this->db->get('barber');	//โดยค้นจากตาราง barber จากนั้นให้ $query เก็บฟังก์ชั่นไว้
		return $query->result(); //จากนั้นนำ $query ส่งค่าเป็น object ซึ่งอยู่ในรูปแบบ array กลับไปที่ Customer_Con
	}

	function getBooking()
	{
		$this->db->select('*')
			->join('customer', 'booking.C_ID = customer.C_ID', 'left')
			->join('barber', 'booking.B_ID = barber.B_ID', 'left')
			->join('slot_time', 'booking.ST_ID = slot_time.ST_ID', 'left')
			->join('status_queue', 'booking.Q_ID = status_queue.Q_ID', 'inner')
			->order_by('booking.BK_Year', "ASC")
			->order_by('booking.BK_Month', "ASC")
			->order_by('booking.BK_Day', "ASC")
			->order_by('booking.ST_ID', "ASC")
			->where('status_queue.Q_ID', '1');

		$query = $this->db->get('booking');
		return $query->result();
	}

	function getBookingCurdate()
	{
		$where = "status_queue.Q_ID=1 and BK_Year = YEAR(CURDATE()) and BK_Month = MONTH(CURDATE()) and BK_Day = DAY(CURDATE())";

		$this->db->select('*')
			->join('customer', 'booking.C_ID = customer.C_ID', 'left')
			->join('barber', 'booking.B_ID = barber.B_ID', 'left')
			->join('slot_time', 'booking.ST_ID = slot_time.ST_ID', 'left')
			->join('status_queue', 'booking.Q_ID = status_queue.Q_ID', 'inner')
			->order_by('booking.BK_Year', "ASC")
			->order_by('booking.BK_Month', "ASC")
			->order_by('booking.BK_Day', "ASC")
			->order_by('booking.ST_ID', "ASC")
			->where($where);

		$query = $this->db->get('booking');
		return $query->result();
	}

	function getBookingSuccess()
	{
		$this->db->select('*')
			->join('customer', 'booking.C_ID = customer.C_ID', 'left')
			->join('barber', 'booking.B_ID = barber.B_ID', 'left')
			->join('slot_time', 'booking.ST_ID = slot_time.ST_ID', 'left')
			->join('status_queue', 'booking.Q_ID = status_queue.Q_ID', 'inner')
			->order_by('booking.BK_Year', "DESC")
			->order_by('booking.BK_Month', "DESC")
			->order_by('booking.BK_Day', "DESC")
			->order_by('booking.ST_ID', "ASC")
			->where('status_queue.Q_ID', '2');
		$query = $this->db->get('booking');
		return $query->result();
	}

	function getBookingSuccessCurdate()
	{
		$where = "status_queue.Q_ID=2 and BK_Year = YEAR(CURDATE()) and BK_Month = MONTH(CURDATE()) and BK_Day = DAY(CURDATE())";

		$this->db->select('*')
			->join('customer', 'booking.C_ID = customer.C_ID', 'left')
			->join('barber', 'booking.B_ID = barber.B_ID', 'left')
			->join('slot_time', 'booking.ST_ID = slot_time.ST_ID', 'left')
			->join('status_queue', 'booking.Q_ID = status_queue.Q_ID', 'inner')
			->order_by('booking.BK_Year', "ASC")
			->order_by('booking.BK_Month', "ASC")
			->order_by('booking.BK_Day', "ASC")
			->order_by('booking.ST_ID', "ASC")
			->where($where);

		$query = $this->db->get('booking');
		return $query->result();
	}

	function get_HairStyle()
	{
		$this->db->select('*'); //เลือกจากตารางทั้งหมด
		$result = $this->db->get('hair_style');   //result เก็บค่าที่ get หรือ select จากตาราง hair_style ไว้
		return $result;
	}

	function getCustomerAndBooking()
	{
		$this->db->select('*');
		$query = $this->db->get('customer', 'booking');
		return $query->result();
	}

	function getBarberByAdmin($id) //ฟังก์ชั่น getBarberByCustomer โดยรับค่าพารามิเตอร์ $id มาจาก Customer_Con
	{
		$query = $this->db->where('B_ID', $id) //จากนั้นทำการค้นหาแบบกำหนดเงื่อนไขจากฟิลด์ B_ID ถ้า $id ที่รับมาตรงกับ B_ID
			->get('barber'); //ให้ทำการค้นหาจากตาราง barber
		return $query->row(); //จากนั้นนำค่า $query ส่งค่าเป็น object โดยจะส่งข้อมูลออกมาเพียง เรคอร์ดเดียว กลับไปที่ Customer_Con
	}

	function deleteHairstyle($id)
	{    //ฟังชั่น deleteBarber จากนั้น รับตัวแปร $id มา
		$query = $this->db->where('H_ID', $id) // เรียกใช้ฟังชั่น where จากนั้น กำหนดเงื่อนไขจากฟิล B_ID แล้วทำการเช็กตัวแปร $id ว่าตรงกับข้อมูลในฟิลไหม
			->delete('hair_style'); // เรียกใชฟังชั่น delete โดยลบจากตาราง barber
		if ($query) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

	function getCustomerByAdmin($id) //ฟังก์ชั่น getBarberByCustomer โดยรับค่าพารามิเตอร์ $id มาจาก Customer_Con
	{
		$query = $this->db->where('C_ID', $id) //จากนั้นทำการค้นหาแบบกำหนดเงื่อนไขจากฟิลด์ B_ID ถ้า $id ที่รับมาตรงกับ B_ID
			->get('customer'); //ให้ทำการค้นหาจากตาราง barber
		return $query->row(); //จากนั้นนำค่า $query ส่งค่าเป็น object โดยจะส่งข้อมูลออกมาเพียง เรคอร์ดเดียว กลับไปที่ Customer_Con
	}

	function getBarberBooking($id)
	{
		$where = "status_queue.Q_ID='1' AND barber.B_ID='$id'";

		$this->db->select('*')
			->join('customer', 'booking.C_ID = customer.C_ID', 'left')
			->join('barber', 'booking.B_ID = barber.B_ID', 'left')
			->join('slot_time', 'booking.ST_ID = slot_time.ST_ID', 'left')
			->join('status_queue', 'booking.Q_ID = status_queue.Q_ID', 'inner')
			->where($where);
		$query = $this->db->get('booking');
		return $query->result();
	}

	function getBarberBookingHistory($id)
	{
		$where = "status_queue.Q_ID='2' AND barber.B_ID='$id'";

		$this->db->select('*')
			->join('customer', 'booking.C_ID = customer.C_ID', 'left')
			->join('barber', 'booking.B_ID = barber.B_ID', 'left')
			->join('slot_time', 'booking.ST_ID = slot_time.ST_ID', 'left')
			->join('status_queue', 'booking.Q_ID = status_queue.Q_ID', 'inner')
			->where($where);
		$query = $this->db->get('booking');
		return $query->result();
	}

	function getCustomerBooking($id)
	{
		$where = "status_queue.Q_ID='1' AND customer.C_ID='$id'";

		$this->db->select('*')
			->join('customer', 'booking.C_ID = customer.C_ID', 'left')
			->join('barber', 'booking.B_ID = barber.B_ID', 'left')
			->join('slot_time', 'booking.ST_ID = slot_time.ST_ID', 'left')
			->join('status_queue', 'booking.Q_ID = status_queue.Q_ID', 'inner')
			->where($where);
		$query = $this->db->get('booking');
		return $query->result();
	}

	function getCustomerBookingHistory($id)
	{
		$where = "status_queue.Q_ID='2' AND customer.C_ID='$id'";

		$this->db->select('*')
			->join('customer', 'booking.C_ID = customer.C_ID', 'left')
			->join('barber', 'booking.B_ID = barber.B_ID', 'left')
			->join('slot_time', 'booking.ST_ID = slot_time.ST_ID', 'left')
			->join('status_queue', 'booking.Q_ID = status_queue.Q_ID', 'inner')
			->where($where);
		$query = $this->db->get('booking');
		return $query->result();
	}

	/*-------- ! Dashbord Home Start ----------*/

	function getTotal()
	{
		$query = $this->db->query("SELECT SUM(150*( Q_ID = 2))  as Total FROM booking");
		return $query->result();
	}


	function getTotalOfMonth()
	{
		$query = $this->db->query("SELECT SUM(150*( BK_Year = YEAR(CURDATE()) AND BK_Month = MONTH(CURDATE()) AND Q_ID = 2))  as B_Total FROM booking");
		return $query->result();
	}

	function getTotalQueue()
	{
		$query = $this->db->query("SELECT SUM(150*( Q_ID = 1))  as Total FROM booking");
		return $query->result();
	}


	function getTotalQueueOfMonth()
	{
		$query = $this->db->query("SELECT SUM(150*( BK_Year = YEAR(CURDATE()) AND BK_Month = MONTH(CURDATE()) AND Q_ID = 1))  as B_Total FROM booking");
		return $query->result();
	}

	/*-------- ! Dasbord Home Finish -----------*/

	/*-------- ! Dashbord getQueueAll Start ----------*/

	function getTotalQueueDay()
	{
		$query = $this->db->query("SELECT * FROM booking WHERE BK_Year = YEAR(CURDATE()) AND BK_Month = MONTH(CURDATE()) AND BK_Day = DAY(CURDATE()) AND Q_ID = 1");
		return $query->num_rows();
	}


	function getTotalQueueWeek()
	{
		$query = $this->db->query("SELECT * FROM booking WHERE BK_Year = YEAR(CURDATE()) AND BK_Month = MONTH(CURDATE()) AND BK_Day = DAY(CURDATE()) AND Q_ID = 1");
		return $query->num_rows();
	}

	function getTotalQueueMonth()
	{
		$query = $this->db->query("SELECT * FROM booking WHERE BK_Year = YEAR(CURDATE()) AND BK_Month = MONTH(CURDATE()) AND Q_ID = 1");
		return $query->num_rows();
	}

	function getTotalQueueAll()
	{
		$query = $this->db->query("SELECT * FROM booking WHERE Q_ID = 1");
		return $query->num_rows();
	}

	/*-------- ! Dasbord getQueueAll Finish -----------*/

	/*-------- ! Dashbord getSuccessfulQueue Start ----------*/

	function getTotalSuccessDay()
	{
		$query = $this->db->query("SELECT * FROM booking WHERE BK_Year = YEAR(CURDATE()) AND BK_Month = MONTH(CURDATE()) AND BK_Day = DAY(CURDATE()) AND Q_ID = 2");
		return $query->num_rows();
	}


	function getTotalSuccessWeek()
	{
		$query = $this->db->query("SELECT * FROM booking WHERE BK_Year = YEAR(CURDATE()) AND BK_Month = MONTH(CURDATE()) AND BK_Day = DAY(CURDATE()) AND Q_ID = 2");
		return $query->num_rows();
	}

	function getTotalSuccessMonth()
	{
		$query = $this->db->query("SELECT * FROM booking WHERE BK_Year = YEAR(CURDATE()) AND BK_Month = MONTH(CURDATE()) AND Q_ID = 2");
		return $query->num_rows();
	}

	function getTotalSuccessAll()
	{
		$query = $this->db->query("SELECT * FROM booking WHERE Q_ID = 2");
		return $query->num_rows();
	}

	/*-------- ! Dasbord getSuccessfulQueue Finish -----------*/
}
