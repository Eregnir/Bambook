<?php

class books_model extends CI_Model {
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }

    public function get_book_info($uid=null){
        $query=$this->db->query('SELECT * FROM user_books WHERE UID = "'.$uid.'" ');
        return $query->result();

    }
    

}
