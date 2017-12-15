<?php
/**
 * Created by PhpStorm.
 * User: Isuru Jayasinghe
 * Date: 12/15/2017
 * Time: 1:41 PM
 */

class Joinus_model extends CI_Model{
    public function join_model(){
        //echo("as");
        $joindata=array(
            'name'=>$this->input->post('name',TRUE),
            'email'=>$this->input->post('email',TRUE),
            'phone'=>$this->input->post('phone',TRUE),
            'address'=>$this->input->post('address',TRUE),
            'skill'=>$this->input->post('good_at',TRUE),
            'works'=>$this->input->post('works',TRUE)
            //'cv_name'=>$this->load->post('')
            );
        try{
            //        save data to db
           return $this->db->insert('joinus_tbl',$joindata);


        }
        catch (Exception $e){
            echo $e;
        }
    }

}