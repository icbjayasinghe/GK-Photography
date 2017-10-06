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
    public function bookSlot($appId,$date,$startTime,$endTime,$description,$custId){
        $data = array(
            'appointment_id' => $appId,
            'appointment_date' => $date,
            'start_time' => $startTime,
            'end_time' => $endTime,
            'description' => $description,
            'cust_id' => $custId,
        );
        try{
            $result=$this->db->insert('appointment',$data);
        }
        catch (Exception $e){
            echo $e;
        }
    }
}

?>