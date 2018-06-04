<?php
session_start();
session_unset();
session_destroy();
?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta http-equiv="content-type" content="text/html;charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
    <script src="../js/jquery-1.11.1.js"></script>
    <!-- Bootstrap -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <script src="../js/bootstrap.min.js"></script>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- Custom stylesheet. Modifikationer till boostraps egna stylesheet finns i filen nedan. -->
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" href="../css/signin.css">
    <!-- Egna script -->
    <title>OttoMaTech Logga Ut</title>
</head>
<body>
<div id="wrap">
    <?php include 'nav.php'; ?>
    <div class="container">

        <div class="row" id="first">
            <h1 class="text-center">Tack för besöket!</h1>

            <div class="col-lg-4 col-lg-offset-4 col-md-4 col-md-offset-4 col-sm-4 col-sm-offset-4 col-xs-6 col-xs-offset-3">
                <img class="img-responsive" src="../images/navlogotransp.png">
            </div>
        </div>
        <div class="row">
            <h5 class="text-center"><a href="../index.php">Tryck här för att komma tillbaka till startsidan.</a></h5>
        </div>

    </div>
    <div id="push"></div>
</div>
</body>
<?php include '../html/sv/footer.php'; ?>
</html>