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

        $user=$this->session->all_userdata();
        
        if ($user['loggedin']==null){
             
            redirect('Users/login');
        }
        else{
            $this->load->view('templates/headG');
            $this->load->view('HomePage/Homescreen');
            $this->load->view('templates/footer');
        }
        

        }
    public function moveToGallery(){
        $this->load->view('templates/headG');
        $this->load->view('GameGallery/GameGallery');
        $this->load->view('templates/footer');
        }
    }

    
