<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Breed extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('speciesM');
        $this->load->model('breeds');
    }

    public function index()
    {
        redirect(base_url('breeds'));
    }

    public function dashboard()
    {
        if(!$this->session->userInfo){
            redirect(base_url());
        }
        $data['breeds'] = $this->breeds->getAll();
        $data['species'] = $this->speciesM->getAll();
        $data['page_file'] = 'breeds/dashboard';
		$this->load->view('staffs/staff', $data);
    }

    public function validateName(){
        if(!$this->session->userInfo){
            redirect(base_url());
        }
        $data = $_GET;
        $result = $this->breeds->get();
        if($result){
            echo 'exist';
        }else{
            $add = $this->breeds->add();
            if($add){
                echo 'success';
            }else{
                echo 'failed';
            }
        }
    }

    public function update(){
        if(!$this->session->userInfo){
            redirect(base_url());
        }
        $update = $this->breeds->update();
        echo 'updated';
    }
    public function delete($id=NULL){
        if(!$this->session->userInfo){
            redirect(base_url());
        }
        if($id){
            $delete = $this->breeds->delete($id);
        }
        redirect(base_url('breeds'));
    }
}