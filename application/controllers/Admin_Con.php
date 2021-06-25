<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_Con extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('Admin_Model','AM');
		$this->load->helper('url');
	}
	
    public function admin_seecustomerall(){
        $data['CUSTOMER'] = $this->AM->getCustomer();

        $this->load->view('Admin/Header');
        $this->load->view('Admin/All_Customer',$data);
        $this->load->view('Admin/Footer');
    }

    public function admin_seebarberall(){
        $data['BARBER'] = $this->AM->getBarberAll();
        
        $this->load->view('Admin/Header');
        $this->load->view('Admin/All_Barber',$data);
        $this->load->view('Admin/Footer');
    }
    public function admin_seebookingqueueall()
    {
        $data['BOOKING'] = $this->AM->getBooking();
        
        $this->load->view('Admin/Header');
        $this->load->view('Admin/Queue_Table', $data);
        $this->load->view('Admin/Footer');
    }

    public function admin_see_all_orders()
    {
        $data['CUSTOMER'] = $this->AM->getCustomer();
        
        $this->load->view('Admin/Header');
        $this->load->view('Admin/All_Orders',$data);
        $this->load->view('Admin/Footer');
    }    

    public function admin_see_barber_income()
    {
        $data['CUSTOMER'] = $this->AM->getCustomer();
        
        $this->load->view('Admin/Header');
        $this->load->view('Admin/Barber_Income',$data);
        $this->load->view('Admin/Footer');
    }

    public function admin_see_barber_profile($id)
    {  //ฟังก์ชั่น detail_profilebarber โดยรับ object $id มาจาก show_barber
        $data['ID'] = $this->AM->getBarberByAdmin($id); //ดึงข้อมูลมาจาก Admin_Model จากนั้นเรียกใช้ฟังก์ชั่น getBarberAll ใน Admin_Model

        $result['HS'] = $this->AM->get_HairStyle();  //เรียกใช้งานฟังก์ชั่น model แล้วดึงค่า result เก็บข้อมูลในตัวแปรชื่อว่า HS

        $this->load->view('Admin/Header');
        $this->load->view('Admin/Barber_Profile', $data); //เรียกใช้งานหน้า customer_get_barber_profile แล้วนำข้อมูล data ที่เก็บไว้ โดยชื่อว่า ID ไปที่หน้า customer_get_barber_profile
        $this->load->view('Admin/Gallery_Barber', $result);
        $this->load->view('Admin/Footer');
    }

}