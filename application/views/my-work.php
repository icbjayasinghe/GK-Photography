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
    <link href='http://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
    <link href="<?php echo base_url();?>dist/css/jasny-bootstrap.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
    <link href="<?php echo base_url();?>css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo base_url();?>css/navmenu-reveal.css" rel="stylesheet">
    <link href="<?php echo base_url();?>css/style.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/normalize.css" />
    <link href="<?php echo base_url();?>css/homestyle.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.1/baguetteBox.min.css">
    <link href="<?php echo base_url();?>css/gallery-style.css" rel="stylesheet">

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
        <li><a href="<?php echo base_url();?>index.php/welcome/contact">Contact</a></li>
    </ul>
    <a class="navmenu-brand" href="#"><img src="<?php echo base_url();?>img/logo-original.png" width="160"></a>
    <div class="social">
        <a href="#"><i class="fa fa-twitter"></i></a>
        <a href="#"><i class="fa fa-facebook"></i></a>
        <a href="#"><i class="fa fa-instagram"></i></a>
        <a href="#"><i class="fa fa-pinterest-p"></i></a>
        <a href="#"><i class="fa fa-google-plus"></i></a>
        <a href="#"><i class="fa fa-skype"></i></a>
    </div>
    <div class="copyright-text">©Copyright <a href="https://themewagon.com/"> GK Photography</a> 2017 </div>
</div>

<div class="canvas gallery"><br>
    <h1 class="blog-post-title text-center">My Work</h1>
    <span class="title-divider"></span>


    <div class="container gallery-container">

        <div class="tz-gallery">

            <div class="row">

                <?php

                $image_list ="";
                foreach ($images as $row) {
                    $image_list.="<div class=\"col-sm-12 col-md-4\">
                                        <a class=\"lightbox\" href=\"".base_url()."img/uploads/".$row->path."\">
                                            <img class=\"img-responsive img-portfolio img-hover\" src=\"".base_url()."img/uploads/".$row->path."\" alt=\"Bridge\">
                                        </a>
                                   </div>";
                    }
                echo $image_list;
                ?>

            </div>

        </div>

    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.1/baguetteBox.min.js"></script>
    <script>
        baguetteBox.run('.tz-gallery');
    </script>

    <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <section>
        <div class="container gal-container">
            <div class="col-md-8 col-sm-12 co-xs-12 gal-item">
                <div class="box">
                    <a href="#" data-toggle="modal" data-target="#1">
                        <img src="http://nabeel.co.in/files/bootsnipp/gallery/1.jpg">
                    </a>
                    <div class="modal fade" id="1" tabindex="-1" role="dialog">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                <div class="modal-body">
                                    <img src="http://nabeel.co.in/files/bootsnipp/gallery/1.jpg">
                                </div>
                                <div class="col-md-12 description">
                                    <h4>This is the first one on my Gallery</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 co-xs-12 gal-item">
                <div class="box">
                    <a href="#" data-toggle="modal" data-target="#2">
                        <img src="http://nabeel.co.in/files/bootsnipp/gallery/2.jpg">
                    </a>
                    <div class="modal fade" id="2" tabindex="-1" role="dialog">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                <div class="modal-body">
                                    <img src="http://nabeel.co.in/files/bootsnipp/gallery/2.jpg">
                                </div>
                                <div class="col-md-12 description">
                                    <h4>This is the second one on my Gallery</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 co-xs-12 gal-item">
                <div class="box">
                    <a href="#" data-toggle="modal" data-target="#3">
                        <img src="http://nabeel.co.in/files/bootsnipp/gallery/3.jpg">
                    </a>
                    <div class="modal fade" id="3" tabindex="-1" role="dialog">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                <div class="modal-body">
                                    <img src="http://nabeel.co.in/files/bootsnipp/gallery/3.jpg">
                                </div>
                                <div class="col-md-12 description">
                                    <h4>This is the third one on my Gallery</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 co-xs-12 gal-item">
                <div class="box">
                    <a href="#" data-toggle="modal" data-target="#4">
                        <img src="http://nabeel.co.in/files/bootsnipp/gallery/4.jpg">
                    </a>
                    <div class="modal fade" id="4" tabindex="-1" role="dialog">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                <div class="modal-body">
                                    <img src="http://nabeel.co.in/files/bootsnipp/gallery/4.jpg">
                                </div>
                                <div class="col-md-12 description">
                                    <h4>This is the fourth one on my Gallery</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 co-xs-12 gal-item">
                <div class="box">
                    <a href="#" data-toggle="modal" data-target="#5">
                        <img src="http://nabeel.co.in/files/bootsnipp/gallery/5.jpg">
                    </a>
                    <div class="modal fade" id="5" tabindex="-1" role="dialog">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                <div class="modal-body">
                                    <img src="http://nabeel.co.in/files/bootsnipp/gallery/5.jpg">
                                </div>
                                <div class="col-md-12 description">
                                    <h4>This is the fifth one on my Gallery</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 co-xs-12 gal-item">
                <div class="box">
                    <a href="#" data-toggle="modal" data-target="#6">
                        <img src="http://nabeel.co.in/files/bootsnipp/gallery/6.jpg">
                    </a>
                    <div class="modal fade" id="6" tabindex="-1" role="dialog">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                <div class="modal-body">
                                    <img src="http://nabeel.co.in/files/bootsnipp/gallery/6.jpg">
                                </div>
                                <div class="col-md-12 description">
                                    <h4>This is the sixth one on my Gallery</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 co-xs-12 gal-item">
                <div class="box">
                    <a href="#" data-toggle="modal" data-target="#7">
                        <img src="http://nabeel.co.in/files/bootsnipp/gallery/7.jpg">
                    </a>
                    <div class="modal fade" id="7" tabindex="-1" role="dialog">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                <div class="modal-body">
                                    <img src="http://nabeel.co.in/files/bootsnipp/gallery/7.jpg">
                                </div>
                                <div class="col-md-12 description">
                                    <h4>This is the seventh one on my Gallery</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 co-xs-12 gal-item">
                <div class="box">
                    <a href="#" data-toggle="modal" data-target="#8">
                        <img src="http://nabeel.co.in/files/bootsnipp/gallery/8.jpg">
                    </a>
                    <div class="modal fade" id="8" tabindex="-1" role="dialog">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                <div class="modal-body">
                                    <img src="http://nabeel.co.in/files/bootsnipp/gallery/8.jpg">
                                </div>
                                <div class="col-md-12 description">
                                    <h4>This is the eighth one on my Gallery</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 co-xs-12 gal-item">
                <div class="box">
                    <a href="#" data-toggle="modal" data-target="#9">
                        <img src="http://nabeel.co.in/files/bootsnipp/gallery/9.jpg">
                    </a>
                    <div class="modal fade" id="9" tabindex="-1" role="dialog">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                <div class="modal-body">
                                    <img src="http://nabeel.co.in/files/bootsnipp/gallery/9.jpg">
                                </div>
                                <div class="col-md-12 description">
                                    <h4>This is the ninth one on my Gallery</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8 col-sm-12 co-xs-12 gal-item">
                <div class="box">
                    <a href="#" data-toggle="modal" data-target="#10">
                        <img src="http://nabeel.co.in/files/bootsnipp/gallery/10.jpg">
                    </a>
                    <div class="modal fade" id="10" tabindex="-1" role="dialog">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                <div class="modal-body">
                                    <img src="http://nabeel.co.in/files/bootsnipp/gallery/10.jpg">
                                </div>
                                <div class="col-md-12 description">
                                    <h4>This is the tenth one on my Gallery</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 co-xs-12 gal-item">
                <div class="box">
                    <a href="#" data-toggle="modal" data-target="#11">
                        <img src="http://nabeel.co.in/files/bootsnipp/gallery/11.jpg">
                    </a>
                    <div class="modal fade" id="11" tabindex="-1" role="dialog">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                <div class="modal-body">
                                    <img src="http://nabeel.co.in/files/bootsnipp/gallery/11.jpg">
                                </div>
                                <div class="col-md-12 description">
                                    <h4>This is the leventh one on my Gallery</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 co-xs-12 gal-item">
                <div class="box">
                    <a href="#" data-toggle="modal" data-target="#12">
                        <img src="http://nabeel.co.in/files/bootsnipp/gallery/12.jpg">
                    </a>
                    <div class="modal fade" id="12" tabindex="-1" role="dialog">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                <div class="modal-body">
                                    <img src="http://nabeel.co.in/files/bootsnipp/gallery/12.jpg">
                                </div>
                                <div class="col-md-12 description">
                                    <h4>This is the 12th one on my Gallery</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 co-xs-12 gal-item">
                <div class="box">
                    <a href="#" data-toggle="modal" data-target="#13">
                        <img src="http://nabeel.co.in/files/bootsnipp/gallery/13.jpg">
                    </a>
                    <div class="modal fade" id="13" tabindex="-1" role="dialog">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                <div class="modal-body">
                                    <img src="http://nabeel.co.in/files/bootsnipp/gallery/13.jpg">
                                </div>
                                <div class="col-md-12 description">
                                    <h4>This is the 13th one on my Gallery</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 co-xs-12 gal-item">
                <div class="box">
                    <a href="#" data-toggle="modal" data-target="#14">
                        <img src="http://nabeel.co.in/files/bootsnipp/gallery/14.jpg">
                    </a>
                    <div class="modal fade" id="14" tabindex="-1" role="dialog">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                <div class="modal-body">
                                    <img src="http://nabeel.co.in/files/bootsnipp/gallery/14.jpg">
                                </div>
                                <div class="col-md-12 description">
                                    <h4>This is the 14th one on my Gallery</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 co-xs-12 gal-item">
                <div class="box">
                    <a href="#" data-toggle="modal" data-target="#15">
                        <img src="http://nabeel.co.in/files/bootsnipp/gallery/15.jpg">
                    </a>
                    <div class="modal fade" id="15" tabindex="-1" role="dialog">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                <div class="modal-body">
                                    <img src="http://nabeel.co.in/files/bootsnipp/gallery/15.jpg">
                                </div>
                                <div class="col-md-12 description">
                                    <h4>This is the 15th one on my Gallery</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 co-xs-12 gal-item">
                <div class="box">
                    <a href="#" data-toggle="modal" data-target="#16">
                        <img src="http://nabeel.co.in/files/bootsnipp/gallery/16.jpg">
                    </a>
                    <div class="modal fade" id="16" tabindex="-1" role="dialog">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                <div class="modal-body">
                                    <img src="http://nabeel.co.in/files/bootsnipp/gallery/16.jpg">
                                </div>
                                <div class="col-md-12 description">
                                    <h4>This is the 16th one on my Gallery</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <footer>
        <div class="container">
            <div class="col-md-10 col-md-offset-1 text-center">

                <h6>Coded with <i class="fa fa-heart red"></i> by <a href="http://www.nabeel.co.in" target="_blank">Nabeel Kondotty</a></h6>
            </div>
        </div>
    </footer>
-->

</div>



<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->

<script type="text/javascript" src="<?php echo base_url();?>js/jquery.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/jquery-ui-1.10.4.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js">
</script>
<script type="text/javascript" src="<?php echo base_url();?>js/isotope.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/animated-masonry-gallery.js"></script>
<script src="<?php echo base_url();?>dist/js/jasny-bootstrap.min.js"></script>
<script src="<?php echo base_url();?>js/classie.js"></script>
<script src="<?php echo base_url();?>js/photostack.js"></script>
<script src="<?php echo base_url();?>js/main.js"></script>
<script src="<?php echo base_url();?>js/lightbox.js"></script>
</body>
</html>
