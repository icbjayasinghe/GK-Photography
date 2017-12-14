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
    <link href="<?php echo base_url();?>dist/css/jasny-bootstrap.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
    <link href="<?php echo base_url();?>css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo base_url();?>css/navmenu-reveal.css" rel="stylesheet">
    <link href="<?php echo base_url();?>css/style.css" rel="stylesheet">
    <link href="<?php echo base_url();?>css/full-slider.css" rel="stylesheet">
    <link href="<?php echo base_url();?>css/Icomoon/style.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>css/animated-masonry-gallery.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/normalize.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/demo.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/component.css" />
    <link href="<?php echo base_url();?>css/lightbox.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>css/homestyle.css" rel="stylesheet">
    <script type="text/javaScript" src="<?php echo base_url();?>js/modernizr.min.js"></script>

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
    <h1 class="blog-post-title text-center">Gallery of Images</h1>
    <span class="title-divider"></span>
    </section>
    <section id="photostack-3" class="photostack">
        <div>

            <?php

            $image_list ="";
            $count=0;
            foreach ($images as $row){
                if ($count==6){
                    break;
                }
                $image_list.="<figure>
                                <a href=\"".base_url()."img/uploads/".$row->path."\"  data-lightbox=\"studio2\" class=\"photostack-img\"><img class=\"img-responsive img-portfolio img-hover\" src=\"".base_url()."img/uploads/".$row->path."\" alt=\"gallery image\"/></a>
                                <figcaption>
                                    <h2 class=\"photostack-title\">Speed Racer</h2>
                                    <div class=\"photostack-back\">
                                        <p>Here he comes Here comes Speed Racer. He's a demon on wheels. Wouldn't you like to get away? Sometimes you want to go where everybody knows <span>the</span> your name. And they're always glad you came! </p>
                                    </div>
                                </figcaption>
                                </figure>";
                $count+=1;
            }
            /*foreach ($images as $row) {
                $image_list.="<div class=\"col-sm-12 col-md-4\">
                                        <a class=\"lightbox\" href=\"".base_url()."img/uploads/".$row->path."\">
                                            <img class=\"img-responsive img-portfolio img-hover\" src=\"".base_url()."img/uploads/".$row->path."\" alt=\"Bridge\">
                                        </a>
                                   </div>";
            }*/
            echo $image_list;
            ?>

        </div>
    </section>
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
