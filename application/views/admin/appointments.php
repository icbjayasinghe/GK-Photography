
<h2>Appointments<span> <small>
            <input id="date_picker" type="date" name="appointment_date" onchange="getAppointmentDetails('')" value="<?php echo date("Y-m-d");?>">
        </small>
    <div class="request-icon" onclick="getAppointmentDetails('*')">
                <a class="btn view-all">View All   <i class="fa fa-table" aria-hidden="true"></i></a>
            </div>
    </span></h2>
<br>

<div class="row">
    <div class="row ">
        <div class="col-md-12 result-table" id="table_results">
            <table class="table table-hover col-md-12">
                <thead>
                <tr>
                    <th>Appointment ID</th>
                    <th>Appointment Date</th>
                    <th>Start Time</th>
                    <th>End Time</th>
                    <th>Description</th>
                    <th>Customer Name</th>
                </tr>
                </thead>
                <tbody>
                    <?php
                    $appointmentList = "";
                    foreach ($appointments as $row){
                        $customerDetals = [$row->cust_id,$row->first_name,$row->last_name,$row->cust_phone,$row->cust_address,$row->cust_email,$row->date_joined];
                        $rowString = implode(",", $customerDetals);
                        $appointmentList.= "<tr>";
                        $appointmentList.= "<td>{$row->appointment_id}</td>";
                        $appointmentList.= "<td>{$row->appointment_date}</td>";
                        $appointmentList.= "<td>{$row->start_time}h</td>";
                        $appointmentList.= "<td>{$row->end_time}h</td>";
                        $appointmentList.= "<td>{$row->description}</td>";
                        $appointmentList.= "<td><a class=\"customer_check\" onclick=\"loadCustomerModal('$rowString')\" id={$row->cust_id}><b>{$row->first_name} {$row->last_name}</b></a></td>";
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

    // to change the appointment status to 'accepted' or 'rejected'
    function statusChange(status,appointmentId) {
        $.ajax({
            url:'<?php echo site_url('appointments/updateAppointmentStatus'); ?>',
            method: "post",
            data: {status:status,appointmentId:appointmentId},
            success: function( data ) {
                $('#msg_Modal').modal('show');
                $('#msg_result').html(data);
                $('#content').load("<?php echo base_url();?>index.php/appointments/appointmentRequests");
            }
        });
    }
</script>
