<?php
/*
 * Skript för att ladda upp en bild till webbservern.
 */
function upload_image()
{
    //Mappen där bilden ska laddas upp
    $target_dir = "../images/ad_uploads/";
    //Sökvägen + namnet på bilden som ska laddas upp
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    //För att hålla reda på om uppladdningen lyckades
    $uploadOk = true;
    //Bildens filformat
    $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
    //Kontrollera om filen är en bild
    if (isset($_POST["submit"])) {
        if(file_exists($_FILES["fileToUpload"]["tmp_name"])){
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            if ($check !== false) {
                $uploadOk = true;
            } else {
                $uploadOk = false;
                return "Filen är inte en bild.";
            }
        }
    }
    //Kontrollera om filen redan finns
    if (file_exists($target_file)) {
        $uploadOk = false;
        return "Filen finns redan.";
    }
    //Kontrollera filens storlek. Max storlek är 2MB
    if ($_FILES["fileToUpload"]["size"] > 1000000000) {
        $uploadOk = false;
        return "Filen är för stor.";
    }
    //Kontrollera bildens filformat.
    if ($imageFileType != "JPG" && $imageFileType != "PNG" && $imageFileType != "JPEG"
        && $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    ) {
        $uploadOk = false;
        return "Ej tillåten filtyp.";
    }
    //Kontrollera om uppladdningen lyckades
    if ($uploadOk == false) {
        return "Sorry, your file was not uploaded.";
        //Allt är OK, försök ladda upp filen
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            return basename($_FILES["fileToUpload"]["name"]);
        } else {
            return "Det gick inte att ladda upp filen.";
        }
    }
}