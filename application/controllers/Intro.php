<?php
class Intro extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('intro_model');
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('session');     
    }
//Load the Homescreen view  
     public function index(){
        $user=$this->session->all_userdata();
        if ($user['loggedin']!=null){
            $data['test']=$user['username'];
            $data['user']=$user;
            $data['email']=$this->intro_model->test();
            $this->load->view('templates/HeadB',$data);
            $this->load->view('B_Views/index');
            $this->load->view('templates/FootB');
        }
        else{
            $this->load->login();
        }
        
        }

//Load the profile view
    public function about(){
        $user=$this->session->all_userdata();
        if ($user['loggedin']!=null){
            $data['profile']=$this->intro_model->get_profile_info();
            $data['user']=$user;
            $this->load->view('templates/HeadB',$data);
            $this->load->view('B_Views/about',$data);
            $this->load->view('templates/FootB');
            }
        }
//Load the contact view
    public function contact(){
        $this->load->view('templates/HeadB');
        $this->load->view('B_Views/contact');
        $this->load->view('templates/FootB');
        }
//Load the register view
    public function register(){
        $this->load->view('templates/HeadB');
        $this->load->view('B_Views/register');
        $this->load->view('templates/FootB');
        }
//Load the login view
public function login(){
    $this->load->view('templates/HeadB',$error=null);
    $this->load->view('B_Views/login',$error=null);
    $this->load->view('templates/FootB');
    }

// Function that saves the posted data and transfers it to the model in order to insert to DB
    public function new_user(){
        $data = array(
            'f_name' => $this->input->post('firstName'),
            'l_name' => $this->input->post('lastName'),
            'email' => $this->input->post('email'), 
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password')
         );
         $this->intro_model->save_register($data);
         $this->load->view('templates/HeadB');
         $this->load->view('B_Views/blog');
         $this->load->view('templates/FootB');
        }
//function to get the profile details from the DB in order to show it for the profile page:
    public function user_details(){
        $user=$this->session->all_userdata();
        if ($user['loggedin']!=null){
            $data['profile']=$this->intro_model->get_profile_info();
            $data['user']=$user;
            $this->load->view('templates/HeadB',$data);
            $this->load->view('B_Views/about',$data);
            $this->load->view('templates/FootB');
        }

    }
// Function to load the available books from the index page
    public function available_books(){
        $data['books']=$this->intro_model->get_books();
        $this->load->view('templates/HeadB',$data);
        $this->load->view('B_Views/available_books',$data);
        $this->load->view('templates/FootB');
        }

}




    
