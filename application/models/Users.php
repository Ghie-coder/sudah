<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Users extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('encryption');
    }
    public function validate_user()
    {
        $data = $_POST;
        // $ciphertext = $this->encryption->encrypt($data['pass']);
        // echo strlen($ciphertext);
        $password = md5($data['pass']);
        $query = $this->db->get_where('users', array('username' => $data['uname'], 'password' => $password));
        $result = $query->row();
        if(isset($result)){
            $this->setUserSession($result);
            return true;
        }
        return false;
    }

    public function staffValidate(){
        $data = $_POST;
        $password = md5($data['pass']);
        $query = $this->db->get_where('users', array('username' => $data['uname'], 'password' => $password));
        $result = $query->row();
        $valid = false;
        if($result){
            if($result->user_role !== 'client'){
                $this->setUserSession($result);
                $valid = true;
            }
        }
        return $valid;
    }
    public function checkEmail(){
        $data = $_POST;
        // 'email' => $data['email'],
        $isExists = false;
        $query = $this->db->get_where('users', array('email' => $data['email']), 1);
        $result = $query->result();
        if($result){
            // $isExists = true;
            return $result[0];
        }
        return $isExists;
    }

    public function checkUsername(){
        $data = $_POST;
        $isExists = false;
        $query = $this->db->get_where('users', array('username' => $data['uname']), 1);
        $result = $query->result();
        if($result){
            // $isExists = true;
            return $result[0];
        }
        return $isExists;
    }

    public function add_user($file_name = "")
    {
        // $query="INSERT into users(lname, fname, mname, email, uname, pass)
        //         values('{$_POST['lname']}', '{$_POST['fname']}', '{$_POST['mname']}', '{$_POST['email']}', '{$_POST['uname']}', '{$_POST['pass']}')";
        // $result = mysqli_query($con,$query);
        // $count = mysqli_num_rows($result);
        $post_data = $_POST;
        $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $activation_code = substr(str_shuffle($permitted_chars), 0, 11);
        $data = array(
            'lname'           => $post_data['lname'],
            'fname'           => $post_data['fname'],
            'mname'           => $post_data['mname'],
            'email'           => $post_data['email'],
            'username'        => $post_data['uname'],
            'password'        => md5($post_data['pass']),
            'contact_no'      => $post_data['cnum'],
            'account_status'  => 'not verified',
            'user_role'       => 'client',
            'date_created'    => date('y-m-d'),
            'activation_code' => $activation_code
        );
        if($this->db->insert('users', $data)){
            $user_id = $this->db->insert_id();
            $date = new DateTime();
            $petData = array(
                'user_id' => $user_id,
                'name' => trim(strtolower($post_data['petName'])),
                'dob' => $post_data['petDOB'],
                'gender' => $post_data['petGender'],
                'color_id' => $post_data['petColor'],
                'weight' => $post_data['petWeight'],
                'breed_id' => $post_data['petBreed'],
                'species_id' => $post_data['petSpecies'],
                'img' => $file_name,
                'created' => $date->format('Y-m-d H:i:s'),
                'updated' => $date->format('Y-m-d H:i:s')
            );
            $this->db->insert('pets', $petData);
            $user_created = [
                'activation_code' => $activation_code,
                'email' => $data['email'],
                'id'    => $this->db->insert_id()
            ];
            return $user_created;
        }
        else{
            return false;
        }

    }



    public function setUserSession($data=null)
    {
        if($data){
            $userData = [
                'user_id' => $data->user_id,
                'username' => $data->username,
                'fname' => $data->fname,
                'mname' => $data->mname,
                'lname' => $data->lname,
                'email' => $data->email,
                'contact_no' => $data->contact_no,
                'address' => $data->address,
                'account_status' => $data->account_status,
                'date_created' => $data->date_created,
                'activation_code' => $data->activation_code,
                'status' => $data->status,
                'user_role' => $data->user_role,
            ];
            $this->session->set_userdata('userInfo' , $userData);
        }
    }
    public function activateAccount(){
        $data = $_GET;
        $query = $this->db->get_where('users', array('user_id ' => $data['id'], 'activation_code' => $data['code']));
        $result = $query->row();
        if($result){
            $this->db->set('account_status', 'verified');
            $this->db->where('user_id ', $data['id']);
            if($this->db->update('users')){
                return true;
            }else{
                return false;
            }
        }
    }

    public function edit_user()
    {
        $post_data = $_POST;      
        $this->db->where('user_id', $_POST['id']);
        $this->db->update('users', $post_data);
    }

    public function change_password($post_data)
    {
        $password = md5($post_data['confirm_password']);
        $data = array('password' => $password);
        
        $this->db->where('user_id', $post_data['user_id']);
        $this->db->update('users', $data);
        
        return TRUE;
    }
}