<?php
/**
 * Created by PhpStorm.
 * User: Isuru Jayasinghe
 * Date: 12/16/2017
 * Time: 7:37 AM
 */
?>

<!-- Bootstrap core CSS -->

<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<link href="<?php echo base_url(); ?>dist/css/jasny-bootstrap.min.css" rel="stylesheet">
<link href='http://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
<link href="<?php echo base_url(); ?>css/bootstrap.min.css" rel="stylesheet">
<!-- Custom styles for this template -->
<link href="<?php echo base_url(); ?>css/navmenu-reveal.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>css/style.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>css/homestyle.css" rel="stylesheet">

<div id="myCarousel" class="canvas carousel slide background-theme" data-ride="carousel">

    <div class="container col-md-6 my-signup">
        <h2>Make appointment</h2>
        <hr>



        <!--for checking validation errors-->
        <?php echo validation_errors(); ?>

        <!--    use CI form helper for putting customer registration data to db -->
        <?php echo form_open('Administrator/makeAppointment'); ?>


        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">First name</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="name" placeholder="First name" name="fname">
            </div>
        </div>

        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Last name</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="name" placeholder="Last name" name="lname">
            </div>
        </div>

        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
            <div class="col-sm-10">
                <input type="email" class="form-control" id="email" placeholder="Email" name="email">
            </div>
        </div>

        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Phone No.</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="email" placeholder="Phone number" name="phone">
            </div>
        </div>

        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Address</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="name" placeholder="Address" name="address">
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
                <button type="submit" class="btn btn-default">Sign up</button>
            </div>
        </div>

        <?php echo form_close();?>

    </div>
</div>


