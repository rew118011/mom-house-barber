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
		$this->load->view('head_html/b_head');
        $this->load->view('header/barber_navbar');
        $this->load->view('Barber/b_banner');
        $this->load->view('Barber/Queue_Table');
        $this->load->view('footer/footer');
        $this->load->view('footer_html/b_footer');
	}

    public function barber_haircut_history()
    {
		$this->load->view('head_html/b_head');
        $this->load->view('header/barber_navbar');
        $this->load->view('Barber/b_banner');
        $this->load->view('Barber/Haircut_History');
        $this->load->view('footer/footer');
        $this->load->view('footer_html/b_footer');
    }

    public function barber_add_portfolio()
    {
		$this->load->view('head_html/b_head');
        $this->load->view('header/barber_navbar');
        $this->load->view('Barber/b_banner');
        $this->load->view('Barber/Add_Portfolio.php');
        $this->load->view('footer/footer');
        $this->load->view('footer_html/b_footer');
    }

    public function barber_view_admin()
    {
		$this->load->view('head_html/b_head');
        $this->load->view('header/barber_navbar');
        $this->load->view('Barber/b_banner');
        $this->load->view('Barber/Admin_Profile');
        $this->load->view('footer/footer');
        $this->load->view('footer_html/b_footer');
    }

    public function barber_profile()
    {
		$this->load->view('head_html/b_head');
        $this->load->view('header/barber_navbar');
        $this->load->view('Barber/b_banner');
        $this->load->view('Barber/Profile');
        $this->load->view('footer/footer');
        $this->load->view('footer_html/b_footer');
    }

    public function edit_barber_profile()
    {
		$this->load->view('head_html/b_head');
        $this->load->view('header/barber_navbar');
        $this->load->view('Barber/b_banner');
        $this->load->view('Barber/Edit_Profile');
        $this->load->view('footer/footer');
        $this->load->view('footer_html/b_footer');
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
