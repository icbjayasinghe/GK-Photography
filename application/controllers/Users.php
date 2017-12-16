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

}
