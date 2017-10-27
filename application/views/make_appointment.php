

<div class="canvas col-md-12 background-theme">
    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <div class="row class="mt-4 mb-3"">
            <div class="col-lg-12">
                <h1 class="page-header">Book an Appointment  <small><?php echo $this->session->userdata('$f_name')." " .$this->session->userdata('$l_name');?></small>
                </h1>

                <input type="hidden" name="this_cust_id" id="this_cust_id" value="<?php echo $this->session->userdata('$id');?>">
            </div>
        </div>
        <!-- /.row -->
        <br>
        <br>
        <!-- Content Row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-md-4">
                        <label><h4>Select a Date</h4></label>
                    </div>
                    <div class="col-md-4">
                            <input type="date" name="appointment_date" id="appointment_date" class="form-control" onchange="onChangeDate()">
                            <input type="hidden" name="today" id="today" value="<?php echo date("Y-m-d");?>">
                    </div>
                    <p id="check_date" class="warning_msg"></p>
                </div>
                <br>
                <br>

                <div class="row">
                    <div class="col-md-4">
                        <label><h4>Select a Start Time</h4></label>
                    </div>
                    <div class="col-md-4">
                            <input type="time" name="appointment_time" id="appointment_stime" class="form-control" onchange="onChangeStartTime()">
                    </div>
                    <p id="check_start_time" class="warning_msg"></p>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <label><h4>Select a End Time</h4></label>
                    </div>
                    <div class="col-md-4">
                        <input type="time" name="appointment_time" id="appointment_etime" class="form-control" onchange="onChangeEndTime()">
                    </div>
                    <p id="check_end_time" class="warning_msg"></p>
                </div>

                <br>
                <br>

                <div class="row">
                    <div class="col-md-4">
                        <label><h4>Description</h4></label>
                    </div>
                    <div class="col-md-4">
                        <textarea type="text" name="description" id="description" class="form-control" onchange="onChangeDescription()"></textarea>
                    </div>
                    <p id="check_description" class="warning_msg"></p>
                </div>

                <br>
                <br>
                <br>


                <div class="row">
                    <div class="col-md-4 col-md-offset-4">
                        <a class="btn btn-lg btn-default btn-block" onclick="makeAppointment()">Make Appointment</a>
                    </div>
                </div>
            </div>
        </div>


        <hr>

    </div>
    <!-- /.container -->

</div>

<script type="text/javascript">

    // validate date when changed
    function onChangeDate(){
        var date = document.getElementById('appointment_date').value;
        var today = document.getElementById('today').value;

        if ((new Date(date).getTime() < new Date(today).getTime())){
            $('#check_date').html("Cannot make appointments for this date");
        }
        else if (date!=""){
            $('#check_date').html("");
        }
        else{
            $('#check_date').html("Please fill this field");
        }
    }

    // validate start time when changed
    function onChangeStartTime(){
        // extracting hours and minutes separately from start time and concatenate them
        var hoursSTime = document.getElementById('appointment_stime').value.substring(0,2);
        var minutesSTime = document.getElementById('appointment_stime').value.substring(3,5);
        var stime = hoursSTime.concat(minutesSTime);

        if (stime!=""){
            $('#check_start_time').html("");
        }
        else{
            $('#check_start_time').html("Please fill this field");
        }
    }

    // validate end time when changed
    function onChangeEndTime(){
        // extracting hours and minutes separately from start time and concatenate them
        var hoursSTime = document.getElementById('appointment_stime').value.substring(0,2);
        var minutesSTime = document.getElementById('appointment_stime').value.substring(3,5);
        var stime = hoursSTime.concat(minutesSTime);

        // extracting hours and minutes separately from end time and concatenate them
        var hoursETime = document.getElementById('appointment_etime').value.substring(0,2);
        var minutesETime = document.getElementById('appointment_etime').value.substring(3,5);
        var etime = hoursETime.concat(minutesETime);

        if (stime>=etime){
            $('#check_end_time').html("Please check end time");
        }
        else if (etime!=""){
            $('#check_end_time').html("");
        }
    }

    // validate description when changed
    function onChangeDescription(){
        var description = document.getElementById('description').value;

        if (description!=""){
            $('#check_description').html("");
        }
        else{
            $('#check_description').html("Please fill this field");
        }
    }

    // function to execute when make appointment button is clicked
    function makeAppointment() {
        var date = document.getElementById('appointment_date').value;
        var today = document.getElementById('today').value;

        // extracting hours and minutes separately from start time and concatenate them
        var hoursSTime = document.getElementById('appointment_stime').value.substring(0,2);
        var minutesSTime = document.getElementById('appointment_stime').value.substring(3,5);
        var stime = hoursSTime.concat(minutesSTime);

        // extracting hours and minutes separately from end time and concatenate them
        var hoursETime = document.getElementById('appointment_etime').value.substring(0,2);
        var minutesETime = document.getElementById('appointment_etime').value.substring(3,5);
        var etime = hoursETime.concat(minutesETime);

        var description = document.getElementById('description').value;
        var cust_id = document.getElementById('this_cust_id').value;

        if ((new Date(date).getTime() < new Date(today).getTime())){
            $('#check_date').html("Cannot make appointments for this date");
            return;
        }
        if (date==""){
            $('#check_date').html("Please fill this field");
            return;
        }
        if (stime==""){
            $('#check_start_time').html("Please fill this field");
            return;
        }
        if (etime==""){
            $('#check_end_time').html("Please fill this field");
            return;
        }
        if (description==""){
            $('#check_description').html("Please fill this field");
            return;
        }


        if ((date.length==10) && (stime.length==4) && (etime.length==4) && (stime<etime)){
            $.ajax({
                url:'<?php echo site_url('appointments/checkAvailability'); ?>',
                method: "post",
                data: {date:date,stime:stime,etime:etime,description:description,cust_id:cust_id},
                success: function( data ) {
                    $('#msg_Modal').modal('show');
                    $('#msg_result').html(data);
                }
            });
        }
        else{
            $('#msg_Modal').modal('show');
            $('#msg_result').html("Please check all the fields!");
        }
    }

</script>
