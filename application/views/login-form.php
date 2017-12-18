

    <link rel="icon" href="<?php echo base_url(); ?>img/bg.png">
    <title>CLiMaX</title>


    <link href="<?php echo base_url(); ?>assets/css/animate.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/login_register.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/forms.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/buttons.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>css/login.css" rel="stylesheet">
    <script src="<?php echo base_url(); ?>assets/js/custom.js"></script>


<div  class="canvas background-theme">
    <!-- Fixed navbar -->
    <nav class="navbar navbar-transparent" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">

                <a class="navbar-brand" id="#login_logo"><h2>GK - Photography</h2></a>
            </div>
        </div>
    </nav>
    <div class="wrapper">
        <div class="parallax filter-black">
        <div class="parallax-image"></div>
        <div class="small-info">

            <div class="col-sm-10 col-sm-push-1 col-md-8 col-md-push-2 col-lg-6 col-lg-push-3">
                <div class="card-group animated flipInX">
                    <div class="card">
                        <div class="card-block">
                            <div class="center">
                                <h4 class="m-b-0"><span class="icon-text">Login</span></h4>
                                <p class="text-muted">Access your account</p>
                            </div>


                            <!--   session for just registered customer-->
                            <?php if ($this->session->flashdata('msg')){
                                echo "<p>".$this->session->flashdata('msg')."</p>";
                            }

                            ?>

                            <!--    session for enter wrong email-->
                            <?php if ($this->session->flashdata('errmsg')){
                                echo "<p>".$this->session->flashdata('errmsg')."</p>";
                            }

                            ?>

                            <!--for checking validation errors-->
                            <?php echo validation_errors(); ?>

                            <!--    use CI form helper for gettting customer data from db -->
                            <?php echo form_open('Login/LoginUser'); ?>


                            <form id="login-form">
                                <div class="form-group">
                                    <input type="email" class="form-control" id="inputEmail3" placeholder="Email" name="email" required>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" id="inputPassword3" placeholder="Password" name="password">
                                    <a href="<?php echo base_url();?>index.php/welcome/contact" class="pull-xs-right">
                                        <small><i>Forgot? Please contact GK-Photography</i></small>
                                    </a>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="center">
                                    <button type="submit" class="btn btn-azure">Login</button>
                                </div>
                            </form>
                            <?php echo form_close(); ?>


                        </div>
                    </div>

                    <div class="card">

                        <div class="card-block center">
                            <h4 class="m-b-0">
                                <span class="icon-text">Sign Up</span>
                            </h4>
                            <p class="text-muted">Create a new account</p>

                            <!--for checking validation errors-->
                            <?php echo validation_errors(); ?>

                            <!--    use CI form helper for putting customer registration data to db -->
                            <?php echo form_open('Register/RegisterUser'); ?>

                            <form id="register-form">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="name" placeholder="First name" name="fname" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="name" placeholder="Last name" name="lname" required>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control" id="email" placeholder="Email" name="email" required>
                                </div>
                                <div class="form-group">
                                    <input type="number" class="form-control" id="email" placeholder="Phone number" name="phone" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="name" placeholder="Address" name="address" required>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" id="password" placeholder="Password" name="password" required>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" id="cpassword" placeholder="Confirm Password" name="cpassword" required>
                                </div>
                                <button type="submit" class="btn btn-azure">Register</button>
                            </form>
                            <?php echo form_close();?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>



</div>
    <footer class="footer">

    </footer>
    <script type="text/javascript">
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','../../www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-49755460-1', 'auto', {'allowLinker': true});
        ga('require', 'linker');
        ga('linker:autoLink', ['bootdey.com','www.bootdey.com','demos.bootdey.com'] );
        ga('send', 'pageview');
    </script>

    <script type="text/javascript" src="../js/login.js"></script>
</div>
</body>

</html>
