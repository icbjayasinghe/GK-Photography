<link href="<?php echo base_url(); ?>css/admin-home.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>css/upload-image.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>css/navbar-style.css" rel="stylesheet">

<div class="canvas col-md-12 background-theme">
    <div class="navbar navbar-default my-navbar" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <a target="_blank" href="#" class="navbar-brand">GK - Photography</a>
            </div>
            <div class="collapse navbar-collapse">

                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown username">
                        <a href="#" class="dropdown-toggle username" data-toggle="dropdown">
                            <span class="glyphicon glyphicon-user"></span>
                            <strong><?php echo $this->session->userdata('$f_name')." ".$this->session->userdata('$l_name')?></strong>
                            <span class="glyphicon glyphicon-chevron-down"></span>
                        </a>
                        <ul class="dropdown-menu background-theme">
                            <li>
                                <div class="navbar-login">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <p class="text-center">
                                                <span class="glyphicon glyphicon-user icon-size"></span>
                                            </p>
                                        </div>
                                        <div class="col-lg-8">
                                            <p class="text-left"><strong><?php echo $this->session->userdata('$f_name')." ".$this->session->userdata('$l_name')?></strong></p>
                                            <p class="text-left small"><?php echo $this->session->userdata('$email')?></p>
                                            <p class="text-left">
                                                <a href="#" class="btn btn-primary btn-block btn-sm">Edit Profile</a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <div class="navbar-login navbar-login-session">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <p>
                                                <a href="<?php echo base_url('index.php/Login/LogoutUser')?>" class="btn btn-danger btn-block">Log Out</a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Page Content -->
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

