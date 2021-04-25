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

    public function get_profile_info($username){
        $user=$this->session->all_userdata();
        $query=$this->db->query('SELECT * FROM products INNER JOIN prods_in_cart2 ON products.UID = prods_in_cart2.gc_UID WHERE products.UID = prods_in_cart2.gc_UID AND prods_in_cart2.c_username = "'.$user['username'].'" ');
        return $query->result();
    }
}
