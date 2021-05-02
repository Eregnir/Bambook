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
    

    //function to get a library books for swap purposes:
    public function get_other_library($user){
        $query=$this->db->query('SELECT * FROM `user_books` INNER JOIN users ON user_books.user_email=users.email WHERE `availability`=1 AND users.username="'.$user['sent_by'].'" ');
        return $query->result();
    }

    //function to select the book itself and mark a swap as completed:
    public function select_book($data){
        $query=$this->db->query('UPDATE `swap_reqs` SET `received_book`="'.$data['b_UID'].'", `end_time`=CURRENT_TIMESTAMP,`swap_status`="To be approved" WHERE swap_UID = "'.$data['swap_UID'].'" ');
    }

    public function set_swap_flag($swap_UID){
        $query=$this->db->query('SELECT received_book FROM swap_reqs WHERE swap_UID="'.$swap_UID.' ');
        $res=current($query['received_book']);
        return $res->result();
    }
}
