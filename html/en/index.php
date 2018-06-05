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
        <!-- Egna script -->
        <script src="../../js/nav_set_active.js"></script>
        <title>OttoMaTech Start</title>
    </head>
    <body>
        <div id="wrap">
            <?php include 'nav.php'; ?>
            <div class="container">
                <?php include 'carousel.php'; ?>

                <div class="row">
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <img src="../../images/navlogotransp.png" class="img-responsive">
                    </div>
                    <div class="col-xs-12 col-md-6 col-lg-8">
                        <div class="page-header">
                            <h1>Welcome to OttoMaTech.se!</h1>
                        </div>
                        <h4>OttoMaTech Engineering AB is a technology company that delivers system solutions in industrial
                            automation and service. We assist You in finding tailored industrial automation solution
                            that fit Your needs.</h4>
                    </div>
                </div>

                <br>
                <br>
                <br>

                <div class="jumbotron">
                    <div class="row">
                        <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
                            <img class="img-responsive img-rounded index-img" src="../../images/slide/image1.jpg" alt="slide1">
                        </div>
                        <div class="col-xs-6 col-sm-9 col-md-9 col-lg-9">
                            <p><b>Engineering</b></p>
                            <p>Pre-studies and function desriptions are carefully extracted from the given cases.</p>
                        </div>
                    </div>
                </div>

                <div class="jumbotron">
                    <div class="row">
                        <div class="col-xs-6 col-sm-9 col-md-9 col-lg-9">
                            <p><b>Automation</b></p>
                            <p>Through our excellence in electrical and automation we will find the solution most suited for You.</p>
                        </div>
                        <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
                            <img class="img-responsive img-rounded index-img" src="../../images/slide/image4.jpg" alt="slide4">
                        </div>
                    </div>
                </div>

                <div class="jumbotron">
                    <div class="row">
                        <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
                            <img class="img-responsive img-rounded index-img" src="../../images/slide/image3.jpg" alt="slide3">
                        </div>
                        <div class="col-xs-6 col-sm-9 col-md-9 col-lg-9">
                            <p><b>PLC/HMI/SCADA</b></p>
                            <p>Services such as programming, software development & design are provided.</p>
                        </div>
                    </div>
                </div>

                <div class="jumbotron">
                    <div class="row">
                        <div class="col-xs-6 col-sm-9 col-md-9 col-lg-9">
                            <p><b>Other services</b></p>
                            <p>We provide our customers with continuous service and support.</p>
                        </div>
                        <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
                            <img class="img-responsive img-rounded index-img" src="../../images/ottochef.jpg" alt="slide2">
                        </div>
                    </div>
                </div>



                <div class="page-header">
                    <h1>About OttoMaTech</h1>
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
            </div>
            <div id="push"></div>
        </div>
        <?php include '../shared/footer.php'; ?>
    </body>
</html>