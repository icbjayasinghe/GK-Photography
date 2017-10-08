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
        $result = $this->db->get('appointment');
        return $result;
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


    function fetchAppointmentRequestCount(){
        try {
            $this->db->where('status','pending');
            $this->db->from("appointment");
            echo $this->db->count_all_results();


        } catch (Exception $e) {
            echo $e;
        }
    }
}

?>