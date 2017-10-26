
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
                            <input type="date" name="appointment_date" id="appointment_date" class="form-control">
                    </div>
                    <p id="check_date"></p>
                </div>
                <br>
                <br>

                <div class="row">
                    <div class="col-md-4">
                        <label><h4>Select a Start Time</h4></label>
                    </div>
                    <div class="col-md-4">
                            <input type="time" name="appointment_time" id="appointment_stime" class="form-control">
                    </div>
                    <p id="check_start_time"></p>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <label><h4>Select a End Time</h4></label>
                    </div>
                    <div class="col-md-4">
                        <input type="time" name="appointment_time" id="appointment_etime" class="form-control" onchange="onChangeEndTime()">
                    </div>
                    <p id="check_end_time"></p>
                </div>

                <br>
                <br>

                <div class="row">
                    <div class="col-md-4">
                        <label><h4>Description</h4></label>
                    </div>
                    <div class="col-md-4">
                        <textarea type="text" name="description" id="description" class="form-control"></textarea>
                    </div>
                    <p id="check_description"></p>
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

    // function to execute when make appointment button is clicked
    function makeAppointment() {
        var date = document.getElementById('appointment_date').value;

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
                    //$('#time_slots').html(data);
                   // document.getElementById("time_slots").disabled=false;
                }
            });
        }
        else{
            $('#msg_Modal').modal('show');
            $('#msg_result').html("Please check all the fields!");
        }
    }

</script>
