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

    public function view($id){
        if(!$this->session->userInfo){
            redirect(base_url());
        }

        $data['branches'] = $this->branches->get($id);
        $data['pageNavbarTitle'] = "View Branch" . $id;
        $data['page_file'] = 'admin/branches/view';

        $this->load->view('admin/admin', $data);

    }

    public function add(){
        if(!$this->session->userInfo){
            redirect(base_url());
        }

		$this->load->library('form_validation');

        // $data['inventories'] = $this->inventories->getAll();
        $data['branches'] = $this->branches->getAll();
        $data['pageNavbarTitle'] = "Add Branch";
        $data['page_file'] = 'admin/branches/form';

        if(isset($_POST) && !empty($_POST)){
            if ($this->form_validation->run('branch') === FALSE){
                $data['prePostData'] = (object)$_POST;
                print_r($data['prePostData']);
                $this->load->view('admin/admin', $data);
            }
            else{
                $post = $this->input->post();
                $add = $this->branches->add($post);
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

        $branchData = $this->branches->get($id);
        $data['branchData'] = $branchData;
        $data['branches'] = $this->branches->getAll();
        $data['pageNavbarTitle'] = "Edit Branch";
        $data['page_file'] = 'admin/branches/form';

        if(isset($_POST) && !empty($_POST)){
            if ($this->form_validation->run('branch') === FALSE){
                $data['prePostData'] = (object)$_POST;
                $this->load->view('admin/admin', $data);
            }
            else{
                $post = $this->input->post();
                $add = $this->branches->update($post, $id);
                redirect(base_url('admin-dashboard'));
            }
        }
        else{
            $this->load->view('admin/admin', $data);
        }
		
    }
}