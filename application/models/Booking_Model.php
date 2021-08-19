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

    function checkBookingDuplicate($customer)
    {
        $query = $this->db->where('C_ID', $customer)
            ->count_all_results('booking');
        return $query;
    }
    function checkTimeBarber($time, $barber)
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

    function DeleteQueue($id)
    {
        $response = $this->db->where('BK_ID', $id)
            ->delete('booking');
            $this->db->where('BK_ID', $id)
            ->delete('history_queue');
        return  $response;
    }

    function setQueue($id)
    {
        //$response = $this->db->query("UPDATE booking SET Q_ID = '2' WHERE booking.`BK_ID` = '.$id.'");
        $response = $this->db->where('BK_ID',$id)
                     ->set('Q_ID','2')
                    ->update('booking');
        return  $response;
    }

    function getBarber()
    {
        $this->db->order_by("B_Nickname", "DESC");
        $query = $this->db->get("barber");
        return $query->result();
    }

    
    function getBarberBy_YearMonthDay($BK_Year,$BK_Month,$BK_Day)
    {
        $response  = array();
        $query = $this->db->query("SELECT * 
        FROM barber 
        WHERE B_ID NOT IN(
                    SELECT B_ID FROM booking WHERE (BK_Year = '$BK_Year' and BK_Month = '$BK_Month' and BK_Day = '$BK_Day')
                    group by b_id
                    having (count(B_ID) = 10) 
                    UNION ALL
                    SELECT B_ID FROM offwork WHERE Date = '$BK_Year-$BK_Month-$BK_Day'
        )");
        $response  = $query->result_array();
        return  $response ;
    }

    function getTimeSlotByBarberID($BK_Year,$BK_Month,$BK_Day,$B_ID)
    {

        //$query = $this->db->query("SELECT * FROM slot_time WHERE ST_ID NOT IN(SELECT ST_ID FROM booking WHERE BK_Year = '$BK_Year' & BK_Month = '$BK_Month' & BK_Day = '$BK_Day' & B_ID = '$B_ID')");
        $response  = array();
        $query = $this->db->query("SELECT * FROM slot_time WHERE ST_ID NOT IN( SELECT ST_ID FROM booking WHERE (BK_Year = '$BK_Year' and BK_Month = '$BK_Month' and BK_Day = '$BK_Day' AND B_ID = '$B_ID'))");
        $response  = $query->result_array();
        return  $response ;
    }
}
