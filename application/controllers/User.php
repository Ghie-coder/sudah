<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('users');
        $this->load->model('services');
        $this->load->model('branches');
        $this->load->model('speciesM');
        $this->load->model('breeds');
        $this->load->model('colors');
    }

    public function index()
	{
		$data['page_file'] = 'dashboard_section';
		$this->load->view('dashboard', $data);
	}

    public function login(){
        $data['page_file'] = 'user/login';
		$this->load->view('dashboard', $data);
    }

    public function login_submit(){
        $result = $this->users->validate_user();

        if($result){
            if($this->session->userInfo['user_role'] == "client"){
                redirect('../client-dashboard');
            }
            elseif($this->session->userInfo['user_role'] == "admin"){
                redirect('../admin-dashboard');
            }
            elseif($this->session->userInfo['user_role'] == "clerk"){
                redirect('../client-dashboard');
            }
            else{
                //error message: no role defined. error
            }
        }
        $this->session->set_flashdata('error_msg', true);
        $this->session->set_flashdata('show_login',true);
        // $data['page_file'] = 'dashboard_section';
        // $this->load->view('dashboard', $data);
        redirect(base_url());
        
    }

    public function signup(){            
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');

        $data['error_msg'] = $this->session->flashdata('error_msg') ? $this->session->flashdata('error_msg') : false; 
        $data['show_login'] =$this->session->flashdata('show_login') ? $this->session->flashdata('show_login') : false;
        if($this->session->flashdata('show_login') || $this->session->flashdata('error_msg')){
            $this->session->sess_destroy();
        }
        $data['breeds'] = $this->breeds->getAllList();
        $data['species'] = $this->speciesM->getAll();
        $data['colors'] = $this->colors->getAll();
        $data['page_file'] = 'user/signup';
        
        if(isset($_POST) && !empty($_POST)){
            // print_r('after post');
            // exit;
            if ($this->form_validation->run('signup') == FALSE){
                // print_r('after validation false');
                // exit;
                $data['account'] = (object)$_POST;
                $this->load->view('dashboard', $data);
            }
            else{
                // print_r('after validation true');
                // exit;
                $email = $this->users->checkEmail();
                $username = $this->users->checkUsername();

                if($email == false && $username == false){
                    if($_FILES['petIMG']['name']){
                        $config['upload_path'] = FCPATH.'/assets/img/pets/';
                        $config['allowed_types'] = 'gif|jpg|png|';
                        $new_name = time().$_FILES["petIMG"]['name'];
                        $config['file_name'] = $new_name;
                        $this->load->library('upload', $config);
                        if (!$this->upload->do_upload('petIMG'))
                        {
                            $new_name = "";
                        }                     
                    }else{
                        $new_name = "";
                    }
                    $result = $this->users->add_user($new_name);
                    $link = '<a href="'.base_url('activate-account?code='.$result['activation_code'].'&id='.$result['id']).'">activate here.</a>';
                    $message = '<p>Congrats on creating your account.</p>';
                    $message .= '<p>please click the provided link below to activate your account</p>';
                    $message .= '<p>'.$link.'</p>';
                    if($this->sendMail($result, $message)){
                        $this->session->set_flashdata('registered',true);
                        redirect("../signup");
                    }
                }
                elseif($email && $username){
                    $this->session->set_flashdata('email and username exists', true);
                    redirect('../signup');
                }
                elseif($email){
                    $this->session->set_flashdata('email registered', true);
                    redirect('../signup');
                }
                else{
                    $this->session->set_flashdata('username exists', true);
                    redirect('../signup');
                }
            }
        }
        else{
		    $this->load->view('dashboard', $data);
        }
    }

    public function signUpSuccess()
    {
        redirect('../signup');
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('../');
    } 
    public function sendMail($data=null, $msg='')
    {
        if($data){
            $config['protocol'] = 'smtp';
            $config['smtp_host'] = 'smtp.hostinger.ph';
            $config['smtp_user'] = 'verification@sudahveterinary.com';
            $config['smtp_pass'] = 'ver1fy@sudaH';
            $config['smtp_port'] = '587';
            $config['chartset'] = 'utf-8';
            $config['smtp_timeout'] = '7';
            $config['newline'] = "\r\n";
            $config['mailtype'] = 'html';
            $config['validation'] = TRUE;
            
            $this->email->initialize($config);
            $this->email->from('verification@sudahveterinary.com', 'SUDAH');
            $this->email->to($data['email']);
            $this->email->subject('SUDAH Account Verification');
            $this->email->message($msg);
            if($this->email->send()){
                return true;
            }else{
                echo "<pre>";
                print_r($this->email->print_debugger());
                return false;
            }
            // echo $msg;
            // exit;
        }
        redirect(base_url());
    }

    public function activateAccount() {
        $activated = $this->users->activateAccount();
        // if($activated){
            $this->session->set_flashdata('activated',true);
            $this->session->set_flashdata('show_login',true);
            
        redirect(base_url());
        // }
        redirect(base_url());
    }

    public function forgotPass(){
        if($_POST){
            $result = $this->users->checkEmail();
            if($result){
                // $link = '<a href="'.base_url('activate-account?code='.$result['activation_code'].'&id='.$result['id']).'">activate here.</a>';
                $href = base_url('requested-reset-password?id='.$result->user_id);
                $message = 'Hi ' .$result->username. ', below is your link to reset your password.';
                $link = '<p> <a href="'.$href.'">Reset password.</a></p>';
                $message .= $link;
                $isSent = $this->sendMail($_POST, $message);
                if($isSent){
                    $data['messages'] = [
                        'type' => 'alert-success',
                        'text' => 'Email sent for the recovery.'
                    ];
                }else{
                    $data['messages'] = [
                        'type' => 'alert-danger',
                        'text' => 'Unable to sent email as of this moment.'
                    ];
                }
            }else{
                $data['messages'] = [
                    'type' => 'alert-danger',
                    'text' => 'Email submitted is not registered to our system.'
                ];
            }
            $this->session->set_flashdata('messages', $data);
            redirect('../forgot-password');
        }
        if($this->session->flashdata('messages')){
            $data = $this->session->flashdata('messages');
            unset($_SESSION['messages']);
        }
        $data['error_msg'] = $this->session->flashdata('error_msg') ? $this->session->flashdata('error_msg') : false; 
        $data['show_login'] =$this->session->flashdata('show_login') ? $this->session->flashdata('show_login') : false;
        $data['activated'] = $this->session->flashdata('activated') ? $this->session->flashdata('activated') : false;
        if($this->session->flashdata('show_login') || $this->session->flashdata('error_msg')){
            $this->session->sess_destroy();
        }
        $data['page_file'] = 'user/forgot_password';
        $this->load->view('dashboard', $data);
    }

    public function resetPasswordLink(){
        $data = $_GET;
        print_r($data);
    }

    //My Account
    public function account(){
        $test_id = $_SESSION;
        $data['userInfo'] = $test_id['userInfo'];
        // print_r($test_id['userInfo']);
        // exit;
        $this->load->view('user/account', $data);
    }

    public function edit(){
		
        $id = $_SESSION['userInfo']['user_id'];

		// if (!isset($id) || empty($id))
		// {
		// 	show_404();
		// }
		
		$this->load->helper('form');
		$this->load->library('form_validation');
        // var_dump(!empty($_POST));
        // exit;
        if(isset($_POST) && !empty($_POST)){
            if ($this->form_validation->run('user/edit') === FALSE){
                $data['account'] = (object)$_POST;
                $this->load->view('user/edit', $data);
            }
            else{
                $this->users->edit_user();
                $this->load->view('user/account', $data);
            }
		}
        else{
            $getAccount = $this->db->query("SELECT * FROM users WHERE user_id = $id AND user_role = 'client' ");
            $result = $getAccount->result();
            $data['account'] = $result[0];
            $this->load->view('user/edit', $data);
        }
	}

    public function changePassword(){
		
        $id = $_SESSION['userInfo']['user_id'];

		// if (!isset($id) || empty($id))
		// {
		// 	show_404();
		// }
        $getAccount = $this->db->query("SELECT * FROM users WHERE user_id = $id AND user_role = 'client' ");
        $result = $getAccount->result();
        $data['account'] = $result[0];
        print_r($data['account']->password);

		$this->load->helper('form');
		$this->load->library('form_validation');

        if(isset($_POST) && !empty($_POST)){
            if ($this->form_validation->run('user/change-password') === FALSE){
                $data['account'] = (object)$_POST;
                print_r($data);
                exit;
                $this->load->view('user/change-password', $data);
            }
            elseif(md5($_POST['password']) !== $data['account']->password){
                $data['account'] = (object)$_POST;
                // $data['account']['error'] = "Current Password does not match. Please try again";
                print_r($data);
                print_r('current pass error');
                // exit;
                $this->load->view('user/change-password', $data); 
            }
            elseif($_POST['new_password'] !== $_POST['confirm_password']){
                $data['account'] = (object)$_POST;
                // $data['account']['error'] = "Passwords did not match. Please try again";
                print_r($data);
                print_r('confirm pass error');
                // exit;
                $this->load->view('user/change-password', $data); 
            }
            else{
                if($this->users->change_password($_POST)){
                    $this->load->view('user/account');
                }
                else{
                    $data['account'] = (object)$_POST;
                    $this->load->view('user/change-password', $data);
                }
            }
		}
        else{

            $this->load->view('user/change-password', $data);
        }
	}

}