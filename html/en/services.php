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
    <title>OttoMaTech Services</title>
</head>
<body>
<div id="wrap">
    <?php include 'nav.php'; ?>
    <div class="container">
        <div class="row pns" id="first">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
                <h2>We offer a broad selection of services to our customers.</h2>
                <hr>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 ">
                <p class="lead">PLC</p>
                <ul>
                    <li>Siemens</li>
                    <li>Mitsubishi</li>
                    <li>Beijer</li>
                    <li>AllenBradely</li>
                    <li>Beckhoff</li>
                </ul>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                <img class="img-responsive" src="../../images/plc1.JPG" alt="PLC">
            </div>
            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                <img class="img-responsive" src="../../images/plc2.JPG" alt="PLC">
            </div>
        </div>

        <hr>

        <div class="row pns">
            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                <p class="lead">HMI & SCADA</p>
                <ul>
                    <li>E-Designer</li>
                    <li>Win CC Flexible</li>
                    <li>Win CC Scada</li>
                    <li>Beijer IX Panel</li>
                    <li>RS View</li>
                </ul>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                <img class="img-responsive" src="../../images/hmi1.JPG" alt="scada">
            </div>
            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                <img class="img-responsive" src="../../images/hmi2.JPG" alt="scada">
            </div>
        </div>

        <hr>

        <div class="row pns">
            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                <p class="lead">Machine communication</p>
                <ul>
                    <li>PROFIBUS</li>
                    <li>ETHERNET</li>
                    <li>ASI</li>
                    <li>MPI</li>
                </ul>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                <img class="img-responsive" src="../../images/mc1.jpg" alt="mc">
            </div>
            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                <img class="img-responsive" src="../../images/mc2.jpg" alt="mc">
            </div>
        </div>

        <hr>

        <div class="row pns">
            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                <p class="lead">Machine saftey & security</p>
                <ul>
                    <li>Emergency relay</li>
                    <li>SafePLC</li>
                </ul>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                <img class="img-responsive" src="../../images/mss1.bmp" alt="mss">
            </div>
            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                <img class="img-responsive" src="../../images/mss2.bmp" alt="mss">
            </div>
        </div>

        <hr>

        <div class="row pns">
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                <p class="lead">Technical administration</p>
                <ul>
                    <li>Reporting</li>
                    <li>Documentation</li>
                    <li>OPC</li>
                    <li>Database</li>
                    <li>Excel/VBA</li>
                    <li>Manuals</li>
                    <li>Electrical drawings</li>
                </ul>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                <img class="img-responsive" src="../../images/Documentation.png" alt="doc">
            </div>
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                <img class="img-responsive" src="../../images/general.png" alt="doc">
            </div>
        </div>

        <hr>

        <div class="row pns">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <h2>We also offer our assistance with</h2>
                <ul>
                    <li><p class="lead">Automation</p></li>
                    <li><p class="lead">Industrial electricity</p></li>
                    <li><p class="lead">Electrical saftey</p></li>
                    <li><p class="lead">Project & Service</p></li>
                    <li><p class="lead">Training, Coaching & Consulting</p></li>
                </ul>
            </div>
        </div>
    </div>
    <div id="push"></div>
</div>
<?php include '../shared/footer.php'; ?>
</body>
</html>