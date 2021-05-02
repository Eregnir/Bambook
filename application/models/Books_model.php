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

    public function get_out_swap_info($data){
        $query=$this->db->query('SELECT * FROM user_books INNER JOIN swap_reqs ON user_books.UID=swap_reqs.desired_book WHERE swap_reqs.swap_UID = "'.$data['swap_UID'].'" ');
        return $query->result();

    }
    

    //function to get a library books for swap purposes:
    public function get_other_library($user){
        $query=$this->db->query('SELECT * FROM `user_books` INNER JOIN users ON user_books.user_email=users.email WHERE `availability`=1 AND users.username="'.$user['sent_by'].'" ');
        return $query->result();
    }

    //function to select the book itself and mark a swap as completed:
    public function select_book($data){
        $query=$this->db->query('UPDATE `swap_reqs` SET `received_book`="'.$data['b_UID'].'", `swap_status`="To be approved" WHERE swap_UID = "'.$data['swap_UID'].'" ');
    }

    public function set_swap_flag($swap_UID){
        $query=$this->db->query('SELECT received_book FROM swap_reqs WHERE swap_UID= "'.$swap_UID.'" ');
        $res=$query;
        return $res->result();
    }
    

    public function get_2nd_image($swap_UID){
        $query=$this->db->query('SELECT * FROM `swap_reqs` INNER JOIN user_books ON `swap_reqs`.`received_book`=user_books.UID WHERE `swap_reqs`.`swap_UID`="'.$swap_UID.'" '); 
        return $query->result();
    }

    public function cancel_swap($swap_UID){
        $query = $this->db->query('UPDATE swap_reqs SET swap_status="Cancelled", `end_time`=CURRENT_TIMESTAMP WHERE swap_UID= "'.$swap_UID.'" ');
    }

    public function approve_swap($data){
        //this will make the swap completed
        $query = $this->db->query('UPDATE swap_reqs SET swap_status="Completed", `end_time`=CURRENT_TIMESTAMP WHERE swap_UID= "'.$data['swap_UID'].'" ');
        //this will make book 1 unavailable
        $query = $this->db->query('UPDATE user_books SET `availability`=0 WHERE `UID`="'.$data['b1_UID'].'" ');
        //this will make book 2 unavailable
        $query = $this->db->query('UPDATE user_books SET `availability`=0 WHERE `UID`="'.$data['b2_UID'].'" ');
    }
    public function get_other_user($data){
        //Getting the other user's phone number and all data
        $query = $this->db->query('SELECT * FROM users INNER JOIN swap_reqs ON swap_reqs.sent_by_username=users.username WHERE `swap_reqs`.`swap_UID`="'.$data['swap_UID'].'" ');
        return $query->result();
    }

    public function get_other_user2($data){
        //Getting the other user's phone number and all data
        $query = $this->db->query('SELECT * FROM users INNER JOIN swap_reqs ON swap_reqs.sent_to_username=users.username WHERE `swap_reqs`.`swap_UID`="'.$data['swap_UID'].'" ');
        return $query->result();
    }
    

}
