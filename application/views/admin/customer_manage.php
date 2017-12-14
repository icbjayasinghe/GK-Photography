
<h2>Manage Customers<span>
        <small>
            <input id="search" type="text" name="search_customer" onchange="getCustomerDetails('')" value="search">
        </small>
    <div class="request-icon" onclick="getCustomerDetails()">
                <!-- <a class="btn view-all">View All<i class="fa fa-table" aria-hidden="true"></i></a> -->
            </div>
    </span></h2>
<br>

<div class="row">
    <div class="row ">
        <div class="col-md-12 result-table" id="table_results">
            <table class="table table-hover col-md-12">
                <thead>
                <tr>
                    <th>Customer ID</th>
                    <th>First Name</th>
                    <th>last Name</th>
                    <th>email</th>
                    <th>phone no</th>
                </tr>
                </thead>
                <tbody>
                    <?php
                    $customerList = "";
                    foreach ($customer as $row){
                            $customerDetals = [$row->cust_id,$row->first_name,$row->last_name,$row->cust_phone,$row->cust_address,$row->cust_email,$row->date_joined];
                            $rowString = implode(",", $customerDetals);
                            $customerList.= "<tr>";
                            $customerList.= "<td>{$row->cust_id}</td>";
                            $customerList.= "<td>{$row->first_name}</td>";
                            $customerList.= "<td>{$row->last_name}h</td>";
                            $customerList.= "<td>{$row->cust_email}h</td>";
                            $customerList.= "<td>{$row->cust_phone}</td>";
                            $customerList.= "<td><a class=\"customer_check btn-success btn-sm\" onclick=\"edit_customer('$rowString')\" id={$row->cust_id}><b><span class=\"glyphicon glyphicon-edit\"></span> Edit</b></a></td>";
                            $customerList.= "</tr>";
                    }
                    echo $customerList;
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    function getCustomerDetails() {
        $.ajax({
            url:'<?php echo site_url('customer_manage/viewCustomers'); ?>',
            method: "post",
            success: function() {
                $('#table_results').html();
            }
        });
    }

    // load modal to edit customer details
    function edit_customer(customerDetails){
        customerDetails = customerDetails.split(",");
        // alert(customerDetails);
        $('#edit_cust_id').val(customerDetails[0]);
        $('#edit_first_name').val(customerDetails[1]);
        $('#edit_last_name').val(customerDetails[2]);
        $('#edit_cust_phone').val(customerDetails[3]);
        $('#edit_cust_address').val(customerDetails[4]);
        $('#edit_cust_email').val(customerDetails[5]);
        $('#edit_customer_Modal').modal('show');
    }

    // load modal to view customer details
    function loadCustomerModal(customerDetails){
        customerDetails = customerDetails.split(",");
        alert(customerDetails);
        $('#cust_id').val(customerDetails[0]);
        $('#first_name').val(customerDetails[1]);
        $('#last_name').val(customerDetails[2]);
        $('#cust_phone').val(customerDetails[3]);
        $('#cust_address').val(customerDetails[4]);
        $('#cust_email').val(customerDetails[5]);
        $('#customer_Modal').modal('show');
    }
</script>
