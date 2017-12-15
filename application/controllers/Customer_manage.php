<?php
//defined('BASEPATH') OR exit('No direct script access allowed');

class Customer_manage extends CI_Controller
{
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
            $customerList.= "<td>{$row->last_name}h</td>";
            $customerList.= "<td>{$row->cust_email}h</td>";
            $customerList.= "<td>{$row->cust_phone}</td>";
            $customerList.= "</tr>";
        }
        $customerList .="</tbody></table>";
        echo $customerList;
    }
   


}

?>