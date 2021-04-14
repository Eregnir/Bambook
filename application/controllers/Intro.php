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
     public function index(){
        $data['email']=$this->intro_model->test();
        $this->load->view('B_Views/index',$data);
        }

    public function blog(){
        $this->load->view('B_Views/blog');
        }

    public function about(){
        $data['email']=$this->intro_model->test();
        $this->load->view('B_Views/about',$data);
        }

    public function contact(){
        $this->load->view('B_Views/contact');
        }

    public function register(){
        $this->load->view('B_Views/register');
        }

    public function new_user(){
        $data = array(
            'firstName' => $this->input->post('fname'),
            'lastName' => $this->input->post('lname'),
            'email' => $this->input->post('email'), 
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password ')
         );
         $this->intro_model->save_register($data);
    }
    }

    
