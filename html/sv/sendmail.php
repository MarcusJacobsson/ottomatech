<?php

/**
 * Created by PhpStorm.
 * User: Marcus Jacobsson
 * Date: 2015-01-13
 * Time: 17:12
 */
function sendMail($name, $email, $phone, $message) {
    $subject = "Nytt meddelande fran OttoMaTech.se kontaktformular";
    $to = "info@ottomatech.se , marcus.jacobsson@ottomatech.se";

    $body = '<html>
        <head>
            <title>Meddelande från OttoMaTech.se</title>
        </head>
        <body>
          <table>
            <tr>
              <td>Namn: </th>
              <td>' . $name . '</td>
            </tr>
            <tr>
              <td>Email: </th>
              <td>' . $email . '</td>
            </tr>
                        <tr>
              <td>Telefonnummer: </th>
              <td>' . $phone . '</td>
            </tr>
                        <tr>
              <td>Meddelande: </th>
              <td>' . $message . '</td>
            </tr>
          </table>
        </body>
        </html>';

    $headers = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";

    $success = mail($to, $subject, $body, $headers);

    if ($success) {
        echo '<script> alert ("Tack för ditt meddelande! Vi återkommer inom det snaraste.") </script>';
    } else {
        echo '<script> alert ("Tyvärr, ditt meddelandet kunde inte skickas.") </script>';
    }
}
