<?php
/**
 * Created by PhpStorm.
 * User: Isuru Jayasinghe
 * Date: 10/8/2017
 * Time: 9:29 PM
 */

class Model_user extends CI_Model{
    public function insertUser(){
        $data=array(
//            second TRUE parameter for xss_filtering
            'email' => $this->input->post('email',TRUE),
            'name' => $this->input->post('name',TRUE),
//            password sha1 encripting
            'password' => sha1($this->input->post('password',TRUE)),
            'type' => "customer",
            'delete_or_not' => "no"
        );

//        save data to db
        $this->db->insert('user',$data);
    }


}