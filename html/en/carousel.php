<?php
/**
 * Created by PhpStorm.
 * User: Marcus Jacobsson
 * Date: 2015-01-12
 * Time: 18:55
 */

?>

<!-- Carousel
    ================================================== -->
<header>
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner" role="listbox">
            <div class="item active">
                <img src="../../images/otto123.jpg"
                     alt="First slide">

                <div class="container">
                    <div class="carousel-caption">
                        <h1 class="stroke">Check out our provided services.</h1>

                        <p class="stroke">Together we will provide the industrial automation solution that suits Your
                            needs.</p>

                        <p><a class="btn btn-lg btn-primary" href="services.php" role="button">Take me there</a></p>
                    </div>
                </div>
            </div>
            <div class="item">
                <img src="../../images/ottoslide2.png"
                     alt="Second slide">

                <div class="container">
                    <div class="carousel-caption">
                        <h1 class="stroke">Interested? Contact us today.</h1>

                        <p class="stroke">We will get back to you
                            as soon as
                            possible.</p>

                        <p><a class="btn btn-lg btn-primary" href="contact.php" role="button">I am interested</a></p>
                    </div>
                </div>
            </div>
            <div class="item">
                <img src="../../images/ottoslide3.PNG"
                     alt="Third slide">

                <div class="container">
                    <div class="carousel-caption">
                        <h1 class="stroke">Stay updated.</h1>

                        <p class="stroke">You can find the latest news and updates under News</p>

                        <p><a class="btn btn-lg btn-primary" href="news.php" role="button">Take me there</a></p>
                    </div>
                </div>
            </div>
        </div>
        <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</header>