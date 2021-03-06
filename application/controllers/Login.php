<?php
/**
 * Created by PhpStorm.
 * User: Isuru Jayasinghe
 * Date: 10/9/2017
 * Time: 11:31 AM
 */

class Login extends CI_Controller{

    public function LoginUser(){
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[4]|max_length[30]');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('login_header');
            $this->load->view('login-form');
            $this->load->view('footer');
        }
        else {
            $this->load->model('Model_user');
//            database result of user from Model_user
            $result= $this->Model_user->LoginUser();
            if($result!=FALSE){
                $user_data = array(
                    '$id'=>$result->user_id,
                    '$f_name'=>$result->first_name,
                    '$l_name'=>$result->last_name,
                    '$email'=>$result->email,
                    '$type'=>$result->type,
                    'loggedin'=>TRUE
                );
                $this->session->set_userdata($user_data);
//                $this->session->set_flashdata('welcomemsg','Hi ....');
                if($this->session->userdata('$type')=='Customer'){
                    redirect('Users/customerHome');
                    $this->session->set_flashdata('welcome','Welcome back');
                }
                elseif($this->session->userdata('$type')=='Administrator'){
                    redirect('Users/adminHome');

                }



            }
            else{
                $this->session->set_flashdata('errmsg','Wrong Email and Password..');
                redirect('Welcome/login');
            }



        }
    }

    public function LogoutUser(){
        session_unset();
        redirect(base_url());

    }


}