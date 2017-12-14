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
        <hr>
        <h2><b>Join Us</b></h2>
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
            <div class="form-group col-md-6">
                <label for="inputCity">City</label>
                <input type="text" class="form-control" id="inputCity">
            </div>
            <div class="form-group col-md-4">
                <label for="inputState">State</label>
                <select id="inputState" class="form-control">
                    <option selected>Choose...</option>
                    <option>...</option>
                </select>
            </div>
            <div class="form-group col-md-2">
                <label for="inputZip">Zip</label>
                <input type="text" class="form-control" id="inputZip">
            </div>
            <div class="form-group col-md-12">
                <label for="telephone">Phone number</label>
                <input type="number" class="form-control" id="inputZip">
            </div>
            <div class="checkbox">
                <label><input type="checkbox" value="">Option 1</label>
            </div>
            <div class="checkbox">
                <label><input type="checkbox" value="">Option 2</label>
            </div>
            <div class="checkbox disabled">
                <label><input type="checkbox" value="" disabled>Option 3</label>
            </div>
        </div>
        <div class="form-group">
            <div class="form-check">
                <label class="form-check-label">
                    <input class="form-check-input" type="checkbox"> Check me out
                </label>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Sign in</button>
    </form>
    </div>
</div>
