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

    //Checks if a book was selected by the requested user or not
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

    //check if it is an in or out request
    public function check_inout($swap_UID, $username){
        $query = $this->db->query('SELECT swap_status FROM swap_reqs WHERE swap_UID= "'.$swap_UID.'" AND `sent_by_username` =  "'.$username.'" ');
        return $query->result();
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

    public function set_availability($data){
        //Getting the other user's phone number and all data
        if ($data['availability'] == 1){
            $query = $this->db->query('UPDATE user_books SET `availability`=0 WHERE `UID`="'.$data['b_UID'].'" ');
        }
        else{
            $query = $this->db->query('UPDATE user_books SET `availability`=1 WHERE `UID`="'.$data['b_UID'].'" ');
        }
    }

    public function upload_book($data){
        // $this->db->db_debug = FALSE;
        $query=$this->db->insert('user_books', $data);
        // $b_UID = $this->db->query('SELECT "UID" FROM user_books WHERE ISBN = "'.$data['ISBN'].'" ORDER BY "date_added" DESC LIMIT 1');
        // return $b_UID;
    }

    public function get_email_by_username($username){
        $query = $this->db->query('SELECT email FROM users WHERE username = "'.$username.'" ');
        return $query->result();        
    }

    public function upload_image($data){
        // $this->db->db_debug = FALSE;
        $query=$this->db->query('UPDATE `user_books` SET `img`="'.base64_encode($data['img']).'" WHERE ISBN = "'.$data['ISBN'].'" ORDER BY date_added DESC LIMIT 1 ');
        // $b_UID = $this->db->query('SELECT "UID" FROM user_books WHERE ISBN = "'.$data['ISBN'].'" ORDER BY "date_added" DESC LIMIT 1');
        // return $b_UID;
    }

    public function upload_image2($data){
        $query=$this->db->query('INSERT INTO `image` (`ID`, `img`) VALUES (NULL, "'.$data['img'].'" )');
    }

    
    public function get_images(){
        $query=$this->db->query('SELECT * FROM image');
        return $query->result();
    }

    ////////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////

    //Filtering books functions start here

    //send all 3 filters
    public function filter_books1($data){
        $query=$this->db->query('SELECT * FROM `user_books` WHERE `availability`="1" AND `cond` = "'.$data['cond'].'" AND `lang` = "'.$data['lang'].'" AND `book_genre` = "'.$data['book_genre'].'" AND NOT `user_username`= "'.$data['username'].'" ORDER BY `date_added` DESC LIMIT 150;');
        return $query->result();
    }
    //send genre and lang
    public function filter_books3($data){
        $query=$this->db->query('SELECT * FROM `user_books` WHERE `availability`="1" AND `lang` = "'.$data['lang'].'" AND `book_genre` = "'.$data['book_genre'].'" AND NOT `user_username`= "'.$data['username'].'" ORDER BY `date_added` DESC LIMIT 150;');
        return $query->result();
    }

    //send genre and cond
    public function filter_books2($data){
        $query=$this->db->query('SELECT * FROM `user_books` WHERE `availability`="1" AND `cond` = "'.$data['cond'].'" AND `book_genre` = "'.$data['book_genre'].'" AND NOT `user_username`= "'.$data['username'].'" ORDER BY `date_added` DESC LIMIT 150;');
        return $query->result();
    }

    //send only genre
    public function filter_books4($data){
        $query=$this->db->query('SELECT * FROM `user_books` WHERE `availability`="1" AND `book_genre` = "'.$data['book_genre'].'" AND NOT `user_username`= "'.$data['username'].'" ORDER BY `date_added` DESC LIMIT 150;');
        return $query->result();
    }

    //send lang and cond
    public function filter_books5($data){
        $query=$this->db->query('SELECT * FROM `user_books` WHERE `availability`="1" AND `cond` = "'.$data['cond'].'" AND `lang` = "'.$data['lang'].'" AND NOT `user_username`= "'.$data['username'].'" ORDER BY `date_added` DESC LIMIT 150;');
        return $query->result();
    }

    //send cond only
    public function filter_books6($data){
        $query=$this->db->query('SELECT * FROM `user_books` WHERE `availability`="1" AND `cond` = "'.$data['cond'].'" AND NOT `user_username`= "'.$data['username'].'" ORDER BY `date_added` DESC LIMIT 150;');
        return $query->result();
    }

    //send lang only
    public function filter_books7($data){
        $query=$this->db->query('SELECT * FROM `user_books` WHERE `availability`="1" AND `lang` = "'.$data['lang'].'" AND NOT `user_username`= "'.$data['username'].'" ORDER BY `date_added` DESC LIMIT 150;');
        return $query->result();
    }

    //reset filters
    public function filter_books8($data){
        $query=$this->db->query('SELECT * FROM `user_books` WHERE `availability`="1" AND NOT `user_username`= "'.$data['username'].'" ORDER BY `date_added` DESC LIMIT 150;');
        return $query->result();
    }

    ////////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////



}
