<?php
//defined('BASEPATH') OR exit('No direct script access allowed');

class Customer_manage extends CI_Controller
{
   
    // search customer details
    public function searchCustomerDetails(){
        $field = $this->input->post('filter');
        $search_text = $this->input->post('txt');

        $this->load->model('customer_model');
        $customer=$this->customer_model->searchCustomer($field,$search_text);
        $customerList = "<table class=\"table table-hover col-md-12 top-buffer\">

                <thead>
                <tr>
                    <th>Customer ID</th>
                    <th>First Name</th>
                    <th>last Name</th>
                    <th>email</th>
                    <th>phone no</th>
                    <th>Edit</th>
                </tr>
                </thead>
                <tbody>";
        foreach ($customer as $row){
            $customerDetails = [$row->cust_id,$row->first_name,$row->last_name,$row->cust_phone,$row->cust_address,$row->cust_email,$row->date_joined];
            $rowString = implode(",", $customerDetails);
            $customerList.= "<tr>";
            $customerList.= "<td>{$row->cust_id}</td>";
            $customerList.= "<td>{$row->first_name}</td>";
            $customerList.= "<td>{$row->last_name}</td>";
            $customerList.= "<td>{$row->cust_email}</td>";
            $customerList.= "<td>{$row->cust_phone}</td>";
            $customerList.= "<td><a class=\"customer_check btn btn-success btn-sm\" onclick=\"edit_customer('$rowString')\" id={$row->cust_id}><b><span class=\"glyphicon glyphicon-edit\"></span> Edit</b></a></td>";
            $customerList.= "</tr>";
        }
        $customerList .="</tbody></table>";
        echo $customerList;
    }

    public function updateCustomer(){
        $cust_id = $this->input->post('edit_cust_id');
        $first_name = $this->input->post('edit_first_name');
        $last_name = $this->input->post('edit_last_name');
        $cust_phone = $this->input->post('edit_cust_phone');
        $cust_address = $this->input->post('edit_cust_address');
        $cust_email = $this->input->post('edit_cust_email');

        $this->load->model('customer_model');

        $result_customer = $this->customer_model->updateCustomer($cust_id,$first_name,$last_name,$cust_phone,$cust_address,$cust_email);
        if ($result_customer){
            echo "<h4>Customer Updated Successfully</h4>";
        }
        else{
            echo "<h4>Failed to update the Customer</h4>";
        }
    }
    /*
     * search customer details
     */
    public function searchCustomerDetailsBook(){
        $field = $this->input->post('filter');
        $search_text = $this->input->post('txt');

        $this->load->model('customer_model');
        $customer=$this->customer_model->searchCustomer($field,$search_text);
        $customerList = "<table class=\"table table-hover col-md-12 top-buffer\">

                <thead>
                    <tr>
                        <th>Customer ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Phone No</th>
                        <th>Make Appointment</th>
                    </tr>
                </thead>
                <tbody>";
        foreach ($customer as $row){
            $customerList.= "<tr>";
            $customerList.= "<td>{$row->cust_id}</td>";
            $customerList.= "<td>{$row->first_name}</td>";
            $customerList.= "<td>{$row->last_name}</td>";
            $customerList.= "<td>{$row->cust_email}</td>";
            $customerList.= "<td>{$row->cust_phone}</td>";
            $customerList.= "<td><a role='button' class=\"customer_check btn btn-info btn-sm\" onclick=\"onClickBook(this.id)\" id={$row->cust_id}><b><span class=\"glyphicon glyphicon-edit\"></span> Book Now</b></a></td>";
            $customerList.= "</tr>";
        }
        $customerList .="</tbody></table>";
        echo $customerList;
    }


}

?>