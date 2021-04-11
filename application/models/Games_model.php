<?php

class games_model extends CI_Model {
    //put your code here
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }
    public function get_games(){
        $query=$this->db->get('products');
        return $query->result();
    }

    public function add_to_cart($games){
        $this->db->db_debug = FALSE; 
        $this->db->insert('prods_in_cart2', $games);
    }

    public function get_cart_items(){
        $user=$this->session->all_userdata();
        $query=$this->db->query('SELECT * FROM products INNER JOIN prods_in_cart2 ON products.UID = prods_in_cart2.gc_UID WHERE products.UID = prods_in_cart2.gc_UID AND prods_in_cart2.c_username = "'.$user['username'].'" ');
        return $query->result();
    }

    public function find_game($data){
        $query = $db->query('SELECT * FROM `products` WHERE UID='.$data.';');
        return $query->result();
    }

    public function checkout(){
        $user=$this->session->all_userdata();
        //Generate random order number:
        $or_ID = rand(100000,999999);
        //check that or_ID doesn't exist, if it does generate new number.
        //1. Create a new order
        $query=$this->db->query('INSERT INTO `orders` (`order_ID`, `time`, `purchasing_user`) VALUES ("'.$or_ID.'", current_timestamp(), "'.$user['username'].'");');

        //2. Get the products in cart for the currently logged in user
        $query2=$this->db->query('SELECT * FROM prods_in_cart2 WHERE c_username = "'.$user['username'].'" ')->result();

        //3. Loop over the products in the cart and insert them to the right DB table
        foreach ($query2 as $game){
            $query4=$this->db->query('INSERT INTO `prods_in_orders` (`in_order_ID`, `game_UID`) VALUES ("'.$or_ID.'", "'.$game->gc_UID.'");');
        }
        //4. Delete the games which were purchased
        $query3=$this->db->query('DELETE FROM `prods_in_cart2` WHERE `prods_in_cart2`.`c_username` = "'.$user['username'].'" ');
    }

    public function get_rec_games(){
        $user=$this->session->all_userdata();
        //Query to find the games the signed in user has purchased:
        $query=$this->db->query('SELECT COUNT(game_UID), game_UID FROM `prods_in_orders` WHERE in_order_ID IN (SELECT in_order_ID FROM `prods_in_orders` WHERE game_UID IN (SELECT game_UID FROM orders INNER JOIN prods_in_orders ON orders.order_ID = prods_in_orders.in_order_ID WHERE purchasing_user = "'.$user['username'].'")) GROUP BY game_UID ORDER BY `COUNT(game_UID)` DESC LIMIT 3');
        return $query->result();
    }

}