


    <link href="<?php echo base_url();?>css/full-slider.css" rel="stylesheet">
    <link href="<?php echo base_url();?>css/Icomoon/style.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>css/animated-masonry-gallery.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/normalize.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/demo.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/component.css" />
    <link href="<?php echo base_url();?>css/lightbox.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>css/gallery-style.css" rel="stylesheet">
    <script type="text/javaScript" src="<?php echo base_url();?>js/modernizr.min.js"></script>

    <div>
        <section id="photostack-3" class="photostack">
            <h1 class="blog-post-title text-center">Gallery of Images</h1>
            <span class="title-divider"></span>

            <div>

                <?php

                $image_list ="";
                $count=0;
                foreach ($images as $row){
                    if ($count==6){
                        break;
                    }
                    $image_list.="<figure>
                                <a href=\"".base_url()."img/uploads/".$row->path."\"  data-lightbox=\"studio2\" class=\"photostack-img\"><img class=\"img-responsive img-portfolio img-hover my-image\" src=\"".base_url()."img/uploads/".$row->path."\" alt=\"gallery image\"/></a>
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
