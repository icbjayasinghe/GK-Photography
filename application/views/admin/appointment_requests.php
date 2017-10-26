
<h2>Appointment Requests</h2>
<br>

<div class="row">
    <div class="row ">
        <div class="col-md-12 result-table" id="result">
            <table class="table table-hover col-md-12">
                <thead>
                <tr>
                    <th>Appointment ID</th>
                    <th>Appointment Date</th>
                    <th>Start Time</th>
                    <th>End Time</th>
                    <th>Description</th>
                    <th>Customer Name</th>
                    <th>Accept</th>
                    <th>Reject</th>
                </tr>
                </thead>
                <tbody>
                <?php
                    $appointmentList = "";
                    foreach ($appointmentRequests as $row){
                        $customerDetals = [$row->cust_id,$row->first_name,$row->last_name,$row->cust_phone,$row->cust_address,$row->cust_email,$row->date_joined];
                        $rowString = implode(",", $customerDetals);
                        $appointmentList.= "<tr>";
                        $appointmentList.= "<td>{$row->appointment_id}</td>";
                        $appointmentList.= "<td>{$row->appointment_date}</td>";
                        $appointmentList.= "<td>{$row->start_time}h</td>";
                        $appointmentList.= "<td>{$row->end_time}h</td>";
                        $appointmentList.= "<td>{$row->description}</td>";
                        $appointmentList.= "<td><a class=\"customer_check\" onclick=\"loadCustomerModal('$rowString')\" id={$row->cust_id}><b>{$row->first_name} {$row->last_name}</b></a></td>";
                        $appointmentList.= "<td><a class=\"btn btn-success btn-sm\" onclick=\"statusChange('accepted',this.id)\" name=\"accept\" value=\"Accept\" id=\"{$row->appointment_id}\"><span class=\"glyphicon glyphicon-edit\"></span>  Accept</a></td>";
                        $appointmentList.= "<td><a class=\"btn btn-danger btn-sm\" onclick=\"statusChange('rejected',this.id)\" name=\"reject\" value=\"Reject\" id=\"{$row->appointment_id}\"><span class=\"glyphicon glyphicon-edit\"></span>  Reject</a></td>";
                        $appointmentList.= "</tr>";
                    }
                    echo $appointmentList;
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script type="text/javascript">

    // load modal to view customer details
    function loadCustomerModal(customerDetails){
        customerDetails = customerDetails.split(",");
        $('#cust_id').html(customerDetails[0]);
        $('#first_name').val(customerDetails[1]);
        $('#last_name').val(customerDetails[2]);
        $('#cust_phone').val(customerDetails[3]);
        $('#cust_address').val(customerDetails[4]);
        $('#cust_email').val(customerDetails[5]);
        $('#customer_Modal').modal('show');
    }
</script>