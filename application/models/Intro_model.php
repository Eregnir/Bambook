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
        $query=$this->db->query('SELECT * FROM `users` INNER JOIN avatars ON users.avatar_UID = avatars.avatar_UID WHERE username="'.$user['username'].'" ');
        return $query->result();
    }

    //Get Books from the DB in order to present it in the books library. currently limit is 50, we need pagination or something to deal with large mass of books.
    public function get_books(){
        $query=$this->db->query('SELECT * FROM `user_books` WHERE `availability`="1" ORDER BY `date_added` DESC LIMIT 50;');
        return $query->result();
    }

    //function to get my library books:
    public function get_library($user){
        $query=$this->db->query('SELECT * FROM `user_books` INNER JOIN users ON user_books.user_email=users.email WHERE users.username="'.$user['username'].'";');
        return $query->result();
    }

    //function to get my incoming swap requests:
    public function get_incoming_reqs($user){
        $query=$this->db->query('SELECT * FROM swap_reqs INNER JOIN user_books on swap_reqs.desired_book=user_books.UID WHERE sent_to_username ="'.$user['username'].'" ');
        return $query->result();
    }

   //function to find how many active requests, but need to add "where not = completed / cancelled etc.":
   public function count_active_reqs($user){
    $query=$this->db->query('SELECT COUNT(swap_UID) FROM swap_reqs WHERE (sent_by_username = "'.$user['username'].'" OR sent_to_username = "'.$user['username'].'") AND (swap_status <> `Completed`) AND (swap_status <> `Cancelled`) ');
    return $query->result();
    }
}
