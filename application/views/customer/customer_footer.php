

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
        $('#content').load("<?php echo base_url();?>index.php/appointments/makeAppointmentCustomer");
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

    function loadCustProfile() {
        var id=document.getElementById('user_edit').value;
        $.ajax({
            url:'<?php echo site_url('customer_manage/getCustomerDetails'); ?>',
            method: "post",
            data: {user_id:id},
            dataType: "json",
            cache: false,
            success:function (data) {
                 $('#edit_first_name').val(data.first_name);
                 $('#edit_last_name').val(data.last_name);
                 $('#edit_email').val(data.cust_email);
                 $('#edit_phone').val(data.cust_phone);
                 $('#edit_address').val(data.cust_address);
                 $('#message').html("");
                 $('#edit_user_id').val(data.cust_id);
                 $('#cust_edit_cust_modal').modal('show');
            }
        });
    }

    function onclickUpdateCustProfile(){
        var edit_user_id = document.getElementById("edit_user_id").value;
        var edit_first_name = document.getElementById("edit_first_name").value;
        var edit_last_name = document.getElementById("edit_last_name").value;
        var edit_phone = document.getElementById("edit_phone").value;
        var edit_address = document.getElementById("edit_address").value;


        $.ajax({
            url:'<?php echo site_url('customer_manage/updateCustProfile'); ?>', //the page containing php script
            type: "post", //request type
            data: {edit_user_id : edit_user_id,edit_first_name : edit_first_name,edit_last_name : edit_last_name,edit_phone : edit_phone,edit_address : edit_address},
            cache: false,
            success:function(result){
                $('#cust_edit_cust_modal').modal('hide');
                $('#msg_Modal').modal('show');
                $('#msg_result').html(result);
            }
        });
    }

</script>

</body>
</html>