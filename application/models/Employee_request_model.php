<?php
/**
 * Created by PhpStorm.
 * User: Isuru Jayasinghe
 * Date: 12/16/2017
 * Time: 11:56 PM
 */

class Employee_request_model extends CI_Model{
    public function employeeModel(){
        try{
            $quary=$this->db->get('joinus_tbl');
            //$this->db->join('customer', 'customer.cust_id = appointment.cust_id');
            //$this->db->where('appointment.appointment_id', $appointment_id);
            //$result = $this->db->get();
            return $quary;
        }
        catch (Exception $e){
            echo $e;
        }
    }

}