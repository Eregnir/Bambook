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
        $this->load->view('B_Views/index2',$data);
        }

    public function blog(){
        $this->load->view('B_Views/blog.html');
        }

    public function about(){
        $data['email']=$this->intro_model->test();
        $this->load->view('B_Views/about',$data);
        }
    }

    
