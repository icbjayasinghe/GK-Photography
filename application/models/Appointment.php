<?php
//defined('BASEPATH') OR exit('No direct script access allowed');

class Appointment extends CI_Model
{

    /*
     * get unavailable slots
     */
    public function getUnavailableSlots($date)
    {
        try{
            $this->db->order_by('start_time', "ASC");
            $this->db->where('appointment_date',$date)->where("(status='pending' OR status='accepted')");
            $result = $this->db->get('appointment');
            return $result;
        }
        catch (Exception $e){
            echo $e;
        }
    }

    /*
     * get appointment requests
     */
    public function getAppointmentRequests(){
        try {
            $this->db->select('*');
            $this->db->from('appointment');
            $this->db->join('customer', 'customer.cust_id = appointment.cust_id');
            $this->db->where('appointment.status', 'pending');
            $result = $this->db->get();
            return $result->result();
        } catch (Exception $e) {
            echo $e;
        }
    }

    /*
     * update an appointment
     * */
    public function updateAppointment($field,$value,$appointmentId){
        $data = array(
            $field => $value
        );
        try{
            $this->db->where('appointment_id',$appointmentId);
            $result = $this->db->update('appointment',$data);
            return $result;
        }
        catch (Exception $e){
            echo $e;
        }
    }

    /*
     * book an appointment
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

    /*
     * get latest appointment request count
     */
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