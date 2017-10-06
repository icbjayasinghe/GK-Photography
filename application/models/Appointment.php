<?php
//defined('BASEPATH') OR exit('No direct script access allowed');

class Appointment extends CI_Model
{

    /*
    get unavailable slots
    */
    public function getUnavailableSlots($date)
    {
        $query = $this->db->get_where('appointment', array('appointment_date' => $date));
        return $query;
    }

    /*
    book an appointment
    */
    public function bookSlot($date,$startTime,$endTime){

    }
}

?>