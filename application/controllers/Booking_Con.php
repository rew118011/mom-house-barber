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
        $this->load->model('OffBranch_Model', 'OBM');
    }

    function Booking()
    {
        $sess =  $this->session->userdata('Username');
        $data['CUSTOMER'] = $this->CM->getProfile($sess);
        $data['BARBER'] = $this->BKM->getBarber();
        $data['CLOSEALL'] = $this->OBM->getCloseALL();

        //$barber = 'B00002';
        //$data['BARBER'] = $this->BKM->selectBarber();

        $sess =  $this->session->userdata('Username');
        $datasess['CUSTOMER'] = $this->CM->getProfile($sess);

        $this->load->view('Customer/Header');
        $this->load->view('Customer/Navbar', $datasess);
        $this->load->view('Customer/Banner1');
        $this->load->view('Customer/Booking', $data);
        $this->load->view('Customer/Footer');
    }

    public function check_CloseShop()
    {
       
        $BK_Date = $this->input->post('BK_Date');
        // get data 
        $data = $this->OBM->getCloseALL($BK_Date);
        echo json_encode($data);
    }
    public function fetch_Barber()
    {
        $BK_Year = $this->input->post('BK_Year');
        $BK_Month = $this->input->post('BK_Month');
        $BK_Day = $this->input->post('BK_Day');
        // get data 
        $data = $this->BKM->getBarberBy_YearMonthDay($BK_Year, $BK_Month, $BK_Day);
        echo json_encode($data);
    }

    public function fetch_TimeSlot()
    {
        $BK_Year = $this->input->post('BK_Year');
        $BK_Month = $this->input->post('BK_Month');
        $BK_Day = $this->input->post('BK_Day');
        $B_ID = $this->input->post('B_ID');
        // get data 
        $data = $this->BKM->getTimeSlotByBarberID($BK_Year, $BK_Month, $BK_Day, $B_ID);
        echo json_encode($data);
    }

    public function dynamically_KeepQueue()
    {
        $id = $this->input->post('BK_ID');
        $data = $this->BKM->setQueue($id);
        echo json_encode($data);
    }

    public function dynamically_DeleteQueue()
    {
        $id = $this->input->post('BK_ID');
        $data = $this->BKM->DeleteQueue($id);
        echo json_encode($data);
    }

    function ins_Booking()
    {
        if ($this->input->post('btnBooking')) //มีการคลิกปุ่ม สมัครสมาชิก
        {
            if ($this->input->post('BK_Year') == '' || $this->input->post('BK_Month') == '' || $this->input->post('BK_Day') == '' ||  $this->input->post('ST_ID') == '') {
                echo "<script language=\"JavaScript\">";
                echo "alert('กรุณาเลือกข้อมูลที่กำหนดไว้ค่ะ !')";
                echo "</script>";
                redirect('Customer_Con', 'refresh');
            } else {
                $id = $this->BKM->GenerateId();
                $data = array(
                    'BK_ID' => $id,
                    'C_ID' => $this->input->post('C_ID'),
                    'B_ID' => $this->input->post('B_ID'),
                    'BK_Day' => $this->input->post('BK_Day'),
                    'BK_Month' => $this->input->post('BK_Month'),
                    'BK_Year' => $this->input->post('BK_Year'),
                    'ST_ID' => $this->input->post('ST_ID'),
                    'H_ID' => $this->input->post('H_ID'),
                    'Q_ID' => $this->input->post('Q_ID')
                );
                $check = $this->BKM->createBookingQueueByCustomer($data); //เรียกใช้ฟังชั่น insert ในฐานข้อมูล
                $c_id = $this->input->post('C_ID');
                if ($check == TRUE) {
                    redirect('Customer_Con', 'refresh');
                }
            }
        }
    }

    function del_booking($id)
    {
        $check = $this->CM->cancelBooking($id);
        if ($check) {
            echo "<script language=\"JavaScript\">";
            echo "alert('ลบคิวที่คุณจองเรียบร้อยแล้วค่ะ')";
            echo "</script>";
            redirect('Customer_Con', 'refresh');
        } else {
            echo "<script language=\"JavaScript\">";
            echo "alert('ไม่สามารถลบข้อมูลได้ค่ะ !')";
            echo "</script>";
        }
    }
}
