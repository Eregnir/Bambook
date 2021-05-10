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
        $data['other_user']=$this->books_model->get_other_user($data);
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
        $data['other_user']=$this->books_model->get_other_user($data);
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
    public function cancel_swap($swap_UID=null){
        $user=$this->session->all_userdata();
        $data['user']=$user;
        if ($swap_UID == null){
            $data = array(
                'swap_UID' => $this->input->post('cancel_swap1')
                );
        }
        else{
            $data['swap_UID'] = $swap_UID;
        }
        $this->books_model->cancel_swap($data['swap_UID']);
        //check if this is incoming or outgoing request. if true it is an outgoing req.
        $out=$this->books_model->check_inout($data['swap_UID'],$user['username']);
        //if the request was initiated by this user, access the outgoing request view.
        if (isset($out)){
            $this->zoom_swap_out($data['swap_UID']);
        }
        //if it was not, access the incoming request view.
        else{
            $this->zoom_swap2($data['swap_UID']);
        }
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

    //Allows a user that sent out a request to access it, see its status, contact info etc.
    public function zoom_swap_out($swap_UID=null){
        if ($swap_UID != null){
            $data['swap_UID'] = $swap_UID;
        }
        else{
            $data = array(
                'swap_UID' => $this->input->post('swap_UID')
                );
        }
        // $user=$this->session->all_userdata();
        // $data['user']=$user;
        $data['flag']=$this->books_model->set_swap_flag($data['swap_UID']); //swap flag checks if a book was selected by the requested user or not
        $data['other_user']=$this->books_model->get_other_user2($data); //Gets the other user's information
        $data['book2']=$this->books_model->get_2nd_image($data['swap_UID']); //Gets all of the data on the received book (if selected) 
        $data['book_info'] = $this->books_model->get_in_swap_info($data); //Gets all the data on the desired book
        $data['book_info2'] = $this->books_model->get_out_swap_info($data); //Gets the swap info and the desired book info 
        $this->load->view('templates/HeadB',$data);
        $this->load->view('B_Views/swap_out',$data);
        $this->load->view('templates/FootB');
        }


    // Function to load my book in order to view it and change its availability
    public function my_book(){
        $data = array(
            'b_UID' => $this->input->post('b_UID')
            );
        $user=$this->session->all_userdata();
        $data['user']=$user;
        $data['book_info'] = $this->books_model->get_book_info($data['b_UID']);
        $this->load->view('templates/HeadB',$data);
        $this->load->view('B_Views/my_book_desc',$data);
        $this->load->view('templates/FootB');
        }

    public function my_book2($data){
        $user=$this->session->all_userdata();
        $data['user']=$user;
        $data['book_info'] = $this->books_model->get_book_info($data['b_UID']);
        $this->load->view('templates/HeadB',$data);
        $this->load->view('B_Views/my_book_desc',$data);
        $this->load->view('templates/FootB');
        }

    //function to set the availability of one of the user's books
    public function set_availability(){
        $data = array(
            'b_UID' => $this->input->post('UID'),
            'availability' => $this->input->post('avail')
            );
        $this->books_model->set_availability($data);
        $this->my_book2($data);
        }

    //function to set the availability of one of the user's books
    public function upload_book(){
        $data = array(
            'img' => $this->input->post('file-input'),
            'book_genre' => $this->input->post('book_genre'),
            'title' => $this->input->post('book_title'),
            'author' => $this->input->post('book_author'),
            'lang' => $this->input->post('book_language'),
            'ISBN' => $this->input->post('b_isbn'),
            'cond' => $this->input->post('book_cond')
            
            );

        $user=$this->session->all_userdata();
        $data['user_username'] = $user['username'];
        $email = $this->books_model->get_email_by_username($data['user_username']);
        $data['user_email'] = $email[0]->email;
        $this->books_model->upload_book($data);
        // $this->books_model->upload_image($image);
        // $this->my_book2($data);
        // header('Location: https://assafye.mtacloud.co.il/Bambook/index.php/Intro/my_library');
        $data['roy']=$_FILES['file-input']['name'];
        $this->load->view('templates/HeadB',$data);
        $this->load->view('B_Views/test',$data);
        $this->load->view('templates/FootB');
        }


        public function upload_book1(){
            $data = array(
                'book_genre' => $this->input->post('book_genre'),
                'title' => $this->input->post('book_title'),
                'author' => $this->input->post('book_author'),
                'lang' => $this->input->post('book_language'),
                'ISBN' => $this->input->post('b_isbn'),
                'cond' => $this->input->post('book_cond'),
                'img' => $this->input->post('file-input')
                );

            $data['name']=$_FILES['file-input']['name'];
            $data['size']=$_FILES['file-input']['size'];
            $data['tmp_name']=$_FILES['file-input']['tmp_name'];
            $data['type']=$_FILES['file-input']['type'];

    
            $this->load->view('templates/HeadB',$data);
            $this->load->view('B_Views/test',$data);
            $this->load->view('templates/FootB');
                
    
            }

    public function upload_image(){
        $data = array(
            'img' => $this->input->post('file-input')
        );
        $this->books_model->upload_image2($data);
        $data['images'] = $this->books_model->get_images();
        $this->load->view('B_Views/test_page2',$data);
    }    

    
}
