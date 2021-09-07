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
        $this->load->library('upload');
        $dataInfo = array();
        $files = $_FILES;
        $cpt = count($_FILES['userfile']['name']);
        for ($i = 0; $i < $cpt; $i++) {
            $_FILES['userfile']['name'] = $files['userfile']['name'][$i];
            $_FILES['userfile']['type'] = $files['userfile']['type'][$i];
            $_FILES['userfile']['tmp_name'] = $files['userfile']['tmp_name'][$i];
            $_FILES['userfile']['error'] = $files['userfile']['error'][$i];
            $_FILES['userfile']['size'] = $files['userfile']['size'][$i];

            $this->upload->initialize($this->set_upload_options());
            $this->upload->do_upload();
            $dataInfo[] = $this->upload->data();
        }
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
            'B_Img' => $dataInfo[0]['file_name'],
            'B_Skill1' => $this->input->post("B_Skill1"),
            'B_Skill2' => $this->input->post("B_Skill2"),
            'B_Skill3' => $this->input->post("B_Skill3"),
            'B_Skill_Score1' => $this->input->post("B_Skill_Score1"),
            'B_Skill_Score2' => $this->input->post("B_Skill_Score2"),
            'B_Skill_Score3' => $this->input->post("B_Skill_Score3"),
            'B_Percent' => $this->input->post("B_Percent"),
            'B_Salary' => $this->input->post("B_Salary"),
        );
        $data1 = array(
            'Username' => $this->input->post("Username"),
            'Password' => $this->input->post("Password"),
            'S_ID' => $this->input->post("S_ID"),
        );
        
        $checkDataLogin = $this->UMM->createBarberlogin($data1);
        $checkDataBarber = $this->UMM->createBarber($data);
        if($checkDataLogin && $checkDataBarber == TRUE){
            echo "<script language=\"JavaScript\">";
            echo "alert('เพิ่มข้อมูลสำเร็จ')";
            echo "</script>";
            redirect('Admin_Con/getBarberAll', 'refresh');
        }else{
            echo "<script language=\"JavaScript\">";
            echo "alert('ไม่สามารถบันทึกข้อมูลได้ค่ะเกิดข้อผิดพลาด')";
            echo "</script>";
            redirect('UserManagement_Con/createBarber', 'refresh');
        }
    }
    private function set_upload_options()
    {
        $config = array();
        $config['upload_path'] = 'img';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size']  = 10024;
        $config['max_width'] = 3000;
        $config['max_height'] = 3000;
        $config['encrypt_name'] = true;

        return $config;
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
    public function deleteBarber($username)
    {
        $data['BARBER'] = $this->UMM->deleteBarber($username);
        $data['BARBER'] = $this->UMM->deleteBarberLogin($username);
        redirect('Admin_Con/getBarberAll', 'refresh');
    }
}
