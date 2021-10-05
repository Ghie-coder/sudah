<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vets extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        
    }

    public function getScheduleByDate($date, $branchID){
        $this->db->select('*');
        $this->db->from('vet_schedule');
        $this->db->where('work_date =',date('Y-m-d',strtotime($date)));
        $this->db->where('branch =',$branchID);
        $query = $this->db->get();
        $result = $query->row();
        return $result;
    }

    public function getAll(){
        $this->db->select('*');
        $this->db->from('vet');
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }


    



}