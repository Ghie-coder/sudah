<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SpeciesM extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('encryption');
    }

    public function getAll(){
        $query = $this->db->get_where('species', array('status' => 1));
        $result = $query->result();
        return $result;
    }
    public function get(){
        $name = $_GET['name'];
        $query = $this->db->get_where('species', array('name' => trim(strtolower($name)) , 'status' => 1));
        $result = $query->row();
        if($result){
            return true;
        }
        return false;
    }

    public function add(){
        $name = $_GET['name'];
        $date = new DateTime();
        $data = array(
            'name' => trim(strtolower($name)),
            'created' => $date->format('Y-m-d H:i:s'),
            'updated' => $date->format('Y-m-d H:i:s')
        );
        if($this->db->insert('species', $data)){
            return true;
        }
        return false;
    }

    public function update(){
        $name = $_GET['name'];
        $id = $_GET['id'];
        $date = new DateTime();
        $data = array(
            'name' => trim(strtolower($name)),
            'updated' => $date->format('Y-m-d H:i:s')
        );
        $this->db->where('id', $id);
        if($this->db->update('species', $data)){
            return true;
        }
        return false;
    }
    public function delete($id=NULL){
        $date = new DateTime();
        $data = array(
            'updated' => $date->format('Y-m-d H:i:s'),
            'status' => 0
        );
        $this->db->where('id', $id);
        if($this->db->update('species', $data)){
            return true;
        }
        return false;
    }
}