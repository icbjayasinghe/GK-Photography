<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Administrator extends CI_Controller
{
    /*
    * loads appointment booking view
     */
    public function adminHome()
    {
        $this->load->view('admin/admin_home');
    }

    public function appointments()
    {
        $date = date("Y-m-d");
        $this->load->model('appointment');
        $result['appointments'] = $this->appointment->getAppointments($date);
        $this->load->view('admin/appointments',$result);
    }
}
