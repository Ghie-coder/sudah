<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Staff extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('users');
    }

    public function index()
	{
        if(!$this->session->userInfo){
            redirect(base_url());
        }
		$this->login();
	}

    public function login()
    {
        if($_POST){
            $isvalid = $this->users->staffValidate();
            if($isvalid){
                redirect('../staff-portal');
            }
        }
        if($this->session->userInfo){
            redirect(base_url('staff-portal'));
        }
        $data['page_file'] = 'staffs/login';
		$this->load->view('staffs/staff', $data);
    }

    public function dashboard()
    {
        if(!$this->session->userInfo){
            redirect(base_url());
        }
        $data['page_file'] = 'admin/dashboard';
		$this->load->view('staffs/staff', $data);
    }

}
