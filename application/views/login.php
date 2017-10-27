
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

<ul class="nav nav-tabs">
    <li role="presentation" class="active"><a href="#">Sign in</a></li>
    <li role="presentation"><a href="<?php echo base_url('index.php/Welcome/register') ?>">Sign up</a></li>

</ul>

<!--    session for just registered customer-->
    <?php if ($this->session->flashdata('msg')){
        echo "<h3>".$this->session->flashdata('msg')."</h3>";
    }

    ?>

    <!--    session for enter wrong pw or username-->
    <?php if ($this->session->flashdata('errmsg')){
        echo "<h3>".$this->session->flashdata('errmsg')."</h3>";
    }

    ?>

    <!--for checking validation errors-->
    <?php echo validation_errors(); ?>

    <!--    use CI form helper for gettting customer data from db -->
    <?php echo form_open('Login/LoginUser'); ?>

    <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
        <div class="col-sm-10">
            <input type="email" class="form-control" id="inputEmail3" placeholder="Email" name="email">
        </div>
    </div>
    <br> <br>
    <div class="form-group">
        <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
        <div class="col-sm-10">
            <input type="password" class="form-control" id="inputPassword3" placeholder="Password" name="password">
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <div class="checkbox">
                <label>
                    <input type="checkbox"> Remember me
                </label>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-default">Sign in</button>
        </div>
    </div>
<?php echo form_close(); ?>
</div>
</div>