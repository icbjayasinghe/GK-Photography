<?php
//defined('BASEPATH') OR exit('No direct script access allowed');

class Appointment extends CI_Model
{


    /*
     * get all appointment and customer data for a particular appointment id
     */
    public function getAppointmentData($appointment_id){
        try{
            $this->db->select('*');
            $this->db->from('appointment');
            $this->db->join('customer', 'customer.cust_id = appointment.cust_id');
            $this->db->where('appointment.appointment_id', $appointment_id);
            $result = $this->db->get();
            return $result->row_array();
        }
        catch (Exception $e){
            echo $e;
        }
    }

    /*
     * get upcoming appointments for a particular customer
     */
    public function getUpcomingAppointments($cust_id){
        $today = date("Y-m-d");
        try{
            $this->db->select('*');
            $this->db->from('appointment');
            $this->db->where('cust_id',$cust_id)->where("appointment_date >= '$today'");
            $this->db->order_by('appointment_date')->order_by('start_time');
            $result = $this->db->get();
            return $result->result();
        }
        catch (Exception $e){
            echo $e;
        }
    }

    /*
     * get previous appointments for a particular customer
     */
    public function getAppointmentHistory($cust_id){
        $today = date("Y-m-d");
        try{
            $this->db->select('*');
            $this->db->from('appointment');
            $this->db->where('cust_id',$cust_id)->where("appointment_date < '$today'")->where('status','accepted');
            $this->db->order_by('appointment_date',"DESC")->order_by('start_time');
            $this->db->limit(20);
            $result = $this->db->get();
            return $result->result();
        }
        catch (Exception $e){
            echo $e;
        }
    }


    public function countAppointments($cust_id){
        $today = date("Y-m-d");
        $this->db->where('status','accepted')->where('cust_id',$cust_id)->where("appointment_date >= '$today'" );
        $this->db->from("appointment");
        return $this->db->count_all_results();
    }

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
    * search all appointments
    */
    public function searchAppointments($date,$search_text){
        try{
            if ($date == "" AND $search_text==""){
                $this->db->select('*');
                $this->db->from('appointment');
                $this->db->join('customer', 'customer.cust_id = appointment.cust_id');
                $this->db->where('appointment.status', 'accepted');
                $result = $this->db->get();
                return $result->result();
            }
            elseif ($date=="" AND $search_text!=""){
                $result = $this->db->query("SELECT * FROM appointment,customer WHERE appointment.cust_id=customer.cust_id AND appointment.status='accepted' AND (customer.first_name LIKE '%"
                    .$search_text."%' OR customer.last_name LIKE '%".$search_text."%' OR appointment.appointment_date LIKE '%"
                    .$search_text."%' OR appointment.start_time LIKE '%".$search_text."%' OR appointment.end_time LIKE '%"
                    .$search_text."%' OR appointment.description LIKE '%".$search_text."%')");
                return $result->result();
            }
            elseif ($date!="" AND $search_text==""){
                $this->db->select('*');
                $this->db->from('appointment');
                $this->db->join('customer', 'customer.cust_id = appointment.cust_id');
                $this->db->where('appointment.status', 'accepted');
                $this->db->where('appointment.appointment_date', $date);
                $result = $this->db->get();
                return $result->result();
            }
            elseif ($date!="" AND $search_text!=""){
                $result = $this->db->query("SELECT * FROM appointment,customer WHERE (customer.first_name LIKE '%"
                    .$search_text."%' OR customer.last_name LIKE '%".$search_text."%' OR appointment.start_time LIKE '%".$search_text."%' OR appointment.end_time LIKE '%"
                    .$search_text."%' OR appointment.description LIKE '%".$search_text."%') AND appointment.cust_id=customer.cust_id AND appointment.status='accepted' AND appointment.appointment_date='$date'");
                return $result->result();
            }
        }
        catch (Exception $e){
            echo $e;
        }
    }

    /*
     * book an appointment
     */
    public function addAppointment($appId,$date,$startTime,$endTime,$description,$custId){
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
    public function fetchAppointmentRequestCount(){
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