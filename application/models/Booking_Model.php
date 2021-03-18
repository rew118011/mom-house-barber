<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Booking_Model extends CI_Model
{
    function GenerateId()
    {
        $query = $this->db->select('BK_ID') //เลือกฟิลด์ C_ID โดยเก็บคำสั่งไว้ในตัวแปร query
            ->from('booking') //จากตาราง customer
            ->order_by('BK_ID', "ASC") //เรียงจากน้อยไปมาก
            ->get();    //เลือกหรือค้น
        $row = $query->last_row();    //นำ query มาหาแถวสุดท้าย จากนั้นเก็บค่าไว้ในตัวแปล row
        if ($row) {    //เมื่อ row สำเร็จ
            $idPostfix = (int)substr($row->BK_ID, 2) + 1; //นำตัวเลขมาตัดสติง จากนั้นเฟด B_ID ขึ้นมาตำแหน่งปัจจุบันและให้ + 1
            $nextId = 'BK' . STR_PAD((string)$idPostfix, 6, "0", STR_PAD_LEFT); //เติมตัว BK เข้าไปในตำแหน่งที่แก้ไข และเติม 0 ไป 6 ตำแหน่งจากฝั่งซ้าย
        } else {
            $nextId = 'BK000001';
        } //ถ้าไม่ใช่ ให้เริ่มต้นที่ BK00001
        return $nextId;    //คืนค่า nextId
    }

    function selectTimeSlot()
    {
        $query = $this->db->select('ST_ID,ST_Time')->get('slot_time')->result_array();

        $arr1 = array();
        foreach ($query as $row) {
            $arr1[$row['ST_ID']] = $row['ST_Time'];
        }
        $arr1[''] = '---Select Time Slot---';
        return $arr1;
    }
    function getTimeSlot($barber)
    {
        $query = $this->db->query("SELECT * FROM slot_time WHERE ST_ID NOT IN(SELECT ST_ID FROM booking WHERE B_ID = '$barber')");
        return $query->result();  
    }
    function getTimeSlotByBarberID($barber){
        $query = $this->db->query("SELECT * FROM slot_time WHERE ST_ID NOT IN(SELECT ST_ID FROM booking WHERE B_ID = '$barber')");
        $result = $query->result_array(); 
        //print_r($result);
        $arr1 = array();
        foreach ($result as $row) {
            $arr1[$row['ST_ID']] = $row['ST_Time'];
        }
        $arr1[''] = '---Select Time Slot---';
        return $arr1;
    }
    
    function checkBookingDuplicate($customer)
    {
        $query = $this->db->where('C_ID', $customer)
            ->count_all_results('booking');
        return $query;
    }
    function checkTimeBarber($time,$barber)
    {
        $query = $this->db->where('ST_ID', $time)
            ->where('B_ID', $barber)
            ->count_all_results('booking');
        return $query;
    }
    function createBookingQueueByCustomer($data)
    {
        $query = $this->db->insert('booking', $data);
        if ($query) //เมื่อ query สำเร็จ
        {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function getBookingQueueByCustomer($c_id)
    {
        $this->db->select('*')
            ->from('booking')
            ->join('customer', 'booking.C_ID = customer.C_ID', 'left')
            ->join('slot_time', 'booking.ST_ID = slot_time.ST_ID', 'left')
            ->where('customer.C_ID', $c_id);
        $query = $this->db->get();
        return $query->result();
    }

    function cancelBookingQueueByCustomer()
    {
    }

    function checkStatus($Status)
    {
    }

    function setStatus($Status)
    {
    }

    function getStatus()
    {
    }

    function selectBarber()
    {
    /*    $query = $this->db->select('B_ID,B_Nickname')->get('barber')->result_array();
        $arr = array();
        foreach ($query as $row) {
            $arr[$row['B_ID']] = $row['B_Nickname'];
        }
        $arr[''] = '---Select Barber---';
        return $arr;*/

        $this->db->select('B_ID,B_Nickname');
        $query = $this->db->get('barber');

        return $query->result();
        
    }
    function selectBarber1()
    {
   $query = $this->db->select('B_ID,B_Nickname')->get('barber')->result_array();

        $arr = array();
        foreach ($query as $row) {
            $arr[$row['B_ID']] = $row['B_Nickname'];
        }
        $arr[''] = '---Select Barber---';
        return $arr;

       
        
    }

}