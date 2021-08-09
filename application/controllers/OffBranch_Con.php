<?php
defined('BASEPATH') or exit('No direct script access allowed');

class OffBranch_Con extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('OffBranch_Model', 'OBM');
    }
    function ins_close()
    {
        if ($this->input->post('btnCloseBranch')) { //มีการคลิกปุ่ม สมัครสมาชิก
            if ($this->input->post("OB_DATE") == '') {
                echo "<script language=\"JavaScript\">";
                echo "alert('กรุณาเลือกวันที่ต้องการปิดร้านด้วยค่ะ !')";
                echo "</script>";
                redirect('Admin_Con/manageBooking', 'refresh');
            } else {
                $id = $this->OBM->GenerateId();
                $data = array(
                    'OB_ID' => $id,
                    'OB_DATE' => $this->input->post("OB_DATE"),
                    'SOB_ID' => $this->input->post("SOB_ID")
                );
                $check = $this->OBM->create_CloseShop($data);
                if ($check == true) {
                    $data['CLOSEALL'] = $this->OBM->getClose();
                    $data['CLOSEHISTORY'] = $this->OBM->getHistoryClose();
                    
                    redirect('Admin_Con/getClosed', 'refresh');
                } else {
                    echo "<script language=\"JavaScript\">";
                    echo "alert('ไม่สามารถปิดร้านได้ค่ะ !')";
                    echo "</script>";
                    redirect('Admin_Con/manageBooking', 'refresh');
                }
            }
        }
    }
}
