<?php
/**
 * Created by PhpStorm.
 * User: Isuru Jayasinghe
 * Date: 12/15/2017
 * Time: 12:11 PM
 */

class Joinus extends CI_Controller{
    public function Joinususer(){
        //form validation
        $this->form_validation->set_rules('name','Name','required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[user.email]');
        $this->form_validation->set_rules('phone', 'phone', 'required|min_length[10]|max_length[10]');
        $this->form_validation->set_rules('address','Address','required');
        $this->form_validation->set_rules('works','Your skill','required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('joinus');
        }
        else{
            $this->load->model('Joinus_model');
            $respond=$this->Joinus_model->join_model();

        }

    }

}