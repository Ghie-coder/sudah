<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Breeds extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }
    public function getAll(){
        $this->db->select('breeds.*, species.name as species_name');
        $this->db->from('breeds');
        $this->db->join('species', 'species.id = breeds.species_id');
        $this->db->where('breeds.status = 1');
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }

    public function getAllList(){
        $this->db->select('*');
        $this->db->from('breeds');
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }

    public function getBaseOnSpecies($id){
        $this->db->select('*');
        $this->db->from('breeds');
        $this->db->where('species_id='.$id);
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

    public function add(){
        $name = $_GET['name'];
        $species_id = $_GET['species_id'];
        $date = new DateTime();
        $data = array(
            'name' => trim(strtolower($name)),
            'species_id' => $species_id,
            'created' => $date->format('Y-m-d H:i:s'),
            'updated' => $date->format('Y-m-d H:i:s')
        );
        if($this->db->insert('breeds', $data)){
            return true;
        }
        return false;
    }

    public function update(){
        $name = $_GET['name'];
        $id = $_GET['id'];
        $species_id = $_GET['species_id'];
        $date = new DateTime();
        $data = array(
            'name' => trim(strtolower($name)),
            'species_id' => $species_id,
            'updated' => $date->format('Y-m-d H:i:s')
        );
        $this->db->where('id', $id);
        if($this->db->update('breeds', $data)){
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
        if($this->db->update('breeds', $data)){
            return true;
        }
        return false;
    }
}