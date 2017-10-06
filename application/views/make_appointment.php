
<div class="canvas col-md-12 my-background">
    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Book an Appointment

                </h1>

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
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <label><h4>Select a End Time</h4></label>
                    </div>
                    <div class="col-md-4">
                        <input type="time" name="appointment_time" id="appointment_etime" class="form-control" >
                    </div>
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
    function makeAppointment() {
        var date = document.getElementById('appointment_date').value;
        var stime = document.getElementById('appointment_stime').value;
        var etime = document.getElementById('appointment_etime').value;
        if ((date.length==10) && (stime.length==5) && (etime.length==5) && (stime!=etime)){
            $.ajax({
                url:'<?php echo site_url('ajax/checkAvailability'); ?>',
                method: "post",
                data: {date:date,stime:stime,etime:etime},
                success: function( data ) {
                    alert(data);
                    //$('#time_slots').html(data);
                   // document.getElementById("time_slots").disabled=false;
                }
            });
        }
        else{
            alert("failure");
        }

    }
</script>
