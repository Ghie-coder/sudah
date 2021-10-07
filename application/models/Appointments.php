<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Appointments extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('schedules');
        $this->load->model('pets');
        $this->load->model('services');

    }
    public function getMyAll(){
        $this->db->select('appointments.*,schedules.date as apptDate, pets.name as pet_name, branch.b_name, vet.title as vet_title, vet.fname as vet_fname, vet.lname as vet_lname, vet.mname as vet_mname');
        $this->db->from('appointments');
        $this->db->join('pets', 'pets.id = appointments.pet_id');
        $this->db->join('branch', 'branch.b_id = appointments.b_id');
        $this->db->join('vet', 'vet.vet_id = appointments.vet_id','left outer');
        $this->db->join('schedules', 'schedules.id = appointments.schedule_id');
        $this->db->where('appointments.user_id='.$this->session->userInfo['user_id']);
        $this->db->where('appointments.status != "done"');
        //$this->db->select('str_to_date(, "%d-%b-%Y") day',false);
        $this->db->order_by('appointments.appt_id','DESC');
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }
    
    public function getAppointmentsHistory(){
        $this->db->select('appointments.reason,schedules.date as apptDate, pets.name as pet_name, branch.b_name,');
        $this->db->from('appointments');
        $this->db->join('pets', 'pets.id = appointments.pet_id');
        $this->db->join('branch', 'branch.b_id = appointments.b_id');
        $this->db->join('schedules', 'schedules.id = appointments.schedule_id');
        $this->db->where('appointments.user_id='.$this->session->userInfo['user_id']);
        $this->db->where('appointments.status = "done"');
        //$this->db->select('str_to_date(, "%d-%b-%Y") day',false);
        $this->db->order_by('appointments.appt_id','DESC');
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }

    public function getAll(){
        $this->db->select('appointments.*, pets.name as pet_name, branch.b_name, vet.title as vet_title, vet.fname as vet_fname, vet.lname as vet_lname, vet.mname as vet_mname, users.fname as owner_fname, users.mname as owner_mname, users.lname as owner_lname, schedules.date as apptDate');
        $this->db->from('appointments');
        $this->db->join('pets', 'pets.id = appointments.pet_id');
        $this->db->join('branch', 'branch.b_id = appointments.b_id');
        $this->db->join('vet', 'vet.vet_id = appointments.vet_id');
        $this->db->join('users','users.user_id = appointments.user_id');
        $this->db->join('schedules', 'schedules.id = appointments.schedule_id');
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }

    public function get($id){
        $this->db->select('appointments.*, users.contact_no, schedules.date as apptDate, pets.name as petname');
        $this->db->from('appointments');
        $this->db->join('users', 'users.user_id = appointments.user_id');
        $this->db->join('schedules', 'schedules.id = appointments.schedule_id');
        $this->db->join('pets', 'pets.id = appointments.pet_id');
        $this->db->where('appointments.appt_id='.$id);
        $query = $this->db->get();
        $result = $query->row();
        return $result;
    }
    public function add($data){
        // if(getScheduleByDate() error)
        $sched = $this->schedules->getScheduleByDate($data['appointmentDate'], $data['branch_id']);
        $pet = $this->pets->getOne($data['pet_id']);
        $vetID = 0;
        if($sched){
            $vetID = $sched->vet_id ;
        }
        $date = new DateTime();
        $appointmentData = [
            'schedule_id'  => $sched->id,
            'reason'       => $data['reason'],
            'user_id'      => $this->session->userInfo['user_id'],
            'b_id'         => $data['branch_id'],
            'vet_id'       => $vetID,
            'pet_id'       => $data['pet_id'],
            'date_created' => $date->format('Y-m-d'),
            'time'         => $data['serviceDay']
        ];
        if($this->db->insert('appointments', $appointmentData)){
            $apptID = $this->db->insert_id();
            foreach($data['service_id'] as $service){
                $appointmentServices = [
                    "appointment_id" => $apptID,
                    "service_id"     => $service
                ];
                $this->db->insert('appointment_services', $appointmentServices);
            }
            return true;
        }
        return false;
    }

    public function update($status='', $id='', $remarks=''){
        $this->db->set('status', $status);
        $this->db->set('remarks', $remarks);
        $this->db->where('appt_id ', $id);
        if($this->db->update('appointments')){
            return true;
        }else{
            return false;
        }
    }

    public function done($status='', $post=null){
        if($post){
            $data = [
                'remarks' => $post['remarks'],
                'status' => $status,
                'weight' => $post['weight'],
                'temp' => $post['temperature'],
                'diagnosis' => $post['findings'],
                'treatment' => $post['treatment']
            ];
            // [] => 12 [] => 34 [appointment_id] => 5 [] => test diagnosis [treatment] => test treatment [remarks] => test remarks
            $this->db->where('appt_id ', $post['appointment_id']);
            if($this->db->update('appointments', $data)){
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
        
    }

    public function updateAll($data, $id){
        $sched = $this->schedules->getScheduleByDate($data['appointmentDate'], $data['branch_id']);
        $pet = $this->pets->getOne($data['pet_id']);
        $vetID = 0;
        if($sched){
            $vetID = $sched->vet_id ;
        }
        $date = new DateTime();
        $appointmentData = [
            'schedule_id'  => $sched->id,
            'reason'       => $data['reason'],
            'b_id'         => $data['branch_id'],
            'vet_id'       => $vetID,
            'pet_id'       => $data['pet_id'],
            'time'         => $data['serviceDay']
        ];
        $this->db->where('appt_id', $id);
        if($this->db->update('appointments', $appointmentData)){
            $this->db->delete('appointment_services', array('appointment_id' => $id));
            foreach($data['service_id'] as $service){
                $appointmentServices = [
                    "appointment_id" => $id,
                    "service_id"     => $service
                ];
                $this->db->insert('appointment_services', $appointmentServices);
            }
            return true;
        }else{
            return false;
        }
    }

    public function getAppointmentServices($id){
        $this->db->select('appointment_services.*,services.s_id as service_id');
        $this->db->from('appointment_services');
        $this->db->join('services', 'services.s_id = appointment_services.service_id');
        $this->db->where('appointment_id='.$id);
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }

}