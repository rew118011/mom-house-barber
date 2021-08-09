<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class OffWork_Con extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('OffWork_Model','OW');
		$this->load->helper('url');
	}

	function insert_offWork() 
    {
		$id = $this->OW->GenerateId();
        $data = array(
					'OW_ID'=> $id,
                    'B_ID' => $this->input->post("B_ID"),
                    'Date' => $this->input->post("Date"),
                    
                );
			$check = $this->OW->create_offWork($data);
		if($check == true){
			$data['OFFWORK'] = $this->OW->getOffWork_Barber();

			redirect('Admin_Con/ManageOffWork', 'refresh'); //ไปหน้า Admin_Con
		}else{
			echo "<script language=\"JavaScript\">";
            echo "alert('ไม่สามารถเพิ่มข้อมูลได้ค่ะ !')";
            echo "</script>";
		}
    }
    
    public function show_OffWork(){
        $data['OFFWORK'] = $this->OW->getOffWork_Barber();

		$this->load->view('Admin/Header');
        $this->load->view('Offwork/Manage',$data);        
        $this->load->view('Admin/Footer');

    }

	public function del_OffWork($id)
    {
        $data['OFFWORK'] = $this->OW->deleteOffWork_Barber($id);
		
		$check = $data['OFFWORK'];
		if($check == true){
			$data['OFFWORK'] = $this->OW->getOffWork_Barber();

			$this->load->view('Admin/Header');
			$this->load->view('Offwork/offwork_barber',$data);	
			$this->load->view('Admin/Footer');	
		}else{
			echo "<script language=\"JavaScript\">";
            echo "alert('ไม่สามารถเพิ่มข้อมูลได้ค่ะ !')";
            echo "</script>";
		}
    }

}
