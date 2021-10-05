<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	public function index()
	{
        $data['error_msg'] = $this->session->flashdata('error_msg') ? $this->session->flashdata('error_msg') : false; 
        $data['show_login'] =$this->session->flashdata('show_login') ? $this->session->flashdata('show_login') : false;
        
        $data['activated'] = $this->session->flashdata('activated') ? $this->session->flashdata('activated') : false;
        if($this->session->flashdata('show_login') || $this->session->flashdata('error_msg')){
            $this->session->sess_destroy();
        }
        
		$data['page_file'] = 'dashboard_section';
		$this->load->view('dashboard', $data);
	}

    public function home(){
        $data['error_msg'] = $this->session->flashdata('error_msg') ? $this->session->flashdata('error_msg') : false; 
        $data['show_login'] =$this->session->flashdata('show_login') ? $this->session->flashdata('show_login') : false;
        $data['activated'] = $this->session->flashdata('activated') ? $this->session->flashdata('activated') : false;
        if($this->session->flashdata('show_login') || $this->session->flashdata('error_msg')){
            $this->session->sess_destroy();
        }
        $data['page_file'] = 'dashboard_section';
		$this->load->view('dashboard', $data);
    }

    public function about($about=''){
        $data['error_msg'] = $this->session->flashdata('error_msg') ? $this->session->flashdata('error_msg') : false; 
        $data['show_login'] =$this->session->flashdata('show_login') ? $this->session->flashdata('show_login') : false;
        $data['activated'] = $this->session->flashdata('activated') ? $this->session->flashdata('activated') : false;
        if($this->session->flashdata('show_login') || $this->session->flashdata('error_msg')){
            $this->session->sess_destroy();
        }
        $data['page_file'] = 'pages/about_us'.$about;
		$this->load->view('dashboard', $data);
    }

    
    public function teambranch(){
        $data['error_msg'] = $this->session->flashdata('error_msg') ? $this->session->flashdata('error_msg') : false; 
        $data['show_login'] =$this->session->flashdata('show_login') ? $this->session->flashdata('show_login') : false;
        $data['activated'] = $this->session->flashdata('activated') ? $this->session->flashdata('activated') : false;
        if($this->session->flashdata('show_login') || $this->session->flashdata('error_msg')){
            $this->session->sess_destroy();
        }
        $data['page_file'] = 'pages/teambranch';
		$this->load->view('dashboard', $data);
    }

    public function blog(){
        $data['error_msg'] = $this->session->flashdata('error_msg') ? $this->session->flashdata('error_msg') : false; 
        $data['show_login'] =$this->session->flashdata('show_login') ? $this->session->flashdata('show_login') : false;
        $data['activated'] = $this->session->flashdata('activated') ? $this->session->flashdata('activated') : false;
        if($this->session->flashdata('show_login') || $this->session->flashdata('error_msg')){
            $this->session->sess_destroy();
        }
        $data['page_file'] = 'pages/blog';
		$this->load->view('dashboard', $data);
    }

    public function catalog(){
        $data['error_msg'] = $this->session->flashdata('error_msg') ? $this->session->flashdata('error_msg') : false; 
        $data['show_login'] =$this->session->flashdata('show_login') ? $this->session->flashdata('show_login') : false;
        $data['activated'] = $this->session->flashdata('activated') ? $this->session->flashdata('activated') : false;
        if($this->session->flashdata('show_login') || $this->session->flashdata('error_msg')){
            $this->session->sess_destroy();
        }
        $data['page_file'] = 'pages/catalog';
		$this->load->view('dashboard', $data);
    }

    public function branch(){
        $data['error_msg'] = $this->session->flashdata('error_msg') ? $this->session->flashdata('error_msg') : false; 
        $data['show_login'] =$this->session->flashdata('show_login') ? $this->session->flashdata('show_login') : false;
        $data['activated'] = $this->session->flashdata('activated') ? $this->session->flashdata('activated') : false;
        if($this->session->flashdata('show_login') || $this->session->flashdata('error_msg')){
            $this->session->sess_destroy();
        }
        $data['page_file'] = 'pages/branch';
		$this->load->view('dashboard', $data);
    }

    public function wellness(){
        $data['error_msg'] = $this->session->flashdata('error_msg') ? $this->session->flashdata('error_msg') : false; 
        $data['show_login'] =$this->session->flashdata('show_login') ? $this->session->flashdata('show_login') : false;
        $data['activated'] = $this->session->flashdata('activated') ? $this->session->flashdata('activated') : false;
        if($this->session->flashdata('show_login') || $this->session->flashdata('error_msg')){
            $this->session->sess_destroy();
        }
        $data['page_file'] = 'pages/wellness';
		$this->load->view('dashboard', $data);
    }

    public function surgery(){
        $data['error_msg'] = $this->session->flashdata('error_msg') ? $this->session->flashdata('error_msg') : false; 
        $data['show_login'] =$this->session->flashdata('show_login') ? $this->session->flashdata('show_login') : false;
        $data['activated'] = $this->session->flashdata('activated') ? $this->session->flashdata('activated') : false;
        if($this->session->flashdata('show_login') || $this->session->flashdata('error_msg')){
            $this->session->sess_destroy();
        }
        $data['page_file'] = 'pages/surgery';
		$this->load->view('dashboard', $data);
    }

    public function prod1(){
        $data['error_msg'] = $this->session->flashdata('error_msg') ? $this->session->flashdata('error_msg') : false; 
        $data['show_login'] =$this->session->flashdata('show_login') ? $this->session->flashdata('show_login') : false;
        $data['activated'] = $this->session->flashdata('activated') ? $this->session->flashdata('activated') : false;
        if($this->session->flashdata('show_login') || $this->session->flashdata('error_msg')){
            $this->session->sess_destroy();
        }
        $data['page_file'] = 'pages/prod1';
		$this->load->view('dashboard', $data);
    }

}
