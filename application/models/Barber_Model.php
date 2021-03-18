<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Barber_Model extends CI_Model
{
	function getBarber()
	{
		$this->db->select('*');	//ค้นหาจากฟิลด์ทั้งหมด
		$query = $this->db->get('barber');	//โดยค้นจากตาราง barber จากนั้นให้ $query เก็บฟังก์ชั่นไว้
		return $query->result(); //จากนั้นนำ $query ส่งค่าเป็น object ซึ่งอยู่ในรูปแบบ array กลับไปที่ Customer_Con
	}
	function getBarberByID($barber)
	{
		$this->db->select('*')
			->from('barber')
			->where('barber.B_ID', $barber);

		$query = $this->db->get();
		return $query->result();
	}
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
	
}