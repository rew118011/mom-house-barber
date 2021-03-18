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

        $this->load->view('head_html/a_head');
        $this->load->view('header/admin_navbar');
        $this->load->view('banner/all_banner');
        $this->load->view('admin_look_customerall',$data);
        $this->load->view('footer_html/a_footer');
    }

    public function admin_seebarberall(){
        $data['BARBER'] = $this->AM->getBarberAll();
        
        $this->load->view('head_html/a_head');
        $this->load->view('header/admin_navbar');
        $this->load->view('banner/all_banner');
        $this->load->view('admin_look_barber_all',$data);
        $this->load->view('footer_html/a_footer');
    }
    public function admin_seebookingqueueall()
    {
        $data['BOOKING'] = $this->AM->getBooking();
        
        $this->load->view('head_html/a_head');
        $this->load->view('header/admin_navbar');
        $this->load->view('banner/all_banner');
        $this->load->view('admin_queue_table', $data);
        $this->load->view('footer_html/a_footer');
    }

}