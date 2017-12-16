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
        $this->form_validation->set_rules('fname', 'First Name', 'required');
        $this->form_validation->set_rules('lname', 'Last Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[user.email]');
        $this->form_validation->set_rules('phone', 'Phone number', 'required|min_length[10]|max_length[10]');
        $this->form_validation->set_rules('address', 'Last Name', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[4]|max_length[30]');
        $this->form_validation->set_rules('cpassword', 'Confirm Password', 'required|matches[password]');

        $this->load->model('database_model'); // to invoke the generateId() method later

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('register');
        }
        else {
//            $newId = $this->database_model->generateId('cust_id','customer','CUS');
            //email model
            $custemail=$this->input->post('email');
            $fname=$this->input->post('fname');
            $lname=$this->input->post('lname');

            /* send email confirmation */
            $this->load->library('email');
            $this->load->model('email_model');
            $result_email = $this->email_model->sendRegistrationConfirmationMail($custemail,$fname,$lname);

            if ($result_email){
                // load Model_user for inserting user data to db
                $this->load->model('Model_user');
                $response = $this->Model_user->insertUser();

                //  last step of registration
                if($response){
                    $this->session->set_flashdata('msg','Registered successfully... Confirmation Mail has been sent...');
                    redirect('Welcome/login');
                }
                else{
                    $this->session->set_flashdata('msg','Something wrong....');

                }
            }
            else{
                $this->session->set_flashdata('msg','Something wrong... Please check mail address...');
                redirect('Welcome/login');
            }


        }

    }

}