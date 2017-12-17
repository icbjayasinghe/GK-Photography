<link href="<?php echo base_url(); ?>css/admin-home.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>css/upload-image.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>css/navbar-style.css" rel="stylesheet">

<?php if(!($this->session->userdata('loggedin'))){
    redirect('Welcome/login'); }?>


    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <h1 class="mt-4 mb-3">Customer Home
            <small><?php echo $this->session->userdata('$f_name')." " .$this->session->userdata('$l_name');?></small>
        </h1>

        <br>

        <!-- Content Row -->
        <div class="row">
            <!-- Sidebar Column -->
            <div class="col-lg-3 mb-4">
                <div id="side-bar-list" class="list-group my-sidebar-item top-buffer">
                    <a id="make_appointment" href="<?php echo base_url();?>index.php/appointments/makeAppointmentCustomer" class="list-group-item ref">Make Appointment</a>
                    <a href="<?php echo base_url();?>index.php/appointments/upcomingAppointments" class="list-group-item ref">Upcoming Appointments  <span class="badge badge-pill badge-info" id="appointment_count"></span></a>
                    <a href="<?php echo base_url();?>index.php/appointments/appointmentHistory" class="list-group-item ref">Appointment History</a>
                </div>
            </div>
            <!-- Content Column -->
            <div id="content" class="col-lg-9 mb-4">

                <h2>Welcome</h2>
                <p></p>
            </div>
        </div>
        <!-- /.row -->

    </div>
    <!-- /.container -->
</div>

