<?php
//defined('BASEPATH') OR exit('No direct script access allowed');

class Suggestion_model extends CI_Model
{

    /*
     * get all customer details
     */
    public function getSuggestions(){
        try{
            $this->db->select('*');
            $this->db->from('suggestions');
            $result = $this->db->get();
            return $result->result();
        }
        catch (Exception $e){
            echo $e;
        }
    }


   

}

?>