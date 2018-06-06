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
                            <a href="#services_section"><button type="button" class="btn btn-primary">Tell me more</button></a>
                            <a href="#about_us_section"><button type="button" class="btn btn-primary">Who are you?</button></a>
                        </div>
                    </div>
                </div>

                <img class="img-responsive img-rounded" src="../../images/welcome-banner.jpg" alt="welcome-banner" id="welcome-banner-img">

                <div id="services_section" style="margin-bottom: 100px"></div>
                <div class="page-header top-bottom-50-padding" align="center">
                    <h1>What can we do for you?</h1>
                </div>

                <div class="jumbotron slideanim">
                    <div class="row">
                        <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
                            <img class="img-responsive img-rounded index-img" src="../../images/slide/image1.jpg" alt="slide1">
                        </div>
                        <div class="col-xs-6 col-sm-9 col-md-9 col-lg-9">
                            <h2>Engineering</h2>
                            <p>Pre-studies and function desriptions are carefully extracted from the given cases.</p>
                        </div>
                    </div>
                </div>

                <div class="jumbotron slideanim">
                    <div class="row">
                        <div class="col-xs-6 col-sm-9 col-md-9 col-lg-9">
                            <h2>Automation</h2>
                            <p>Through our excellence in electrical and automation we will find the solution most suited for You.</p>
                        </div>
                        <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
                            <img class="img-responsive img-rounded index-img" src="../../images/slide/image4.jpg" alt="slide4">
                        </div>
                    </div>
                </div>

                <div class="jumbotron slideanim">
                    <div class="row">
                        <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
                            <img class="img-responsive img-rounded index-img" src="../../images/slide/image3.jpg" alt="slide3">
                        </div>
                        <div class="col-xs-6 col-sm-9 col-md-9 col-lg-9">
                            <h2>PLC/HMI/SCADA</h2>
                            <p>Services such as programming, software development & design are provided.</p>
                        </div>
                    </div>
                </div>

                <div class="jumbotron slideanim">
                    <div class="row">
                        <div class="col-xs-6 col-sm-9 col-md-9 col-lg-9">
                            <h2>Other services</h2>
                            <p>We provide our customers with continuous service and support.</p>
                        </div>
                        <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
                            <img class="img-responsive img-rounded index-img" src="../../images/ottochef.jpg" alt="slide2">
                        </div>
                    </div>
                </div>

                <div class="slideanim top-bottom-50-padding">
                    <div align="center">
                        <h1>Check out our <a href="services.php">services</a> to read more!</h1>
                    </div>
                </div>

                <div id="about_us_section" style="margin-bottom: 100px"></div>
                <div class="page-header" align="center">
                    <h1>About us</h1>
                </div>

                <div class="row">
                    <div class="col-xs-12 col-md-12 col-lg-6 ">
                        <p>Othmane (Otto) is a certified electric and automation engineer residing in Oxie in the south of
                            Sweden.</p>
                    </div>
                    <div class="col-xs-12 col-md-12 col-lg-6">

                        <p>OttoMaTech specialize in industrial automation and together with our customers we solve industrial
                            applications. We design, construct, program, document, perform commissioning and
                            troubleshooting.</p>

                        <p> We offer customized industrial automation solutions aswell as providing help finding the
                            right equipment, new aswell as used (Machines, lines, etc.) </p>

                        <p> We collaborate with various business cooperation experts in process and food industries.
                            If you are direct or candidate, do not hesitate to contact us to discuss your solution.</p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 ">
                        <img class="img-responsive" src="../../images/otto.jpg" alt="otto">
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                        <img class="img-responsive" src="../../images/general.png" alt="general">
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