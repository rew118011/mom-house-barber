<?php
defined('BASEPATH') or exit('No direct script access allowed');

class OffWork_Model extends CI_Model
{

	function GenerateId()
	{
		$query = $this->db->select('OW_ID') //เลือกฟิลด์ C_ID โดยเก็บคำสั่งไว้ในตัวแปร query
			->from('offwork') //จากตาราง customer
			->order_by('OW_ID', "ASC") //เรียงจากน้อยไปมาก
			->get();	//เลือกหรือค้น
		$row = $query->last_row();	//นำ query มาหาแถวสุดท้าย จากนั้นเก็บค่าไว้ในตัวแปล row
		if ($row) {	//เมื่อ row สำเร็จ
			$idPostfix = (int)substr($row->OW_ID, 1) + 1; //นำตัวเลขมาตัดสติง จากนั้นเฟด C_ID ขึ้นมาตำแหน่งปัจจุบันและให้ + 1
			$nextId = 'O' . STR_PAD((string)$idPostfix, 5, "0", STR_PAD_LEFT); //เติมตัว C เข้าไปในตำแหน่งที่แก้ไข และเติม 0 ไป 5 ตำแหน่งจากฝั่งซ้าย
		} else {
			$nextId = 'O00001';
		} //ถ้าไม่ใช่ ให้เริ่มต้นที่ C00001
		return $nextId;	//คืนค่า nextId
	}

	function create_offWork($result)
	{
		$query = $this->db->insert('offwork', $result);
		if ($query) {
			return true;
		} else {
			return false;
		}
	}
	function saveOffwork_Barber($data)
	{
		$B_ID =  $this->db->userdata('B_ID');
		$this->db->where('B_ID', $B_ID);
		$this->db->update('barber', $data);
	}

	function getOffWork_Barber()
	{
		$this->db->select('*')
		->join('offwork', 'barber.B_ID = offwork.B_ID', 'left');
		$query = $this->db->get('barber');
		return $query->result();
	}

	function getOffWork()
	{
		$this->db->select('*');
		$query = $this->db->get('offwork');
		return $query->result();
	}

	function deleteOffWork_Barber($id)
	{
		$query = $this->db->where('B_ID', $id)
			->delete('offwork');
		if ($query) {
			return TRUE;
		} else {
			return FALSE;
		}
	}
}
