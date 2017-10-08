<?php
//defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller
{
    /*
    * loads appointment booking view
     */
    public function adminHome()
    {
        $this->load->view('header');
        $this->load->view('admin_home');
       ///$this->load->view('message_model');
        $this->load->view('footer');
    }

}
