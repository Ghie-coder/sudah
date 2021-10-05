<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Species extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('speciesM');
    }

    public function index()
    {
        redirect(base_url('species'));
    }

    public function dashboard()
    {
        if(!$this->session->userInfo){
            redirect(base_url());
        }
        $data['species'] = $this->speciesM->getAll();
        $data['page_file'] = 'species/dashboard';
		$this->load->view('staffs/staff', $data);
    }

    public function validateName(){
        if(!$this->session->userInfo){
            redirect(base_url());
        }
        $data = $_GET;
        $result = $this->speciesM->get();
        if($result){
            echo 'exist';
        }else{
            $add = $this->speciesM->add();
            if($add){
                echo 'success';
            }else{
                echo 'failed';
            }
        }
    }

    public function updateSpecies(){
        if(!$this->session->userInfo){
            redirect(base_url());
        }
        $update = $this->speciesM->update();
        echo 'updated';
    }

    public function delete($id=NULL){
        if(!$this->session->userInfo){
            redirect(base_url());
        }
        if($id){
            $delete = $this->speciesM->delete($id);
        }
        redirect(base_url('species'));
    }
    
}