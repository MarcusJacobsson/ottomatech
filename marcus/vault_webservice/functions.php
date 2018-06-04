<?php

function test($name) {
    return "Hello " . $name;
}

//Password reset request mail
function sendMail($to, $token) {

    $subject = "Vault password reset request";
    $message = "Copy below code and paste it in Vault, under \"Password Reset\".\n\n"
            . "Please note: This code will only be valid for the next 15 minutes.\n\n"
            . "Your reset code: " . $token;
    $message = wordwrap($message, 70);
    $headers = "From: noreply@vaultpasswordreset.com";

    mail($to, $subject, $message, $headers);

    return "To: " . $to . " token: " . $token;
}

//Anti break in warning mail
function sendWarningMail($to, $timezone){
    
    date_default_timezone_set($timezone);
    
    $date = date("Y-m-d H:i:s");
            
    $subject = "Vault Anti Break In";
    $message = "This is an automated security message sent from Vault.\n\n" .
            "The number of allowed login attempts has been reached.\n\n" . 
            "Time: " . $date . "\n" .
            "Timezone: " . $timezone;
         
               
    
    $message = wordwrap($message, 70);
    $headers = "From: noreply@vaultantibreakin.com";

    mail($to, $subject, $message, $headers);
    
    return $to;
}
