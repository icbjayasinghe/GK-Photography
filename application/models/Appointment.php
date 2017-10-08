<?php
//defined('BASEPATH') OR exit('No direct script access allowed');

class Appointment extends CI_Model
{

    /*
    get unavailable slots
    */
    public function getUnavailableSlots($date)
    {
        $this->db->order_by('start_time', "ASC");
        $this->db->where('appointment_date',$date)->where("(status='pending' OR status='accepted')");
        $query = $this->db->get('appointment');
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