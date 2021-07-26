<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Page_Con extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Admin_Model', 'AM');
    }

    public function index()
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

		$this->load->view('head_html/n_head');
        $this->load->view('header/header');
        $this->load->view('banner/banner');
		$this->load->view('n_calendar', $data);
        $this->load->view('non_cus_hair_style',$result);
        $this->load->view('footer/footer');
        $this->load->view('footer_html/n_footer');
    }

	public function calendar()
	{
		$config = array(
			'start_day' => 'monday',
			'month_type' => 'long',
			'day_type' => 'long',
			'show_next_prev' => TRUE,
			'next_prev_url' => site_url('Calendar_Con/calendar')
		);
		$events = array(
			1 => base_url() . 'index.php/Login_Con/login',
			10 => base_url() . 'index.php/Login_Con/login',
		);
		$this->load->library('calendar', $config);
		$data['minicalendar'] = $this->calendar->generate($this->uri->segment(3), $this->uri->segment(4), $events);
		$this->load->view('calendar', $data);
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

		$this->load->view('head_html/n_head');
        $this->load->view('header/header');
        $this->load->view('banner/banner');
        $this->load->view('non_cus_hair_style',$result);
        $this->load->view('footer/footer');
        $this->load->view('footer_html/n_footer');
    }
    
    public function customer_hair_page()
    {
        $result['HS'] = $this->AM->get_HairStyle();  //เรียกใช้งานฟังก์ชั่น model แล้วดึงค่า result เก็บข้อมูลในตัวแปรชื่อว่า HS
		$this->load->view('customer_hair_view',$result); //โหลดหน้าทรงผม แล้วนำข้อมูลไปใช้งาน ใน hair_view
    }

    public function nav()
    {

        $result['HS'] = $this->AM->get_HairStyle();

		$this->load->view('admin_nav_leftbar', $result);
    }
}
