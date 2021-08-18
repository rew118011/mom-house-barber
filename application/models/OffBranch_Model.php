<?php
defined('BASEPATH') or exit('No direct script access allowed');

class OffBranch_Model extends CI_Model
{

    function GenerateId()
    {
        $query = $this->db->select('OB_ID') //เลือกฟิลด์ C_ID โดยเก็บคำสั่งไว้ในตัวแปร query
            ->from('close_branch') //จากตาราง customer
            ->order_by('OB_ID', "ASC") //เรียงจากน้อยไปมาก
            ->get();    //เลือกหรือค้น
        $row = $query->last_row();    //นำ query มาหาแถวสุดท้าย จากนั้นเก็บค่าไว้ในตัวแปล row
        if ($row) {    //เมื่อ row สำเร็จ
            $idPostfix = (int)substr($row->OB_ID, 2) + 1; //นำตัวเลขมาตัดสติง จากนั้นเฟด B_ID ขึ้นมาตำแหน่งปัจจุบันและให้ + 1
            $nextId = 'OB' . STR_PAD((string)$idPostfix, 6, "0", STR_PAD_LEFT); //เติมตัว BK เข้าไปในตำแหน่งที่แก้ไข และเติม 0 ไป 6 ตำแหน่งจากฝั่งซ้าย
        } else {
            $nextId = 'OB000001';
        } //ถ้าไม่ใช่ ให้เริ่มต้นที่ BK00001
        return $nextId;    //คืนค่า nextId
    }

    function create_CloseShop($data)
    {
        $query = $this->db->insert('close_branch', $data);
        if ($query) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
    function getClose()
    {
        $query = $this->db->query("SELECT * FROM close_branch WHERE OB_DATE > CURRENT_DATE ORDER BY OB_DATE ASC");
		return $query->result();
    }

    function getHistoryClose(){
        $query = $this->db->query("SELECT * FROM close_branch WHERE OB_DATE <= CURRENT_DATE ORDER BY OB_DATE DESC");
		return $query->result();
    }
    function getCloseALL($BK_Date){
        $response  = array();
        $query = $this->db->query("SELECT OB_DATE FROM close_branch WHERE OB_DATE = '$BK_Date'");
		$response  = $query->result_array();
        return  $response ;
    }

}
