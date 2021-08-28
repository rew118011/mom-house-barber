<?php
defined('BASEPATH') or exit('No direct script access allowed');

class UserManagement_Con extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('UserManagement_Model', 'UMM');
        $this->load->model('Admin_Model', 'AM');
        $this->load->helper('url');
    }
    public function index()
    {
        $this->load->view('index');
    }
    function createBarber() //ฟังก์ชั่น เพิมชาง
    {
        $this->load->view('Admin/Header');
        $this->load->view('Admin/Navbar');
        $this->load->view('Admin/Create_Barber'); //เรียกใช้งานหน้า เพิมชาง
        $this->load->view('Admin/Footer');
    }
    function insert_barber()
    {
        //สร้างกฏสำหรับ C_Name 'required'คือต้องไม่เป็นค่าว่าง
        $this->form_validation->set_rules('B_Name', 'ชื่อ', 'required');
        //สร้างกฏสำหรับ C_Lname 'required'คือต้องไม่เป็นค่าว่าง
        $this->form_validation->set_rules('B_Lname', 'นามสกุล', 'required');
        //สร้างกฏสำหรับ C_Sex 'required'คือต้องไม่เป็นค่าว่าง
        $this->form_validation->set_rules('B_Nickname', 'ชื่อเล่น', 'required');
        //สร้างกฏสำหรับ C_Sex 'required'คือต้องไม่เป็นค่าว่าง
        $this->form_validation->set_rules('B_Sex', 'เพศ', 'required');
        //สร้างกฏสำหรับ B_Img 'required'คือต้องไม่เป็นค่าว่าง
        $this->form_validation->set_rules('B_Img', 'รูป', 'required');
        //สร้างกฏสำหรับ B_Skill1 'required'คือต้องไม่เป็นค่าว่าง
        $this->form_validation->set_rules('B_Skill1', 'สกิล1', 'required');
        //สร้างกฏสำหรับ B_Skill2 'required'คือต้องไม่เป็นค่าว่าง
        $this->form_validation->set_rules('B_Skill2', 'สกิล2', 'required');
        //สร้างกฏสำหรับ B_Skill3 'required'คือต้องไม่เป็นค่าว่าง
        $this->form_validation->set_rules('B_Skill3', 'สกิล3', 'required');
        //สร้างกฏสำหรับ B_Skill_Score1 'required'คือต้องไม่เป็นค่าว่าง
        $this->form_validation->set_rules('B_Skill_Score1', 'คะแนนสกิล1', 'required');
        //สร้างกฏสำหรับ B_Skill_Score2 'required'คือต้องไม่เป็นค่าว่าง
        $this->form_validation->set_rules('B_Skill_Score2', 'คะแนนสกิล2', 'required');
        //สร้างกฏสำหรับ B_Skill_Score3 'required'คือต้องไม่เป็นค่าว่าง
        $this->form_validation->set_rules('B_Skill_Score3', 'คะแนนสกิล3', 'required');
        //สร้างกฏสำหรับ C_Phone 'required|is_natural|exact_length[10]'คือต้องไม่เป็นค่าว่าง หรือ เป็นตัวเลขจำนวนเต็ม หรือ และต้องตัวอักษรเท่ากับ 10
        $this->form_validation->set_rules('B_Phone', 'เบอร์โทร', 'required|is_natural|exact_length[10]');
        //สร้างกฏสำหรับ Username 'required'คือต้องไม่เป็นค่าว่าง หรือ มีตัวอักษรอย่างน้อย 6 ตัว หรือ ตัวอักษรและตัวเลข
        $this->form_validation->set_rules('B_Address', 'ที่อยู่', 'required');
        $this->form_validation->set_rules('B_Sub_district', 'ที่อยู่', 'required');
        $this->form_validation->set_rules('B_District', 'ที่อยู่', 'required');
        $this->form_validation->set_rules('B_Province', 'ที่อยู่', 'required');
        $this->form_validation->set_rules('B_Postal_Code', 'ที่อยู่', 'required');
        $this->form_validation->set_rules('Username', 'รหัสผู้ใช้', 'required|min_length[6]'); //สร้างกฏสำหรับ Username 'required'คือต้องไม่เป็นค่าว่าง
        $this->form_validation->set_rules('Password', 'รหัสผ่าน', 'required|min_length[6]');
        $this->form_validation->set_error_delimiters('<font color=red>', '</font>');
        if ($this->input->post('btnRegister')) //มีการคลิกปุ่ม สมัครสมาชิก
        {
            if ($this->form_validation->run()) { //ตรวจสอบฟอร์มแล้วถูกต้องตามรูปแบบ
                $id = $this->UMM->GenerateId();
                $data = array(
                    'B_ID' => $id,
                    'B_Name' => $this->input->post("B_Name"),
                    'B_Lname' => $this->input->post("B_Lname"),
                    'B_Nickname' => $this->input->post("B_Nickname"),
                    'B_Sex' => $this->input->post("B_Sex"),
                    'B_Phone' => $this->input->post("B_Phone"),
                    'B_Address' => $this->input->post("B_Address"),
                    'B_Sub_district' => $this->input->post("B_Sub_district"),
                    'B_District' => $this->input->post("B_District"),
                    'B_Province' => $this->input->post("B_Province"),
                    'B_Postal_Code' => $this->input->post("B_Postal_Code"),
                    'Username' => $this->input->post("Username"),
                    'B_Img' => $this->input->post("B_Img"),
                    'B_Skill1' => $this->input->post("B_Skill1"),
                    'B_Skill2' => $this->input->post("B_Skill2"),
                    'B_Skill3' => $this->input->post("B_Skill3"),
                    'B_Skill_Score1' => $this->input->post("B_Skill_Score1"),
                    'B_Skill_Score2' => $this->input->post("B_Skill_Score2"),
                    'B_Skill_Score3' => $this->input->post("B_Skill_Score3")
                );
                $data1 = array(
                    'Username' => $this->input->post("Username"),
                    'Password' => $this->input->post("Password"),
                    'S_ID' => $this->input->post("S_ID"),
                );
                $this->UMM->createBarberlogin($data1);
                $this->UMM->createBarber($data); //เรียกใช้ฟังชั่น insert ในฐานข้อมูล
                redirect('Admin_Con/getBarberAll', 'refresh');
            } else { //กรอกข้อมูลไม่ถูกต้องตามกฏ
                $this->session->set_flashdata('msg_error', 'กรุณากรอกข้อมูลครบค่ะ !');
                $this->load->view('Admin/Create_Barber.php');
            }
        } else { //กลับไปหน้าช่างทั้งหมด
            redirect('Admin_Con/getBarberAll', 'refresh');
        }
    }


    function setBarber($id)
    {
        $data['BARBER'] = $this->UMM->selecting_OneBarberEdit($id);

        $this->load->view('Admin/Header');
        $this->load->view('Admin/Navbar');
        $this->load->view('Admin/Edit_Barber', $data);
        $this->load->view('Admin/Footer');
    }

    function save_barber()
    {
        $data = array(
            'B_ID' => $this->input->post("B_ID"),
            'B_Nickname' => $this->input->post("B_Nickname"),
            'B_Name' => $this->input->post("B_Name"),
            'B_Lname' => $this->input->post("B_Lname"),
            'B_Sex' => $this->input->post("B_Sex"),
            'B_Phone' => $this->input->post("B_Phone"),
            'B_Address' => $this->input->post("B_Address"),
            'B_Sub_district' => $this->input->post("B_Sub_district"),
            'B_District' => $this->input->post("B_District"),
            'B_Province' => $this->input->post("B_Province"),
            'B_Postal_Code' => $this->input->post("B_Postal_Code"),
            'B_Skill1' => $this->input->post("B_Skill1"),
            'B_Skill_Score1' => $this->input->post("B_Skill_Score1"),
            'B_Skill2' => $this->input->post("B_Skill2"),
            'B_Skill_Score2' => $this->input->post("B_Skill_Score2"),
            'B_Skill3' => $this->input->post("B_Skill3"),
            'B_Skill_Score3' => $this->input->post("B_Skill_Score3"),
            'B_Percent' => $this->input->post("B_Percent"),
            'B_Salary' => $this->input->post("B_Salary")
        );
        $check = $this->UMM->setBarber($data);
        if ($check == TRUE) {
            redirect('Admin_Con/getBarberAll', 'refresh');
        } else {
            echo "<script language=\"JavaScript\">";
            echo "alert('ไม่สามารถบันทึกข้อมูลได้ค่ะเกิดข้อผิดพลาด')";
            echo "</script>";
            redirect('Admin_Con/getBarberAll', 'refresh');
        }
    }
    public function deleteBarber($id)
    {
        $data['BARBER'] = $this->UMM->deleteBarber($id);
        redirect('Admin_Con/getBarberAll', 'refresh');
    }
}
