<link href="<?php echo base_url(); ?>css/admin-home.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>css/upload-image.css" rel="stylesheet">


<div class="canvas col-md-12 background-theme">

    <br><br>
    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <h1 class="mt-4 mb-3">Admin Home
            <small><?php echo $this->session->userdata('$f_name')." " .$this->session->userdata('$l_name');?></small>
            <div class="request-icon">
                <span role="button" class="badge badge-pill badge-info" id="request_count" onclick="displayAppointmentRequests()"></span>
                <i role="button" class="fa fa-envelope-o envelop" aria-hidden="true" onclick="displayAppointmentRequests()"></i>
            </div>
        </h1>

        <br>

        <!-- Content Row -->
        <div class="row">
            <!-- Sidebar Column -->
            <div class="col-lg-3 mb-4">
                <div id="side-bar-list" class="list-group my-sidebar-item">
                    <a href="." onclick="reloadAdminHome()" class="list-group-item ref">Home</a>
                    <a href="<?php echo base_url();?>index.php/administrator/appointments" id="admin_appointment" class="list-group-item ref">Appointments</a>
                    <a href="<?php echo base_url();?>index.php/administrator/manageCustomers" class="list-group-item ref">Manage Customers</a>
                    <a href="<?php echo base_url();?>index.php/administrator/manageGallery" class="list-group-item ref">Manage Gallery</a>
                    <a href="portfolio-1-col.html" class="list-group-item">Manage Suggestions</a>
                </div>
            </div>
            <!-- Content Column -->
            <div id="content" class="col-lg-9 mb-4">

                <h2>Welcome</h2>
                <p>This is the Admin Panel</p>
            </div>
        </div>

    </div>
    <!-- /.container -->
</div>


