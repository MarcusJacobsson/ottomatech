<?php
include 'sendmail.php';

$name = $email = $tel = $message = "";
$name_error = $email_error = $tel_error = $message_error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $submit = true;

    if (empty($_POST["name"])) {
        $name_error = "Vänligen ange namn. ";
        $submit = false;
    } else {
        $name = test_input($_POST["name"]);
    }

    if (empty($_POST["email"])) {
        $email_error = "Vänligen ange e-mail. ";
        $submit = false;
    } else {
        $email = test_input($_POST["email"]);
    }

    if (!empty($_POST["tel"])) {
        if (!is_numeric($_POST["tel"])) {
            $tel_error = "Telefonnummer får inte vara bokstäver. ";
            $submit = false;
        } else {
            $tel = test_input($_POST["tel"]);
        }
    }

    if (empty($_POST["message"])) {
        $message_error = "Vänligen ange meddelande. ";
        $submit = false;
    } else {
        $message = test_input($_POST["message"]);
    }

    if ($submit) {
        sendMail($name, $email, $tel, $message);
    } else {
        echo '<script>';
        echo 'alert("' . $name_error . '\n' . $email_error . '\n' . $tel_error . '\n' . $message_error . '");';
        echo '</script>';
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
    <script src="https://maps.googleapis.com/maps/api/js"></script>
    <script src="../../js/googlemaps.js"></script>
    <script src="../../js/validate.js"></script>
    <title>OttoMaTech Contact</title>
</head>
<body>

<div id="wrap">
    <?php include 'nav.php'; ?>
    <div class="container">
        <div class="row" id="first">
            <div class="col-xs-12 col-md-12 col-lg-12 ">
                <h2>Här hittar du oss</h2>
                <hr>
                <br>

            </div>
            <div class="col-xs-12 col-md-12 col-lg-9 ">
                <div class="google-maps">
                    <div id="map_canvas"></div>
                </div>
            </div>
        </div>
        <br>

        <div class="row">
            <div class="col-xs-12 col-md-12 col-lg-4">
                <address>
                    <p class="lead">Besöksaddress</p>

                    <p>Stenebäcksvägen 3</p>

                    <p>238 31 Oxie</p>

                    <p>Malmö, Sweden.</p>

                </address>
            </div>
        </div>
        <hr>

        <div class="row">
            <h2>Kontaktinformation</h2>
            <br>

            <div class="col-xs-12 col-md-12 col-lg-4">
                <p><b>Ansvarig: </b>Otto</p>

                <p>E-mail: <a href="mailto:otto.m@ottomatech.se">otto.m@ottomatech.se</a></p>

                <p>Tel: +(46)(0)720-372259</p>
            </div>

            <div class="col-xs-12 col-md-12 col-lg-4">
                <p><b>Web Master:</b> Marcus</p>

                <p>E-mail: <a href="mailto: marcus.jacobsson@ottomatech.se">marcus.jacobsson@ottomatech.se</a></p>

                <p>Tel:</p>
            </div>

            <div class="col-xs-12 col-md-12 col-lg-4">
                <p><b>Ekonomiansvarig: </b>Louise Rehn Winsborg</p>

                <p>E-mail: </p>

                <p>Tel: +(46)(0)705-501936</p>
            </div>
            <br>
        </div>

        <hr>

        <div class="row">
            <div class="col-xs-12 col-md-12 col-lg-12">
                <h2>Har du några frågor eller synpunkter?</h2>

                <p class="lead">
                    Var vänlig fyll i formen nedan,
                    så återkommer vi till dig så snabbt vi kan.
                </p>

                <p>Fält markerade med <strong>*</strong> måste fyllas i. Inga uppgifter lagras.</p>
            </div>
            <div class="col-xs-12 col-md-12 col-lg-8">
                <form class="form-horizontal" method="post" onsubmit="return validateContactForm()"
                      action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                    <div class="form-group" id="name_fg">
                        <label for="name" class="col-sm-2 control-label">Namn *</label>

                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="name" name="name" placeholder="Ange ditt namn."
                                   value="<?php echo $name ?>">
                        </div>
                    </div>
                    <div class="form-group" id="email_fg">
                        <label for="email" class="col-sm-2 control-label">Email *</label>

                        <div class="col-sm-10">
                            <input type="email" class="form-control" id="email" name="email"
                                   placeholder="Ange din E-mail." value="<?php echo $email ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="tel" class="col-sm-2 control-label">Telefonnummer</label>

                        <div class="col-sm-10">
                            <input type="tel" class="form-control" id="tel" name="tel"
                                   placeholder="Ange ditt telefonnummer. (frivilligt)" value="<?php echo $tel ?>">
                        </div>
                    </div>
                    <div class="form-group" id="message_fg">
                        <label for="message" class="col-sm-2 control-label">Meddelande *</label>

                        <div class="col-sm-10">
                            <textarea rows="10" class="form-control" id="message" name="message"
                                      placeholder="Skriv ditt meddelande."></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-primary">Skicka</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div id="push"></div>
</div>
<?php include 'footer.php'; ?>
</body>
</html>