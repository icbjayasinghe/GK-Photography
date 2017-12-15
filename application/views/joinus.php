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
    <form>
        <div class="form-row">
            <div class="form-group col-md-12">
                <label for="inputEmail4">Name</label>
                <input type="text" class="form-control" id="name" placeholder="Name">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-12">
                <label for="inputEmail4">Email</label>
                <input type="email" class="form-control" id="inputEmail4" placeholder="Email">
            </div>
        </div>

        <div class="form-group col-md-12">
            <label for="inputAddress2">Address</label>
            <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
        </div>
        <div class="form-row">





            <div class="form-row">
                <div class="form-group col-md-12>
                <label for="inputEmail4">Good at</label>
                <div class="checkbox">

                    <label><input type="checkbox" value="">Photographing</label>

                    <label><input type="checkbox" value="">Videographing</label>

                    <label><input type="checkbox" value="">Photo editing</label>

                    <label><input type="checkbox" value="">Video editing</label>

                    <label><input type="checkbox" value="">Other</label>


                </div>
                </div>
            <div class="form-group col-md-12">
                <label for="comment">Short discription about your works:</label>
                <textarea class="form-control" rows="5" id="comment"></textarea>
            </div>
            </div>
        <div class="form-group col-md-12">
            <label class="btn btn-default btn-file">
                Attach your cv <input type="file" style="display: none;">
            </label>
        </div>
        </div>

        <button type="submit" class="btn btn-primary col-md-12">Submit</button>
    </form>
    </div>
</div>
