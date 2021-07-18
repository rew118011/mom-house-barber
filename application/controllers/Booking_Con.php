<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Booking_Con extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Booking_Model', 'BKM');
        $this->load->model('Customer_Model', 'CM');
        $this->load->model('Admin_Model', 'AM');
    }
    function select_day()
    {
        $days = array(0 => '---Select Days---');
        for ($d = 1; $d <= 31; $d++) {
            $days[] = $d;
        }
        return $days;
    }
    function select_month()
    {
        $month = array(
            0 => '---Select Month---', 1 => 'มกราคม', 2 => 'กุมภาพันธ์', 3 => 'มีนาคม', 4 => 'เมษายน', 5 => 'พฤกภาคม', 6 => 'มิถุนายน',
            7 => 'กรกฎาคม', 8 => 'สิงหาคม', 9 => 'กันยายน', 10 => 'ตุลาคม', 11 => 'พฤศจิกายน', 12 => 'ธันวาคม'
        );
        for ($m = 13; $m <= 12; $m++) {
            $month[] = $m;
        }
        return $month;
    }
    function select_year()
    {
        $year = array(0 => '---Select Year---', 2021 => '2021');
        for ($y = 2021; $y < 2021; $y++) {

            $year[] = $y;
        }
        return $year;
    }

    function getNumberOfDays($month, $year)
    {
        $numday = 31;
        if ($month == 4 || $month == 6 || $month == 9 || $month == 11) {
            $numday = 30;
        } else if ($month == 2) {
            $numday = $year % 4 != 0 || ($year % 100 == 0 && $year % 400 != 0) ? $numday = 28 : 29;
        }
        return $numday;
    }

    function Booking()
    {
        $sess =  $this->session->userdata('Username');
        $data['CUSTOMER'] = $this->CM->getProfile($sess);
        $data['BARBER'] = $this->BKM->selectBarber1();
        $data['TIMESLOT'] = $this->BKM->selectTimeSlot();

        $data['Barber'] = $this->AM->getBarberAll(); //ดึงข้อมูลมาจาก Admin_Model จากนั้นเรียกใช้ฟังก์ชั่น getBarberAll ใน Admin_Model
        
        //$barber = 'B00003';
        //$data['BARBER'] = $this->BKM->selectBarber();
        //$data['TIMESLOT'] = $this->BKM->getTimeSlotByBarberID($barber);

        $sess =  $this->session->userdata('Username');
        $datasess['CUSTOMER'] = $this->CM->getProfile($sess);

        $this->load->view('head_html/c_head');
        $this->load->view('header/customer_navbar', $datasess);
        $this->load->view('banner/all_banner');
        $this->load->view('booking_view', $data);
        $this->load->view('footer/footer');
        $this->load->view('footer_html/c_footer');
    }


    function ins_Booking()
    {
        $customer = $this->input->post('C_ID');
        $time = $this->input->post('ST_ID');
        $barber = $this->input->post('B_ID');
        if ($this->input->post('btnBooking')) //มีการคลิกปุ่ม สมัครสมาชิก
        {
            $checkBookingDuplicate = $this->BKM->checkBookingDuplicate($customer);
            $checkTimeBarber = $this->BKM->checkTimeBarber($time, $barber);
            if ($this->input->post('BK_Year') == 0 || $this->input->post('BK_Month') == 0 || $this->input->post('BK_Day') == 0 || $this->input->post('ST_ID') == 0 || $this->input->post('B_ID') == '') {
                echo "<script language=\"JavaScript\">";
                echo "alert('กรุณากรอกข้อมูลด้วยค่ะ !')";
                echo "</script>";
                redirect('Booking_Con/Booking', 'refresh');
            } else if ($checkBookingDuplicate == 1) {
                echo "<center><font color='red'><h1>คุณมีการจองคิวอยู่แล้วค่ะ</h1></font></center>";
                $data['BOOKING'] = $this->CM->getBookingQueue($customer);

                $sess =  $this->session->userdata('Username');
                $datasess['CUSTOMER'] = $this->CM->getProfile($sess);

                $this->load->view('head_html/c_head');
                $this->load->view('header/customer_navbar', $datasess);
                $this->load->view('banner/banner');
                $this->load->view('showbookingqueue_view', $data);
                $this->load->view('footer/footer');
                $this->load->view('footer_html/c_footer');
            } else if ($checkTimeBarber == 1) {
                echo "<center><font color='red'><h1>คิวที่คุณเลือกมีคนจองแล้วค่ะสามารถตรวจสอบคิวได้จากตารางข้างล่าง</h1></font></center>";
                $barber = $this->input->post('B_ID');
                $data['BARBER'] = $this->BM->getBarberByID($barber);
                $data['TIMESLOT'] = $this->BKM->getTimeSlot($barber);

                $sess =  $this->session->userdata('Username');
                $datasess['CUSTOMER'] = $this->CM->getProfile($sess);

                $this->load->view('head_html/c_head');
                $this->load->view('header/customer_navbar', $datasess);
                $this->load->view('banner/banner');
                $this->load->view('showtimeslot_view', $data);
                $this->load->view('footer/footer');
                $this->load->view('footer_html/c_footer');
            } else {
                $id = $this->BKM->GenerateId();
                $data = array(
                    'BK_ID' => $id,
                    'C_ID' => $this->input->post('C_ID'),
                    'B_ID' => $this->input->post('B_ID'),
                    'BK_Day' => $this->input->post('BK_Day'),
                    'BK_Month' => $this->input->post('BK_Month'),
                    'BK_Year' => $this->input->post('BK_Year'),
                    'ST_ID' => $this->input->post('ST_ID')
                );
                $check = $this->BKM->createBookingQueueByCustomer($data); //เรียกใช้ฟังชั่น insert ในฐานข้อมูล
                $c_id = $this->input->post('C_ID');
                if ($check == TRUE) {
                    $data['BOOKING'] = $this->BKM->getBookingQueueByCustomer($c_id);

                    $sess =  $this->session->userdata('Username');
                    $datasess['CUSTOMER'] = $this->CM->getProfile($sess);

                    $this->load->view('head_html/c_head');
                    $this->load->view('header/customer_navbar', $datasess);
                    $this->load->view('banner/banner');
                    $this->load->view('showbookingqueue_view', $data);
                    $this->load->view('footer/footer');
                    $this->load->view('footer_html/c_footer');
                }
            }
        }
    }
}
