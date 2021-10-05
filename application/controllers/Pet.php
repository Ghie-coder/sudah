<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pet extends CI_Controller {

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
        $this->load->model('colors');
        $this->load->helper('form');
    }

    public function view($id){
        $data['pet'] = $this->pets->getOne($id);
        $data['pet_appointments'] = $this->pets->getAppointments($id);
        $data['page_file'] = 'pets/view';
        $data['pageNavbarTitle'] = "Pet Details";
		$this->load->view('clients/client', $data);
    }
    public function add(){
        if(!$this->session->userInfo){redirect(base_url());}
        if($_POST){
            $input = $this->input->post();
            if($_FILES['petIMG']['name']){
                $config['upload_path'] = FCPATH.'/assets/img/pets/';
                $config['allowed_types'] = 'gif|jpg|png|';
                $new_name = time().$_FILES["petIMG"]['name'];
                $config['file_name'] = $new_name;
                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('petIMG'))
                {
                    $this->pets->add($input, '');
                }else{
                    $this->pets->add($input, $new_name);
                }
            }else{
                $this->pets->add($input, '');
            }
            redirect(base_url('client-dashboard'));
        }

        $data['page_file'] = 'clients/dashboard';
        $data['pets'] = $this->pets->getAll();
        $data['breeds'] = $this->breeds->getAllList();
        $data['services'] = $this->services->getAll();
        $data['branches'] = $this->branches->getAll();
        $data['species'] = $this->speciesM->getAll();
        $data['colors'] = $this->colors->getAll();
        $data['page_file'] = 'pets/add';
        $data['pageNavbarTitle'] = "Add pet";
		$this->load->view('clients/client', $data);

    }

    
    public function edit($id){
        if(!$this->session->userInfo){redirect(base_url());}
        if($_POST){
            $input = $this->input->post();
            if($_FILES['petIMG']['name']){
                $config['upload_path'] = FCPATH.'/assets/img/pets/';
                $config['allowed_types'] = 'gif|jpg|png|';
                $new_name = time().$_FILES["petIMG"]['name'];
                $config['file_name'] = $new_name;
                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('petIMG'))
                {
                    $this->pets->update($id, $input, '');
                }else{
                    $this->pets->update($id, $input, $new_name);
                }
            }else{
                $this->pets->update($id, $input, '');
            }
            redirect(base_url('client-dashboard'));
        }
        $pet_data = $this->pets->getOne($id);
        $data['pet_data'] = $pet_data;
        $data['page_file'] = 'clients/dashboard';
        $data['pets'] = $this->pets->getAll();
        $data['breeds'] = $this->breeds->getAllList();
        $data['services'] = $this->services->getAll();
        $data['branches'] = $this->branches->getAll();
        $data['species'] = $this->speciesM->getAll();
        $data['colors'] = $this->colors->getAll();
        $data['selectedBreed'] = $this->breeds->getBaseOnSpecies($pet_data->species_id);
        $data['page_file'] = 'pets/add';
        $data['pageNavbarTitle'] = "Edit pet";
		$this->load->view('clients/client', $data);
    }

    public function do_upload(){

        $config['upload_path']          = base_url('../assets/img/pets/');
        $config['allowed_types']        = 'gif|jpg|png';
        $this->load->library('upload', $config);
    }

    public function dahsboard(){
        if(!$this->session->userInfo){
            redirect(base_url());
        }
        $data['pets'] = $this->pets->getAllWithoutWhere();
        $data['page_file'] = 'patient/dashboard';
		$this->load->view('staffs/staff', $data);
    }

}