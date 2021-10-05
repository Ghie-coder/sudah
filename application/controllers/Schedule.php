<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Schedule extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('users');
        $this->load->model('speciesM');
        $this->load->model('branches');
        $this->load->model('schedules');
        $this->load->model('vets');
        $this->load->helper('form');
        
    }

    public function dashboard()
    {
        if(!$this->session->userInfo){
            redirect(base_url());
        }
        $data['page_file'] = 'schedules/dashboard';
        $data['species'] = $this->speciesM->getAll();
        $data['branches'] = $this->branches->getAll();
        $data['schedules'] = $this->schedules->getAllWithBranch();
        $data['vets'] = $this->vets->getAll();
		$this->load->view('staffs/staff', $data);
    }

    public function add(){
        if(!$this->session->userInfo){
            redirect(base_url());
        }
        $post = $this->input->post();
        $add = $this->schedules->add($post);
        redirect(base_url('schedules'));
    }

}