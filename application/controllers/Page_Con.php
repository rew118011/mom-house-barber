<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Page_Con extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('Customer_Model', 'CM');
		$this->load->model('Barber_Model', 'BM');
		$this->load->model('Admin_Model', 'AM');
		$this->load->model('Booking_Model', 'BKM');
		$this->load->model('OffBranch_Model', 'OBM');
	}

	public function index()
	{
		// all barber
		$dataBarber['Barber'] = $this->AM->getBarberAll();
		// hairstyle
		$dataHairStyle['HS'] = $this->CM->get_HairStyle();

		$this->load->view('Header');
		$this->load->view('Navbar');
		$this->load->view('Login_and_SignUp');
		$this->load->view('Calendar');
		$this->load->view('Barber', $dataBarber);
		$this->load->view('Hairstyle', $dataHairStyle);
		$this->load->view('Footer');
		$this->load->view('Script');
	}

	public function calendar()
	{
		$config = array(
			'start_day' => 'monday', //เริ่มวันต้น วันจันทร์
			'month_type' => 'long', //ขนาดของชื่อเต็มเดือน long = ความยาว
			'day_type' => 'long', //ขนาดของชื่อเต็มเดือน //long = ความยาว
			'show_next_prev' => TRUE, //มีลูกศพให้กดในการเชื่อมโยงเดือน
			'next_prev_url' => site_url('Calendar_Con/calendar') //เลื่อนเดือนหรือย้อนหลังกลับไป
		);
		$events = array(
			1 => base_url() . 'index.php/Login_Con/login', //มีการเชื่อมโยงหน้าเวลากดที่วันที่
			10 => base_url() . 'index.php/Login_Con/login', //มีการเชื่อมโยงหน้าเวลากดที่วันที่
		);
		$this->load->library('calendar', $config); //เรียกใช้งาน calendar ใน library
		//รองรับ parameterแรกที่เป็น URI Segment
		$data['minicalendar'] = $this->calendar->generate($this->uri->segment(3), $this->uri->segment(4), $events);

		$this->load->view('Header');
		$this->load->view('Navbar');
		$this->load->view('FullBanner');
		$this->load->view('Calendar', $data);
		$this->load->view('Footer');
	}

	public function hair_page()
	{
		$result['HS'] = $this->AM->get_HairStyle();  //เรียกใช้งานฟังก์ชั่น model แล้วดึงค่า result เก็บข้อมูลในตัวแปรชื่อว่า HS

		$config = array(
			'start_day' => 'monday', //เริ่มวันต้น วันจันทร์
			'month_type' => 'long', //ขนาดของชื่อเต็มเดือน long = ความยาว
			'day_type' => 'long', //ขนาดของชื่อเต็มเดือน //long = ความยาว
			'show_next_prev' => TRUE, //มีลูกศพให้กดในการเชื่อมโยงเดือน
			'next_prev_url' => site_url('Calendar_Con/calendar') //เลื่อนเดือนหรือย้อนหลังกลับไป
		);
		$events = array(
			1 => base_url() . 'index.php/Login_Con/login', //มีการเชื่อมโยงหน้าเวลากดที่วันที่
			10 => base_url() . 'index.php/Login_Con/login', //มีการเชื่อมโยงหน้าเวลากดที่วันที่
		);
		$this->load->library('calendar', $config); //เรียกใช้งาน calendar ใน library
		//รองรับ parameterแรกที่เป็น URI Segment
		$data['minicalendar'] = $this->calendar->generate($this->uri->segment(3), $this->uri->segment(4), $events);

		$this->load->view('Header');
		$this->load->view('Navbar');
		$this->load->view('FullBanner');
		$this->load->view('HairStyle', $result);
		$this->load->view('Footer');
	}
}
