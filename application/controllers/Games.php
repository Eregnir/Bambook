<?php
class Games extends CI_Controller{
    //put your code here
    public function __construct(){
        parent::__construct();
        $this->load->model('games_model');
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('session');
        
    }

     public function get_games(){
        $data['user']=$this->session->all_userdata();
        $this->load->view('templates/headG');
        $data['products']=$this->games_model->get_games();
        $this->load->view('GameGallery/GameGallery',$data);
        $this->load->view('templates/footer');

    }
    public function moveToGallery(){
        $this->load->view('templates/headG');
        $this->load->view('GameGallery/GameGallery');
        $this->load->view('templates/footer');
        }

    public function get_cart(){
        $data['products']=$this->games_model->get_games();
        $data['user']=$this->session->all_userdata();
        $this->load->view('templates/headG');
        $data['cart']=$this->games_model->get_cart_items();
        $this->load->view('Cart/Cart',$data);
        $this->load->view('templates/footer');
    }
    
    public function add_to_cart(){
        $games = array(
            'c_username' => $this->input->post('c_username'),
            'gc_UID' => $this->input->post('gc_UID')
          );
        $this->games_model->add_to_cart($games);
        $this->get_Games();
    }

    public function find_game($UID){
        $data['uid']=$this->games_model->find_game($UID);
        return $query->result();
    }

    public function checkout(){       
        $this->games_model->checkout();
        $this->get_cart();
    }

    public function get_rec(){
        $this->load->view('templates/headG');
        $data['products']=$this->games_model->get_games();
        $data['recos']=$this->games_model->get_rec_games();
        $this->load->view('GameGallery/Rec',$data);
        $this->load->view('templates/footer');
    }

    public function joke(){

        error_reporting(0);
        $category=$this->input->get('category');
        //$urlContents="https://api.chucknorris.io/jokes/random?category=".urlencode($category)."";
        $urlContents="https://api.chucknorris.io/jokes/random?category=".urlencode($category)."";
        $response = file_get_contents($urlContents);
        if ($response){
           $jokeArray = json_decode($response, true);
           $data=array('code'=>'1','description'=>$jokeArray['value']);
        }
        else{
            $data=array('code'=>'0','description'=>'Category does not exist');
        }
        $data= json_encode($data);
        echo $data;
    }
}

?>
