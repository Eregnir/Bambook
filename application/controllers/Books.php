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
        $user=$this->session->all_userdata();
        $data['user']=$user;
        $data['book_info'] = $this->books_model->get_book_info($data['b_UID']);
        $this->load->view('templates/HeadB',$data);
        $this->load->view('B_Views/book_desc',$data);
        $this->load->view('templates/FootB');
        }

    //Open a new swap request page:
    public function send_swap_req(){   
        $user=$this->session->all_userdata();
        if (!isset($user['loggedin'])){$user['loggedin']=null;};
        if ($user['loggedin']!=null){
            $data = array(
                'desired_book' => $this->input->post('UID'),
                'sent_to_username' => $this->input->post('sent_to_username'),
                'sent_by_username' => $this->input->post('sent_by_username')
                );
            $error=$this->books_model->send_swap_req($data);
            $data['error']=$error;
            header('Location: https://assafye.mtacloud.co.il/Bambook/index.php/Intro/my_requests');
        }
        else{
            $error['error']="So, you're interested in that book huh? Well, you must be logged in to swap books. So hop on and lets go!";
            $data['error']=$error;
            $data['reg']=null;
            $this->load->view('templates/HeadB',$data);
            $this->load->view('B_Views/login');
            $this->load->view('templates/FootB');
        }
    }


}
