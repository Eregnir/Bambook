<?php

class intro_model extends CI_Model {
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }
    
    public function test(){
        $query=$this->db->query('SELECT username FROM `users` ORDER BY `users`.`date_registered` DESC LIMIT 1');
        return $query->result();
    }
    
    public function save_register($data){
        $this->db->insert('users', $data);
    }
}
