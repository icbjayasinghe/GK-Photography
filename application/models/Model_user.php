<?php
/**
 * Created by PhpStorm.
 * User: Isuru Jayasinghe
 * Date: 10/8/2017
 * Time: 9:29 PM
 */

class Model_user extends CI_Model{
    public function insertUser(){
        $this->load->model('database_model');
        $cus_id = $this->database_model->generateId('cust_id','customer','CUS');
//        date_default_timezone_set('Australia/Melbourne');
        $data=array(
//            second TRUE parameter for xss_filtering
            'cust_id' =>$cus_id,
            'first_name' => $this->input->post('fname',TRUE),
            'last_name' => $this->input->post('lname',TRUE),
            'cust_phone' => $this->input->post('phone',TRUE),
            'cust_address' => $this->input->post('address',TRUE),
            'cust_email' => $this->input->post('email',TRUE),
//            'date_joined' => date(Y-m-d),
//            password sha1 encripting
            'password' => sha1($this->input->post('password',TRUE))
//            'type' => "customer"

        );

        $userdata=array(
            'user_id' =>$cus_id,
            'first_name' => $this->input->post('fname',TRUE),
            'last_name' => $this->input->post('lname',TRUE),
            'email' => $this->input->post('email',TRUE),
            'password' => sha1($this->input->post('password',TRUE)),
            'is_deleted' => 0,
            'type' => "Customer"
        );
        try{
            //        save data to db
            $this->db->insert('user',$userdata);
            return $this->db->insert('customer',$data);


        }
        catch (Exception $e){
            echo $e;
        }

//        save data to db(return true or false to Register model)
        return $this->db->insert('customer',$data);
    }

    public function LoginUser(){
            $email = $this->input->post('email');
            $password = sha1($this->input->post('password'));

            $this->db->where('email',$email);
            $this->db->where('password',$password);

            $respond = $this->db->get('user');


            if($respond->num_rows()==1){
                return $respond->row(0);

            }
            else{
                return FALSE;
            }


    }


}