<?php
/**
 * Created by PhpStorm.
 * User: Isuru Jayasinghe
 * Date: 10/8/2017
 * Time: 4:47 PM
 */

class Register extends CI_Controller{

    public function RegisterUser(){

//        validation rules for register form
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[user.email]');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[4]|max_length[30]');
        $this->form_validation->set_rules('cpassword', 'Confirm Password', 'required|matches[password]');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('register');
        }
        else {
//          load Model_user for inserting user data to db
            $this->load->model('Model_user');
            $response = $this->Model_user->insertUser();

//            last step of registration
            if($response){
                $this->session->set_flashdata('msg','Registered successfully... Please login');

//                $this->session->set_flashdata('msg','Registered successfully... Please login');
                redirect('Welcome/login');
            }
        }

    }

}