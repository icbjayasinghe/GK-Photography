

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
    // load content dynamically to content div from sidebar
    $("a").filter(".ref").click(function(){
        var page = $(this).attr('href');
        $("#content").load(page,false);

        // to disable the default functionality of href in html, which ignores the href and  let jquery to do its thing
        return false;
    });

    $(document).ready(function(){
        $('#side-bar-list a').click(function(e) {
            e.preventDefault();
            $('#side-bar-list a').removeClass('active');
            $(this).toggleClass('active');
        });
    });

    $( document ).ready(function() {
        $('#content').load("<?php echo base_url();?>index.php/appointments/makeAppointment");
        $('#make_appointment').addClass('active');
    });

    // load new appointments count
    setInterval(function(){
        $.ajax({
            url:'<?php echo site_url('appointments/countNewAppointments'); ?>',
            type: "POST",
            success: function(data)
            {
                if(data!=0){
                    $('#appointment_count').html(data+" NEW");
                }
            }
        });
    },3000);


</script>

</body>
</html>