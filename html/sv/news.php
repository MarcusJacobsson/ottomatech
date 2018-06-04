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
    <script src="../../js/twitter_plugin.js"></script>
    <title>OttoMaTech News</title>
</head>
<body>
<div id="wrap">
    <?php include 'nav.php'; ?>
    <div class="container">
        <div class="row" id="first">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <h2>Du kan hitta de senaste nyheterna nedan, på våran Facebook-sida eller Twitter.</h2>

                <p class="lead">Glöm inte att följa oss!</p>
                <hr>
            </div>

            <div class="col-xs-12 col-md-12 col-lg-6">
                <iframe id="fb_iframe"
                        src="http://www.facebook.com/plugins/likebox.php?href=https%3A%2F%2Fwww.facebook.com%2Fottomatech&amp;width=600&amp;height=590&amp;colorscheme=light&amp;show_faces=true&amp;header=true&amp;stream=true&amp;show_border=true"
                        scrolling="no" frameborder="0"
                        allowtransparency="true"></iframe>
            </div>
            <div class="col-xs-12 col-md-12 col-lg-6">
                <a class="twitter-timeline" href="https://twitter.com/OttoMaTech" data-widget-id="483858428301828097">Tweets
                    av @OttoMaTech</a>

            </div>
            <div>&nbsp;</div>
        </div>
    </div>
</div>
</div>
<div id="push"></div>
</div>
<?php include 'footer.php'; ?>
</body>
</html>