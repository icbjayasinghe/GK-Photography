<?php
//defined('BASEPATH') OR exit('No direct script access allowed');

class Database_model extends CI_Model
{

    /*
     * returns last record's id in a particular table
     * without the string prefix
     */
    public function getLastId($field,$table){
        try
        {
            //$query = "SELECT ".$field." FROM ".$table." ORDER BY ".$field." DESC LIMIT 1";
            $result = $this->db->query("SELECT ".$field." FROM ".$table." ORDER BY ".$field." DESC LIMIT 1");
            $number_of_rows = $result->num_rows();

            if ($number_of_rows==0){
                $last_id = 0;
                return $last_id;
            }
            else{
                //echo $number_of_rows;
                //$result_set->data_seek($number_of_rows-1);
                //$last_id_row = $query->row($number_of_rows);
                $last_id_row = $result->last_row('array');
                $last_id = $last_id_row[$field];
                $last_id_no = substr($last_id,3,strlen($last_id)-1);
                return $last_id_no;
            }
        } catch(Exception $e){
            echo $e;
        }

    }

    /*
     * generate a new id for a new table record
     */
    public function generateId($field,$table,$prefix){
        $last_id = $this->getLastId($field,$table);
        if ($last_id==0){
            $id = sprintf("%s%'.07d",$prefix,1);
            return $id;
        }
        else{
            $last_id = $last_id+1;
            $id = sprintf("%s%'.07d",$prefix,$last_id);
            return $id;
        }
    }


}

?>