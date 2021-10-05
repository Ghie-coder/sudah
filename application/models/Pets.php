<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pets extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }
    public function getAll(){
        $this->db->select('pets.*, species.name as species_name, breeds.name as breed_name');
        $this->db->from('pets');
        $this->db->join('breeds', 'breeds.id = pets.breed_id');
        $this->db->join('species', 'species.id = breeds.species_id');
        $this->db->where('user_id='.$this->session->userInfo['user_id']);
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }

    public function getAllWithoutWhere(){
        $this->db->select('pets.*, species.name as species_name, breeds.name as breed_name, users.fname as user_fname, users.mname as user_mname, users.lname as user_lname,');
        $this->db->from('pets');
        $this->db->join('breeds', 'breeds.id = pets.breed_id');
        $this->db->join('species', 'species.id = breeds.species_id');
        $this->db->join('users', 'users.user_id = pets.user_id');
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }

    public function get(){
        $name = $_GET['name'];
        $species_id = $_GET['species_id'];
        $query = $this->db->get_where('breeds', array('name' => trim(strtolower($name)) , 'status' => 1, 'species_id' => $species_id));
        $result = $query->row();
        if($result){
            return true;
        }
        return false;
    }

    public function getOne($id){
        $this->db->select('pets.*, color.color as color_name, breeds.name as breed_name, species.name as species_name');
        $this->db->from('pets');
        $this->db->join('color', 'color.id = pets.color_id');
        $this->db->join('breeds', 'breeds.id = pets.breed_id');
        $this->db->join('species', 'species.id = breeds.species_id');
        $this->db->where('pets.id='.$id);
        $query = $this->db->get();
        $result = $query->row();
        return $result;
    }

    public function getAppointments($id){
        $this->db->select('appointments.*, appointment_services.service_id as serviceID, services.s_name as service_name, schedules.date as apptSchedule');
        $this->db->join('appointment_services', 'appointments.appt_id = appointment_services.appointment_id');
        $this->db->join('services', 'services.s_id = appointment_services.service_id');
        $this->db->join('schedules', 'schedules.id = appointments.schedule_id');
        $this->db->from('appointments');
        $this->db->where('appointments.pet_id='.$id.' AND '.'appointments.status="done"');
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }

    public function add($input, $file_name=''){
        $date = new DateTime();
        $data = array(
            'user_id' => $this->session->userInfo['user_id'],
            'name' => trim(strtolower($input['petName'])),
            'dob' => $input['petDOB'],
            'gender' => $input['petGender'],
            'color_id' => $input['petColor'],
            'weight' => $input['petWeight'],
            'breed_id' => $input['petBreed'],
            'species_id' => $input['petSpecies'],
            'img' => $file_name,
            'created' => $date->format('Y-m-d H:i:s'),
            'updated' => $date->format('Y-m-d H:i:s')
        );
        if($this->db->insert('pets', $data)){
            return true;
        }
        return false;
    }

    public function update($id, $input, $file_name=''){
        $date = new DateTime();
        $data = array(
            'user_id' => $this->session->userInfo['user_id'],
            'name' => trim(strtolower($input['petName'])),
            'dob' => $input['petDOB'],
            'gender' => $input['petGender'],
            'color_id' => $input['petColor'],
            'weight' => $input['petWeight'],
            'breed_id' => $input['petBreed'],
            'species_id' => $input['petSpecies'],
            'updated' => $date->format('Y-m-d H:i:s')
        );
        if($file_name){
            $data['img'] = $file_name;
        }
        $this->db->where('id', $id);
        if($this->db->update('pets', $data)){
            return true;
        }
        return false;
    }

    // public function update(){
    //     $name = $_GET['name'];
    //     $id = $_GET['id'];
    //     $species_id = $_GET['species_id'];
    //     $date = new DateTime();
    //     $data = array(
    //         'name' => trim(strtolower($name)),
    //         'species_id' => $species_id,
    //         'updated' => $date->format('Y-m-d H:i:s')
    //     );
    //     $this->db->where('id', $id);
    //     if($this->db->update('breeds', $data)){
    //         return true;
    //     }
    //     return false;
    // }
    public function delete($id=NULL){
        $date = new DateTime();
        $data = array(
            'updated' => $date->format('Y-m-d H:i:s'),
            'status' => 0
        );
        $this->db->where('id', $id);
        if($this->db->update('breeds', $data)){
            return true;
        }
        return false;
    }
}