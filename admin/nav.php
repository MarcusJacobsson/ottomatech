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
            <a class="navbar-brand" href=""><a href="http://www.ottomatech.se" class="pull-left"><img id="navlogo"
                                                                                src="../images/navlogotransp.png"></a></a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li id="nav_item_my_site"><a href="mysite.php">Min sida</a></li>
                <li id="nav_item_ads"><a href="allitems.php">Annonser</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <?php
                    if (isset($_SESSION['username'])) {
                        echo '<a href="logout.php">Logga ut</a>';
                    } else {
                        echo '<a href="loggain.php">Logga in</a>';
                    }
                    ?>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- NAV END -->