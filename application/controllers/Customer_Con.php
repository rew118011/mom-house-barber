<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Customer_Con extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Customer_Model', 'CM');
        $this->load->model('Barber_Model', 'BM');
        $this->load->model('Admin_Model', 'AM');
        $this->load->model('Booking_Model', 'BKM');
    }
    function index()
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

    public function getHairStyle()
    {
        $result['HS'] = $this->AM->get_HairStyle();  //เรียกใช้งานฟังก์ชั่น model แล้วดึงค่า result เก็บข้อมูลในตัวแปรชื่อว่า HS

        $sess =  $this->session->userdata('Username');
        $datasess['CUSTOMER'] = $this->CM->getProfile($sess);

        $this->load->view('head_html/c_head');
        $this->load->view('header/customer_navbar', $datasess);
        $this->load->view('banner/all_banner');
        $this->load->view('customer_hair_view', $result);
        $this->load->view('footer/footer');
        $this->load->view('footer_html/c_footer');
    }

    function insert_regis() //ฟังก์ชั่น insert customer
    {
        //สร้างกฏสำหรับ Username 'required'คือต้องไม่เป็นค่าว่าง หรือ มีตัวอักษรอย่างน้อย 6 ตัว หรือ ตัวอักษรและตัวเลข
        $this->form_validation->set_rules('Username', 'รหัสผู้ใช้', 'required|min_length[6]|alpha_numeric');
        //สร้างกฏสำหรับ Password 'required'คือต้องไม่เป็นค่าว่าง หรือ มีตัวอักษรอย่่างน้อย 6 ตัว
        $this->form_validation->set_rules('Password', 'รหัสผ่าน', 'required|min_length[6]');
        //สร้างกฏสำหรับ C_Name 'required'คือต้องไม่เป็นค่าว่าง
        $this->form_validation->set_rules('C_Name', 'ชื่อ', 'required');
        //สร้างกฏสำหรับ C_Lname 'required'คือต้องไม่เป็นค่าว่าง
        $this->form_validation->set_rules('C_Lname', 'นามสกุล', 'required');
        //สร้างกฏสำหรับ C_Nickname 'required'คือต้องไม่เป็นค่าว่าง
        $this->form_validation->set_rules('C_Nickname', 'ชื่อเล่น', 'required');
        //สร้างกฏสำหรับ C_Sex 'required'คือต้องไม่เป็นค่าว่าง
        $this->form_validation->set_rules('C_Sex', 'เพศ', 'required');
        //สร้างกฏสำหรับ C_Phone 'required|is_natural|exact_length[10]'คือต้องไม่เป็นค่าว่าง หรือ เป็นตัวเลขจำนวนเต็ม หรือ และต้องตัวอักษรเท่ากับ 10
        $this->form_validation->set_rules('C_Phone', 'เบอร์โทร', 'required|is_natural|exact_length[10]');
        //สร้างกฏสำหรับ C_Facebook 'required'คือต้องไม่เป็นค่าว่าง
        $this->form_validation->set_rules('C_Facebook', 'เฟสบุ๊ค', 'required');
        //สร้างกฏสำหรับ C_Img 'required'คือต้องไม่เป็นค่าว่าง
        $this->form_validation->set_rules('C_Img', 'รูป', 'required');
        //ใช้กำหนดข้อผิดพลาดโดยรูปแบบในการแสดงข้อผิดพลาด เป็นตัวหนังสือสีแดง
        $this->form_validation->set_error_delimiters('<font color=red>', '</font>');
        if ($this->input->post('btnRegister')) //มีการคลิกปุ่ม สมัครสมาชิก
        {
            if ($this->form_validation->run()) { //ตรวจสอบฟอร์มแล้วถูกต้องตามรูปแบบ
                $id = $this->CM->GenerateId();
                $data = array(
                    'C_ID' => $id,
                    'Username' => $this->input->post("Username"),
                    'C_Name' => $this->input->post("C_Name"),
                    'C_Lname' => $this->input->post("C_Lname"),
                    'C_Nickname' => $this->input->post("C_Nickname"),
                    'C_Sex' => $this->input->post("C_Sex"),
                    'C_Phone' => $this->input->post("C_Phone"),
                    'C_Facebook' => $this->input->post("C_Facebook"),
                    'C_Img' => $this->input->post("C_Img")
                );
                $data1 = array(
                    'Username' => $this->input->post("Username"),
                    'Password' => $this->input->post("Password"),
                    'S_ID' => $this->input->post("S_ID"),
                );
                $Username = $this->input->post("Username");
                $checkRegisterLoginDuplicate = $this->CM->checkRegisterDuplicate($Username);
                if ($checkRegisterLoginDuplicate == 1) {
                    echo "<center>ข้อมูลที่คุณกรอกเข้ามาเคยลงทะเบียนแล้วค่ะ !</center>";
                } else {
                    $checkLogin = $this->CM->register_login($data1);   //เรียกใช้ฟังชั่น insert ในฐานข้อมูล
                    $checkRegister = $this->CM->register($data); //เรียกใช้ฟังชั่น insert ในฐานข้อมูล  
                    if ($checkLogin && $checkRegister == TRUE) {
                        echo "<script language=\"JavaScript\">";
                        echo "alert('สมัครสมาชิกสำเร็จ')";
                        echo "</script>";
                    } else {
                        echo "<script language=\"JavaScript\">";
                        echo "alert('ไม่สามารถสมัครสมาชิกได้ค่ะกรุณาสมัครเข้ามาใหม่ !')";
                        echo "</script>";
                    }
                }
                //redirect('Page_Con/index', 'refresh');
                echo "<script language=\"JavaScript\">";
                echo "setTimeout(function(){window.location.href='http://localhost/Mom_House_Barber/index.php/Page_Con/index'},500)";
                echo "</script>";
            } else { //กรอกข้อมูลไม่ถูกต้องตามกฏ
                $this->session->set_flashdata('msg_error', 'กรุณากรอกข้อมูลครบค่ะ !');
                redirect('');
            }
        } else { //กลับไปหน้าล็อคอิน
            redirect('');
        }
    }

    function getProfile() //ฟังก์ชั่นดู โปรไฟล์ customer 
    {
        $sess =  $this->session->userdata('Username');      //นำข้อมูล session เก็บไว้ในตัวแปร $sess
        $data['CUSTOMER'] = $this->CM->getProfile($sess);        //เก็บข้อมูลและฟังก์ชั่นไว้ตัวแปร data

        $sess =  $this->session->userdata('Username');
        $datasess['CUSTOMER'] = $this->CM->getProfile($sess);

        $this->load->view('head_html/c_head');
        $this->load->view('header/customer_navbar', $datasess);
        $this->load->view('banner/all_banner');
        $this->load->view('customer_profile', $data);          //นำข้อมูลที่ได้ส่งไปที่หน้า customer_get_profile
        $this->load->view('footer/footer');
        $this->load->view('footer_html/c_footer');
    }

    function setProfile() //ฟังก์ชั่น แก้ไขโปรไฟล์ customer
    {
        $sess =  $this->session->userdata('Username');      //นำข้อมูล session เก็บไว้ในตัวแปร $sess
        $data['CUSTOMER'] = $this->CM->getProfile($sess);        //เก็บข้อมูลและฟังก์ชั่นไว้ตัวแปร data

        $sess =  $this->session->userdata('Username');
        $datasess['CUSTOMER'] = $this->CM->getProfile($sess);
        $this->load->view('head_html/c_head');
        $this->load->view('header/customer_navbar', $datasess);
        $this->load->view('banner/all_banner');
        $this->load->view('customer_profile_edit', $data);          //นำข้อมูลที่ได้ส่งไปที่หน้า profile_view
        $this->load->view('footer/footer');
        $this->load->view('footer_html/c_footer');
    }

    function save_profile() //ฟังก์ชั่น update customer
    {
        $data = array(
            'C_ID' => $this->input->post("C_ID"),
            'Username' => $this->input->post("Username"),
            'C_Name' => $this->input->post("C_Name"),
            'C_Lname' => $this->input->post("C_Lname"),
            'C_Nickname' => $this->input->post("C_Nickname"),
            'C_Sex' => $this->input->post("C_Sex"),
            'C_Phone' => $this->input->post("C_Phone"),
            'C_Facebook' => $this->input->post("C_Facebook")

        );
        $this->CM->setProfile($data);
        $sess =  $this->session->userdata('Username');      //นำข้อมูล session เก็บไว้ในตัวแปร $sess
        $data1['CUSTOMER'] = $this->CM->getProfile($sess);

        $datasess['CUSTOMER'] = $this->CM->getProfile($sess);

        $this->load->view('head_html/c_head');
        $this->load->view('header/customer_navbar', $datasess);
        $this->load->view('banner/all_banner');
        $this->load->view('customer_profile', $data1);          //นำข้อมูลที่ได้ส่งไปที่หน้า customer_get_profile
        $this->load->view('footer/footer');
        $this->load->view('footer_html/c_footer');
    }

    function getAllBarberByCustomer()
    { //ฟังก์ชั่น customer_look_all_barber
        $data['Barber'] = $this->AM->getBarberAll(); //ดึงข้อมูลมาจาก Admin_Model จากนั้นเรียกใช้ฟังก์ชั่น getBarberAll ใน Admin_Model

        $sess =  $this->session->userdata('Username');
        $datasess['CUSTOMER'] = $this->CM->getProfile($sess);

        $this->load->view('head_html/c_head');
        $this->load->view('header/customer_navbar', $datasess);
        $this->load->view('banner/all_banner');
        $this->load->view('customer_look_all_barber', $data); //เรียกใช้หน้า selecting_Barber_view แล้วส่งค่าไปยังหน้า selecting_Barber_view
        $this->load->view('footer/footer');
        $this->load->view('footer_html/c_footer');
    }

    function getBarberByCustomer($id)
    { //ฟังก์ชั่น detail_profilebarber โดยรับ object $id มาจาก show_barber
        $data['ID'] = $this->CM->getBarberByCustomer($id); //ดึงข้อมูลมาจาก Admin_Model จากนั้นเรียกใช้ฟังก์ชั่น getBarberAll ใน Admin_Model

        $sess =  $this->session->userdata('Username');
        $datasess['CUSTOMER'] = $this->CM->getProfile($sess);

        $this->load->view('head_html/c_head');
        $this->load->view('header/customer_navbar', $datasess);
        $this->load->view('banner/all_banner');
        $this->load->view('customer_look_barber_profile', $data); //เรียกใช้งานหน้า customer_get_barber_profile แล้วนำข้อมูล data ที่เก็บไว้ โดยชื่อว่า ID ไปที่หน้า customer_get_barber_profile
        $this->load->view('footer/footer');
        $this->load->view('footer_html/c_footer');
    }

    function show_bookingqueue($c_id)
    {
        $data['BOOKING'] = $this->CM->getBookingQueue($c_id);

        $sess =  $this->session->userdata('Username');      //นำข้อมูล session เก็บไว้ในตัวแปร $sess
        $data['CUSTOMER'] = $this->CM->getProfile($sess);        //เก็บข้อมูลและฟังก์ชั่นไว้ตัวแปร data

        $sess =  $this->session->userdata('Username');
        $datasess['CUSTOMER'] = $this->CM->getProfile($sess);

        $this->load->view('head_html/c_head');
        $this->load->view('header/customer_navbar', $datasess);
        $this->load->view('banner/all_banner');
        $this->load->view('showbookingqueue_view', $data);
        $this->load->view('footer/footer');
        $this->load->view('footer_html/c_footer');
    }
    function del_booking($id)
    {
        $check = $this->CM->cancelBooking($id);
        if ($check) {
            echo "<script language=\"JavaScript\">";
            echo "alert('ลบคิวที่คุณจองเรียบร้อยแล้วค่ะ')";
            echo "</script>";
            redirect('Booking_Con/Booking', 'refresh');
        } else {
            echo "<script language=\"JavaScript\">";
            echo "alert('ไม่สามารถลบข้อมูลได้ค่ะ !')";
            echo "</script>";
        }
    }
}
