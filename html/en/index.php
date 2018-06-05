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
            <div class="col-xs-12 col-md-12 col-lg-6 ">
                <h2>Welcome to OttoMaTech.se</h2>
                <hr>

                <p>OttoMaTech Engineering AB is a technology company that delivers system solutions in industrial
                    automation and service. We assist You in finding tailored industrial automation solution
                    that fit Your needs.</p>
                <ul>
                    <li>Automation.</li>
                    <p>Through our excellence in electrical and automation we will find the solution most suited for You.</p>
                    <li>PLC/HMI/SCADA</li>
                    <p>Services such as programming, software development & design are provided.
                    </p>
                    <li>Engineering</li>
                    <p>Pre-studies and function desriptions are carefully extracted from the given cases.</p>
                    <li>Other services</li>
                    <p>We provide our customers with continuous service and support.</p>
                </ul>
            </div>
            <div class="col-lg-6 col-md-12 col-sm-12">
                <img src="../../images/navlogotransp.png" class="img-responsive">
            </div>
        </div>
        <br>
        <br>
        <br>

        <div class="row">
            <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
                <img class="img-responsive img-circle index-img" src="../../images/slide/image1.jpg" alt="slide1">
            </div>
            <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
                <img class="img-responsive img-circle index-img" src="../../images/ottochef.jpg" alt="slide2">
            </div>
            <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
                <img class="img-responsive img-circle index-img" src="../../images/slide/image3.jpg" alt="slide3">
            </div>
            <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
                <img class="img-responsive img-circle index-img" src="../../images/slide/image4.jpg" alt="slide4">
            </div>
        </div>
        <br>
        <br>
    </div>
    <div id="push"></div>
</div>
<?php include 'footer.php'; ?>
</body>
</html>