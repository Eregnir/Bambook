<?php

class intro_model extends CI_Model {
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }

    
    public function test(){
        $query=$this->db->query('SELECT email FROM users');
        return $query->result();
    }
    
}
