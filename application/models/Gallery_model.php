<?php
//defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery_model extends CI_Model
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


   

}

?>