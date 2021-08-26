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
        $this->load->model('OffBranch_Model', 'OBM');
    }
    function index()
    {

        $sess =  $this->session->userdata('Username');
        $data['CUSTOMER'] = $this->CM->getProfile($sess);
        // customer queue - query by username
        $data['BOOKING'] = $this->CM->getBookingQueue($sess);
        // all barber
        $data['Barber'] = $this->AM->getBarberAll();
        // hairstyle
        $result['HS'] = $this->CM->get_HairStyle();
        // booking and history booking in profile
        $data['BOOKING'] = $this->CM->getBooking($sess);
        $data['BH'] = $this->CM->getBookingHistory($sess);

        $this->load->view('Customer/Header');
        $this->load->view('Customer/Navbar', $data);
        $this->load->view('Customer/Profile', $data);
        $this->load->view('Customer/EditProfile', $data);
        $this->load->view('Customer/Navbar_End', $data);
        $this->load->view('Customer/Booking', $data);
        $this->load->view('Customer/ShowQueue', $data);
        $this->load->view('Customer/Calendar');
        $this->load->view('Customer/AllBarber', $data);
        $this->load->view('Customer/Hairstyle', $result);
        $this->load->view('Customer/Footer');
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
        redirect('Customer_Con', 'refresh'); //ไปหน้า customer_view
    }

    function save_Image() //ฟังก์ชั่น update customer
    {

        $config['upload_path'] = 'img/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size']  = 10024;
        $config['max_width'] = 3000;
        $config['max_height'] = 3000;
        $config['encrypt_name'] = true;


        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('C_Img')) {

            redirect('Customer_Con', 'refresh');
        } else {
            $image = $this->upload->data('file_name');
            $data = array(
                'C_ID' => $this->input->post("C_ID"),
                'C_Img' => $image
            );
        }
        $this->CM->setProfile($data);

        redirect('Customer_Con', 'refresh'); //ไปหน้า Admin_Con
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

    public function popupBarber()
    {
        $B_ID = $this->input->post('B_ID');
        // get data 
        $data = $this->CM->get_BarberByID($B_ID);
        echo json_encode($data);
    }

    public function popupHair()
    {
        $H_ID = $this->input->post('H_ID');
        // get data 
        $data = $this->CM->get_HairStyleByID($H_ID);
        echo json_encode($data);
    }
}
