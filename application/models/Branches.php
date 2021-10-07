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

    public function get($id){
        $this->db->select('*');
        $this->db->from('branch');
        $this->db->where('branch.b_id='.$id);
        $query = $this->db->get();
        $result = $query->row();
        return $result;
    }


    public function add($data){
        $branchData = [
            'b_name'    => $data['branch_name'],
            'b_address'       => $data['branch_address'],
        ];
        if($this->db->insert('branch', $branchData)){
            return true;
        }
        return false;
    }

    public function update($post_data, $id){
        $branchData = [
            'b_name'      => $post_data['branch_name'],
            'b_address'   => $post_data['branch_address'],
        ];
        $this->db->where('b_id ', $id);
        if($this->db->update('branch', $branchData)){
            return true;
        }else{
            return false;
        }
    }

}