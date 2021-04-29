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
        $data = array(
            'b_UID' => $this->input->post('b_UID')
            );
        $data['book_info'] = $this->books_model->get_book_info($data['b_UID']);
        $this->load->view('templates/HeadB',$data);
        $this->load->view('B_Views/book_desc',$data);
        $this->load->view('templates/FootB');
        }

    //Open a new swap request page:
    public function send_swap_req(){
        $this->load->view('templates/HeadB');
        $this->load->view('B_Views/contact');
        $this->load->view('templates/FootB');
    }


}
