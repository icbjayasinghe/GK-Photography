<?php
//defined('BASEPATH') OR exit('No direct script access allowed');

class Customer_manage extends CI_Controller
{
    /*
    * view customer details
    */
    public function viewCustomers(){
        $this->load->model('customer_model');
        $customer=$this->customer_model->getCustomers();
        $customerList = "<table class=\"table table-hover col-md-12\">

                <thead>
                    <tr>
                        <th>Customer ID</th>
                        <th>First Name</th>
                        <th>last Name</th>
                        <th>email</th>
                        <th>phone no</th>
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
            $customerList.= "</tr>";
        }
        $customerList .="</tbody></table>";
        echo $customerList;
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