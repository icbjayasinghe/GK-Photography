<?php
//defined('BASEPATH') OR exit('No direct script access allowed');

class Appointments extends CI_Controller
{

    public function makeAppointment()
    {
        $this->load->view('header');
        $this->load->view('make_appointment');
        $this->load->view('footer');
    }
}

?>