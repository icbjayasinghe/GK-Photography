<?php require_once '../model/Database.php' ?>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <link rel="icon" href="img/favicon.png">
    <title>CLiMaX</title>
    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../font-awesome.4.6.1/css/font-awesome.min.css" rel="stylesheet">
    <link href="../assets/css/animate.min.css" rel="stylesheet">
    <link href="../assets/css/timeline.css" rel="stylesheet">
    <link href="../assets/css/login_register.css" rel="stylesheet">
    <link href="../assets/css/forms.css" rel="stylesheet">
    <link href="../assets/css/buttons.css" rel="stylesheet">
    <link href="../css/login.css" rel="stylesheet">
    <script src="../assets/js/jquery.1.11.1.min.js"></script>
    <script src=../js/bootstrap.min.js"></script>
    <script src="../assets/js/custom.js"></script>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

<!-- Fixed navbar -->
<nav class="navbar navbar-fixed-top navbar-transparent" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button id="menu-toggle" type="button" class="navbar-toggle">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar bar1"></span>
                <span class="icon-bar bar2"></span>
                <span class="icon-bar bar3"></span>
            </button>
            <a class="navbar-brand" href="profile.html" id="#login_logo"><h1 style="font-size: 50px;">CLiMaX</h1></a>
        </div>
    </div>
</nav>
<div class="wrapper">

    <div class="parallax filter-black">
        <div class="parallax-image"></div>
        <div class="small-info">

            <div class="col-sm-10 col-sm-push-1 col-md-6 col-md-push-3 col-lg-6 col-lg-push-3">
                <div class="card-group animated flipInX">
                    <div class="card">
                        <div class="card-block">
                            <div class="center">
                                <h4 class="m-b-0"><span class="icon-text">Login</span></h4>
                                <p class="text-muted">Access your account</p>
                            </div>
                            <form id="login-form">
                                <div class="form-group">
                                    <input id="login_username" class="form-control" type="text" placeholder="Email" required>
                                </div>
                                <div class="form-group">
                                    <input id="login_password" class="form-control" type="password" placeholder="Password" required>
                                    <a href="#" class="pull-xs-right">
                                        <small>Forgot?</small>
                                    </a>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="center">
                                    <button type="submit" class="btn  btn-azure">Login</button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="card">

                        <div class="card-block center">
                            <h4 class="m-b-0">
                                <span class="icon-text">Sign Up</span>
                            </h4>
                            <p class="text-muted">Create a new account</p>
                            <form id="register-form">
                                <div class="form-group">
                                    <input id="name" type="text" class="form-control" placeholder="Full Name" id>
                                </div>
                                <div class="form-group">
                                    <input id="email" type="email" class="form-control" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <input id="password" type="password" class="form-control" placeholder="Password">
                                </div>
                                <div class="form-group">
                                    <input id="cpassword" type="password" class="form-control" placeholder="Confirm Password">
                                </div>
                                <button type="submit" class="btn btn-azure">Register</button>
                            </form>
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

<!-- Mirrored from demos.bootdey.com/dayday/ by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 12 Sep 2017 11:09:06 GMT -->
</html>

<!-- model to display dialog -->
<div id="msg_Modal" class="modal fade text-center">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                </button>
                <h3 class="modal-title">Message</h3>
            </div>
            <div class="modal-body">
                <div id="msg_result">

                </div>
            </div>
        </div>
    </div>
</div>

