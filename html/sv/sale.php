<?php
require '../../admin/DAL.php';
?>

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
    <link href="../../css/simple-sidebar.css" rel="stylesheet">
    <!-- Egna script -->
    <script src="../../js/nav_set_active.js"></script>
    <script src="../../js/smooth_page_jump.js"></script>
    <title>OttoMaTech Sale</title>
</head>
<body>
<div id="wrap">
    <?php include 'nav.php'; ?>
    <div id="wrapper">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <nav id="spy">
                <ul class="sidebar-nav nav">
                    <?php
                    $categories = getAllCategoryNames();
                    if (is_array($categories)) {
                        foreach ($categories as $category) {
                            $ads = getAddsByCategoryName($category->getCategoryName());
                            if (is_array($ads) && !empty($ads)) {
                                echo '<li>';
                                echo '<a href="#';
                                echo $category->getCategoryName();
                                echo '">';
                                echo $category->getCategoryName();
                                echo '</a>';
                                echo '</li>';
                            }
                        }
                    }
                    ?>
                </ul>
            </nav>
        </div>


        <!-- Page content -->
        <div id="page-content-wrapper">

            <div class="page-content inset" data-spy="scroll" data-target="#spy">

                <div class="container container-sale">

                    <div class="row">
                        <h2>Ta en titt på vad som är till salu</h2>
                        <h4>Intresserad? Skicka ett mail till: <a href="mailto:info@ottmatech.se">info@ottmatech.se</a></h4>
                        <h4>Eller ring: +(46)(0)720-372259</h4>
                        <hr>

                        <?php
                        $categories = getAllCategoryNames();
                        if (is_array($categories)) {

                            foreach ($categories as $category) {
                                $ads = getAddsByCategoryName($category->getCategoryName());

                                if (is_array($ads) && !empty($ads)) {
                                    echo '<a name="';
                                    echo $category->getCategoryName();
                                    echo '"></a>';
                                    echo '<div class="jumbotron">';
                                    echo '<div class="page-header">';
                                    echo '<h3>Kategori: ';
                                    echo $category->getCategoryName();
                                    echo '</h3>';
                                    echo '</div>';
                                    echo '</div>';
                                    foreach ($ads as $ad) {
                                        echo '<div class="row">';
                                        echo '<div class="col-lg-2">';
                                        if ($ad->getImage() == "no_image") {
                                            echo '<img src="../../images/no_image.png" class="img-responsive">';
                                        } else {
                                            echo '<img src="../../images/ad_uploads/';
                                            echo $ad->getImage();
                                            echo '" class="img img-responsive">';
                                        }
                                        echo '</div>';

                                        echo '<div class="col-lg-10">';
                                        echo '<h4><b>';
                                        echo $ad->getName();
                                        echo '</b></h4>';
                                        echo '<p><b>';
                                        echo 'Pris: ';
                                        echo $ad->getPrice();
                                        echo ':-';
                                        echo '</b></p>';
                                        echo '<p>';
                                        echo $ad->getDescription();
                                        echo '</p>';


                                        echo '</div>';
                                        echo '</div>';
                                        echo '<hr class="soften">';
                                    }
                                }
                            }
                        } else {
                            echo ' <br><br><br><h4>Det finns inga annonser utlagda för tillfället. Håll ögonen öppna för uppdateringar!</h4>';
                        }

                        ?>
                    </div>

                </div>

            </div>

        </div>

    </div>
    <div id="push"></div>


</div>
<?php include '../shared/footer.php'; ?>

</body>
</html>