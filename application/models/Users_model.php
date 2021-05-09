<?php

class users_model extends CI_Model {
    //put your code here
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }
    public function get_users(){
        $query=$this->db->get('users');
        return $query->result();
    }


    public function save($data){
        //set flag in order to avoid showing php errors
        $this->db->db_debug = FALSE; 
        $error=null;
        if (!$this->db->insert('users', $data)){
            $error=$this->db->error();
        }
        return $error;
     }

     public function auth($data){
        $query = $this->db->get_where('users', $data);
        return $query->result();
     }

     public function get_stats(){
        $query=$this->db->get('pref');
        return $query->result();
     }

     public function get_consoles(){
        $user=$this->session->all_userdata();
        $query=$this->db->query('SELECT * FROM pref WHERE p_username = "'.$user['username'].'" ');
        return $query->result();
     }

     public function update_profile($pref){
        $this->db->db_debug = FALSE;  
        $user=$this->session->all_userdata();
        $this->db->where('username', $user['username']);
        $this->db->update('users', $pref);
        //$query = $db->query(' UPDATE users SET "location" = "'.$pref['location'].'", "genre1" = "'.$pref['genre1'].'", "genre2" = "'.$pref['genre2'].'", "genre3" = "'.$pref['genre3'].'" WHERE `users`.`username` = "'.$user['username'].'" ');
     }

     public function get_avatars(){
      $query=$this->db->query('SELECT * FROM avatars ORDER BY avatar_UID ASC');
      return $query->result();
     }

     public function update_avatar($avatar){
      $this->db->db_debug = FALSE;  
      $user=$this->session->all_userdata();
      $this->db->where('username', $user['username']);
      $this->db->update('users', $avatar);
   }
   
}
