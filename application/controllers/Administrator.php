<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Administrator extends CI_Controller
{
    /*
    * loads appointment booking view
     */
    public function adminHome()
    {
        $this->load->view('header');
        $this->load->view('admin/admin_home');
        $this->load->view('admin/admin_footer');
    }

    public function appointments()
    {
        $date = date("Y-m-d");
        $this->load->model('appointment');
        $result['appointments'] = $this->appointment->searchAppointments($date,"");
        $this->load->view('admin/appointments',$result);
    }

    public function manageSuggestions()
    {
        $date = date("Y-m-d");
        $this->load->model('Model_suggestion');
        $result['suggestions'] = $this->Model_suggestion->getSuggestions($date);
        $this->load->view('admin/showSuggestions',$result);
    }

    public function manageCustomers()
    {
        
        $this->load->model('customer_model');
        $result['customer'] = $this->customer_model->getCustomers();
        $this->load->view('admin/customer_manage',$result);
    }

    public function manageUsers()
    {
        $this->load->view('admin/user_manage');
    }

    public function manageGallery()
    {

        $this->load->model('gallery_model');
        $result['images'] = $this->gallery_model->getImagesMyWork();
        $this->load->view('admin/gallery_manage',$result);
    }

    public function registerCustomer(){
        $this->load->view('admin/admin_registerUser');

    }

}

