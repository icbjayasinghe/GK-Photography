<link href="<?php echo base_url(); ?>css/admin-home.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<div class="canvas col-md-12">


    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <h1 class="mt-4 mb-3">Admin Home
            <small>Subheading</small>
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
                    <a href="<?php echo base_url();?>index.php/administrator/adminHome" class="list-group-item ref">Home</a>
                    <a href="about.html" class="list-group-item">About</a>
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

                <h2>Section Heading</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta, et temporibus, facere perferendis veniam beatae non debitis, numquam blanditiis necessitatibus vel mollitia dolorum laudantium, voluptate dolores iure maxime ducimus fugit.</p>
            </div>
        </div>
        <!-- /.row -->

    </div>
    <!-- /.container -->
</div>

<script>
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

    // load register requests
    function displayRegisterRequests() {
        $('#content').load("../view/manage-register-requests.php");
    }

</script>