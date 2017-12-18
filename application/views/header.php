<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../../assets/ico/favicon.png">

    <title>GK Photography</title>

    <!-- Bootstrap core CSS -->

    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link href="<?php echo base_url(); ?>dist/css/jasny-bootstrap.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
    <link href="<?php echo base_url(); ?>css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="<?php echo base_url(); ?>css/navmenu-reveal.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>css/style.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>css/homestyle.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>css/ninja-slider.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>css/navbar-style.css" rel="stylesheet">
    <!-- <link href="css/full-slider.css" rel="stylesheet"> -->


    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

<div class="bar">
    <button type="button" class="navbar-toggle" data-toggle="offcanvas" data-recalc="false" data-target=".navmenu" data-canvas=".canvas">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </button>
</div>

<div class="navmenu navmenu-default navmenu-fixed-left">

    <ul class="nav navmenu-nav">
        <li><a href="<?php echo base_url();?>index.php/welcome/index">Home</a></li>
        <!-- <li><a href="<?php echo base_url();?>index.php/welcome/works">Works</a></li> -->
        <li><a href="<?php echo base_url();?>index.php/welcome/gallery">Gallery</a></li>
        <li><a href="<?php echo base_url();?>index.php/welcome/mywork">My Work</a></li>
        <!-- <li><a href="<?php echo base_url();?>index.php/welcome/blog">Blog</a></li> -->
        <li><a href="<?php echo base_url();?>index.php/welcome/joinus">Join us</a></li>
        <li><a href="<?php echo base_url();?>index.php/welcome/contact">Contact</a></li>

    </ul>
    <a class="navmenu-brand" href="#"><img src="<?php echo base_url();?>img/logo-original.png" width="160"></a>
    <div class="social">
        <a href="#"><i class="fa fa-twitter"></i></a>
        <a href="https://www.facebook.com/gkphotographies/"><i class="fa fa-facebook"></i></a>
        <a href="#"><i class="fa fa-instagram"></i></a>
        <a href="#"><i class="fa fa-pinterest-p"></i></a>
        <a href="#"><i class="fa fa-google-plus"></i></a>
        <a href="#"><i class="fa fa-skype"></i></a>
    </div>
    <div class="copyright-text">©Copyright <a href="https://themewagon.com/"> GK Photography</a> 2017 </div>
</div>

<div class="canvas col-md-12 background-theme">
    <div class="navbar navbar-default my-navbar"  style="margin: auto; max-height: 120%" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <?php if (($this->session->userdata('loggedin')) AND ($this->session->userdata('$type'))=='Administrator'): ?>
                <a href="<?php echo base_url('index.php/users/adminHome')?>" class="navbar-brand">GK - Photography   <span class="glyphicon glyphicon-home"></span> </a>
                <?php elseif (($this->session->userdata('loggedin')) AND ($this->session->userdata('$type'))=='Customer'): ?>
                <a href="<?php echo base_url('index.php/users/customerHome')?>" class="navbar-brand">GK - Photography   <span class="glyphicon glyphicon-home"></span></a>
                <?php else: ?>
                    <a href="#" class="navbar-brand">GK - Photography</a>
                <?php endif; ?>
            </div>
            <div class="collapse navbar-collapse">

                <ul class="nav navbar-nav navbar-right username">
                    <?php if (($this->session->userdata('loggedin'))): ?>
                    <li class="dropdown username">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <span class="glyphicon glyphicon-user"></span>

                            <strong><?php echo $this->session->userdata('$f_name')." ".$this->session->userdata('$l_name')?></strong>
                            <span class="glyphicon glyphicon-chevron-down"></span>
                        </a>
                        <ul class="dropdown-menu background-theme">
                            <li>
                                <div class="navbar-login">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <p class="text-center">
                                                <img src="<?php echo base_url()?>img/logo-original.png" class="avatar profile-image"  alt="avatar">
                                            </p>
                                        </div>
                                        <div class="col-lg-8">
                                            <p class="text-left"><strong><?php echo $this->session->userdata('$f_name')." ".$this->session->userdata('$l_name')?></strong></p>
                                            <p class="text-left small"><?php echo $this->session->userdata('$email')?></p>
                                            <p class="text-left">
                                                <?php if (($this->session->userdata('loggedin')) AND ($this->session->userdata('$type'))=='Administrator'): ?>
                                                <a id="adminEdit" href="#" class="btn btn-primary btn-block btn-sm" value="<? php echo $this->session->userdata('$id'); ?>" onclick="loadAdminProfile()">Edit Profile</a>
                                                <?php elseif (($this->session->userdata('loggedin')) AND ($this->session->userdata('$type'))=='Customer'): ?>
                                                <a href="#" class="btn btn-primary btn-block btn-sm">Edit Profile</a>
                                                <?php else: ?>
                                                    <a href="#" class="btn btn-primary btn-block btn-sm">Edit Profile</a>
                                                <?php endif; ?>
                                                
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <div class="navbar-login navbar-login-session">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <p>
                                                <a href="<?php echo base_url('index.php/Login/LogoutUser')?>" class="btn btn-danger btn-block">Log Out</a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <?php else: ?>
                    <li class="dropdown">
                        <a href="<?php echo base_url('index.php/Login/LoginUser')?>" class="dropdown-toggle username">
                            <span class="glyphicon glyphicon-lock"></span>
                            <strong>Log In</strong>
                        </a>
                    </li>
                    <?php endif; ?>
                </ul>



            </div>
        </div>
    </div>

    <script type="text/javascript">
        
    </script>