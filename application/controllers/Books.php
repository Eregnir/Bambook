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


    public function zoom_swap(){
        $data = array(
            'swap_UID' => $this->input->post('swap_UID')
            );
        // $user=$this->session->all_userdata();
        // $data['user']=$user;
        $data['flag']=$this->books_model->set_swap_flag($data['swap_UID']);
        $data['other_user']=$this->books_model->get_other_user($data['swap_UID']);
        $data['book2']=$this->books_model->get_2nd_image($data['swap_UID']);
        $data['book_info'] = $this->books_model->get_in_swap_info($data);
        $this->load->view('templates/HeadB',$data);
        $this->load->view('B_Views/swap',$data);
        $this->load->view('templates/FootB');
        }

    public function zoom_swap2($swap_UID=null){
        $data = array();
        $data['swap_UID'] = $swap_UID;
        // $user=$this->session->all_userdata();
        // $data['user']=$user;
        $data['flag']=$this->books_model->set_swap_flag($data['swap_UID']);
        $data['other_user']=$this->books_model->get_other_user($data['swap_UID']);
        $data['book2']=$this->books_model->get_2nd_image($data['swap_UID']);
        $data['book_info'] = $this->books_model->get_in_swap_info($data);
        $this->load->view('templates/HeadB',$data);
        $this->load->view('B_Views/swap',$data);
        $this->load->view('templates/FootB');
        }

    public function browse_books_for_swap(){
        $data = array(
            'sent_by' => $this->input->post('sent_by'),
            'swap_UID' => $this->input->post('swap_UID')
            );
        $data['books']=$this->books_model->get_other_library($data);
        $this->load->view('templates/HeadB',$data);
        $this->load->view('B_Views/book_select_4swap');
        $this->load->view('templates/FootB');
    }

    public function select_book(){
        $data = array(
            'b_UID' => $this->input->post('b_UID'),
            'swap_UID' => $this->input->post('swap_UID')
            );
        //send the book UID and the swap UID to select that book as the book the user chose for the swap (thus ending the swap and changing its status to completed)
        $this->books_model->select_book($data);
        $this->zoom_swap2($data['swap_UID']);
        }

    //function to cancel a swap, for any reason at all
    public function cancel_swap(){
        $data = array(
            'swap_UID' => $this->input->post('cancel_swap1')
            );
        $this->books_model->cancel_swap($data['swap_UID']);
        $this->zoom_swap2($data['swap_UID']);
    }

    public function approve_swap(){
        $data = array(
            'swap_UID' => $this->input->post('swp_UID'),
            'b1_UID' => $this->input->post('b1_UID'),
            'b2_UID' => $this->input->post('b2_UID')
            );
        $this->books_model->approve_swap($data);
        $this->zoom_swap2($data['swap_UID']);
    }

    
}
