<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vet extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('vets');
        $this->load->helper('form');
    }

    public function dahsboard(){
        if(!$this->session->userInfo){
            redirect(base_url());
        }
        $data['vets'] = $this->vets->getAll();
        $data['page_file'] = 'vets/dashboard';
		$this->load->view('staffs/staff', $data);
    }
}