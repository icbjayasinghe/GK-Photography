
<h2>Appointments</h2>
<br>


<div class="tab-content">
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" href="#schedule" role="tab" aria-controls="schedule">Schedule</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#make_appointment" role="tab" aria-controls="make_appointment">Make Appointment</a>
        </li>
    </ul>

    <div class="tab-content">

        <div class="tab-pane fade" id="schedule" role="tabpanel">

            <h2><small>
                <span>
                    <div class="col-md-4">
                        <input id="date_picker" type="date" name="appointment_date" onchange="getAppointmentDetails('')" value="<?php echo date("Y-m-d");?>"></small>
                    </div>
                    <div class="request-icon col-md-2" onclick="getAppointmentDetails('*')">
                        <a class="btn view-all">View All   <i class="fa fa-table" aria-hidden="true"></i></a>
                    </div>
                    <div class="col-md-6" style="margin-top: 0.5%">
                        <input type="text" class="form-control paragraph-font" placeholder="Search other details ..." id="search_text_appointment">
                    </div>

                </span></h2>

            </h2>

            <div class="row ">
                <div class="col-md-12 result-table top-buffer" id="appointment_table_results">
                    <table class="table table-hover col-md-12">
                        <thead>
                        <tr>
                            <th>Appointment ID</th>
                            <th>Appointment Date</th>
                            <th>Start Time</th>
                            <th>End Time</th>
                            <th>Description</th>
                            <th>Customer Name</th>
                            <th>Print</th>
                            <th>Cancel</th>
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
                            $appointmentList.= "<td><a class=\"btn btn-info btn-sm\" onclick=\"printReceipt(this.id)\" name=\"print\" value=\"Print\" id=\"{$row->appointment_id}\"><span class=\"glyphicon glyphicon-print\"></span>  Print Receipt</a></td>";
                            if ($row->appointment_date >= date('Y-m-d')){
                                $appointmentList.= "<td><a role='button' class=\"btn-danger btn btn-sm btn-block cancel_appointment\" id={$row->appointment_id}><b><span class=\"glyphicon glyphicon-remove\"></span> Cancel</b></a></td>";
                            }
                            else{
                                $appointmentList.= "<td><a role='button' class=\"btn-danger btn btn-sm btn-block cancel_appointment disabled\" id={$row->appointment_id}><b><span class=\"glyphicon glyphicon-remove\"></span> Cancel</b></a></td>";
                            }
                            $appointmentList.= "</tr>";
                        }
                        echo $appointmentList;
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="tab-pane fade active" id="make_appointment" role="tabpanel">

            <div class="row">
                <div class="col-md-12">
                    <div class="input-group my-search-panel top-buffer">
                        <div class="input-group-btn search-panel">
                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                <span id="search_concept">Filter by</span> <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" role="menu" id="filter_select">
                                <li><a href="#cust_id" value="cust_id">ID</a></li>
                                <li><a href="#first_name" value="first_name">First Name</a></li>
                                <li><a href="#last_name" value="last_name">Last Name</a></li>
                                <li><a href="#cust_email" value="cust_email">Email</a></li>
                                <li><a href="#cust_phone" value="cust_phone">Phone</a></li>
                                <li><a href="#cust_address" value="cust_address">Address</a></li>
                                <li><a href="#date_joined" value="date_joined">Date Joined</a></li>
                                <li><a href="#cust_gender" value="cust_gender">Gender</a></li>
                                <li class="divider"></li>
                                <li><a href="#all" value="all">Anything</a></li>
                            </ul>
                        </div>
                        <input type="hidden" name="search_param" value="all" id="search_param">
                        <input type="text" class="form-control" name="x" placeholder="Search customer here..." id="search_text">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 result-table" id="customer_table_results">

                    </div>
                </div>
            </div>
        </div>


    </div>

</div>



<script type="text/javascript">

    $(document).ready(function(){

        $('#customer_table_results').load("<?php echo base_url();?>index.php/customer_manage/searchCustomerDetailsBook/all/");

        // active recently activated tab using local storage
        $('a[data-toggle="tab"]').on('show.bs.tab', function(e) {
            localStorage.setItem('activeTab', $(e.target).attr('href'));
        });
        var activeTab = localStorage.getItem('activeTab');
        if(activeTab){
            $('#myTab a[href="' + activeTab + '"]').tab('show');
        }

        // to change the filter when clicked
        $('.search-panel .dropdown-menu').find('a').click(function(e) {
            e.preventDefault();
            var param = $(this).attr("href").replace("#","");
            var concept = $(this).text();
            $('.search-panel span#search_concept').text(concept);
            $('.input-group #search_param').val(param);
        });

        // load suitable results on keyup
        $('#search_text').keyup(function (){
            var filter = document.getElementById("search_param").value;
            var txt = $(this).val().trim();
            $.ajax({
                url: '<?php echo site_url('customer_manage/searchCustomerDetailsBook'); ?>',
                method: "post",
                data:{filter:filter,txt:txt},
                cache: false,
                success: function (data) {
                    $('#customer_table_results').html(data);
                }
            });
        });

        // load suitable results on keyup
        $('#search_text_appointment').keyup(function () {
            var date = document.getElementById('date_picker').value;
            var txt = $(this).val().trim();
            $.ajax({
                url:'<?php echo site_url('appointments/searchAppointmentDetails'); ?>',
                method: "post",
                data:{date:date,txt:txt},
                cache: false,
                success: function (data) {
                    $('#appointment_table_results').html(data);
                }
            });
        });

        // load modal to cancel an appointment
        $(document).on('click','.cancel_appointment',function(){
            $(".cancel_appointment").attr("disabled", true);
            var id = $(this).attr("id");
            var table = 'appointment';
            $('#table_name').val(table);
            $('#record_id').val(id);
            $('#delete_Modal').modal('show');
        });
    });



    // when delete button is pressed in the modal
    function deleteRecord(){
        $('#delete_Modal').modal('hide');
        var record_id = document.getElementById('record_id').value;
        var table_name = document.getElementById('table_name').value;
        $.ajax({
            url:'<?php echo site_url('appointments/cancelAppointment'); ?>', //the page containing php script
            type: "post", //request type
            data: {record_id : record_id},
            cache: false,
            success:function(result){
                $('#msg_Modal').modal('show');
                $('#msg_result').html(result);
            }
        });
    }


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

    // load appointment details when date picker is changed
    function getAppointmentDetails(value) {
        var txt = document.getElementById('search_text_appointment').value;
        if (value == '*'){
            var date = '';
            txt= "";
            $('#date_picker').val("");
            $('#search_text_appointment').val("");
        }
        else{
            var date = document.getElementById("date_picker").value;
        }
        $.ajax({
            url:'<?php echo site_url('appointments/searchAppointmentDetails'); ?>',
            method: "post",
            data: {date:date,txt:txt},
            success: function( data ) {
                $('#appointment_table_results').html(data);
            }
        });
    }


    // when cancel button is pressed in the modal
    function notDeleteRecord() {
        $('#delete_Modal').modal('hide');
        $('#content').load("<?php echo base_url();?>index.php/administrator/appointments");
    }

    // print the receipt
    function printReceipt(appointment_id){
        window.open('<?php echo site_url('pdf_controller/generateAppointmentReceipt/'); ?>'+appointment_id,'_blank');

    }

    // load booking page for admin
    function onClickBook(cust_id) {
        $('#content').load("<?php echo base_url();?>index.php/appointments/makeAppointmentAdmin/"+cust_id);
    }


    $('#msg_Modal').on('hidden.bs.modal', function () {
        $('#content').load("<?php echo base_url();?>index.php/administrator/appointments");
    });

</script>
