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
}
