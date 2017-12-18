

<!-- Bootstrap core JavaScript
   ================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="<?php echo base_url(); ?>js/jquery.js"></script>
<script src="<?php echo base_url(); ?>dist/js/jasny-bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>

<!--<script>
    $('.carousel').carousel({
        interval: 5000 //changes the speed
    })
</script>-->

<script>
    // activate appointments menu item on pahe load
    $( document ).ready(function() {
        $('#content').load("<?php echo base_url();?>index.php/administrator/appointments");
        $('#admin_appointment').addClass('active');
    });

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
    function displayAppointmentRequests() {
        $('#content').load("<?php echo base_url();?>index.php/appointments/appointmentRequests");
    }

    function reloadAdminHome() {
        location.reload();
    }

    function loadAdminProfile() {
        var id=document.getElementById('adminEdit').value;
        alert(id);
        $.ajax({
            url:'<?php echo site_url('users/getUserDetails'); ?>',
            method: "post",
            data: {user_id:id},
            dataType: "json",
            cache: false,
            success:function (data) {
                // $('#change_first_name').val(data.first_name);
                // $('#change_last_name').val(data.last_name);
                // $('#change_email').val(data.email);
                // $('#change_type').val(data.type);
                // $('#change_password').val("");
                // $('#change_confirm_password').val("");
                // $('#message').html("");
                // $('#change_user_id').val(data.user_id);
                // $('#change_password_Modal').modal('show');
                alert(data);
            }
        });
    }    

    $(document).ready(function(){
        $('#side-bar-list a').click(function(e) {
            e.preventDefault();
            $('#side-bar-list a').removeClass('active');
            $(this).toggleClass('active');
        });
    });
</script>


</body>


</html>