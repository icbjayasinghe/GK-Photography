
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

    // load suitable results on keyup
    $(document).ready(function(){
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
    });

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

    // active recently activated tab using local storage
    $(document).ready(function(){
        $('a[data-toggle="tab"]').on('show.bs.tab', function(e) {
            localStorage.setItem('activeTab', $(e.target).attr('href'));
        });
        var activeTab = localStorage.getItem('activeTab');
        if(activeTab){
            $('#myTab a[href="' + activeTab + '"]').tab('show');
        }
    });

    // to change the filter when clicked
    $(document).ready(function(e){
        $('.search-panel .dropdown-menu').find('a').click(function(e) {
            e.preventDefault();
            var param = $(this).attr("href").replace("#","");
            var concept = $(this).text();
            $('.search-panel span#search_concept').text(concept);
            $('.input-group #search_param').val(param);
        });
    });

    // load suitable results on keyup
    $(document).ready(function(){
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
    });

    // print the receipt
    function printReceipt(appointment_id){
        window.open('<?php echo site_url('pdf_controller/generateAppointmentReceipt/'); ?>'+appointment_id,'_blank');

    }


    // load booking page for admin
    function onClickBook(cust_id) {
        $('#content').load("<?php echo base_url();?>index.php/appointments/makeAppointmentAdmin/"+cust_id);
    }

    $(document).ready(function(){
        $('#customer_table_results').load("<?php echo base_url();?>index.php/customer_manage/searchCustomerDetailsBook/all/");
    });


</script>
