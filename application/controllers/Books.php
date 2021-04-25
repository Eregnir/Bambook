<?php
class Books extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('books_model');
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('session');     
    }

    // Function to load the available books from the index page
    public function single_book(){
        $this->load->view('templates/HeadB');
        $this->load->view('B_Views/book_description');
        $this->load->view('templates/FootB');
        }

    }




    
