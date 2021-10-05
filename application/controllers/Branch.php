<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Branch extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('branches');
        $this->load->helper('form');
    }

    public function dahsboard(){
        if(!$this->session->userInfo){
            redirect(base_url());
        }
        $data['branches'] = $this->branches->getAll();
        $data['page_file'] = 'branches/dashboard';
		$this->load->view('staffs/staff', $data);
    }
}