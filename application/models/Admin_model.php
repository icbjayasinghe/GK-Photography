<?php
/**
 * Created by PhpStorm.
 * User: Isuru Jayasinghe
 * Date: 12/16/2017
 * Time: 7:30 AM
 */

class Admin_model extends CI_Model{
    public function makeAppointment(){
        echo ("aaa");
    }

    public function updateAdminProfile($edit_user_id,$edit_first_name,$edit_last_name){  
        $data=array(
//            second TRUE parameter for xss_filtering
            'first_name' => $edit_first_name,
            'last_name' => $edit_last_name,
        );

        try{
            //        save data to db
            $this->db->where('user_id',$edit_user_id);
            return $this->db->update('user',$data);
        }
        catch (Exception $e){
            echo $e;
        }

    }

}