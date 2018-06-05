<?php
include 'sendmail.php';

$name = $email = $tel = $message = "";
$name_error = $email_error = $tel_error = $message_error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $submit = true;

    if (empty($_POST["name"])) {
        $name_error = "Please prvide a name. ";
        $submit = false;
    } else {
        $name = test_input($_POST["name"]);
    }

    if (empty($_POST["email"])) {
        $email_error = "Please provide an e-mail. ";
        $submit = false;
    } else {
        $email = test_input($_POST["email"]);
    }

    if (!empty($_POST["tel"])) {
        if (!is_numeric($_POST["tel"])) {
            $tel_error = "Telephone number can not be letters. ";
            $submit = false;
        } else {
            $tel = test_input($_POST["tel"]);
        }
    }

    if (empty($_POST["message"])) {
        $message_error = "Please provide a message. ";
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
    <script src="../../js/validate_eng.js"></script>
    <title>OttoMaTech Contact</title>
</head>
<body>

<div id="wrap">
    <?php include 'nav.php'; ?>
    <div class="container">

        <div class="row" id="first">
            <div class="col-xs-12 col-md-12 col-lg-12">
                <h2>Do you have any questions or concerns?</h2>

                <p class="lead">
                    Please fill in the contact form below, and we will get back to you as soon as possible.
                </p>
                <br>
                <br>
                
                <p>Fields marked with <strong>*</strong> must be provided. No contact information is stored permanently.
                </p>
            </div>
            <div class="col-xs-12 col-md-12 col-lg-8">
                <form class="form-horizontal" method="post" onsubmit="return validateContactForm()"
                      action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                    <div class="form-group" id="name_fg">
                        <label for="name" class="col-sm-2 control-label">Name *</label>

                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="name" name="name"
                                   placeholder="Provide your name."
                                   value="<?php echo $name ?>">
                        </div>
                    </div>
                    <div class="form-group" id="email_fg">
                        <label for="email" class="col-sm-2 control-label">Email *</label>

                        <div class="col-sm-10">
                            <input type="email" class="form-control" id="email" name="email"
                                   placeholder="Provide your email." value="<?php echo $email ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="tel" class="col-sm-2 control-label">Telephone</label>

                        <div class="col-sm-10">
                            <input type="tel" class="form-control" id="tel" name="tel"
                                   placeholder="Provide your phone number. (not necessary)" value="<?php echo $tel ?>">
                        </div>
                    </div>
                    <div class="form-group" id="message_fg">
                        <label for="message" class="col-sm-2 control-label">Message *</label>

                        <div class="col-sm-10">
                            <textarea rows="10" class="form-control" id="message" name="message"
                                      placeholder="Write your message."></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-primary">Send</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div id="push"></div>
</div>
<?php include '../shared/footer.php'; ?>
</body>
</html>