<?php
/**
 * Created by PhpStorm.
 * User: Marcus Jacobsson
 * Date: 2015-07-13
 * Time: 07:54
 */

require 'PasswordHash.php';
require 'PHPClasses/user.php';
require 'PHPClasses/category.php';
require 'PHPClasses/annons.php';

function openConnection()
{
    define('DB_USER', 'ottomatech_se');
    define('DB_PASSWORD', 'uWsebAiy');
    define('DB_HOST', 'ottomatech.se.mysql');
    define('DB_NAME', 'ottomatech_se');

    global $db_conn;
    $db_conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

    if (!$db_conn) {
        die("Connection failed: Det gick inte att ansluta till databasen. Kontakta databasadministratör. ");
    }

    //MÅSTE VARA MED! Annars konstiga tecken...
    $db_conn->set_charset("utf8");
}

//STÄNG ANSLUTNING TILL DB
function closeConnection()
{
    global $db_conn;
    mysqli_close($db_conn);
}

//LOGGA IN
function signIn($username, $password)
{
    openConnection();
    global $db_conn;

    //$q = "SELECT användarnamn, lösenord FROM Användare WHERE användarnamn='$username'";

    $q = $db_conn->prepare("SELECT användarnamn, lösenord FROM Användare WHERE användarnamn=?");
    $q->bind_param('s', $username);
    $q->execute();
    $r = $q->get_result();

    //Försöker skicka query till DB, om det ej fungerar släng ett exception
    if ($r === false) {
        throw new Exception(mysqli_error($db_conn));
    } else {
        $num = mysqli_num_rows($r);

        // Ifall resultatet har några rader
        if ($num > 0) {
            //We return the username if there was a result
            while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
                $username = $row['användarnamn'];
                $hashed_password = $row['lösenord'];

                //Kontrollera det krypterade lösenordet
                $t_hasher = new PasswordHash(8, FALSE);
                if ($t_hasher->CheckPassword($password, $hashed_password)) {
                    return $username;
                } else {
                    return "Error";
                }
            }
            mysqli_free_result($r);
        } else {
            return "Error";
        }
    }
    closeConnection();
}

//LÄGG TILL ANVÄNDARE
function addUser($username, $password, $email)
{
    openConnection();
    global $db_conn;

    $q = "INSERT INTO Användare VALUES ('$username', '$password' ,'$email', 0)";

    //Försöker skicka query till DB, om det ej fungerar släng ett exception
    if (($r = mysqli_query($db_conn, $q)) === false) {
        throw new Exception(mysqli_error($db_conn));
    }
    closeConnection();
}

//TA BORT ANVÄNDARE
function removeUser($username)
{
    openConnection();
    global $db_conn;

    $q = "DELETE FROM Användare WHERE användarnamn = '$username'";
    //Försöker skicka query till DB, om det ej fungerar släng ett exception
    if (($r = mysqli_query($db_conn, $q)) === false) {
        throw new Exception(mysqli_error($db_conn));
    }
    closeConnection();
}

//UPPDATERA ANVÄNDARE LÖSENORD
function updateUserPassword($username, $password)
{
    openConnection();
    global $db_conn;

    $q = "UPDATE Användare SET lösenord = '$password' WHERE användarnamn = '$username'";

    if (($r = mysqli_query($db_conn, $q)) === false) {
        throw new Exception(mysqli_error($db_conn));
    }
    closeConnection();
}

//UPPDATERA ANVÄNDARE EMAIL
function updateUserEmail($username, $email)
{
    openConnection();
    global $db_conn;

    $q = "UPDATE Användare SET email = '$email' WHERE användarnamn = '$username'";

    if (($r = mysqli_query($db_conn, $q)) === false) {
        throw new Exception(mysqli_error($db_conn));
    }
    closeConnection();
}

//HÄMTA ALLA ANVÄNDARE
function getAllUsers()
{
    openConnection();
    global $db_conn;

    // Skapar SQL-fråga
    $q = "SELECT användarnamn, email FROM Användare";

    //Försöker skicka query till DB, om det ej fungerar släng ett exception
    if (($r = mysqli_query($db_conn, $q)) === false) {
        throw new Exception(mysqli_error($db_conn));
    } else {
        $num = mysqli_num_rows($r);

        if ($num > 0) { // Ifall resultatet har några rader
            $users = array();
            while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
                $tmp_user = new user();
                $tmp_user->setUsername($row['användarnamn']);
                $tmp_user->setEmail($row['email']);
                $users[] = $tmp_user;
            }
            mysqli_free_result($r);
            closeConnection();
            return $users;
        } else {
            closeConnection();
            return "Error";
        }
    }
}

function isUserSuperAdmin($username)
{
    openConnection();
    global $db_conn;

    $q = "SELECT superadmin FROM Användare WHERE användarnamn='$username'";

    if (($r = mysqli_query($db_conn, $q)) === false) {
        throw new Exception(mysqli_error($db_conn));
    } else {
        $num = mysqli_num_rows($r);

        if ($num > 0) { // Ifall resultatet har några rader
            $isSuperAdmin = 0;
            while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
                $isSuperAdmin = $row['superadmin'];
            }
            mysqli_free_result($r);
            closeConnection();
            return $isSuperAdmin;
        } else {
            closeConnection();
            return "Error";
        }
    }
}

function addCategory($name)
{
    openConnection();
    global $db_conn;

    $q = "INSERT INTO Kategori VALUES ('$name')";

    if (($r = mysqli_query($db_conn, $q)) === false) {
        throw new Exception(mysqli_error($db_conn));
    }
    closeConnection();
}

function addAd($name, $price, $description, $category, $image)
{
    openConnection();
    global $db_conn;

    $q = "INSERT INTO Annons VALUES ('$name', $price, '$description', '$category', '$image')";

    if (($r = mysqli_query($db_conn, $q)) === false) {
        throw new Exception(mysqli_error($db_conn));
    }
    closeConnection();
}

function getAllAds()
{
    openConnection();
    global $db_conn;

    $q = "SELECT * FROM Annons";

    if (($r = mysqli_query($db_conn, $q)) === false) {
        throw new Exception(mysqli_error($db_conn));
    } else {
        $num = mysqli_num_rows($r);

        if ($num > 0) { // Ifall resultatet har några rader
            $ads = array();
            while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
                $tmp_ad = new ad();
                $tmp_ad->setName($row['annonsNamn']);
                $tmp_ad->setPrice($row['pris']);
                $tmp_ad->setDescription($row['beskrivning']);
                $tmp_ad->setImage($row['bild']);
                $tmp_ad->setCategory($row['kategoriNamn']);
                $ads[] = $tmp_ad;
            }
            mysqli_free_result($r);
            closeConnection();
            return $ads;
        } else {
            closeConnection();
            return "Error";
        }
    }
}

function getAddsByCategoryName($categoryName)
{
    openConnection();
    global $db_conn;

    $q = "SELECT * FROM Annons WHERE kategoriNamn = '$categoryName'";

    if (($r = mysqli_query($db_conn, $q)) === false) {
        throw new Exception(mysqli_error($db_conn));
    } else {
        $num = mysqli_num_rows($r);

        if ($num > 0) { // Ifall resultatet har några rader
            $ads = array();
            while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
                $tmp_ad = new ad();
                $tmp_ad->setName($row['annonsNamn']);
                $tmp_ad->setPrice($row['pris']);
                $tmp_ad->setDescription($row['beskrivning']);
                $tmp_ad->setImage($row['bild']);
                $tmp_ad->setCategory($row['kategoriNamn']);
                $ads[] = $tmp_ad;
            }
            mysqli_free_result($r);
            closeConnection();
            return $ads;
        } else {
            closeConnection();
            return "Error";
        }
    }
}

function getAllCategoryNames()
{
    openConnection();
    global $db_conn;

    $q = "SELECT kategoriNamn FROM Kategori";

    if (($r = mysqli_query($db_conn, $q)) === false) {
        throw new Exception(mysqli_error($db_conn));
    } else {
        $num = mysqli_num_rows($r);

        if ($num > 0) { // Ifall resultatet har några rader
            $categories = array();
            while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
                $tmp_category = new category();
                $tmp_category->setCategoryName($row['kategoriNamn']);
                $categories[] = $tmp_category;
            }
            mysqli_free_result($r);
            closeConnection();
            return $categories;
        } else {
            closeConnection();
            return "Error";
        }
    }
}

function removeCategory($categoryName)
{
    openConnection();
    global $db_conn;

    $q = "DELETE FROM Kategori WHERE kategoriNamn = '$categoryName'";
    //Försöker skicka query till DB, om det ej fungerar släng ett exception
    if (($r = mysqli_query($db_conn, $q)) === false) {
        throw new Exception(mysqli_error($db_conn));
    }
    closeConnection();
}

function updateAd($oldName, $newName, $price, $description, $category)
{
    openConnection();
    global $db_conn;

    $q = "UPDATE Annons SET annonsNamn = '$newName', pris=$price, beskrivning = '$description', kategoriNamn = '$category' WHERE annonsNamn = '$oldName'";

    if (($r = mysqli_query($db_conn, $q)) === false) {
        throw new Exception(mysqli_error($db_conn));
    }
    closeConnection();
}

function removeAd($adName)
{
    openConnection();
    global $db_conn;

    $q = "DELETE FROM Annons WHERE annonsNamn = '$adName'";
    //Försöker skicka query till DB, om det ej fungerar släng ett exception
    if (($r = mysqli_query($db_conn, $q)) === false) {
        throw new Exception(mysqli_error($db_conn));
    }
    closeConnection();
}

function updateCategory($oldName, $newName)
{
    openConnection();
    global $db_conn;

    $q = "UPDATE Kategori SET kategoriNamn = '$newName' WHERE kategoriNamn = '$oldName'";

    if (($r = mysqli_query($db_conn, $q)) === false) {
        throw new Exception(mysqli_error($db_conn));
    }
    closeConnection();
}

function getAdImageName($adName)
{
    openConnection();
    global $db_conn;

    $q = "SELECT bild FROM Annons WHERE annonsNamn='$adName'";

    if (($r = mysqli_query($db_conn, $q)) === false) {
        throw new Exception(mysqli_error($db_conn));
    } else {
        $num = mysqli_num_rows($r);

        if ($num > 0) { // Ifall resultatet har några rader
            $image = "";
            while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
                $image = $row['bild'];
            }
            mysqli_free_result($r);
            closeConnection();
            return $image;
        } else {
            closeConnection();
            return "Error";
        }
    }
}

