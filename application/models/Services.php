<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Services extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function getAll(){
        $this->db->select('*');
        $this->db->from('services');
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }

    public function getOne($id){
        $this->db->from('services');
        $this->db->where('s_id='.$id);
        $query = $this->db->get();
        $result = $query->row();
        return $result;
        
    }

}