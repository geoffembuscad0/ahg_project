<?php
class Account extends CI_Model {
    public function check_existing_account($data = array()){
        $query = $this->db->query("SELECT * 
            FROM account 
            WHERE username = '" . $data['username'] . "'");
        
        return $query->num_rows();
    }
    public function check_password($data = array()){
        $query = $this->db->query("SELECT acc.user_pass 
            FROM account acc
            WHERE acc.username = '".$data['username']."'");
        
        $row = $query->row();
        
        if($row->user_pass == sha1($data['password'])){
            return true;
        } else {
            return false;
        }
    }
    public function check_user_level($data = array()){
        $query = $this->db->query("SELECT ul.usr_lvl AS user_lvl
            FROM user_level ul JOIN account acc ON acc.usr_lvl = ul.usr_lvl 
            WHERE acc.username = '".$data['username']."'");
        
        $row = $query->row();
        
        if($row->user_lvl == 1){
            return 1; // admin
        } else {
            return 2; // customer
        }
    }
    public function get_account_data($username = null){
        $query = $this->db->query("SELECT acc.*, usr_lvl.*
            FROM account acc 
            JOIN user_level usr_lvl
            ON acc.`usr_lvl` = usr_lvl.`usr_lvl`
            WHERE acc.username='".$username."'");
        
        $row = $query->row_array();

        return array(
            'name'          =>  ucfirst($row['firstname']) . " " . ucfirst($row['lastname']),
            'username'      =>$row['username'],
            'email'         =>$row['email'],
            'user_level'    => $row['label']
        );
    }
    public function register_customer($data = array()){
        $this->db->query("insert into account value(
            '".$data['username']."',
            sha1('".$data['password']."'),
            '".$data['firstname']."',
            '".$data['lastname']."',
            '".$data['email']."',
            2)");
    }
    public function validate($data = array()){
        if($this->check_existing_account($data) > 0){
            if($this->check_password($data) == true){
                if($this->check_user_level($data) == 1){
                    return 1;
                } else {
                    return 2;//$this->lang->line('custom_login_customer_success');
                }
            } else {
                return 3;
            }
        } else {
            return 4;
        }
    }
}