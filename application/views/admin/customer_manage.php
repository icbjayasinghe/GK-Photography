
<h2>Customer Management<span>
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
                            $customerList.= "<td><a class=\"customer_check btn-success btn-sm\"\" onclick=\"edit_customer('$rowString')\" id={$row->cust_id}><b><span class=\"glyphicon glyphicon-edit\"></span> Edit</b></a></td>";
                            $customerList.= "</tr>";
                    }
                    echo $customerList;
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

