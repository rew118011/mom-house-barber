  <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barber_Con extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('Barber_Model','BM');
		$this->load->helper('url');
	}
	public function index()
	{
		$this->load->view('Barber/Header');
        $this->load->view('Barber/ItemStories');
        $this->load->view('Barber/Queue_Table');
        $this->load->view('Barber/Footer');
	}

    public function getHaircutHistory()
    {
        $this->load->view('Barber/Header');
        $this->load->view('Barber/ItemStories');
        $this->load->view('Barber/Haircut_History');
        $this->load->view('Barber/Footer');
    }

    public function addPortfolio()
    {
		$this->load->view('Barber/Header');
        $this->load->view('Barber/ItemStories');
        $this->load->view('Barber/Add_Portfolio');
        $this->load->view('Barber/Footer');
    }

    public function getAddminProfile()
    {
		$this->load->view('Barber/Header');
        $this->load->view('Barber/ItemStories');
        $this->load->view('Barber/Admin_Profile');
        $this->load->view('Barber/Footer');
    }

    public function getProfileBarber()
    {
        $sess =  $this->session->userdata('Username');              //นำข้อมูล session เก็บไว้ในตัวแปร $sess
        $data['BARBER'] = $this->BM->getProfileBarber($sess);       //เก็บข้อมูลและฟังก์ชั่นไว้ตัวแปร data

		$this->load->view('Barber/Header');
        $this->load->view('Barber/ItemStories');
        $this->load->view('Barber/Profile', $data);
        $this->load->view('Barber/Portfolio');
        $this->load->view('Barber/Footer');
    }

    public function setProfileBarber()
    {
        $sess =  $this->session->userdata('Username');              //นำข้อมูล session เก็บไว้ในตัวแปร $sess
        $data['BARBER'] = $this->BM->getProfileBarber($sess);       //เก็บข้อมูลและฟังก์ชั่นไว้ตัวแปร data


		$this->load->view('Barber/Header');
        $this->load->view('Barber/ItemStories');
        $this->load->view('Barber/Edit_Profile', $data);
        $this->load->view('Barber/Footer');
    }

	function show_profilebarber() //ฟังก์ชั่นดู โปรไฟล์ customer
    {
        $sess =  $this->session->userdata('Username');      //นำข้อมูล session เก็บไว้ในตัวแปร $sess
        $data['BARBER'] = $this->BM->getProfileBarber($sess);        //เก็บข้อมูลและฟังก์ชั่นไว้ตัวแปร data
        $this->load->view('profilebarber_view', $data);          //นำข้อมูลที่ได้ส่งไปที่หน้า profile_view
    }
    
	function edit_barberpro() //ฟังก์ชั่น แก้ไขโปรไฟล์ customer
    {
        $sess =  $this->session->userdata('Username');      //นำข้อมูล session เก็บไว้ในตัวแปร $sess
        $data['BARBER'] = $this->BM->getProfileBarber($sess);        //เก็บข้อมูลและฟังก์ชั่นไว้ตัวแปร data
        $this->load->view('editbarberpro', $data);          //นำข้อมูลที่ได้ส่งไปที่หน้า profile_view
    }

	function save_profile() //ฟังก์ชั่น update customer
    {
        $data = array(
            'B_ID' => $this->input->post("B_ID"),
            'B_Name' => $this->input->post("B_Name"),
            'B_Lname' => $this->input->post("B_Lname"),
            'B_Nickname' => $this->input->post("B_Nickname"),
            'B_Sex' => $this->input->post("B_Sex"),
            'B_Phone' => $this->input->post("B_Phone"),
            'B_Address' => $this->input->post("B_Address"),
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

}
