<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inventories extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function getAll(){
        $this->db->select('inventories.*, branch.b_name as branch_name');
        $this->db->from('inventories');
        $this->db->join('branch', 'branch.b_id = inventories.b_id');
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }

    public function get($id){
        $this->db->select('inventories.*, branch.b_name as branch_name');
        $this->db->from('inventories');
        $this->db->join('branch', 'branch.b_id = inventories.b_id');
        $this->db->where('inventories.id='.$id);
        $query = $this->db->get();
        $result = $query->row();
        return $result;
    }

    public function add($data){
        $date = new DateTime();
        $inventoryData = [
            'b_id'         => $data['branch_id'],
            'item_name'         => $data['item_name'],
            'amount'         => $data['amount'],
            'date_created' => $date->format('Y-m-d H:i:s'),
            'date_updated' => $date->format('Y-m-d H:i:s'),
        ];
        if($this->db->insert('inventories', $inventoryData)){
            return true;
        }
        return false;
    }

    public function update($post_data, $id){
        $date = new DateTime();
        $inventoryData = [
            'b_id'         => $post_data['branch_id'],
            'item_name'         => $post_data['item_name'],
            'amount'         => $post_data['amount'],
            'date_updated' => $date->format('Y-m-d H:i:s'),
        ];
        $this->db->where('id ', $id);
        if($this->db->update('inventories', $inventoryData)){
            return true;
        }else{
            return false;
        }
    }
}