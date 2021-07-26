<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Booking_Con extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Booking_Model', 'BKM');
        $this->load->model('Customer_Model', 'CM');
        $this->load->model('Barber_Model', 'BM');
        $this->load->model('Admin_Model', 'AM');
    }

    function Booking()
    {
        $sess =  $this->session->userdata('Username');
        $data['CUSTOMER'] = $this->CM->getProfile($sess);
        $data['BARBER'] = $this->BKM->getBarber();
    
        //$barber = 'B00002';
        //$data['BARBER'] = $this->BKM->selectBarber();

        $sess =  $this->session->userdata('Username');
        $datasess['CUSTOMER'] = $this->CM->getProfile($sess);

        $this->load->view('head_html/c_head');
        $this->load->view('header/customer_navbar', $datasess);
        $this->load->view('banner/all_banner');
        $this->load->view('booking_view', $data);
        $this->load->view('footer/footer');
        $this->load->view('footer_html/c_footer');
    }

    public function fetch_TimeSlot()
    {
        // get data 
        $data = $this->BKM->getTimeSlotByBarberID($this->input->post('B_ID'));
        echo json_encode($data);
    }

    public function fetch_Barber()
    {
        $BK_Year = $this->input->post('BK_Year');
        $BK_Month = $this->input->post('BK_Month');
        $BK_Day = $this->input->post('BK_Day');
        // get data 
        $data = $this->BKM->getTimeSlotBy_YearMonthDay($BK_Year,$BK_Month,$BK_Day);
        echo json_encode($data);
    }


    function ins_Booking()
    {
        $customer = $this->input->post('C_ID');
        $time = $this->input->post('ST_ID');
        $barber = $this->input->post('B_ID');
        if ($this->input->post('btnBooking')) //มีการคลิกปุ่ม สมัครสมาชิก
        {
            {
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
