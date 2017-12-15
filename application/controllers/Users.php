<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller
{
    /*
     * loads appointment booking view
     */
    public function adminHome()
    {
        $this->load->view('header');
        $this->load->view('admin/admin_home');
        $this->load->view('message_modal');
        $this->load->view('customer_details_modal');
        $this->load->view('admin/edit_gallery_modal');
        $this->load->view('edit_customer_details');
        $this->load->view('admin/admin_footer');
    }

}
