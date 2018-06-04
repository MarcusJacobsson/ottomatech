<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: loggain.php");
}
require 'DAL.php';
require 'upload_image.php';

$update_ad_name = $update_ad_price = $update_ad_description = $update_ad_category = "";
$update_ad_name_error = $update_ad_price_error = $update_ad_description_error = $update_ad_category_error = "";
$remove_ad_name = "";
$remove_ad_name_error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST["update_ad"])) {

        $submit_update_ad = true;
        $imageName = "";

        if (empty($_POST["update_ad_name"])) {
            $update_ad_name_error = "Vänligen ange namn.";
            $submit_update_ad = false;
        } else {
            $update_ad_name = test_input($_POST["update_ad_name"]);
        }

        if (empty($_POST["update_ad_price"])) {
            $update_ad_price_error = "Vänligen ange pris.";
            $submit_update_ad = false;
        } else {
            $update_ad_price = test_input($_POST["update_ad_price"]);
        }

        if (empty($_POST["update_ad_description"])) {
            $update_ad_description_error = "Vänligen ange beskrivning.";
            $submit_update_ad = false;
        } else {
            $update_ad_description = test_input($_POST["update_ad_description"]);
        }

        if (empty($_POST["update_ad_category"])) {
            $update_ad_category_error = "Vänligen ange kategori.";
            $submit_update_ad = false;
        } else {
            $update_ad_category = test_input($_POST["update_ad_category"]);
        }

        if ($submit_update_ad) {
            try {
                updateAd($_POST['oldName'], $update_ad_name, $update_ad_price, $update_ad_description, $update_ad_category);
                echo '<script language="javascript">';
                echo 'alert("Annons uppdaterad.");';
                echo '</script>';
                echo '<script> location.replace("allitems.php"); </script>';
            } catch (Exception $e) {
                echo '<script language="javascript">';
                echo 'alert("Databaserror: ' . $e->getMessage() . '\n\nKontakta databasadmin\n' . '")';
                echo '</script>';
            }
        }
    } else if (!empty($_POST['remove_ad'])) {

        $submit_remove_ad = true;

        if (empty($_POST['remove_ad_name'])) {
            $submit_remove_ad = false;
            $remove_ad_name_error = "Vänligen välj annons.";
        } else {
            $remove_ad_name = test_input($_POST['remove_ad_name']);
        }

        if ($submit_remove_ad) {
            try {
                $imagePath = "../images/ad_uploads/" . getAdImageName($remove_ad_name);
                unlink($imagePath);
                removeAd($remove_ad_name);
                echo '<script language="javascript">';
                echo 'alert("Annons borttagen.");';
                echo '</script>';
                echo '<script> location.replace("allitems.php"); </script>';
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
    <link rel="stylesheet" href="../css/signin.css">
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
            <h2>Ändra annons</h2>
            <hr>
            <div class="col-lg-6 col-md-12 col-sm-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Uppdatera</h3>
                    </div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="post" onsubmit="return validateUpdateAd()"
                              action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                            <input type="hidden" name="update_ad" value="update_ad">
                            <input type="hidden" name="oldName" value="<?php echo filter_input(INPUT_GET, "name",FILTER_SANITIZE_STRING); ?>">

                            <div class="form-group">
                                <label for="update_ad_name" class="col-sm-2 control-label">Namn</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="update_ad_name" name="update_ad_name"
                                           placeholder="Namn"
                                           value="<?php echo filter_input(INPUT_GET,"name",FILTER_SANITIZE_STRING); ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="update_ad_price" class="col-sm-2 control-label">Pris</label>

                                <div class="col-sm-10">
                                    <input type="number" class="form-control" id="update_ad_price"
                                           name="update_ad_price"
                                           placeholder="Pris (Hela kr)"
                                           value="<?php echo filter_input(INPUT_GET,"price",FILTER_SANITIZE_STRING); ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="update_ad_description" class="col-sm-2 control-label">Beskrivning</label>

                                <div class="col-sm-10">
                            <textarea class="form-control" id="update_ad_description" name="update_ad_description"
                                      rows="5"><?php echo filter_input(INPUT_GET,"description",FILTER_SANITIZE_STRING); ?></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="update_ad_category" class="col-sm-2 control-label">Kategori</label>

                                <div class="col-sm-10">
                                    <select class="form-control" id="update_ad_category" name="update_ad_category">
                                        <?php
                                        try {
                                            $categories = getAllCategoryNames();
                                            if (is_array($categories) || is_object($categories)) {
                                                foreach ($categories as $category) {
                                                    echo '<option';
                                                    if (filter_input(INPUT_GET,"category",FILTER_SANITIZE_STRING) == $category->getCategoryName()) {
                                                        echo ' selected';
                                                    }
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
                                <div class="col-sm-10 col-sm-offset-2">
                                    <button type="submit" class="btn btn-default">Uppdatera</button>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <label><?php echo $update_ad_name_error ?> <br> <?php echo $update_ad_price_error ?>
                                        <br> <?php echo $update_ad_description_error ?>
                                        <br> <?php echo $update_ad_category_error ?>
                                    </label>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 col-sm-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Ta bort</h3>
                    </div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="post"
                              action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                            <input type="hidden" name="remove_ad" value="remove_ad">


                            <div class="form-group">
                                <label for="remove_ad_name" class="col-sm-2 control-label">Namn</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="remove_ad_name" id="remove_ad_name"
                                           value="<?php echo filter_input(INPUT_GET,"name",FILTER_SANITIZE_STRING); ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-10 col-sm-offset-2">
                                    <button type="submit" class="btn btn-default">Ta bort</button>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <label><?php echo $remove_ad_name_error ?>
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
</body>
<?php include '../html/sv/footer.php'; ?>
</html>