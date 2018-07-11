<!DOCTYPE html>
<html>
    <head lang="en">
        <meta http-equiv="content-type" content="text/html;charset=utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="UTF-8">
        <script src="../../js/jquery-1.11.1.js"></script>
        <!-- Bootstrap -->
        <link href="../../css/bootstrap.min.css" rel="stylesheet">
        <script src="../../js/bootstrap.min.js"></script>
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <!-- Custom stylesheet. Modifikationer till boostraps egna stylesheet finns i filen nedan. -->
        <link rel="stylesheet" type="text/css" href="../../css/style.css">
        <link rel="stylesheet" type="text/css" href="../../css/slide_anim.css">
        <link rel="stylesheet" type="text/css" href="../../css/backtop_arrow.css">
        <!-- Egna script -->
        <script src="../../js/nav_set_active.js"></script>
        <script src="../../js/float-panel.js"></script>
        <script src="../../js/smooth_page_jump.js"></script>
        <title>OttoMaTech Start</title>
    </head>
    <body>
        <div id="wrap">
            <?php include 'nav.php'; ?>
            <div class="container">
                <div id="welcome-banner-container">
                    <div class="row" id="first">
                        <div class="col-lg-4 col-md-12 col-sm-12">
                            <img src="../../images/navlogotransp.png" class="img-responsive">
                        </div>
                        <div class="col-xs-12 col-md-12 col-lg-8">
                            <div class="page-header">
                                <h1 class="slideanim">Welcome to OttoMaTech.se!</h1>
                            </div>
                            <h4>OttoMaTech Engineering AB is a technology company that delivers system solutions in industrial
                                automation and service. We assist You in finding tailored industrial automation solution
                                that fit Your needs.</h4>
                            <a href="#services_section" class="a-style-inherit"><button type="button" class="btn">Tell me more</button></a>
                        </div>
                    </div>
                </div>

                <img class="img-responsive img-rounded" src="../../images/welcome-banner.jpg" alt="welcome-banner">

                <div id="services_section" style="margin-bottom: 100px"></div>
                <div class="page-header top-bottom-50-padding" align="center">
                    <h1>What can we do for you?</h1>
                </div>

                <div class="jumbotron slideanim">
                    <div class="row">
                        <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
                            <img class="img-responsive img-rounded index-img" src="../../images/20180603_070708.jpg" alt="slide1">
                        </div>
                        <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7">
                            <h2>Engineering</h2>
                            <p>Pre-studies and function desriptions are carefully extracted from the given cases.</p>
                        </div>
                    </div>
                </div>

                <div class="jumbotron slideanim">
                    <div class="row">
                        <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7">
                            <h2>Automation</h2>
                            <p>Through our excellence in electrical and automation we will find the solution most suited for You.</p>
                        </div>
                        <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
                            <img class="img-responsive img-rounded index-img" src="../../images/20180603_070447.jpg" alt="slide4">
                        </div>
                    </div>
                </div>

                <div class="jumbotron slideanim">
                    <div class="row">
                        <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
                            <img class="img-responsive img-rounded index-img" src="../../images/image3.jpg" alt="slide3">
                        </div>
                        <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7">
                            <h2>PLC/HMI/SCADA</h2>
                            <p>Services such as programming, software development & design are provided.</p>
                        </div>
                    </div>
                </div>

                <div class="jumbotron slideanim">
                    <div class="row">
                        <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7">
                            <h2>Other services</h2>
                            <p>We provide our customers with continuous service and support.</p>
                        </div>
                        <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5 ">
                            <img class="img-responsive img-rounded index-img" src="../../images/20180603_070900.jpg" alt="slide2">
                        </div>
                    </div>
                </div>

                <div class="slideanim top-bottom-50-padding">
                    <div align="center">
                        <h1>Check out our <a href="services.php">services</a> to read more!</h1>
                    </div>
                </div>

                <br>
                <br>
                <br>
                <br>
                <div id="backtop">&#9650;</div>
            </div>
            <div id="push"></div>
        </div>
        <?php include '../shared/footer.php'; ?>
    </body>
</html>