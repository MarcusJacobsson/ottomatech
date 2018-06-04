<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: loggain.php");
}
require 'DAL.php';

/* Form validation */

$username = $password = $email = "";
$username_error = $password_error = $email_error = "";
$update_username = $update_password = $update_email = "";
$remove_username = "";
$remove_username_error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    /* Lägg till användare */
    if (!empty($_POST["add_user"])) {
        $submit_add_user = true;
        if (empty($_POST["username"])) {
            $username_error = "Vänligen ange användarnamn";
            $submit_add_user = false;
        } else {
            $username = test_input($_POST["username"]);
        }

        if (empty($_POST["password"])) {
            $password_error = "Vänligen ange lösenord";
            $submit_add_user = false;
        } else {
            $password = test_input($_POST["password"]);
        }

        if (empty($_POST["email"])) {
            $email_error = "Vänligen ange email";
            $submit_add_user = false;
        } else {
            $email = test_input($_POST["email"]);
        }

        if ($submit_add_user) {
            //Kryptera lösenordet
            $t_hasher = new PasswordHash(8, FALSE);
            $hash = $t_hasher->HashPassword($password);
            try {
                addUser($username, $hash, $email);
                echo '<script language="javascript">';
                echo 'alert("Användare tillagd.");';
                echo '</script>';
                $username = $password = $email = "";
            } catch (Exception $e) {
                echo '<script language="javascript">';
                echo 'alert("Databaserror: ' . $e->getMessage() . '\n\nKontakta databasadmin\n' . '")';
                echo '</script>';
            }
        }
    } else if (!empty($_POST["update_user"])) {

        $update_username = $_SESSION['username'];
        $updated = false;

        if (!empty($_POST["update_password"])) {
            try {
                $update_password = test_input($_POST["update_password"]);
                $t_hasher = new PasswordHash(8, FALSE);
                $hash = $t_hasher->HashPassword($update_password);
                updateUserPassword($update_username, $hash);
                $updated = true;
            } catch (Exception $e) {
                echo '<script language="javascript">';
                echo 'alert("Databaserror: ' . $e->getMessage() . '\n\nKontakta databasadmin\n' . '")';
                echo '</script>';
            }
        }

        if (!empty($_POST["update_email"])) {
            try {
                $update_email = test_input($_POST["update_email"]);
                updateUserEmail($update_username, $update_email);
                $updated = true;
            } catch (Exception $e) {
                echo '<script language="javascript">';
                echo 'alert("Databaserror: ' . $e->getMessage() . '\n\nKontakta databasadmin\n' . '")';
                echo '</script>';
            }
        }

        if ($updated) {
            echo '<script language="javascript">';
            echo 'alert("Användare uppdaterad.");';
            echo '</script>';
        }
    } else if (!empty($_POST['remove_user'])) {
        $submit_remove_user = true;

        if (empty($_POST['remove_username'])) {
            $remove_username_error = "Vänligen välj användare.";
            $submit_remove_user = false;
        } else {
            $remove_username = test_input($_POST['remove_username']);
        }

        if ($submit_remove_user) {
            if ($_SESSION['username'] == $remove_username) {
                echo '<script language="javascript">';
                echo 'alert("Du kan inte ta bort dig själv!");';
                echo '</script>';
            } else {
                try {
                    removeUser($remove_username);
                    echo '<script language="javascript">';
                    echo 'alert("Användare borttagen.");';
                    echo '</script>';
                } catch (Exception $e) {
                    echo '<script language="javascript">';
                    echo 'alert("Databaserror: ' . $e->getMessage() . '\n\nKontakta databasadmin\n' . '")';
                    echo '</script>';
                }
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
    <title>OttoMaTech Min Sida</title>
</head>
<body>
<div id="wrap">
    <?php include 'nav.php'; ?>
    <div class="container">
        <div class="row" id="first">
            <div class="col-lg-6 col-md-12 col-sm-12">
                <h2>Administrera användare</h2>
                <hr>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Mina användaruppgifter</h3>
                    </div>
                    <div class="panel-body">
                        <form class="form-horizontal" method="post" name="update_user"
                              action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                            <input type="hidden" name="update_user" value="update_user">

                            <div class="form-group">
                                <label for="username" class="col-sm-3 control-label">Användarnamn</label>

                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="update_username" name="update_username"
                                           placeholder="<?php echo $_SESSION['username'] ?>"
                                           value="<?php echo $_SESSION['username'] ?>" disabled>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="password" class="col-sm-3 control-label">Lösenord</label>

                                <div class="col-sm-9">
                                    <input type="password" class="form-control" id="update_password"
                                           name="update_password"
                                           placeholder="Nytt lösenord"
                                           value="<?php echo $update_password ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email" class="col-sm-3 control-label">Email</label>

                                <div class="col-sm-9">
                                    <input type="email" class="form-control" id="update_email" name="update_email"
                                           placeholder="Ny email"
                                           value="<?php echo $update_email ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-3 col-sm-10">
                                    <button type="submit" class="btn btn-default">Uppdatera</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-md-12 col-sm-12">
                <h2>Alla användare</h2>
                <hr>
                <div class="panel panel-default accordion_all_users">
                    <div class="panel-heading">
                        <p class="panel-title"><a class="accordion-toggle" data-toggle="collapse"
                                                  data-parent=".accordion_all_users"
                                                  href="#accordion_all_users">
                                Visa/Dölj
                            </a></p>
                    </div>
                    <div id="accordion_all_users" class="panel-collapse collapse">
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered">
                                    <tr>
                                        <th>Användarnamn</th>
                                        <th>Email</th>
                                    </tr>
                                    <?php

                                    try {
                                        $feedback = getAllUsers();
                                        if ($feedback != "Error") {
                                            $users = $feedback;
                                            for ($x = 0; $x < count($users); $x++) {
                                                $tmp_user = $users[$x];
                                                echo '<tr>';

                                                echo '<td>';
                                                echo $tmp_user->getUsername();
                                                echo '</td>';
                                                echo '<td>';
                                                echo $tmp_user->getEmail();
                                                echo '</td>';
                                                echo '</tr>';
                                            }
                                        }
                                    } catch (Exception $e) {
                                        echo '<script language="javascript">';
                                        echo 'alert("Databaserror: ' . $e->getMessage() . '\n\nKontakta databasadmin")';
                                        echo '</script>';
                                    }

                                    ?>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php

        if (1 == isUserSuperAdmin($_SESSION['username'])) {

            ?>
            <div class="row">
                <div class="col-lg-6 col-md-12 col-sm-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Ta bort</h3>
                        </div>
                        <div class="panel-body">
                            <form class="form-horizontal" method="post" name="remove_user"
                                  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                                <input type="hidden" name="remove_user" value="remove_user">

                                <div class="form-group">
                                    <label for="remove_username" class="col-sm-2 control-label">Namn</label>

                                    <div class="col-sm-10">
                                        <select class="form-control" id="remove_username" name="remove_username">
                                            <?php
                                            try {
                                                $users = getAllUsers();
                                                if (is_array($users) || is_object($users)) {
                                                    foreach ($users as $user) {
                                                        if($user->getUsername() != $_SESSION['username']){
                                                            echo '<option>';
                                                            echo $user->getUsername();
                                                            echo '</option>';
                                                        }
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
                                        <label><?php echo $remove_username_error ?>
                                        </label>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-12 col-sm-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Lägg till</h3>
                        </div>
                        <div class="panel-body">
                            <form class="form-horizontal" method="post" onsubmit="return validateAddUser()" name="add_user"
                                  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                                <input type="hidden" name="add_user" value="add_user">

                                <div class="form-group">
                                    <label for="username" class="col-sm-3 control-label"> Användarnamn</label>

                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="username" name="username"
                                               placeholder="Användarnamn"
                                               value="<?php echo $username ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="password" class="col-sm-3 control-label"> Lösenord</label>

                                    <div class="col-sm-9">
                                        <input type="password" class="form-control" id="password" name="password"
                                               placeholder="Lösenord"
                                               value="<?php echo $password ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="email" class="col-sm-3 control-label"> Email</label>

                                    <div class="col-sm-9">
                                        <input type="email" class="form-control" id="email" name="email"
                                               placeholder="Email"
                                               value="<?php echo $email ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-offset-3 col-sm-10">
                                        <button type="submit" class="btn btn-default"> Lägg till</button>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-offset-3 col-sm-10">
                                        <label><?php echo $username_error ?> <br> <?php echo $password_error ?>
                                            <br> <?php echo $email_error ?>
                                        </label>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>
    </div>
    <div id="push"></div>
</div>
<?php include '../html/sv/footer.php'; ?>
</body>
</html>