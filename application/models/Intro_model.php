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
        $this->db->db_debug = FALSE; 
        $email = $this->db->query('SELECT email FROM users WHERE email=  "'.$data['email'].'" LIMIT 1 ');
        $username = $this->db->query('SELECT email FROM users WHERE email=  "'.$data['email'].'" LIMIT 1 ');
        if ($email['affected_rows'] == 1){
            $err = 'This email is already in use. Try again!';
            return $email;
        }
        elseif (isset($username)){
            $err = 'This username is already in use. Try again!';
            return $err;
        }
        else{
            $query=$this->db->insert('users', $data);
        }     
    }

    public function get_profile_info(){
        $user=$this->session->all_userdata();
        $query=$this->db->query('SELECT * FROM `users` INNER JOIN avatars ON users.avatar_UID = avatars.avatar_UID WHERE username="'.$user['username'].'" ');
        return $query->result();
    }

    //Get Books from the DB in order to present it in the books library. currently limit is 50, we need pagination or something to deal with large mass of books.
    public function get_books($user){
        $query=$this->db->query('SELECT * FROM `user_books` WHERE `availability`="1" AND NOT `user_username`= "'.$user['username'].'" ORDER BY `date_added` DESC LIMIT 50;');
        return $query->result();
    }

    public function get_books_not_loggedin(){
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
        $query=$this->db->query('SELECT * FROM swap_reqs INNER JOIN user_books on swap_reqs.desired_book=user_books.UID WHERE sent_to_username ="'.$user['username'].'" ORDER BY `swap_status` DESC');
        return $query->result();
    }

    //function to get my outgoing swap requests:
    public function get_outgoing_reqs($user){
        $query=$this->db->query('SELECT * FROM swap_reqs INNER JOIN user_books on swap_reqs.desired_book=user_books.UID WHERE sent_by_username ="'.$user['username'].'" ORDER BY `swap_status` DESC ');
        return $query->result();
    }

   //function to find how many active requests, but need to add "where not = completed / cancelled etc.":
   public function count_active_reqs($user){
    $query=$this->db->query('SELECT swap_UID FROM swap_reqs WHERE (sent_by_username = "'.$user['username'].'" OR sent_to_username = "'.$user['username'].'") AND (swap_status != "Cancelled" AND swap_status != "Completed") ');
    return $query->result();
    }

    
}
