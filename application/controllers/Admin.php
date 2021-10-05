<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('pets');
        $this->load->model('services');
        $this->load->model('branches');
        $this->load->model('speciesM');
        $this->load->model('appointments');
        $this->load->model('breeds');
        $this->load->model('schedules');
        $this->load->model('inventories');
    }

    public function index()
	{
        if($this->session->userInfo){
            $data['page_file'] = 'admin/dashboard';
            $data['pets'] = $this->pets->getAll();
            $data['breeds'] = $this->breeds->getAllList();
            $data['services'] = $this->services->getAll();
            $data['branches'] = $this->branches->getAll();
            $data['species'] = $this->speciesM->getAll();
            $data['appointments'] = $this->appointments->getMyAll();
            $data['appointmentsHistory'] = $this->appointments->getAppointmentsHistory();
            $data['schedules'] = $this->schedules->getAllWithBranch();
            $data['inventories'] = $this->inventories->getAll();
		    $this->load->view('admin/admin', $data);
        }else{
            redirect('../');
        }
		
	}
}