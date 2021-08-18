<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_Model extends CI_Model
{
	function getCustomer()
	{
		$query = $this->db->query("SELECT customer.*, count(booking.C_ID)  AS C_Num
		FROM booking, customer
		where booking.C_ID = customer.C_ID AND  booking.Q_ID=2
		group by booking.c_ID
		ORDER BY C_Num DESC, customer.C_ID ASC");
		return $query->result();
	}

	function getCustomerMost()
	{
		$query = $this->db->query("SELECT customer.*, count(booking.C_ID)  AS C_Num
		FROM booking, customer
		where booking.C_ID = customer.C_ID AND  booking.Q_ID=2
		group by booking.c_ID
		ORDER BY C_Num DESC, customer.C_ID ASC
		LIMIT 1;");
		return $query->result();
	}

	function getCustomerNotInQ_ID2()
	{
		$query = $this->db->query("SELECT * 
		FROM customer
		WHERE C_ID NOT IN (SELECT C_ID FROM booking WHERE Q_ID = 2)");
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
			->join('hair_style', 'booking.H_ID = hair_style.H_ID', 'left')
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
			->join('hair_style', 'booking.H_ID = hair_style.H_ID', 'left')
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
		$query = $this->db->query("SELECT SUM(hair_style.Price*( Q_ID = 2))  as Total FROM booking,hair_style");
		return $query->result();
	}


	function getTotalOfMonth()
	{
		$query = $this->db->query("SELECT SUM(hair_style.Price*( BK_Year = YEAR(CURDATE()) AND BK_Month = MONTH(CURDATE()) AND Q_ID = 2))  as B_Total FROM booking,hair_style");
		return $query->result();
	}

	function getTotalQueue()
	{
		$query = $this->db->query("SELECT SUM(hair_style.Price*( Q_ID = 1))  as Total FROM booking,hair_style");
		return $query->result();
	}


	function getTotalQueueOfMonth()
	{
		$query = $this->db->query("SELECT SUM(hair_style.Price*( BK_Year = YEAR(CURDATE()) AND BK_Month = MONTH(CURDATE()) AND Q_ID = 1))  as B_Total FROM booking,hair_style");
		return $query->result();
	}

	/*-------- ! Dasbord Home Finish -----------*/

	/*-------- ! Dashbord getQueueAll Start ----------*/

	function getTotalQueueDay()
	{
		$query = $this->db->query("SELECT * FROM booking WHERE BK_Year = YEAR(CURDATE()) AND BK_Month = MONTH(CURDATE()) AND BK_Day = DAY(CURDATE()) AND Q_ID = 1");
		return $query->num_rows();
	}

	function getTotalQueueMonth()
	{
		$query = $this->db->query("SELECT * FROM booking WHERE BK_Year = YEAR(CURDATE()) AND BK_Month = MONTH(CURDATE()) AND Q_ID = 1");
		return $query->num_rows();
	}

	function getTotalQueueYear()
	{
		$query = $this->db->query("SELECT * FROM booking WHERE BK_Year = YEAR(CURDATE()) AND Q_ID = 1");
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

	function getTotalSuccessMonth()
	{
		$query = $this->db->query("SELECT * FROM booking WHERE BK_Year = YEAR(CURDATE()) AND BK_Month = MONTH(CURDATE()) AND Q_ID = 2");
		return $query->num_rows();
	}

	function getTotalSuccessYear()
	{
		$query = $this->db->query("SELECT * FROM booking WHERE BK_Year = YEAR(CURDATE()) AND Q_ID = 2");
		return $query->num_rows();
	}

	function getTotalSuccessAll()
	{
		$query = $this->db->query("SELECT * FROM booking WHERE Q_ID = 2");
		return $query->num_rows();
	}

	/*-------- ! Dasbord getSuccessfulQueue Finish -----------*/

	/*-------- ! Dasbord manageBooking Finish -----------*/

	function getClose()
	{
		$query = $this->db->query("SELECT *
		FROM close_branch
		WHERE OB_DATE > CURRENT_DATE
		ORDER BY ABS( DATEDIFF(OB_DATE, CURDATE()) )
		LIMIT 3;");
		return $query->result();
	}

	function getNumClose()
	{
		$query = $this->db->query("SELECT * FROM `close_branch` WHERE `OB_DATE` > CURRENT_DATE");
		return $query->num_rows();
	}


	/*-------- ! Dasbord manageBooking Finish -----------*/

	function getBarberBID()
	{
		$this->db->select('B_ID')	//ค้นหาจากฟิลด์ทั้งหมด
				 ->order_by('B_ID', "ASC");
		$query = $this->db->get('barber');	//โดยค้นจากตาราง barber จากนั้นให้ $query เก็บฟังก์ชั่นไว้
		return $query->result(); //จากนั้นนำ $query ส่งค่าเป็น object ซึ่งอยู่ในรูปแบบ array กลับไปที่ Customer_Con
	}

	function CountBarberBID()
	{
		$query = $this->db->query("SELECT * FROM `barber`");
		return $query->result(); //จากนั้นนำ $query ส่งค่าเป็น object ซึ่งอยู่ในรูปแบบ array กลับไปที่ Customer_Con
	}

	/*-------- ! Dasbord getBarberAll Start -----------*/

	function getBarberIncome($income)
	{
		$sql = "SELECT barber.*,
		cast((hair_style.Price*barber.B_Percent/100*
		SUM( BK_Year = YEAR(CURDATE()) AND BK_Month = MONTH(CURDATE()) and booking.B_ID='$income' and Q_ID=2 )+barber.B_Salary )
		as decimal(18,0)) AS B_Total
		FROM booking,hair_style,barber
		WHERE barber.B_ID='$income'";
		$query = $this->db->query($sql);
		return  $query->result();
	}

	function getBarberIncomeByBID($id)
	{
		$query = $this->db->query("SELECT  barber.*,
		cast((hair_style.Price*barber.B_Percent/100*
		SUM( BK_Year = YEAR(CURDATE()) AND BK_Month = MONTH(CURDATE()) and booking.B_ID='$id' and Q_ID=2 )+barber.B_Salary )
		as decimal(18,0)) AS B_Total
		FROM booking,hair_style,barber
		WHERE barber.B_ID='$id'");
		return $query->result();
	}

	/*-------- ! Dasbord getBarberAll Finish -----------*/

	/*-------- ! getBarberProfile/B_ID Start -----------*/

	function getBarberProfileIncome($id)
	{
		$query = $this->db->query("SELECT barber.*,
			hair_style.Price*barber.B_Percent/100*
			SUM( BK_Year = YEAR(CURDATE()) AND BK_Month = MONTH(CURDATE()) and booking.B_ID='$id' and Q_ID=2 )+barber.B_Salary 
			as B_Total
			FROM booking,hair_style,barber
			WHERE barber.B_ID='$id'
			");
		return $query->result();
	}

	/*-------- ! getBarberProfile/B_ID Finish -----------*/

	/*-------- ! Dasbord getBarberIncome/B_ID Start -----------*/

	function getTotalSuccessDayByID($id)
	{
		$query = $this->db->query("SELECT * FROM booking WHERE BK_Year = YEAR(CURDATE()) AND BK_Month = MONTH(CURDATE()) AND BK_Day = DAY(CURDATE()) AND Q_ID = 2 AND B_ID = '$id'");
		return $query->num_rows();
	}

	function getTotalSuccessMonthByID($id)
	{
		$query = $this->db->query("SELECT * FROM booking WHERE BK_Year = YEAR(CURDATE()) AND BK_Month = MONTH(CURDATE()) AND Q_ID = 2 AND B_ID = '$id'");
		return $query->num_rows();
	}

	function getTotalSuccessAllByID($id)
	{
		$query = $this->db->query("SELECT * FROM booking WHERE Q_ID = 2 AND B_ID = '$id'");
		return $query->num_rows();
	}

	function getBarberIncomeByID($id)
	{
		$query = $this->db->query("SELECT barber.*,
		cast((hair_style.Price*barber.B_Percent/100*
		SUM( BK_Year = YEAR(CURDATE()) AND BK_Month = MONTH(CURDATE()) and booking.B_ID='$id' and Q_ID=2 )+barber.B_Salary )
		as decimal(18,0)) AS B_Total
		FROM booking,hair_style,barber
		WHERE barber.B_ID='$id'");
		return $query->result();
	}

	/*-------- ! Dasbord getBarberIncome/B_ID Finish -----------*/

	/*-------- ! Dasbord getBarberQueue/B_ID Start -----------*/

	function getSuccessAllByID($id)
	{
		$query = $this->db->query("SELECT * FROM booking WHERE Q_ID = 2 AND B_ID = '$id'");
		return $query->num_rows();
	}

	function getQueueAllByID($id)
	{
		$query = $this->db->query("SELECT * FROM booking WHERE Q_ID = 1 AND B_ID = '$id'");
		return $query->num_rows();
	}

	function getQueueDayByID($id)
	{
		$query = $this->db->query("SELECT * FROM booking WHERE BK_Year = YEAR(CURDATE()) AND BK_Month = MONTH(CURDATE()) AND BK_Day = DAY(CURDATE()) AND B_ID = '$id'");
		return $query->num_rows();
	}

	function getSuccessDayByID($id)
	{
		$query = $this->db->query("SELECT * FROM booking WHERE BK_Year = YEAR(CURDATE()) AND BK_Month = MONTH(CURDATE()) AND BK_Day = DAY(CURDATE()) AND Q_ID = 2 AND B_ID = '$id'");
		return $query->num_rows();
	}

	function getBookingCurdateByID($id)
	{
		$where = "booking.B_ID = '$id' AND status_queue.Q_ID=1 and BK_Year = YEAR(CURDATE()) and BK_Month = MONTH(CURDATE()) and BK_Day = DAY(CURDATE())";

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

	function getSuccessCurdateByID($id)
	{
		$where = "booking.B_ID = '$id' AND status_queue.Q_ID=2 and BK_Year = YEAR(CURDATE()) and BK_Month = MONTH(CURDATE()) and BK_Day = DAY(CURDATE())";

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

	/*-------- ! Dasbord getBarberQueue/B_ID Finish -----------*/

	/*-------- ! Dasbord getBarberAllQueue/B_ID Start -----------*/

	function getQueueAllDayByID($id)
	{
		$query = $this->db->query("SELECT * FROM booking WHERE BK_Year = YEAR(CURDATE()) AND BK_Month = MONTH(CURDATE()) AND BK_Day = DAY(CURDATE()) AND B_ID = '$id' AND Q_ID = 1");
		return $query->num_rows();
	}

	function getQueueAllMonthByID($id)
	{
		$query = $this->db->query("SELECT * FROM booking WHERE BK_Year = YEAR(CURDATE()) AND BK_Month = MONTH(CURDATE()) AND B_ID = '$id' AND Q_ID = 1");
		return $query->num_rows();
	}

	function getQueueAllYearByID($id)
	{
		$query = $this->db->query("SELECT * FROM booking WHERE BK_Year = YEAR(CURDATE()) AND B_ID = '$id' AND Q_ID = 1");
		return $query->num_rows();
	}

	function getQueueAllAllByID($id)
	{
		$query = $this->db->query("SELECT * FROM booking WHERE  B_ID = '$id' AND Q_ID = 1");
		return $query->num_rows();
	}

	/*-------- ! Dasbord getBarberAllQueue/B_ID Finish -----------*/

	/*-------- ! Dasbord getBarberOffWork/B_ID Start -----------*/

	function getBarberOffWorkEverAll($id)
	{
		$query = $this->db->query("SELECT * FROM `offwork` WHERE Date <= CURRENT_DATE AND B_ID = '$id'");
		return $query->num_rows();
	}

	function getBarberOffWorkLastedMonth($id)
	{
		$query = $this->db->query("SELECT * FROM `offwork` WHERE YEAR(Date) = YEAR(CURRENT_DATE()) AND MONTH(Date) BETWEEN MONTH(now())-1 AND MONTH(now()) AND MONTH(Date) < MONTH(CURRENT_DATE()) AND B_ID = '$id'");
		return $query->num_rows();
	}

	function getBarberOffWorkMonth($id)
	{
		$query = $this->db->query("SELECT * FROM `offwork` WHERE YEAR(Date) = YEAR(CURRENT_DATE()) AND MONTH(Date) = MONTH(CURRENT_DATE()) AND B_ID = '$id'");
		return $query->num_rows();
	}

	function getBarberOffWorkAll($id)
	{
		$query = $this->db->query("SELECT * FROM `offwork` WHERE B_ID = '$id'");
		return $query->num_rows();
	}

	function getBarberOffWorkAllByID($id)
	{
		$query = $this->db->query("SELECT * FROM `offwork` WHERE Date > CURRENT_DATE AND B_ID = '$id'");
		return $query->result();
	}

	function getBarberOffWorkEverAllByID($id)
	{
		$query = $this->db->query("SELECT * FROM `offwork` WHERE Date <= CURRENT_DATE AND B_ID = '$id'");
		return $query->result();
	}

	/*-------- ! Dasbord getBarberOffWork/B_ID Finish -----------*/

	/*-------- ! Dasbord getCustomerAll Start -----------*/

	function getCustomerAll()
	{
		$query = $this->db->query("SELECT * FROM `customer` WHERE C_ID NOT IN (SELECT C_ID FROM `customer` WHERE C_ID = 'C00000')");
		return $query->num_rows();
	}

	function getCustomerMale()
	{
		$query = $this->db->query("SELECT * FROM `customer` WHERE C_Sex = 'ชาย'");
		return $query->num_rows();
	}

	function getCustomerFemale()
	{
		$query = $this->db->query("SELECT * FROM `customer` WHERE C_Sex = 'หญิง'");
		return $query->num_rows();
	}

	/*-------- ! Dasbord getCustomerAll Finish -----------*/

	function GenerateHId()
	{
		$query = $this->db->select('H_ID') //เลือกฟิลด์ C_ID โดยเก็บคำสั่งไว้ในตัวแปร query
			->from('hair_style') //จากตาราง customer
			->order_by('H_ID', "ASC") //เรียงจากน้อยไปมาก
			->get();    //เลือกหรือค้น
		$row = $query->last_row();    //นำ query มาหาแถวสุดท้าย จากนั้นเก็บค่าไว้ในตัวแปล row
		if ($row) {    //เมื่อ row สำเร็จ
			$idPostfix = (int)substr($row->H_ID, 2) + 1; //นำตัวเลขมาตัดสติง จากนั้นเฟด B_ID ขึ้นมาตำแหน่งปัจจุบันและให้ + 1
			$nextId = 'H' . STR_PAD((string)$idPostfix, 6, "0", STR_PAD_LEFT); //เติมตัว BK เข้าไปในตำแหน่งที่แก้ไข และเติม 0 ไป 6 ตำแหน่งจากฝั่งซ้าย
		} else {
			$nextId = 'H000001';
		} //ถ้าไม่ใช่ ให้เริ่มต้นที่ BK00001
		return $nextId;    //คืนค่า nextId
	}
}
