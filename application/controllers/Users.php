<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller
{
    /*
     * loads admin home
     */
    public function adminHome()
    {
        $this->load->view('header');
        $this->load->view('admin/admin_home');
        $this->load->view('message_modal');
        $this->load->view('customer_details_modal');
        $this->load->view('admin/edit_gallery_modal');
        $this->load->view('admin/delete_modal');
        $this->load->view('admin/change_password_modal');
        $this->load->view('edit_customer_details');
        $this->load->view('admin/admin_footer');
    }

    /*
     * loads customer home
     */
    public function customerHome()
    {
        $this->load->view('header');
        $this->load->view('customer/customer_home');
        $this->load->view('message_modal');
        $this->load->view('customer/customer_footer');
    }


    /*
     * search user details
     */
    public function searchUserDetails(){
        $field = $this->input->post('filter');
        $search_text = $this->input->post('txt');

        $this->load->model('model_user');
        $customer=$this->model_user->searchUser($field,$search_text);
        $customerList = "<table class=\"table table-hover col-md-12 top-buffer\">

                <thead>
                    <tr>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Last Login</th>
                        <th>Type</th>
                        <th>Change Password</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>";
        foreach ($customer as $row){
            $customerList.= "<tr>";
            $customerList.= "<td>{$row->first_name}</td>";
            $customerList.= "<td>{$row->last_name}</td>";
            $customerList.= "<td>{$row->email}</td>";
            $customerList.= "<td>{$row->last_login}</td>";
            $customerList.= "<td>{$row->type}</td>";
            $customerList.= "<td><a role='button' class=\"btn-success btn btn-sm btn-block\" onclick=\"loadChangePassword(this.id)\" id={$row->user_id}><b><span class=\"glyphicon glyphicon-edit\"></span> Change Password</b></a></td>";
            if ($row->type=='Administrator'){
                $customerList.= "<td><a role='button' class=\"btn-danger btn btn-sm btn-block delete_user disabled\" id={$row->user_id}><b><span class=\"glyphicon glyphicon-edit\"></span> Delete</b></a></td>";
            }
            else{
                $customerList.= "<td><a role='button' class=\"btn-danger btn btn-sm btn-block delete_user\" id={$row->user_id}><b><span class=\"glyphicon glyphicon-edit\"></span> Delete</b></a></td>";
            }
            $customerList.= "</tr>";
        }
        $customerList .="</tbody></table>";
        echo $customerList;
    }

    /*
     * get user details for a particular user
     */
    public function getUserDetails(){
        $user_id = $this->input->post('user_id');
        $this->load->model('model_user');
        $customer=$this->model_user->fetchUser($user_id);
        echo json_encode($customer);
    }

    /*
    * change the password of a particular user
    */
    public function changeUserPassword(){
        $user_id = $this->input->post('user_id');
        $password = $this->input->post('password');
        $hashed_password = sha1($password);
        $this->load->model('model_user');
        $result = $this->model_user->updateUserPassword($user_id,$hashed_password);
        if ($result){
            echo "<h4>Password changed successfully</h4>";
        }
        else{
            echo "<h4>Failed to change the Password</h4>";
        }
    }

    /*
    * function to delete a particular user
    */
    public function deleteUser(){
        $record_id = $this->input->post('record_id');
        $this->load->model('model_user');
        $this->load->model('customer_model');
        $result_user = $this->model_user->updateUserDeleteStatus($record_id,1);
        $result_customer = $this->customer_model->updateCustomerDeleteStatus($record_id,1);
        if ($result_user AND $result_customer){
            echo "<h4>User deleted successfully</h4>";
        }
        else{
            echo "<h4>Failed to delete the User</h4>";
        }
    }
}
