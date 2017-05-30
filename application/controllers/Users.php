
<?php

class Users extends CI_Controller{

    function login()
    {
        $data['error']=0;
        if($_POST){
            $this->load->model('user');
            $username=$this->input->post('username',true);
            $password=$this->input->post('password',true);
            $type=$this->input->post('user_type',true);
            $user=$this->user->login($username,$password,$type);
            if(!$user){
                $data['error']=1;
            }else{
                $this->session->set_userdata('userID',$user['userID']);
                $this->session->set_userdata('user_type',$user['user_type']);
                
                redirect(base_url().'index.php/Posts');
            }
        }
        $this->load->view('header');
        $this->load->view('login',$data);
        $this->load->view('footer');
    }

    function logout(){
        $this->session->sess_destroy();
        redirect(base_url().'index.php/Posts');
    }

    function register(){
         $data['errors']=0;
        if($_POST){
            $config=array(
                array(
                    'field'=>'username',
                    'label'=>'Username',
                    'rules'=>'trim|required|min_lengh[3]|is_unique[users.username]'
                ),
                 array(
                    'field'=>'password',
                    'label'=>'Password',
                    'rules'=>'trim|required|min_length[5]'
                ),
                 array(
                    'field'=>'password2',
                    'label'=>'Confirm Password',
                    'rules'=>'trim|required|min_length[5]|matches[password]'
                ),
                 array(
                    'field'=>'user_type',
                    'label'=>'User Type',
                    'rules'=>'required'
                ),
                 array(
                    'field'=>'email',
                    'label'=>'Email',
                    'rules'=>'trim|required|is_unique[users.email]|vaild_email'
                )

            );
            $this->load->library('form_validation');
            $this->form_validation->set_rules($config);
            if($this->form_validation->run()== FALSE)
            {
                $data['errors']=validation_errors();
            }else{

           
            $data=array(
                'username'=>$_POST['username'],
                'password'=>sha1($_POST['password']),
                'user_type'=>$_POST['user_type']
            );
            $this->load->model('user');
            $userid=$this->user->create_user($data);
            $this->session->set_userdata('userID',$userid);
            $this->session->set_userdata('user_type',$_POST['user_type']);
            redirect(base_url().'index.php/Posts');
            
        
       }
    }
    
        $this->load->helper('form');
        $this->load->view('header');
        $this->load->view('register_user');
        $this->load->view('footer');
       
    }
}