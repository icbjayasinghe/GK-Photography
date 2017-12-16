<?php
/**
 * Created by PhpStorm.
 * User: Isuru Jayasinghe
 * Date: 12/14/2017
 * Time: 11:30 AM
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
        <h2><b>Join Us</b></h2>
        <hr>

        <!--for checking validation errors-->
        <?php echo validation_errors(); ?>
        <?php echo form_open_multipart('Joinus/Joinususer'); ?>

        <div class="form-row">
            <div class="form-group col-md-12">
                <label for="inputEmail4">Name</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="Name">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-12">
                <label for="inputEmail4">Email</label>
                <input type="email" class="form-control" name="email" id="inputEmail4" placeholder="Email">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-12">
                <label for="inputEmail4">Contact no.</label>
                <input type="number" class="form-control" name="phone" id="phone" placeholder="Contact no.">
            </div>
        </div>

        <div class="form-group col-md-12">
            <label for="inputAddress2">Address</label>
            <input type="text" class="form-control" name="address" id="inputAddress2" placeholder="Address">
        </div>
        <div class="form-row">

            <div class="form-row">
                <div class="form-group col-md-12>
                <label for="inputEmail4">Good at</label>
                <div class="checkbox">

                    <label><input type="checkbox" value="Photographing" name="good_at">Photographing</label>

                    <label><input type="checkbox" value="Videographing" name="good_at">Videographing</label>

                    <label><input type="checkbox" value="Photo_editing" name="good_at">Photo editing</label>

                    <label><input type="checkbox" value="Video_editing" name="good_at" >Video editing</label>

                    <label><input type="checkbox" value="Other" name="good_at">Other</label>


                </div>
                </div>
            <div class="form-group col-md-12">
                <label for="comment">Short discription about your works:</label>
                <textarea class="form-control" rows="5" id="works" name="works" maxlength="200"></textarea>
            </div>
            </div>
        <div class="form-row">
            <div class="form-group col-md-2">
                <label for="inputEmail4">Your CV</label>
                <?php echo form_upload('pdf')?>
<!--                --><?php //echo form_submit('Save','submit', 'class="btn btn-primary"');?>
            </div>
        </div>
<!--        <div class="form-group col-md-12">-->

<!--            <label class="btn btn-default btn-file col-md-2">-->
<!--                Attach your cv --><?php //echo form_upload();?>
<!--<!--                <input type="file" style="display: none;" name="multipleFile[]">-->
<!--            </label>-->
<!--        </div>-->
        </div>

        <button type="submit" class="btn btn-primary col-md-12" name="submit">Submit</button>
    <?php echo form_close(); ?>
    </div>
</div>
