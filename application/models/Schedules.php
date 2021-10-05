<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Schedules extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function getAllWithBranch()
    {
        $this->db->select('schedules.*, branch.b_name as branch_name, vet.fname as vet_fname, vet.mname as vet_mname, vet.lname as vet_lname');
        $this->db->from('schedules');
        $this->db->join('branch', 'branch.b_id = schedules.branch_id');
        $this->db->join('vet', 'vet.vet_id = schedules.vet_id');
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }

    public function add($obj)
    {
        $hasError = false;
        $dates = explode(",", $obj['selectedDates']);
        $createdDate = new DateTime();
        // foreach($obj['branches'] as $branch){
            foreach($dates as $date){
                $myDate = new DateTime($date);
                $data = [
                    'date'      => $myDate->format('Y-m-d'),
                    'branch_id' => $obj['branch'],
                    'vet_id'    => $obj['vet'],
                    'am_max'    => $obj['amInput'],
                    'pm_max'    => $obj['pmInput'],
                    'created'   => $createdDate->format('Y-m-d H:i:s'),
                    'updated'   => $createdDate->format('Y-m-d H:i:s')
                ];
                if(!$this->db->insert('schedules', $data)){
                    $hasError = true;
                }
            }
        // }
        return $hasError;
    }
    public function getScheduleByDate($date, $branchID){
        $this->db->select('*');
        $this->db->from('schedules');
        $this->db->where('date =',date('Y-m-d',strtotime($date)));
        $this->db->where('branch_id =',$branchID);
        $query = $this->db->get();
        $result = $query->row();
        return $result;
    }
}