<?php
//defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax extends CI_Controller
{

    /*
    check the availability of
    customer defined time slot
    */
    public function checkAvailability()
    {
        $appDate = $this->input->post('date');
        $appStartTime = $this->input->post('stime');
        $appEndTime = $this->input->post('etime');
        $description = $this->input->post('description');
        $custId = $this->input->post('cust_id');
        $this->load->model('appointment');
        $result = $this->appointment->getUnavailableSlots($appDate);
        $numRows = $result->num_rows();
        if ($numRows==0){ // if there aren't any appointment for that day
            $this->load->model('database_model');
            $newId = $this->database_model->generateId('appointment_id','appointment','APP');
            $result = $this->appointment->bookSlot($newId,$appDate,$appStartTime,$appEndTime,$description,$custId);
            echo "success";
        }
    }
}

?>