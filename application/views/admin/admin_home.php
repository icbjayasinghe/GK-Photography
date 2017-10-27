<link href="<?php echo base_url(); ?>css/admin-home.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<div class="canvas col-md-12 background-theme">

    <br><br>
    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <h1 class="mt-4 mb-3">Admin Home
            <small><?php echo $this->session->userdata('$f_name')." " .$this->session->userdata('$l_name');?></small>
            <div class="request-icon">
                <span class="badge badge-pill badge-info" id="request_count" onclick="displayRegisterRequests()"></span>
                <i class="fa fa-envelope-o envelop" aria-hidden="true" onclick="displayRegisterRequests()"></i>
            </div>
        </h1>

        <br>

        <!-- Content Row -->
        <div class="row">
            <!-- Sidebar Column -->
            <div class="col-lg-3 mb-4">
                <div class="list-group">
                    <a href="." onclick="reloadAdminHome()" class="list-group-item ref">Home</a>
                    <a href="<?php echo base_url();?>index.php/administrator/appointments" class="list-group-item ref">Appointments</a>
                    <a href="<?php echo base_url();?>index.php/administrator/customer_manage" class="list-group-item ref">Customer Management</a>
                    <a href="services.html" class="list-group-item">Services</a>
                    <a href="contact.html" class="list-group-item">Contact</a>
                    <a href="portfolio-1-col.html" class="list-group-item">1 Column Portfolio</a>
                    <a href="portfolio-2-col.html" class="list-group-item">2 Column Portfolio</a>
                    <a href="portfolio-3-col.html" class="list-group-item">3 Column Portfolio</a>
                    <a href="portfolio-4-col.html" class="list-group-item">4 Column Portfolio</a>
                    <a href="portfolio-item.html" class="list-group-item">Single Portfolio Item</a>
                    <a href="blog-home-1.html" class="list-group-item">Blog Home 1</a>
                    <a href="blog-home-2.html" class="list-group-item">Blog Home 2</a>
                    <a href="blog-post.html" class="list-group-item">Blog Post</a>
                    <a href="full-width.html" class="list-group-item">Full Width Page</a>
                    <a href="sidebar.html" class="list-group-item active">Sidebar Page</a>
                    <a href="faq.html" class="list-group-item">FAQ</a>
                    <a href="404.html" class="list-group-item">404</a>
                    <a href="pricing.html" class="list-group-item">Pricing Table</a>
                </div>
            </div>
            <!-- Content Column -->
            <div id="content" class="col-lg-9 mb-4">

                <h2>Welcome</h2>
                <p>This is the Admin Panel</p>
            </div>
        </div>
        <!-- /.row -->

    </div>
    <!-- /.container -->
</div>

<script type="text/javascript">
    // load content dynamically to content div from sidebar
    $("a").filter(".ref").click(function(){
        var page = $(this).attr('href');
        $("#content").load(page,false);

        // to disable the default functionality of href in html, which ignores the href and  let jquery to do its thing
        return false;
    });

    // load appointment request count
    setInterval(function(){
        $.ajax({
            url:'<?php echo site_url('appointments/appointmentRequestCount'); ?>',
            type: "POST",
            data : "",
            success: function(data)
            {
                $('#request_count').html(data+" NEW");
                //alert(data);
            }
        });
    },3000);

    // load appointment requests view
    function displayRegisterRequests() {
        $('#content').load("<?php echo base_url();?>index.php/appointments/appointmentRequests");
    }

    // load modal to view customer details
    function loadCustomerModal(customerDetails){
        customerDetails = customerDetails.split(",");
        alert(customerDetails);
        $('#cust_id').val(customerDetails[0]);
        $('#first_name').val(customerDetails[1]);
        $('#last_name').val(customerDetails[2]);
        $('#cust_phone').val(customerDetails[3]);
        $('#cust_address').val(customerDetails[4]);
        $('#cust_email').val(customerDetails[5]);
        $('#customer_Modal').modal('show');
    }


    // load appointment details when date picker is changed
    function getAppointmentDetails(value) {
        if (value == '*'){
            var date = '*';
            $('#date_picker').val("");
        }
        else{
            var date = document.getElementById("date_picker").value;
        }
        $.ajax({
            url:'<?php echo site_url('appointments/viewAppointments'); ?>',
            method: "post",
            data: {date:date},
            success: function( data ) {
                $('#table_results').html(data);
            }
        });
    }
    
    function reloadAdminHome() {
        location.reload();
    }

    function getCustomerDetails() {
        $.ajax({
            url:'<?php echo site_url('customer_manage/viewCustomers'); ?>',
            method: "post",
            success: function() {
                $('#table_results').html();
            }
        });
    }

    // load modal to edit customer details
    function edit_customer(customerDetails){
        customerDetails = customerDetails.split(",");
        // alert(customerDetails);
        $('#edit_cust_id').val(customerDetails[0]);
        $('#edit_first_name').val(customerDetails[1]);
        $('#edit_last_name').val(customerDetails[2]);
        $('#edit_cust_phone').val(customerDetails[3]);
        $('#edit_cust_address').val(customerDetails[4]);
        $('#edit_cust_email').val(customerDetails[5]);
        $('#edit_customer_Modal').modal('show');
    }

</script>

