
<input type="hidden" name="this_cust_id" id="this_cust_id" value="<?php echo $this->session->userdata('$id');?>">

<h2>Make an Appointment</h2>
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
                    <input type="time" name="appointment_stime" id="appointment_stime" class="form-control" onchange="onChangeStartTime()">
            </div>
            <p id="check_start_time" class="warning_msg"></p>
        </div>

        <div class="row">
            <div class="col-md-4">
                <label><h4>Select an End Time</h4></label>
            </div>
            <div class="col-md-4">
                <input type="time" name="appointment_etime" id="appointment_etime" class="form-control" onchange="onChangeEndTime()">
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
                <a class="btn btn-primary btn-lg btn-block my-upload-button" onclick="makeAppointment()">Make Appointment</a>
            </div>
        </div>
    </div>
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
                    if (data=="<h4>Appointment Request Successful</h4><br>"){
                        $('#appointment_date').val("");
                        $('#appointment_stime').val("");
                        $('#appointment_etime').val("");
                        $('#description').val("");
                        $('#msg_Modal').modal('show');
                        $('#msg_result').html(data);
                    }
                    else{
                        $('#msg_Modal').modal('show');
                        $('#msg_result').html(data);
                    }

                }
            });
        }
        else{
            $('#msg_Modal').modal('show');
            $('#msg_result').html("Please check all the fields!");
        }
    }

    // enable calender - cannot book for today
    function enableCalenderCustomer() {
        var tmrrw = new Date();
        var dd = tmrrw.getDate()+1;
        var mm = tmrrw.getMonth()+1; //January is 0!
        var yyyy = tmrrw.getFullYear();
        if(dd<10){
            dd='0'+dd
        }
        if(mm<10){
            mm='0'+mm
        }

        tmrrw = yyyy+'-'+mm+'-'+dd;
        document.getElementById("appointment_date").value="";
        document.getElementById("appointment_date").setAttribute("min", tmrrw);
    }

    $(document).ready(function (){
        enableCalenderCustomer();
    });
</script>
