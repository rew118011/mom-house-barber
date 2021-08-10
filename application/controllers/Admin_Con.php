<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_Con extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Admin_Model', 'AM');
        $this->load->model('Booking_Model', 'BK');
        $this->load->model('OffWork_Model', 'OW');
        $this->load->model('OffBranch_Model', 'OBM');
        $this->load->helper('url');
    }

    function index()
    {
        $data['TOTALOFMONTH'] = $this->AM->getTotalOfMonth();
        $data['BOOKING'] = $this->AM->getBooking();
        $data['BOOKING_SUCCESS'] = $this->AM->getBookingSuccess();

        $data['TOTAL'] = $this->AM->getTotal();

        $this->load->view('Admin/Header');
        $this->load->view('Admin/Navbar');
        $this->load->view('Admin/Queue_Table', $data);
        $this->load->view('Admin/Footer');
    }

    public function manageBooking()
    {

        $data['BOOKING'] = $this->AM->getBooking();
        $data['BOOKING_SUCCESS'] = $this->AM->getBookingSuccess();

        $this->load->view('Admin/Header');
        $this->load->view('Admin/Navbar');
        $this->load->view('Admin/Manage_Booking', $data);
        $this->load->view('Admin/Footer');
    }

    public function getBarberAll()
    {
        $data['BARBER'] = $this->AM->getBarberAll();

        $this->load->view('Admin/Header');
        $this->load->view('Admin/Navbar');
        $this->load->view('Admin/All_Barber', $data);
        $this->load->view('Admin/Footer');
    }

    public function ManageOffWork()
    {
        $data['BARBER'] = $this->AM->getBarberAll();
        $data['OFFWORK'] = $this->OW->getOffWork_Barber();

        $this->load->view('Admin/Header');
        $this->load->view('Admin/Navbar');
        $this->load->view('Admin/Manage_OffWork', $data);
        $this->load->view('Admin/Footer');
    }

    public function getCustomerAll()
    {
        $data['CUSTOMER'] = $this->AM->getCustomer();

        $this->load->view('Admin/Header');
        $this->load->view('Admin/Navbar');
        $this->load->view('Admin/All_Customer', $data);
        $this->load->view('Admin/Footer');
    }

    public function manageHairstyle()
    {
        $data['CUSTOMER'] = $this->AM->getCustomer();
        $data['HS'] = $this->AM->get_HairStyle();  //เรียกใช้งานฟังก์ชั่น model แล้วดึงค่า result เก็บข้อมูลในตัวแปรชื่อว่า HS

        $this->load->view('Admin/Header');
        $this->load->view('Admin/Navbar');
        $this->load->view('Admin/Manage_Hairstyle', $data);
        $this->load->view('Admin/Footer');
    }

    public function getSuccessfulQueue()
    {
        $data['BOOK_HISTRORY'] = $this->AM->getBookingSuccess();

        $this->load->view('Admin/Header');
        $this->load->view('Admin/Navbar');
        $this->load->view('Admin/SuccessfulQueue', $data);
        $this->load->view('Admin/Footer');
    }

    public function getQueueAll()
    {
        $data['BOOK_HISTRORY'] = $this->AM->getBookingSuccess();

        $this->load->view('Admin/Header');
        $this->load->view('Admin/Navbar');
        $this->load->view('Admin/All_Orders', $data);
        $this->load->view('Admin/Footer');
    }

    public function getBarberProfile($id)
    {  //ฟังก์ชั่น detail_profilebarber โดยรับ object $id มาจาก show_barber
        $data['ID'] = $this->AM->getBarberByAdmin($id); //ดึงข้อมูลมาจาก Admin_Model จากนั้นเรียกใช้ฟังก์ชั่น getBarberAll ใน Admin_Model

        $result['HS'] = $this->AM->get_HairStyle();  //เรียกใช้งานฟังก์ชั่น model แล้วดึงค่า result เก็บข้อมูลในตัวแปรชื่อว่า HS

        $data['BOOKING'] = $this->AM->getBarberBooking($id);
        $data['BH'] = $this->AM->getBarberBookingHistory($id);

        $this->load->view('Admin/Header');
        $this->load->view('Admin/Navbar');
        $this->load->view('Admin/Barber_Profile', $data); //เรียกใช้งานหน้า customer_get_barber_profile แล้วนำข้อมูล data ที่เก็บไว้ โดยชื่อว่า ID ไปที่หน้า customer_get_barber_profile
        $this->load->view('Admin/Barber_Booking', $data);
        $this->load->view('Admin/Barber_Booking_History', $data);
        $this->load->view('Admin/Gallery_Barber', $result);
        $this->load->view('Admin/Customer_End');
        $this->load->view('Admin/Footer');
    }

    public function getBarberIncome($id)
    {
        $data['BH'] = $this->AM->getBarberBookingHistory($id);
        $data['ID'] = $this->AM->getBarberByAdmin($id);

        $this->load->view('Admin/Header');
        $this->load->view('Admin/Navbar');
        $this->load->view('Admin/Barber_Income', $data);
        $this->load->view('Admin/Footer');
    }

    public function getBarberQueue($id)
    {
        $data['BOOKING'] = $this->AM->getBarberBooking($id);
        $data['BH'] = $this->AM->getBarberBookingHistory($id);

        $data['ID'] = $this->AM->getBarberByAdmin($id);

        $this->load->view('Admin/Header');
        $this->load->view('Admin/Navbar');
        $this->load->view('Admin/Barber_Queue', $data);
        $this->load->view('Admin/Footer');
    }

    public function getBarberAllQueue($id)
    {
        $data['BOOKING'] = $this->AM->getBarberBooking($id);
        $data['ID'] = $this->AM->getBarberByAdmin($id);

        $this->load->view('Admin/Header');
        $this->load->view('Admin/Navbar');
        $this->load->view('Admin/Barber_All_Queue', $data);
        $this->load->view('Admin/Footer');
    }

    public function getBarberOffWork($id)
    {
        $data['BARBER'] = $this->AM->getBarberAll();
        $data['ID'] = $this->AM->getBarberByAdmin($id);

        $this->load->view('Admin/Header');
        $this->load->view('Admin/Navbar');
        $this->load->view('Admin/Barber_Off_Work', $data);
        $this->load->view('Admin/Footer');
    }

    public function getCustomerProfile($id)
    {
        $data['ID'] = $this->AM->getCustomerByAdmin($id);
        $data['BOOKING'] = $this->AM->getCustomerBooking($id);
        $data['BH'] = $this->AM->getCustomerBookingHistory($id);

        $this->load->view('Admin/Header');
        $this->load->view('Admin/Navbar');
        $this->load->view('Admin/Customer_Profile', $data);
        $this->load->view('Admin/Customer_Booking', $data);
        $this->load->view('Admin/Customer_Booking_History', $data);
        $this->load->view('Admin/Customer_End');
        $this->load->view('Admin/Footer');
    }

    function InsertQueue()
    {
        if ($this->input->post('btnBooking')) //มีการคลิกปุ่ม สมัครสมาชิก
        {
            if ($this->input->post('BK_Year') == '' || $this->input->post('BK_Month') == '' || $this->input->post('BK_Day') == '' ||  $this->input->post('ST_ID') == '') {
                echo "<script language=\"JavaScript\">";
                echo "alert('กรุณาเลือกข้อมูลที่กำหนดไว้ค่ะ !')";
                echo "</script>";
                redirect('Admin_Con/manageBooking', 'refresh');
            } else {
                $id = $this->BK->GenerateId();
                $data = array(
                    'BK_ID' => $id,
                    'C_ID' => $this->input->post('C_ID'),
                    'B_ID' => $this->input->post('B_ID'),
                    'BK_Day' => $this->input->post('BK_Day'),
                    'BK_Month' => $this->input->post('BK_Month'),
                    'BK_Year' => $this->input->post('BK_Year'),
                    'ST_ID' => $this->input->post('ST_ID'),
                    'Q_ID' => $this->input->post('Q_ID')
                );
                $check = $this->BK->createBookingQueueByCustomer($data); //เรียกใช้ฟังชั่น insert ในฐานข้อมูล
                if ($check == TRUE) {
                    redirect('Admin_Con', 'refresh'); //ไปหน้า Admin_Con
                }
            }
        }
    }

    public function getClosed()
    {
        $data['BARBER'] = $this->AM->getBarberAll();
        $data['CLOSEALL'] = $this->OBM->getClose();
        $data['CLOSEHISTORY'] = $this->OBM->getHistoryClose();

        $this->load->view('Admin/Header');
        $this->load->view('Admin/Navbar');
        $this->load->view('Admin/Closed', $data);
        $this->load->view('Admin/Footer');
    }

    public function getAdminProfile($id)
    {
        $data['ID'] = $this->AM->getCustomerByAdmin($id);
        $data['BH'] = $this->AM->getCustomerBookingHistory($id);

        $this->load->view('Admin/Header');
        $this->load->view('Admin/Navbar');
        $this->load->view('Admin/Admin_Profile', $data);
        $this->load->view('Admin/Customer_Booking_History', $data);
        $this->load->view('Admin/Customer_End');
        $this->load->view('Admin/Footer');
    }
}
