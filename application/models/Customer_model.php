<?php
//defined('BASEPATH') OR exit('No direct script access allowed');

class Customer_model extends CI_Model
{

    /*
     * get all customer details
     */
    public function getCustomers(){
        try{
            $this->db->select('*');
            $this->db->from('customer');
            $result = $this->db->get();
            return $result->result();
        }
        catch (Exception $e){
            echo $e;
        }
    }

    /*
     * search customer details
     */
    public function searchCustomer($field,$search_text){
        try{
            if ($search_text==""){
                $this->db->select('*');
                $this->db->from('customer');
                $result = $this->db->get();
            }
            else if ($field=='all'){
                $array = array('first_name'=>$search_text,'last_name'=>$search_text,'cust_phone'=>$search_text,'cust_address'=>$search_text,'cust_email'=>$search_text,'date_joined'=>$search_text);
                $this->db->select('*');
                $this->db->from('customer');
                $this->db->or_like($array);
                $result = $this->db->get();
            }
            else{
                $this->db->select('*');
                $this->db->from('customer');
                $this->db->where("$field LIKE '%$search_text%'");
                $result = $this->db->get();
            }

            return $result->result();
        }
        catch (Exception $e){
            echo $e;
        }
    }

    /*
     * fetch customer email
     */
    public function getEmail($cust_id){
        try{
            $this->db->select('cust_email');
            $this->db->from('customer');
            $this->db->where('cust_id',$cust_id);
            $result = $this->db->get();
            return $result->row();
        }
        catch (Exception $e){
            echo $e;
        }
    }
   

}

?>