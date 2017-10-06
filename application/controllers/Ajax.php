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
        $appDate = $this->input->post['date'];
        $appStartTime = $this->input->post['stime'];
        $appEndTime = $this->input->post['etime'];
        $this->load->model('appointment');
        $result = $this->appointment->getUnavailableSlots($appDate);
        $numRows = $result->num_rows();
        if ($numRows==0){
            $result = $this->appointment->bookSlot($appDate,$appStartTime,$appEndTime);
        }
        echo $numRows;
    }
}

?>