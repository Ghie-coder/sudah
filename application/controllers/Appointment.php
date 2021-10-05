<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Appointment extends CI_Controller {

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

    public function add(){
        if(!$this->session->userInfo){
            redirect(base_url());
        }
        $this->load->helper('form');
		$this->load->library('form_validation');

        $data['pets'] = $this->pets->getAll();
        $data['services'] = $this->services->getAll();
        $data['branches'] = $this->branches->getAll();
        $data['appointments'] = $this->appointments->getMyAll();
        $data['schedules'] = $this->schedules->getAllWithBranch();
        $data['page_file'] = 'appointments/form';
        $data['pageNavbarTitle'] = "Book Appointment";

        if(isset($_POST) && !empty($_POST)){
            if ($this->form_validation->run('appointment') === FALSE){
                $data['prePostData'] = (object)$_POST;
                print_r($data['prePostData']);
                $this->load->view('clients/client', $data);
            }
            else{
                $post = $this->input->post();
                $add = $this->appointments->add($post);
                redirect(base_url('client-dashboard'));
            }
        }
        else{
           $this->load->view('clients/client', $data); 
        }
    }

    public function edit($id) {
        if(!$this->session->userInfo){
            redirect(base_url());
        }
        $this->load->helper('form');
		$this->load->library('form_validation');

        $appData = $this->appointments->get($id);
        $data['pets'] = $this->pets->getAll();
        $data['services'] = $this->services->getAll();
        $data['branches'] = $this->branches->getAll();
        $data['appointments'] = $this->appointments->getMyAll();
        $data['appData'] = $appData;
        $data['myServices'] = $this->appointments->getAppointmentServices($appData->appt_id);
        $data['schedules'] = $this->schedules->getAllWithBranch();
        $data['page_file'] = 'appointments/form';
        $data['pageNavbarTitle'] = "Edit Appointment";

        if(isset($_POST) && !empty($_POST)){
            if ($this->form_validation->run('appointment') === FALSE){
                $data['prePostData'] = (object)$_POST;
                print_r($data['prePostData']);
                $this->load->view('clients/client', $data);
            }
            else{
                $post = $this->input->post();
                print_r($post);
                $add = $this->appointments->updateAll($post, $id);
                redirect(base_url('client-dashboard'));
            }
        }
        else{
            $this->load->view('clients/client', $data);
        }
		
    }

    public function dahsboard(){
        if(!$this->session->userInfo){
            redirect(base_url());
        }
        $data['appointments'] = $this->appointments->getAll();
        $data['page_file'] = 'appointments/dashboard';
		$this->load->view('staffs/staff', $data);
    }

    public function cancel(){
        if(!$this->session->userInfo){
            redirect(base_url());
        }
        $post = $this->input->post();
        if($post){
            $appointment = $this->appointments->get($post['appointment_id']);
            if($this->appointments->update('canceled',$post['appointment_id'],$post['reason'])){
                // $number = +61411111111;
                $number = $appointment->contact_no;
                $message = "Your appointment for ".ucwords($appointment->petname)." has been canceled. ".$post['reason'];
                $this->sendSMS($message, $number);
            }
        }
        redirect(base_url('appointments'));
    }

    public function done(){
        if(!$this->session->userInfo){
            redirect(base_url());
        }
        $post = $this->input->post();
        if($post){
            // $appointment = $this->appointments->get($post['appointment_id']);
            $this->appointments->done('done',$post);
        }
        redirect(base_url('appointments'));
    }

    public function confirm($id)
    {
        $update = $this->appointments->update('confirmed',$id);
        if($update){
            $appoitnemnt_details = $this->appointments->get($id);
            $message = "Your appointment has been confirmed.";
            // $number = +61411111111;
            $number = $appoitnemnt_details->contact_no;
            $this->sendSMS($message, $number);
        }
        redirect(base_url('appointments'));
    }
    public function sendSMS($message='', $number=null){

        if(!$number){
            redirect(base_url('appointments'));
        }
        /* API URL */
        $url = 'https://api-mapper.clicksend.com/http/v2/send.php';
        /* Init cURL resource */
        $ch = curl_init($url);
        /* Array Parameter Data */
        $data = [
            'username' => 'codebrigade1822@gmail.com',
            'key'      => 'DF3BFD3E-6A7D-B2A9-5167-BFC56158EA8D',
            'method'   => 'http',
            'to'       => $number,
            'message'  => $message,
            'senderid' => 'SUDAH'
        ];
        /* pass encoded JSON string to the POST fields */
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        /* set the content type json */
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
        /* set return type json */
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        /* execute request */
        $result = curl_exec($ch);
        echo "<pre>";
        $xml=simplexml_load_string($result) or die("Error: Cannot create object");
        print_r($xml->messages->message);
        /* close cURL resource */
        curl_close($ch);
    }
    
}