<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_Model extends CI_Model
{
    function getCustomer()
	{
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
		->join('slot_time', 'booking.ST_ID = slot_time.ST_ID', 'left');
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
		$query = $this->db->get('customer','booking');
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
}