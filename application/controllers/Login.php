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
            $this->load->view('login');
        }
        else {
            $this->load->model('Model_user');
//            database result of user from Model_user
            $result= $this->Model_user->LoginUser();
            if($result!=FALSE){
                echo "weda";

            }
            else{
                $this->session->set_flashdata('errmsg','Wrong Email and Password..');
                redirect('Welcome/login');
            }



        }
    }


}