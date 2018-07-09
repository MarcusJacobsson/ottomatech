<?php
/**
 * Created by PhpStorm.
 * User: Marcus Jacobsson
 * Date: 2015-01-12
 * Time: 18:01
 */
?>

<!-- NAV START -->
<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#"><a href="#" class="pull-left"><img id="navlogo"
                                                                                src="../../images/navlogotransp.png"></a></a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li id="nav_item_start"><a href="index.php">Home</a></li>
                <li id="nav_item_services"><a href="services.php">Services</a></li>
                <li id="nav_item_contact"><a href="contact.php">Contact</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <p class="navbar-btn social-btn">
                        <a href="https://www.facebook.com/OttoMaTech?fref=ts" class="btn"><img
                                src="../../images/facebook-icon.png" alt="fb"></a>
                    </p>
                </li>
                <li>
                    <p class="navbar-btn social-btn">
                        <a href="https://twitter.com/OttoMaTech" class="btn"><img src="../../images/twitter-icon.jpg"
                                                                                  alt="tw"></a>
                    </p>
                </li>
                <li>
                    <p class="navbar-btn social-btn">
                        <a href="https://www.linkedin.com/company/4831396?trk=tyah&trkInfo=clickedVertical%3Acompany%2CclickedEntityId%3A4831396%2Cidx%3A1-1-1%2CtarId%3A1439917858568%2Ctas%3Aottomatech" class="btn"><img
                                src="../../images/linkedin-icon.png" alt="li"></a>
                    </p>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Language
                        <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="../sv/<?php echo basename($_SERVER['PHP_SELF']); ?>">Svenska</a></li>
                        <li class="active"><a href="index.php">English</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- NAV END -->