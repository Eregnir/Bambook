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
        $this->db->db_debug = FALSE;
        $query=$this->db->insert('swap_reqs', $data);
        return $query;
    }

    public function get_in_swap_info($data){
        $query=$this->db->query('SELECT * FROM swap_reqs INNER JOIN user_books on swap_reqs.desired_book=user_books.UID WHERE swap_UID ="'.$data['swap_UID'].'" ');
        return $query->result();

    }
    

}
