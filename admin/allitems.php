<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: loggain.php");
}

require 'DAL.php';
require 'upload_image.php';

$add_new_category_name = "";
$add_new_category_name_error = "";
$add_name = $add_price = $add_description = $add_category = "";
$add_name_error = $add_price_error = $add_description_error = $add_category_error = "";
$remove_category_name = "";
$remove_category_name_error = "";
$update_category_old_name = $update_category_new_name = "";
$update_category_old_name_error = $update_category_new_name_error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    /* Lägg till ny kategori */
    if (!empty($_POST["add_new_category"])) {
        $submit_add_new_category = true;
        if (empty($_POST["add_new_category_name"])) {
            $add_new_category_name_error = "Vänligen ange kategorinamn";
            $submit_add_new_category = false;
        } else {
            $add_new_category_name = test_input($_POST["add_new_category_name"]);
        }

        if ($submit_add_new_category) {
            try {
                addCategory($add_new_category_name);
                echo '<script language="javascript">';
                echo 'alert("Kategori tillagd.");';
                echo '</script>';
            } catch (Exception $e) {
                echo '<script language="javascript">';
                echo 'alert("Databaserror: ' . $e->getMessage() . '\n\nKontakta databasadmin\n' . '")';
                echo '</script>';
            }
        }
    } else if (!empty($_POST["add_ad"])) {
        $submit_add_ad = true;
        $imageName = "";

        if (empty($_POST["add_name"])) {
            $add_name_error = "Vänligen ange namn.";
            $submit_add_ad = false;
        } else {
            $add_name = test_input($_POST["add_name"]);
        }

        if (empty($_POST["add_price"])) {
            $add_price_error = "Vänligen ange pris.";
            $submit_add_ad = false;
        } else {
            $add_price = test_input($_POST["add_price"]);
        }

        if (empty($_POST["add_desc"])) {
            $add_description_error = "Vänligen ange beskrivning.";
            $submit_add_ad = false;
        } else {
            $add_description = test_input($_POST["add_desc"]);
        }

        if (empty($_POST["add_item_category"])) {
            $add_category_error = "Vänligen ange kategori.";
            $submit_add_ad = false;
        } else {
            $add_category = test_input($_POST["add_item_category"]);
        }

        if ($submit_add_ad) {
            $imageName = basename($_FILES["fileToUpload"]["name"]);
            try {
                if (!empty($imageName)) {
                    $feedback = upload_image();
                    if ($feedback != $imageName) {
                        echo '<script language="javascript">';
                        echo 'alert("';
                        echo $feedback;
                        echo '");';
                        echo '</script>';

                    }
                }else{
                    $imageName = "no_image";
                }
                addAd($add_name, $add_price, $add_description, $add_category, $imageName);
                echo '<script language="javascript">';
                echo 'alert("Annons tillagd.");';
                echo '</script>';
            } catch (Exception $e) {
                echo '<script language="javascript">';
                echo 'alert("Databaserror: ' . $e->getMessage() . '\n\nKontakta databasadmin\n' . '")';
                echo '</script>';
            }
        }
    } else if (!empty($_POST['remove_category'])) {
        $submit_remove_category = true;

        if (empty($_POST['remove_category_name'])) {
            $submit_remove_category = false;
            $remove_category_name_error = "Vänligen välj kategori.";
        } else {
            $remove_category_name = test_input($_POST['remove_category_name']);
        }

        if ($submit_remove_category) {
            try {
                $ads = getAddsByCategoryName($remove_category_name);
                if(is_array($ads)){
                    foreach($ads as $ad){
                        $imageName = getAdImageName($ad->getName());
                        if($imageName != "no_image"){
                            $imagePath = "../images/ad_uploads/" . $imageName;
                            unlink($imagePath);
                        }
                    }
                }
                removeCategory($remove_category_name);
                echo '<script language="javascript">';
                echo 'alert("Kategori borttagen.");';
                echo '</script>';
            } catch (Exception $e) {
                echo '<script language="javascript">';
                echo 'alert("Databaserror: ' . $e->getMessage() . '\n\nKontakta databasadmin\n' . '")';
                echo '</script>';
            }
        }
    } else if (!empty($_POST['update_category'])) {

        $submit_update_category = true;

        if (empty($_POST['update_category_new_name'])) {
            $update_category_new_name_error = "Vänligen ange namn.";
            $submit_update_category = false;
        } else {
            $update_category_new_name = test_input($_POST['update_category_new_name']);
        }

        if (empty($_POST['update_category_old_name'])) {
            $update_category_old_name_error = "Vänligen välj kategori.";
            $submit_update_category = false;
        } else {
            $update_category_old_name = test_input($_POST['update_category_old_name']);
        }

        if ($submit_update_category) {
            try {
                updateCategory($update_category_old_name, $update_category_new_name);
                echo '<script language="javascript">';
                echo 'alert("Kategori uppdaterad.");';
                echo '</script>';
            } catch (Exception $e) {
                echo '<script language="javascript">';
                echo 'alert("Databaserror: ' . $e->getMessage() . '\n\nKontakta databasadmin\n' . '")';
                echo '</script>';
            }
        }
    }
}

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

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
    <!-- Egna script -->
    <script src="../js/nav_set_active_admin.js"></script>
    <script src="../js/validate.js"></script>
    <title>OttoMaTech Annonser</title>
</head>
<body>
<div id="wrap">
    <?php include 'nav.php'; ?>
    <div class="container">
        <div class="row" id="first">
            <div class="col-lg-12">
                <h2>Upplagda annonser</h2>
                <hr>

                <div class="panel panel-default accordion_all_ads">
                    <div class="panel-heading">
                        <!-- Genom att trycka på denna känk kollpsas innehållet i denna panel -->
                        <a class="accordion-toggle" data-toggle="collapse" data-parent=".accordion_all_ads"
                           href="#accordion_all_ads">
                            Visa/Dölj
                        </a>
                    </div>
                    <div id="accordion_all_ads" class="panel-collapse collapse">
                        <div class="panel-body">
                            <?php
                            $categories = getAllCategoryNames();
                            if (is_array($categories) || is_object($categories)) {
                                foreach ($categories as $category) {
                                    $ads = getAddsByCategoryName($category->getCategoryName());
                                    if (is_array($ads) || is_object($ads)) {

                                        echo '<p class="lead">Kategori: ';
                                        echo $category->getCategoryName();
                                        echo '</p>';
                                        ?>

                                        <div class="table-responsive ellipsis">
                                            <table class="table table-hover table-bordered">
                                                <tr>
                                                    <th>Namn</th>
                                                    <th>Pris (kr)</th>
                                                    <th>Beskrivning</th>
                                                    <th>Bild</th>
                                                    <th></th>
                                                </tr>

                                                <?php

                                                foreach ($ads as $ad) {
                                                    echo '<tr>';

                                                    echo '<td>';
                                                    echo $ad->getName();
                                                    echo '</td>';
                                                    echo '<td>';
                                                    echo $ad->getPrice();
                                                    echo '</td>';
                                                    echo '<td>';
                                                    echo $ad->getDescription();
                                                    echo '</td>';
                                                    echo '<td>';
                                                    echo $ad->getImage();
                                                    echo '</td>';
                                                    echo '<td>';
                                                    echo '<a href="updateitem.php?name=' . $ad->getName() . '&price=' .
                                                        $ad->getPrice() . '&description=' . $ad->getDescription() . '&image=' .
                                                        $ad->getImage() . '&category=' . $ad->getCategory() . '">Ändra/Ta bort<a/>';
                                                    echo '</td>';

                                                    echo '</tr>';
                                                }
                                                ?>
                                            </table>
                                        </div>
                                    <?php
                                    }
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <h2>Kategorier</h2>
                <hr>

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Lägg till</h3>
                    </div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="post" onsubmit="return validateAddCategory()"
                              action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                            <input type="hidden" name="add_new_category" value="add_new_category">

                            <div class="form-group">
                                <label for="add_new_category" class="col-sm-2 control-label">Namn</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="add_new_category_name"
                                           name="add_new_category_name"
                                           value="<?php echo $add_new_category_name ?>"
                                           placeholder="Kategorinamn">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-default">Lägg till</button>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <label><?php echo $add_category_error ?></label>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="panel panel-danger">
                    <div class="panel-heading">
                        <h3 class="panel-title">Ta bort</h3>

                        <p><em>OBS! Samtliga annonser som tillhör kategorin tas också bort!</em></p>
                    </div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="post"
                              action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                            <input type="hidden" name="remove_category" value="remove_category">

                            <div class="form-group">
                                <label for="remove_category_name" class="col-sm-2 control-label">Namn</label>

                                <div class="col-sm-10">
                                    <select class="form-control" id="remove_category_name" name="remove_category_name">
                                        <?php
                                        try {
                                            $categories = getAllCategoryNames();
                                            if (is_array($categories) || is_object($categories)) {
                                                foreach ($categories as $category) {
                                                    echo '<option>';
                                                    echo $category->getCategoryName();
                                                    echo '</option>';
                                                }
                                            }

                                        } catch (Exception $e) {
                                            echo '<script language="javascript">';
                                            echo 'alert("Databaserror: ' . $e->getMessage() . '\n\nKontakta databasadmin")';
                                            echo '</script>';
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-default">Ta bort</button>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <label><?php echo $remove_category_name_error ?></label>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Uppdatera</h3>
                    </div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="post" onsubmit="return validateUpdateCategory()"
                              action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                            <input type="hidden" name="update_category" value="update_category">

                            <div class="form-group">
                                <label for="update_category_old_name" class="col-sm-2 control-label">Namn</label>

                                <div class="col-sm-10">
                                    <select class="form-control" id="update_category_old_name"
                                            name="update_category_old_name">
                                        <?php
                                        try {
                                            $categories = getAllCategoryNames();
                                            if (is_array($categories) || is_object($categories)) {
                                                foreach ($categories as $category) {
                                                    echo '<option>';
                                                    echo $category->getCategoryName();
                                                    echo '</option>';
                                                }
                                            }

                                        } catch (Exception $e) {
                                            echo '<script language="javascript">';
                                            echo 'alert("Databaserror: ' . $e->getMessage() . '\n\nKontakta databasadmin")';
                                            echo '</script>';
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="update_category_new_name" class="col-sm-2 control-label">Namn</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="update_category_new_name"
                                           name="update_category_new_name"
                                           placeholder="Nytt namn"
                                           value="<?php echo $update_category_new_name ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-default">Uppdatera</button>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <label><?php echo $update_category_new_name_error ?></label>
                                    <br>
                                    <label><?php echo $update_category_old_name_error ?></label>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <h2>Ny annons</h2>
                <hr>

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Lägg till</h3>
                    </div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="post" enctype="multipart/form-data" onsubmit="return validateAddAd()"
                              action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                            <input type="hidden" name="add_ad" value="add_ad">

                            <div class="form-group">
                                <label for="add_name" class="col-sm-2 control-label">Namn</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="add_name" name="add_name"
                                           placeholder="Namn"
                                           value="<?php echo $add_name ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="add_price" class="col-sm-2 control-label">Pris</label>

                                <div class="col-sm-10">
                                    <input type="number" class="form-control" id="add_price" name="add_price"
                                           placeholder="Pris (Hela kr)"
                                           value="<?php echo $add_price ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="add_desc" class="col-sm-2 control-label">Beskrivning</label>

                                <div class="col-sm-10">
                            <textarea class="form-control" id="add_desc" name="add_desc"
                                      rows="5"><?php echo $add_description ?></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="add_item_category" class="col-sm-2 control-label">Kategori</label>

                                <div class="col-sm-10">
                                    <select class="form-control" id="add_item_category" name="add_item_category">
                                        <?php
                                        try {
                                            $categories = getAllCategoryNames();
                                            if (is_array($categories) || is_object($categories)) {
                                                foreach ($categories as $category) {
                                                    echo '<option';
                                                    if($category->getCategoryName() == $add_category)
                                                        echo ' selected ';
                                                    echo '>';
                                                    echo $category->getCategoryName();
                                                    echo '</option>';
                                                }
                                            }

                                        } catch (Exception $e) {
                                            echo '<script language="javascript">';
                                            echo 'alert("Databaserror: ' . $e->getMessage() . '\n\nKontakta databasadmin")';
                                            echo '</script>';
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="fileToUpload" class="col-sm-2 control-label">Bild</label>

                                <div class="col-sm-10">
                                    <input type="file" id="fileToUpload" name="fileToUpload">

                                    <p class="help-block">Max storlek: 10 MB. Tillåtna filformat: .jpg, .jpeg, .png</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-10 col-sm-offset-2">
                                    <button type="submit" class="btn btn-default">Lägg till</button>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <label><?php echo $add_name_error ?> <br> <?php echo $add_price_error ?>
                                        <br> <?php echo $add_description_error ?> <br> <?php echo $add_category_error ?>
                                    </label>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="push"></div>
</div>
<?php include '../html/sv/footer.php'; ?>
</body>
</html>