<?php
session_start();
require 'DAL.php';

$username = $password = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $submit = true;

    if (empty($_POST["username"])) {
        $usernameError = "Vänligen ange användarnamn.";
        $submit = false;
    } else {
        $username = test_input($_POST["username"]);
    }

    if (empty($_POST["password"])) {
        $passwordError = "Vänligen ange lösenord.";
        $submit = false;
    } else {
        $password = test_input($_POST["password"]);
    }

    if ($submit) {
        try {
            $feedback = signIn($username, $password);
            if ($feedback == "Error") {
                echo '<script language="javascript">';
                echo 'alert("Fel användarnamn eller lösenord. Vänligen försök igen. Tänk på att skilja mellan små och stora bokstäver. ")';
                echo '</script>';
            } else {
                $_SESSION["username"] = $feedback;
                header("Location: mysite.php");
            }
        } catch (Exception $e) {
            echo '<script language="javascript">';
            echo 'alert("Databaserror: ' . $e->getMessage() . '\n\nKontakta databasadmin")';
            echo '</script>';
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
    <title>OttoMaTech Logga In</title>
</head>
<body>
<div id="wrap">
    <?php include 'nav.php'; ?>
    <div class="container">
        <div class="row" id="first">
            <div
                class="col-lg-4 col-lg-offset-4 col-md-2 col-md-offset-5 col-sm-2 col-sm-offset-5 col-xs-2 col-xs-offset-5">
                <img class="img-responsive" src="../images/navlogotransp.png">
            </div>
        </div>
        <form class="form-signin" role="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"
              method="post" name="sign_in">
            <h2 class="form-signin-heading">Inloggningsportal</h2>
            <label for="username" class="sr-only">Användarnamn</label>
            <input type="text" id="username" name="username" class="form-control" placeholder="Användarnamn"
                   required
                   autofocus>
            <label for="password" class="sr-only">Lösenord</label>
            <input type="password" id="password" name="password" class="form-control" placeholder="Lösenord"
                   value="<?php echo $username; ?>" required>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Logga in</button>
        </form>
        <label id="signin_error"> <?php echo $passwordError; ?> <br> <?php echo $usernameError; ?> </label>
    </div>
    <div id="push"></div>
</div>
</body>
<?php include '../html/sv/footer.php'; ?>
</html>