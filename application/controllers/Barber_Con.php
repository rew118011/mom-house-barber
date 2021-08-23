  <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barber_Con extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('Barber_Model','BM');
        $this->load->model('Admin_Model', 'AM');
		$this->load->helper('url');
	}
	public function index()
	{
        $sess =  $this->session->userdata('Username');              
        $data['BARBER'] = $this->BM->getProfileBarber($sess); 
        $data['CH'] = $this->BM->getBarberBookingHistory($sess);  
        $data['BOOKING'] = $this->BM->getBarberBooking($sess);
        $data['BHC'] = $this->BM->getBarberBookingHistoryCurdate ($sess);

		$this->load->view('Barber/Header', $data);
        $this->load->view('Barber/ItemStories');
        $this->load->view('Barber/Queue_Table', $data);
        $this->load->view('Barber/Footer');
	}

    public function getHaircutHistory()
    {
        $sess =  $this->session->userdata('Username');              
        $data['BARBER'] = $this->BM->getProfileBarber($sess);
        $data['CH'] = $this->BM->getBarberBookingHistory($sess); 
        $data['BHC'] = $this->BM->getBarberBookingHistoryCurdate ($sess);

        $this->load->view('Barber/Header', $data);
        $this->load->view('Barber/ItemStories', $data);
        $this->load->view('Barber/Haircut_History', $data);
        $this->load->view('Barber/Footer');
    }

    public function addPortfolio()
    {
        $sess =  $this->session->userdata('Username');              
        $data['BARBER'] = $this->BM->getProfileBarber($sess); 
        $data['BHC'] = $this->BM->getBarberBookingHistoryCurdate ($sess); 

		$this->load->view('Barber/Header', $data);
        $this->load->view('Barber/ItemStories', $data);
        $this->load->view('Barber/Add_Portfolio', $data);
        $this->load->view('Barber/Footer');
    }

    public function getAddminProfile($id)
    {
        $sess =  $this->session->userdata('Username');              
        $data['BARBER'] = $this->BM->getProfileBarber($sess); 
        $data['ID'] = $this->AM->getCustomerByAdmin($id);
        $data['BH'] = $this->AM->getCustomerBookingHistory($id);
        $data['CH'] = $this->BM->getBarberBookingHistory($sess);
        $data['BHC'] = $this->BM->getBarberBookingHistoryCurdate ($sess);

		$this->load->view('Barber/Header', $data);
        $this->load->view('Barber/ItemStories', $data);
        $this->load->view('Barber/Admin_Profile', $data);
        $this->load->view('Barber/Customer_Booking_History', $data);
        $this->load->view('Barber/Barber_End');
        $this->load->view('Barber/Footer');
    }

    public function getProfileBarber()
    {
        $sess =  $this->session->userdata('Username');              
        $data['BARBER'] = $this->BM->getProfileBarber($sess);   
        $data['CH'] = $this->BM->getBarberBookingHistory($sess);  
        $data['BOOKING'] = $this->BM->getBarberBooking($sess);
        $data['FO'] = $this->BM->getPortfolio($sess);
        $data['BHC'] = $this->BM->getBarberBookingHistoryCurdate ($sess);

		$this->load->view('Barber/Header', $data);
        $this->load->view('Barber/ItemStories', $data);
        $this->load->view('Barber/Profile', $data);
        $this->load->view('Barber/Barber_Booking', $data);
        $this->load->view('Barber/Barber_Booking_History', $data);
        $this->load->view('Barber/Gallery_Barber', $data);
        $this->load->view('Barber/Barber_End');
        $this->load->view('Barber/Footer');
    }

    public function setProfileBarber()
    {
        $sess =  $this->session->userdata('Username');              //นำข้อมูล session เก็บไว้ในตัวแปร $sess
        $data['BARBER'] = $this->BM->getProfileBarber($sess);       //เก็บข้อมูลและฟังก์ชั่นไว้ตัวแปร data
        $data['BHC'] = $this->BM->getBarberBookingHistoryCurdate ($sess);

		$this->load->view('Barber/Header', $data);
        $this->load->view('Barber/ItemStories', $data);
        $this->load->view('Barber/Edit_Profile', $data);
        $this->load->view('Barber/Footer');
    }


/*--------------------------------  ---------------------------------*/

	function save_profileBarber() //ฟังก์ชั่น update 
    {
        $data = array(
            'B_ID' => $this->input->post("B_ID"),
            'B_Name' => $this->input->post("B_Name"),
            'B_Lname' => $this->input->post("B_Lname"),
            'B_Nickname' => $this->input->post("B_Nickname"),
            'B_Sex' => $this->input->post("B_Sex"),
            'B_Phone' => $this->input->post("B_Phone"),
            'B_Address' => $this->input->post("B_Address"),
            'B_Skill1' => $this->input->post("B_Skill1"),
            'B_Skill2' => $this->input->post("B_Skill2"),
            'B_Skill3' => $this->input->post("B_Skill3"),
            'B_Skill_Score1' => $this->input->post("B_Skill_Score1"),
            'B_Skill_Score2' => $this->input->post("B_Skill_Score2"),
            'B_Skill_Score3' => $this->input->post("B_Skill_Score3"),
            'B_Percent' => $this->input->post("B_Percent"),
            'B_Salary' => $this->input->post("B_Salary"),
        );
        $check = $this->BM->setProfile($data);
        if($check == TRUE){
        $sess =  $this->session->userdata('Username');      //นำข้อมูล session เก็บไว้ในตัวแปร $sess
        $data1['BARBER'] = $this->BM->getProfileBarber($sess);
        $this->load->view('profilebarber_view', $data1);
        }else{
            echo "<script language=\"JavaScript\">";
            echo "alert('ไม่สามารถแก้ไขข้อมูลได้ค่ะ !')";
            echo "</script>";
        }
        
    }

    function save_Image() 
    {
            $config['upload_path'] = 'img/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size']  = 10024; 
            $config['max_width'] = 3000; 
            $config['max_height'] = 3000;	
            $config['encrypt_name'] = true;  
            
            $this->load->library('upload', $config);
            if ( ! $this->upload->do_upload('PFLO_Img')) {
               
                redirect('Barber_Con/setProfileBarber','refresh');
          }
          else{
             $image = $this->upload->data('file_name');
             $data = array (
                'B_ID' => $this->input->post("B_ID"),
                'B_Img' => $image);
        }
        $this->BM->setProfile($data);
        
        
        $sess =  $this->session->userdata('Username');              //นำข้อมูล session เก็บไว้ในตัวแปร $sess
        $data['BARBER'] = $this->BM->getProfileBarber($sess);       //เก็บข้อมูลและฟังก์ชั่นไว้ตัวแปร data
        $data['BHC'] = $this->BM->getBarberBookingHistoryCurdate ($sess);

		$this->load->view('Barber/Header', $data);
        $this->load->view('Barber/ItemStories', $data);
        $this->load->view('Barber/Edit_Profile', $data);
        $this->load->view('Barber/Footer');
    }
    

    public function getCustomerProfile($id)
    {
        $sess =  $this->session->userdata('Username');
        $data['BARBER'] = $this->BM->getProfileBarber($sess);
        $data['CH'] = $this->BM->getBarberBookingHistory($sess);
        $data['ID'] = $this->BM->getCustomerShow($id);
        $data['BOOKING'] = $this->BM->getBarberBooking($sess);
        $data['BHC'] = $this->BM->getBarberBookingHistoryCurdate ($sess);

        $this->load->view('Barber/Header', $data);
        $this->load->view('Barber/ItemStories', $data);
        $this->load->view('Barber/Customer_Profile', $data);
        $this->load->view('Barber/Customer_Booking', $data);
        $this->load->view('Barber/Customer_Booking_History', $data);
        $this->load->view('Barber/Barber_End');
        $this->load->view('Barber/Footer');
    }

}
