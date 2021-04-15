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
        }
        $data['email']=$this->intro_model->test();
        $this->load->view('templates/HeadB',$data);
        $this->load->view('B_Views/index');
        $this->load->view('templates/FootB');
        }
//Load the blog view
    public function blog(){
        $this->load->view('templates/HeadB');
        $this->load->view('B_Views/blog');
        $this->load->view('templates/FootB');
        }
//Load the about view
    public function about(){
        $data['email']=$this->intro_model->test();
        $this->load->view('templates/HeadB', $data);
        $this->load->view('B_Views/about',$data);
        $this->load->view('templates/FootB');
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
    $this->load->view('templates/HeadB');
    $this->load->view('B_Views/login');
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
         $this->load->view('B_Views/blog');

    }
    }

    
