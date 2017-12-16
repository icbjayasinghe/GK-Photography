<?php
/**
 * Created by PhpStorm.
 * User: Isuru Jayasinghe
 * Date: 12/16/2017
 * Time: 7:37 AM
 */
?>

<!-- Bootstrap core CSS -->



    <div class="container col-md-12">
        <h2>User register</h2>
        <hr>



        <!--for checking validation errors-->
        <?php echo validation_errors(); ?>

        <!--    use CI form helper for putting customer registration data to db -->
        <?php echo form_open('Register/RegisterUser', 'id="registerUser"'); ?>


        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">First name</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="fname" placeholder="First name" name="fname"><span id="fname_error"></span>
            </div>
        </div>

        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Last name</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="lname" placeholder="Last name" name="lname"><span id="lname_error"></span>
            </div>
        </div>

        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
            <div class="col-sm-10">
                <input type="email" class="form-control" id="email" placeholder="Email" name="email"><span id="email_error"></span>
            </div>
        </div>

        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Phone No.</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="phone" placeholder="Phone number" name="phone"><span id="phone_error"></span>
            </div>
        </div>

        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Address</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="address" placeholder="Address" name="address"><span id="address_error"></span>
                <input type="hidden" name="password" value="gk123" id="password">
                <input type="hidden" name="cpassword" value="gk123" id="cpassword">
                <input type="hidden" name="flag" value=1 id="flag">
            </div>
        </div>



        <!--<div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <div class="checkbox">
                    <label>
                        <input type="checkbox"> Accept terms and conditions
                    </label>
                </div>
            </div>
        </div>-->

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default">Register</button>
            </div>
        </div>

        <?php echo form_close();?>

    </div>
</div>
<script>
    function submitRegister(value) {
        //alert("asd0");
        var fname=document.getElementById('fname').value;
        var lname=document.getElementById('lname').value;
        var email=document.getElementById('email').value;
        var phone=document.getElementById('phone').value;
        var address=document.getElementById('address').value;
        var password=document.getElementById('password').value;
        var cpassword=document.getElementById('cpassword').value;
        var flag=document.getElementById('flag').value;

        //alert(fname);
        //$.ajax({
        //    url:'<?php //echo site_url('Register/RegisterUser'); ?>//',
        //    method: "post",
        //    data: {fname:fname,lname:lname,email:email,phone:phone,address:address,password:password,cpassword:cpassword,flag:flag},
        //    success: function( data ) {
        //        //alert(data);
        //
        //        //$('#content').html(data);
        //       // $('#appointment_table_results').html(data);
        //    }
        //});
    }


</script>

<script>
    $(function () {
        $("#fname_error").hide();
        $("#lname_error").hide();
        $("#email_error").hide();
        $("#phone_error").hide();
        $("#address_error").hide();

        var fname_err= false;
        var lname_err= false;
        var email_err= false;
        var phone_err= false;
        var address_err= false;

        $("#fname").focusout(function () {
            check_fname();

        });
        $("#lname").focusout(function () {
            check_lname();
        });
        $("#email").focusout(function () {
            check_email();
        });
        $("#phone").focusout(function () {
            check_phone();
        });
        $("#address").focusout(function () {
            check_address();
        });
        
        function check_fname() {
            var fname_length=$("#fname").val().length;
            if(fname_length==0){
                $("#fname_error").html("Enter first name");
                $("#fname_error").show();
                fname_err=true;
            }
            else{
                $("#fname_error").hide();
            }
        };
        function check_lname() {
            var lname_length=$("#lname").val().length;
            if(lname_length==0){
                $("#lname_error").html("Enter last name");
                $("#lname_error").show();
                lname_err=true;
            }
            else{
                $("#lname_error").hide();
            }

        };
        function check_email() {
            var pattern= new RegExp(/^[+a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i);
            if(pattern.test($("#email").val())) {
                $("#email_error").hide();
            } else {
                $("#email_error").html("Invalid email address");
                $("#email_error").show();
                email_err = true;
            }



        };
        function check_phone() {
            var phone_length=$("#phone").val().length;
            if(phone_length==10){
                $("#phone_error").hide();
            }
            else{
                $("#phone_error").html("Wrong phone number");
                $("#phone_error").show();
                phone_err= true;
            }

        };
        function check_address() {
            var address_length=$("#address").val().length;
            if(address_length==0){
                $("#address_error").html("Enter first name");
                $("#address_error").show();
                address_err=true;
            }
            else{
                $("#address_error").hide();
            }

        };
        $("#registerUser").submit(function() {

            var fname_err= false;
            var lname_err= false;
            var email_err= false;
            var phone_err= false;
            var address_err= false;

            check_fname();
            check_lname();
            check_phone();
            check_address();
            check_email();

            if(fname_err==false && lname_err==false && email_err==false && phone_err==false && address_err==false) {
                return true;
            } else {
                return false;
            }

        });



    })
</script>

