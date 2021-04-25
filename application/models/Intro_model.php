<?php

class intro_model extends CI_Model {
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }
    
    public function test(){
        $query=$this->db->query('SELECT email FROM users ORDER BY date_registered DESC LIMIT 1');
        return $query->result();
    }
    
    public function save_register($data){
        $this->db->insert('users', $data);
    }

    public function get_profile_info(){
        $user=$this->session->all_userdata();
        $query=$this->db->query('SELECT * FROM `users` WHERE username="'.$user['username'].'" ');
        return $query->result();
    }

    //Get Books from the DB in order to present it in the books library. currently limit is 50, we need pagination or something to deal with large mass of books.
    public function get_books(){
        $query=$this->db->query('SELECT * from "books" LIMIT 50');
        return $query->result();
    }
}
