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

        $user=$this->session->all_userdata();
        $data['user']=$user;

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
        $user=$this->session->all_userdata();
        $data['user']=$user;
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
        $user=$this->session->all_userdata();
        $data['user']=$user;
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

    //function to cancel an outgoing swap (that I sent to another user), for any reason at all
    public function cancel_swap_out($swap_UID=null){
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
        $this->zoom_swap_out($data['swap_UID']);
    }

     //function to cancel an incoming swap (that I got from another user), for any reason at all
     public function cancel_swap_in($swap_UID=null){
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
        $user=$this->session->all_userdata();
        $data['user']=$user;
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
        $user=$this->session->all_userdata();
        $data['user']=$user;
        $this->load->view('templates/HeadB',$data);
        $this->load->view('B_Views/my_book_desc',$data);
        $this->load->view('templates/FootB');
        }

    public function my_book2($data){
        $user=$this->session->all_userdata();
        $data['user']=$user;
        $data['book_info'] = $this->books_model->get_book_info($data['b_UID']);
        $user=$this->session->all_userdata();
        $data['user']=$user;
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

    //function that uploads a book, stores its info and image.
    public function upload_book(){
        $data = array(
            // 'img' => $this->input->post('file-input'),
            // I think we don't need the image to be posted just yet.
            'book_genre' => $this->input->post('book_genre'),
            'title' => $this->input->post('book_title'),
            'author' => $this->input->post('book_author'),
            'lang' => $this->input->post('book_language'),
            'ISBN' => $this->input->post('b_isbn'),
            'cond' => $this->input->post('book_cond')
            );
        
        //Get the user data
        $user=$this->session->all_userdata();
        $data['user_username'] = $user['username'];

        //Get the uploaded file's information
        $file['name']=$_FILES['file-input']['name'];
        $file['size']=$_FILES['file-input']['size'];
        $file['tmp_name']=$_FILES['file-input']['tmp_name'];
        $file['type']=$_FILES['file-input']['type'];

        //create a new unique name for the uploaded image
        //get the extension
        $path = $_FILES['file-input']['name'];
        $ext = pathinfo($path, PATHINFO_EXTENSION);
        //create the whole new name:
        $file['new_name']=$user['username'].'_'.$data['title'].'_'.time().'.'.$ext;

        //create a  variable to hold the image
        $file['image']=$_FILES['file-input']['tmp_name'];
        //and place the image in the correct folder:        
        move_uploaded_file($file['image'], "images/user_uploads/".$file['new_name']);

        //put the new image's unique name in a variable to be uploaded to the DB:
        $data['img_title'] = $file['new_name'];

        
        
        //get the user email
        $email = $this->books_model->get_email_by_username($data['user_username']);
        $data['user_email'] = $email[0]->email;

        //AAND upload the data including the image's new title.
        $this->books_model->upload_book($data);

        // $this->books_model->upload_image($image);
        // $this->my_book2($data);

        //And open the my library view.
        header('Location: https://assafye.mtacloud.co.il/Bambook/index.php/Intro/my_library');
        
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
            

            $user=$this->session->all_userdata();
            $data['user']=$user;
            
            //create a new name for the image
                //get the extension
                $path = $_FILES['file-input']['name'];
                $ext = pathinfo($path, PATHINFO_EXTENSION);
            //create the whole new name:
            $data['new_name']=$user['username'].'_'.$data['title'].'_'.time().'.'.$ext;
            $test['image']=$_FILES['file-input']['tmp_name'];
                    
            move_uploaded_file($test['image'], "images/user_uploads/".$data['new_name']);
                
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

    //Function to filter the books on the available books page

    public function filter_control(){
        //get the filter data:
        $data = array(
            'book_genre' => $this->input->post('book_genre'),
            'lang' => $this->input->post('book_lang'),
            'cond' => $this->input->post('book_cond'),
            'user_region' => $this->input->post('user_region')
            );

        $user=$this->session->all_userdata();
        if (!isset($user['loggedin'])){
            $user['loggedin']=null;
            $user['username'] = null;
        };

        //if user is logged in and also checked "user region", goto advanced region filtering.
        if ($data['user_region']=='1' && $user['loggedin'] != null){
            $this->available_books_filter_region($data);
        }
        else{
            $this->available_books_filter($data);
        }
    }

    public function available_books_filter($data){
        $user=$this->session->all_userdata();
        if (!isset($user['loggedin'])){
            $user['loggedin']=null;
            $user['username'] = null;
        };

        $data['username'] = $user['username'];
        // if ($user['loggedin']==null){$data['books']=$this->intro_model->get_books_not_loggedin();}
        //else{};

        ////DECIDE ON CORRECT FILTERS
        if ($data['book_genre']!='Any'){ //genre is not any
            if($data['cond']!='Any'){ //cond is not any
                if($data['lang']!='Any'){ //lang is not any
                    $data['books']=$this->books_model->filter_books1($data); //send all 3 filters
                }
                else{ //lang is any
                    $data['books']=$this->books_model->filter_books2($data); //only genre and cond filters
                }
            }
            else{ //cond is any
                if($data['lang']!='Any'){ //lang is not any
                    $data['books']=$this->books_model->filter_books3($data); //only genre and language filters
                }
                else{ //lang is also any
                    $data['books']=$this->books_model->filter_books4($data); //only genre filter
                }

            }
            
        }
        else{ //genre is "any"
            if($data['cond']!='Any'){ //cond is not any
                if($data['lang']!='Any'){ //and also lang is not any
                    $data['books']=$this->books_model->filter_books5($data); //lang + cond filters apply
                }
                else{ //lang is any
                    $data['books']=$this->books_model->filter_books6($data); //only cond filter applies
                }
            }
            else{ //cond is any (and also genre is any)
                if($data['lang']!='Any'){ //lang is not any
                    $data['books']=$this->books_model->filter_books7($data); //only language filter applies
                }
                else{
                    $data['books']=$this->books_model->filter_books8($data); //reset filters
                }
                
            }
        }

        //load the views
        $data['user']=$user;
        $this->load->view('templates/HeadB',$data);
        $this->load->view('B_Views/available_books',$data);
        $this->load->view('templates/FootB');
        }
    
        public function available_books_filter_region($data){
            $user=$this->session->all_userdata();
            if (!isset($user['loggedin'])){
                $user['loggedin']=null;
                $user['username'] = null;
            };
            $data['username'] = $user['username'];
            // if ($user['loggedin']==null){$data['books']=$this->intro_model->get_books_not_loggedin();}
            //else{};
            //get the logged in user's region:
            $region = $this->books_model->get_region($data);
            $data['region'] = $region[0]->user_region;


            ////DECIDE ON CORRECT FILTERS, always send region data.
            if ($data['book_genre']!='Any'){ //genre is not any
                if($data['cond']!='Any'){ //cond is not any
                    if($data['lang']!='Any'){ //lang is not any
                        $data['books']=$this->books_model->filter_books10($data); //send all 3 filters
                    }
                    else{ //lang is any
                        $data['books']=$this->books_model->filter_books20($data); //only genre and cond filters
                    }
                }
                else{ //cond is any
                    if($data['lang']!='Any'){ //lang is not any
                        $data['books']=$this->books_model->filter_books30($data); //only genre and language filters
                    }
                    else{ //lang is also any
                        $data['books']=$this->books_model->filter_books40($data); //only genre filter
                    }
    
                }
                
            }
            else{ //genre is "any"
                if($data['cond']!='Any'){ //cond is not any
                    if($data['lang']!='Any'){ //and also lang is not any
                        $data['books']=$this->books_model->filter_books50($data); //lang + cond filters apply
                    }
                    else{ //lang is any
                        $data['books']=$this->books_model->filter_books60($data); //only cond filter applies
                    }
                }
                else{ //cond is any (and also genre is any)
                    if($data['lang']!='Any'){ //lang is not any
                        $data['books']=$this->books_model->filter_books70($data); //only language filter applies
                    }
                    else{
                        $data['books']=$this->books_model->filter_books80($data); //reset filters
                    }
                    
                }
            }
    
            //load the views
            $data['user']=$user;
            $this->load->view('templates/HeadB',$data);
            $this->load->view('B_Views/available_books',$data);
            $this->load->view('templates/FootB');
            }


    
}
