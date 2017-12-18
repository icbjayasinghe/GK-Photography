<?php
/**
 * Created by PhpStorm.
 * User: Isuru Jayasinghe
 * Date: 10/8/2017
 * Time: 9:29 PM
 */

class Model_user extends CI_Model{

    public function insertUser(){
        $this->load->model(Database_model);
        $cus_id = $this->Database_model->generateId('cust_id','customer','CUS');
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
            $this->load->helper('date');
            $email = $this->input->post('email');
            $password = sha1($this->input->post('password'));

            $this->db->where('email',$email);
            $this->db->where('password',$password);

            $respond = $this->db->get('user');


            if($respond->num_rows()==1){
                $this->db->set('last_login',mdate("%Y-%m-%d %H:%i:%s"));
                $this->db->where('email', $email);
                $this->db->update('user');
                return $respond->row(0);

            }
            else{
                return FALSE;
            }
    }


    /*
     * search user details
     */
    public function searchUser($field,$search_text){
        try{
            if ($search_text==""){
                $this->db->select('*');
                $this->db->from('user');
                $this->db->where('is_deleted',0);
                $result = $this->db->get();
            }
            else if ($field=='all'){
                $array = array('first_name'=>$search_text,'last_name'=>$search_text,'type'=>$search_text,'last_login'=>$search_text,'email'=>$search_text);
                $this->db->select('*');
                $this->db->from('user');
                $this->db->or_like($array);
                $this->db->where('is_deleted',0);
                $result = $this->db->get();
            }
            else{
                $this->db->select('*');
                $this->db->from('user');
                $this->db->where("$field LIKE '%$search_text%'");
                $this->db->where('is_deleted',0);
                $result = $this->db->get();
            }

            return $result->result();
        }
        catch (Exception $e){
            echo $e;
        }
    }

    /*
     * get user details for a particular user id
     */
    public function fetchUser($user_id){
        try{
            $this->db->select('*');
            $this->db->from('user');
            $this->db->where('user_id',$user_id);
            $result = $this->db->get();
            return $result->row();
        }
        catch (Exception $e){
            echo $e;
        }
    }

    /*
     * update the password of a user
     */
    public function updateUserPassword($user_id,$password){
        $data = array(
            'password' => $password
        );
        try{
            $this->db->where('user_id',$user_id);
            $result = $this->db->update('user',$data);
            return $result;
        }
        catch (Exception $e){
            echo $e;
        }
    }

    /*
     * update the delete status of a user
     */
    public function updateUserDeleteStatus($record_id,$status){
        $data = array(
            'is_deleted' => $status
        );
        try{
            $this->db->where('user_id',$record_id);
            $result = $this->db->update('user',$data);
            return $result;
        }
        catch (Exception $e){
            echo $e;
        }
    }
}