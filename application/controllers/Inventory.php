<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inventory extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('inventories');
        $this->load->model('branches');
        $this->load->helper('form');
    }

    public function index(){
        if(!$this->session->userInfo){
            redirect(base_url());
        }
        $data['inventories'] = $this->inventories->getAll();
        $data['page_file'] = 'inventories/index';
        
		$this->load->view('admin/inventories/index', $data);
    }

    public function add(){
        if(!$this->session->userInfo){
            redirect(base_url());
        }

		$this->load->library('form_validation');

        // $data['inventories'] = $this->inventories->getAll();
        $data['branches'] = $this->branches->getAll();
        $data['pageNavbarTitle'] = "Add Inventory";
        $data['page_file'] = 'admin/inventories/form';

        if(isset($_POST) && !empty($_POST)){
            if ($this->form_validation->run('inventory') === FALSE){
                $data['prePostData'] = (object)$_POST;
                $this->load->view('admin/admin', $data);
            }
            else{
                $post = $this->input->post();
                $add = $this->inventories->add($post);
                redirect(base_url('admin-dashboard'));
            }
        }
        else{
            $this->load->view('admin/admin', $data);
        }
    }

    public function edit($id) {
        if(!$this->session->userInfo){
            redirect(base_url());
        }
		$this->load->library('form_validation');

        $inventoryData = $this->inventories->get($id);
        $data['inventoryData'] = $inventoryData;
        $data['branches'] = $this->branches->getAll();
        $data['pageNavbarTitle'] = "Edit Inventory";
        $data['page_file'] = 'admin/inventories/form';

        if(isset($_POST) && !empty($_POST)){
            if ($this->form_validation->run('inventory') === FALSE){
                $data['prePostData'] = (object)$_POST;
                $this->load->view('admin/admin', $data);
            }
            else{
                $post = $this->input->post();
                $add = $this->inventories->update($post, $id);
                redirect(base_url('admin-dashboard'));
            }
        }
        else{
            $this->load->view('admin/admin', $data);
        }
		
    }

}