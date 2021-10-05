<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Branches extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function getAll(){
        $this->db->select('*');
        $this->db->from('branch');
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }



}