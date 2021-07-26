<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login_Con extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Login_Model', 'LM');
        $this->load->model('Customer_Model', 'CM');
        $this->load->model('Admin_Model', 'AM');
        $this->load->library(array('session', 'form_validation'));
    }
    public function index()
    {
        if (!$this->session->userdata('logged')) //ยังไม่มีการล็อคอิน
        {
            redirect('Login_Con/login'); //กลับไปหน้าล็อคอิน
        } else {
            $this->load->view('Login_Con/customer_page'); //แสดงหน้าหลัก
        }
    }
    public function login()
    {
        $this->load->view('login_view'); //แสดงฟอร์มล็อคอิน
    }
    //
    public function check_login()
    {
        $this->form_validation->set_rules('Username', 'รหัสผู้ใช้', 'required|min_length[6]'); //สร้างกฏสำหรับ Username 'required'คือต้องไม่เป็นค่าว่าง
        $this->form_validation->set_rules('Password', 'รหัสผ่าน', 'required|min_length[6]');  //สร้างกฏสำหรับ Password 'required'คือต้องไม่เป็นค่าว่าง
        //$this->form_validation->set_error_delimiters('<font color=red>', '</font>');
        $this->form_validation->set_message('required', ' %s ต้องไม่เป็นค่าว่าง,กรุณาลองอีกครั้ง');
        if ($this->input->post('btnLogin')) //มีหารคลิกปุ่ม เข้าสู่ระบบ
        {
            $Username = $this->input->post('Username'); //รับค่า Username จากฟอร์ม
            $Password = $this->input->post('Password'); //รับค่า Password จากฟอร์ม
            if ($this->form_validation->run()) { //ตรวจสอบฟอร์มแล้วถูกต้องตามรูปแบบ
                $check = $this->LM->check_Login($Username, $Password); //ตรวจสอบชื่อผู้ใช้และรหัสผ่าน
                if ($check) { //Username และ Password ถูกต้อง
                    $status = $this->LM->check_StatusByUsername($Username); //ตรวจสอบ status โดยอ้างอิงตำแหน่งตาม Username
                    if ($status->S_ID == 1) {     //ถ้าสเตตัส = 1
                        $data = array('Username' => $Username, 'S_ID' => $status, 'logged' => TRUE); //$data เก็บค่า Usermae และ Status เป็น array
                        $this->session->set_userdata($data); //สร้างตัวแปร session
                        redirect('Login_Con/admin_page'); //ไปหน้า admin_view
                    } else if ($status->S_ID == 2) {
                        $data = array('Username' => $Username, 'S_ID' => $status, 'logged' => TRUE); //$data เก็บค่า Usermae และ Status เป็น array
                        $this->session->set_userdata($data); //สร้างตัวแปร session
                        redirect('Barber_Con/index'); //ไปหน้า barber_view
                    } else {
                        $data = array('Username' => $Username, 'S_ID' => $status, 'logged' => TRUE); //$data เก็บค่า Usermae และ Status เป็น array
                        $this->session->set_userdata($data); //สร้างตัวแปร session
                        redirect('Login_Con/customer_page'); //ไปหน้า customer_view
                    }
                } else {
                    $this->session->set_flashdata('msg_error', 'รหัสผ่านไม่ถูกต้องกรุณาตรวจสอบอีกครั้งค่ะ !');
                    $this->load->view('login_view'); //แสดงหน้าล็อคอิน
                }
            } else { //กรอกข้อมูลไม่ถูกต้องตามกฏ
                $this->session->set_flashdata('msg_error', 'กรุณากรอกข้อมูลให้ครบค่ะ !');
                $this->load->view('login_view'); //กลับไปหน้า login
            }
        } else { //กลับไปหน้าล็อคอิน
            redirect('Login_Con/login');
        }
    }
    function logout() //ฟังก์ชั่นออกจากระบบ
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
        $this->load->view('non_cus_hair_style', $result);
        $this->load->view('footer/footer');
        $this->load->view('footer_html/n_footer');
    }
    function admin_page()
    {
        $data['BOOKING'] = $this->AM->getBooking();

        $this->load->view('Admin/Header');
        $this->load->view('Admin/Queue_Table', $data);
        $this->load->view('Admin/Footer');
    }

    function customer_page()
    {
        $result['HS'] = $this->AM->get_HairStyle();

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
        $datacalendar['minicalendar'] = $this->calendar->generate($this->uri->segment(3), $this->uri->segment(4), $events);

        $sess =  $this->session->userdata('Username');
        $datasess['CUSTOMER'] = $this->CM->getProfile($sess);


        $this->load->view('head_html/c_head');
        $this->load->view('header/customer_navbar', $datasess);
        $this->load->view('banner/banner');
        $this->load->view('c_calendar', $datacalendar);
        $this->load->view('customer_hair_view', $result);
        $this->load->view('footer/footer');
        $this->load->view('footer_html/c_footer');
    }
}
