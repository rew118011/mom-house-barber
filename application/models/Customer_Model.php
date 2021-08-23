<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Customer_Model extends CI_Model
{

	function GenerateId()
	{
		$query = $this->db->select('C_ID') //เลือกฟิลด์ C_ID โดยเก็บคำสั่งไว้ในตัวแปร query
			->from('customer') //จากตาราง customer
			->order_by('C_ID', "ASC") //เรียงจากน้อยไปมาก
			->get();	//เลือกหรือค้น
		$row = $query->last_row();	//นำ query มาหาแถวสุดท้าย จากนั้นเก็บค่าไว้ในตัวแปล row
		if ($row) {	//เมื่อ row สำเร็จ
			$idPostfix = (int)substr($row->C_ID, 1) + 1; //นำตัวเลขมาตัดสติง จากนั้นเฟด C_ID ขึ้นมาตำแหน่งปัจจุบันและให้ + 1
			$nextId = 'C' . STR_PAD((string)$idPostfix, 5, "0", STR_PAD_LEFT); //เติมตัว C เข้าไปในตำแหน่งที่แก้ไข และเติม 0 ไป 5 ตำแหน่งจากฝั่งซ้าย
		} else {
			$nextId = 'C00001';
		} //ถ้าไม่ใช่ ให้เริ่มต้นที่ C00001
		return $nextId;	//คืนค่า nextId
	}

	function register($data)
	{

		$query = $this->db->insert('customer', $data);
		if ($query) //เมื่อ query สำเร็จ
		{
			return TRUE;
		} else {
			return FALSE;
		}
	}
	function checkRegisterDuplicate($Username)
	{
		$query = $this->db->where('Username', $Username)
			->count_all_results('login');
		return $query;
	}

	function register_login($data1)
	{

		$query = $this->db->insert('login', $data1);
		if ($query) //เมื่อ query สำเร็จ
		{
			return TRUE;
		} else {
			return FALSE;
		}
	}

	function getProfile($sess)
	{
		$this->db->select('*')
			->from('customer')
			->join('login', 'login.Username = customer.Username', 'left')
			->where('customer.Username', $sess);

		$query = $this->db->get();
		return $query->result();
	}

	function setProfile($data)
	{
		$sess =  $this->session->userdata('Username'); //นำข้อมูล session เก็บไว้ในตัวแปร $id
		$query = $this->db->where('customer.Username', $sess) //ค้นหาจาก C_ID ถ้าตรงกับ $id ให้เก็บค่าไว้ใน $query
			->update('customer', $data); //จากนั้นอัปเดรตข้อมูล
		if ($query) //เมื่อ query สำเร็จ
		{
			return TRUE;
		} else {
			return FALSE;
		}
	}
	function getBarberByCustomer($id) //ฟังก์ชั่น getBarberByCustomer โดยรับค่าพารามิเตอร์ $id มาจาก Customer_Con
	{
		$query = $this->db->where('B_ID', $id) //จากนั้นทำการค้นหาแบบกำหนดเงื่อนไขจากฟิลด์ B_ID ถ้า $id ที่รับมาตรงกับ B_ID
			->get('barber'); //ให้ทำการค้นหาจากตาราง barber
		return $query->row(); //จากนั้นนำค่า $query ส่งค่าเป็น object โดยจะส่งข้อมูลออกมาเพียง เรคอร์ดเดียว กลับไปที่ Customer_Con
	}
	function getBookingQueue($sess)
	{
		$where = "customer.Username='$sess' AND Q_ID=1";
		$this->db->select('*')
			->from('booking')
			->join('customer', 'booking.C_ID = customer.C_ID', 'left')
			->join('barber', 'booking.B_ID = barber.B_ID', 'left')
			->join('slot_time', 'booking.ST_ID = slot_time.ST_ID', 'left')
			->where($where);
		$query = $this->db->get()->result();
		return $query;
	}
	function cancelBooking($id)
	{
		$query = $this->db->where('BK_ID', $id)
			->delete('booking');
		if ($query) {
			return TRUE;
		} else {
			return FALSE;
		}
	}
	function get_HairStyle()
	{
		// $this->db->select('*'); //เลือกจากตารางทั้งหมด
		// $result = $this->db->get('hair_style');   //result เก็บค่าที่ get หรือ select จากตาราง hair_style ไว้
		// return $result;

		$this->db->select('*');
		$query = $this->db->get('hair_style');
		return $query->result();
	}

	function get_HairStyleByID($H_ID)
    {

        $response  = array();
        $query = $this->db->query("SELECT * FROM `hair_style` WHERE H_ID = '$H_ID';");
        $response  = $query->result_array();
        return  $response ;
    }

	function getTimeSlotByBarberID1($B_ID)
    {

        //$query = $this->db->query("SELECT * FROM slot_time WHERE ST_ID NOT IN(SELECT ST_ID FROM booking WHERE BK_Year = '$BK_Year' & BK_Month = '$BK_Month' & BK_Day = '$BK_Day' & B_ID = '$B_ID')");
        $response  = array();
        $query = $this->db->query("SELECT * FROM slot_time WHERE ST_ID NOT IN( SELECT ST_ID FROM booking WHERE (BK_Year = '2021' and BK_Month = '09' and BK_Day = '11' AND B_ID = '$B_ID'))");
        $response  = $query->result_array();
        return  $response ;
    }
}
