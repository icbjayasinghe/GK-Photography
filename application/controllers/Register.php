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
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]|max_length[30]');
        $this->form_validation->set_rules('cpassword', 'Confirm Password', 'required| matches[password]');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('register');
        }
        else {
            echo "validation true";

        }

    }

}