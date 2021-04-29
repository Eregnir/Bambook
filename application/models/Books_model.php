<?php

class books_model extends CI_Model {
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }

    public function get_book_info($uid){
        $query=$this->db->query('SELECT * FROM user_books WHERE UID = "'.$uid.'" ');
        return $query->result();

    }

    public function send_swap_req($data){
        $query=$this->db->query('SELECT date_registered FROM users WHERE username= "'.$data[`sent_to_username`].'" ');
        return $query->result();
    }
    

}
