<?php
/**
 * Created by PhpStorm.
 * User: Marcus Jacobsson
 * Date: 2015-08-05
 * Time: 18:45
 */

include_once 'nusoap.php';

$server = new soap_server();
$server->configureWSDL('hellowsdl', 'urn:hellowsdl');
$server->register('sendMail',                // method name
    array('to' => 'xsd:string', 'id' => 'xsd:string'),        // input parameters
    array('return' => 'xsd:boolean'),      // output parameters
    'urn:hellowsdl',                      // namespace
    'urn:hellowsdl#hello'                 // soapaction
);
$server->service($HTTP_RAW_POST_DATA);

function sendMail($to, $id)
{
    $subject = "Vault Password Reset";

    $body =
        '<html>
        <head>
            <title>Vault Password Reset</title>
        </head>
        <body>
          <h1>Click on the following link to (Choose open in browser) to reset your password</h1>
          <h1><a href="www.marcusserver.com/test/' . $id . '">www.marcusserver.com/test/' . $id . '</a></h1>
        </body>
        </html>';

    $headers = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";

    $success = mail($to, $subject, $body, $headers);
    return $success;
}