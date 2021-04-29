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
        // $user['loggedin']=null;
        $user=$this->session->all_userdata();
        if (isset($user['loggedin'])){
            if ($user['loggedin']!=null){
                $data['profile']=$this->intro_model->get_profile_info();
                $data['user']=$user;
                $this->load->view('templates/HeadB',$data);
                $this->load->view('B_Views/index');
                $this->load->view('templates/FootB');
            }
        }
        else{
            $this->load->view('templates/HeadB');
            $this->load->view('B_Views/about_us');
            $this->load->view('templates/FootB');
        }    
    }


//Load the profile view
    public function about(){
        $user['loggedin']=null; 
        $user=$this->session->all_userdata();
        if ($user['loggedin']!=null){
            $data['profile']=$this->intro_model->get_profile_info();
            $data['user']=$user;
            $this->load->view('templates/HeadB',$data);
            $this->load->view('B_Views/about',$data);
            $this->load->view('templates/FootB');
            }
        else{
            $this->login();
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
    public function login($reg=null){
        // $user['loggedin']=null;
        $user=$this->session->all_userdata();
        $data['user']=$user;
        //if loggedin is defined
        if (isset($user['loggedin'])){
            //and it is not null, it means a user is logged in, so log him out.
            if ($user['loggedin']!=null){
                header('Location: https://assafye.mtacloud.co.il/Bambook/index.php/Users/logout');
            }
            //but if it is null, no one is logged in, so go to login page.
            else{
                $data['error']=null;
                $data['reg']=$reg;
                $this->load->view('templates/HeadB',$data);
                $this->load->view('B_Views/login');
                $this->load->view('templates/FootB');
            }
        }
        //but if it is not defined, no one is logged in, so go to login page.
        else{
            $data['error']=null;
            $data['reg']=$reg;
            $this->load->view('templates/HeadB',$data);
            $this->load->view('B_Views/login');
            $this->load->view('templates/FootB');
        }
    }

// Function that saves the posted data and transfers it to the model in order to insert to DB
    public function new_user(){
        $data = array(
            'f_name' => $this->input->post('firstName'),
            'l_name' => $this->input->post('lastName'),
            'email' => $this->input->post('email'), 
            'username' => $this->input->post('username'),
            'phone_num' => $this->input->post('phone_num'),
            'password' => $this->input->post('password')
         );
         $this->intro_model->save_register($data);
         $reg = 'Registered Successfully! Please Log In to complete the process.';
         $this->login($reg);
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

        // Function to load the publish book page from the index page
    public function publish_book(){
        $this->load->view('templates/HeadB');
        $this->load->view('B_Views/publish_book');
        $this->load->view('templates/FootB');
        }

        // Function to load my library from the index page
    public function my_library(){
        $user=$this->session->all_userdata();
        if ($user['loggedin']!=null){
            $data['user']=$user;
            $data['books']=$this->intro_model->get_library($user);
            $this->load->view('templates/HeadB',$data);
            $this->load->view('B_Views/my_library');
            $this->load->view('templates/FootB');
        }
        else{
            $this->login();
        }            
    }
        

}




    
