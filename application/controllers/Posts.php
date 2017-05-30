<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Posts extends CI_Controller{

    function __construct(){
        parent::__construct();
        $this->load->model('post');
    }

    public function index($start=0)
    { 
            $data['posts']=$this->post->get_posts(2,$start);
            
            $this->load->library('pagination');
            
            $config['base_url'] =base_url().'/index.php/Posts/index';
            $config['total_rows'] = $this->post->get_posts_count();
            $config['per_page'] = 2;
            // $config['uri_segment'] = 3;
            // $config['num_links'] = 4;
            // $config['full_tag_open'] = '<p>';
            // $config['full_tag_close'] = '</p>';
            // $config['first_link'] = 'First';
            // $config['first_tag_open'] = '<div>';
            // $config['first_tag_close'] = '</div>';
            // $config['last_link'] = 'Last';
            // $config['last_tag_open'] = '<div>';
            // $config['last_tag_close'] = '</div>';
            // $config['next_link'] = '&gt;';
            // $config['next_tag_open'] = '<div>';
            // $config['next_tag_close'] = '</div>';
            // $config['prev_link'] = '&lt;';
            // $config['prev_tag_open'] = '<div>';
            // $config['prev_tag_close'] = '</div>';
            // $config['cur_tag_open'] = '<b>';
            // $config['cur_tag_close'] = '</b>';
            
            $this->pagination->initialize($config);
            $data['pages']=$this->pagination->create_links();
            $this->load->view('post_index',$data);
            // echo"<pre>";
            // print($data['posts']);
            // echo"</pre>";
    }

    function correct_permission($required){
       $user_type=$this->session->userdata('user_type');
       if($required=="user"){
           if($user_type){
               return true;
           }elseif($required=="author"){
               if($user_type=="admin"||$user_type=="author")
               {
                   return true;
               }

           }elseif($required=="admin"){
               if($user_type=="admin"){
                   return true;
               }
           }
       }


    }//end of Correct Permission
    function post($postID){
        $data['post']=$this->post->get_post($postID);
        $this->load->view('post',$data);

    }

    function new_post(){
        $user_type=$this->session->userdata('user_type');
        if($user_type !="admin"&& $user_type != "author"){
            
            redirect(base_url().'index.php/users/login');
            
        }
        if($_POST){
            $data=array(
                'title'=>$_POST['title'],
                'post'=>$_POST['post'],
                'active'=>1
            );
        $this->post->insert_post($data);
        
        redirect(base_url().'index.php/Posts/');
        }
        else{
            $this->load->view('new_post');
        }
   }

   function edit_post($postID){
        
        if(!$this->correct_permission('author')){
          redirect(base_url().'index.php/users/login');
        }
        $data['success']=0;
        if($_POST){
            $data=array(
                'title'=>$_POST['title'],
                'post'=>$_POST['post'],
                'active'=>1
            );
        $this->post->update_post($postID,$data);
        $data['success']=1;
        redirect(base_url().'index.php/Posts/');

       }
     $data['post']=$this->post->get_post($postID);
     $this->load->view('edit_post',$data);

   }

   function delete_post($postID)
   {
        $user_type=$this->session->userdata('user_type');
        if($user_type !="admin"&& $user_type != "author"){
            
            redirect(base_url().'index.php/users/login');
            
        }
       $this->post->delete_post($postID);
       
       redirect(base_url().'Posts/');
       
   }

    

}