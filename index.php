<?php

$error = '';
$dat_checked = '';
$agb_checked = '';


function clean_text($string)
{
        $string = trim($string);
        $string = stripslashes($string);
        $string = htmlspecialchars($string);
        return $string;
}

if (isset($_POST["submit"])) {

        if (empty($_POST["fb_name"])) {
                $error .= '<p class="error">Facebook Name * bitte ausfüllen</p>';
        } else {
                $fb_name = clean_text($_POST["fb_name"]);
        }


        if (empty($_POST["name"])) {
                $error .= '<p class="error">Vorname * bitte ausfüllen</p>';
        } else {
                $name = clean_text($_POST["name"]);
                if (!preg_match("/^[a-zA-ZäÄöÖüÜßé ]*$/", $name)) {
                        $error .= '<p class="error">Vorname * Nur Buchstaben sind zulässig</p>';
                }
        }

        if (empty($_POST["surname"])) {
                $error .= '<p class="error">Name * bitte ausfüllen</p>';
        } else {
                $surname = clean_text($_POST["surname"]);
                if (!preg_match("/^[a-zA-ZäÄöÖüÜßé ]*$/", $surname)) {
                        $error .= '<p class="error">Nachname * Nur Buchstaben sind zulässig</p>';
                }
        }

        if (empty($_POST["email"])) {

                $error .= '<p class="error">E-Mail Adresse * bitte ausfüllen</p>';
        } else {
                $email = clean_text($_POST["email"]);
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                        $error .= '<p class="error">E-Mail Adresse * Bitte gültige E-Mail Adresse eingeben</p>';
                }
        }

        if (isset($_POST["add"])) {

                $add = clean_text($_POST["add"]);
        }

        if (empty($_POST["street"])) {
                $error .= '<p class="error">Straße * bitte ausfüllen</p>';
        } else {
                $street = clean_text($_POST["street"]);
        }

        if (empty($_POST["house"])) {

                $error .= '<p class="error">Hausnummer * bitte ausfüllen</p>';
        } else {
                $house = clean_text($_POST["house"]);
                if (!preg_match("/^[0-9a-zA-Z ]*$/", $house)) {
                        $error .= '<p class="error">Hausnummer * beinhaltet nicht erlaubte Zeichen</p>';
                }
        }

        if (empty($_POST["plz"])) {
                $error .= '<p class="error">PLZ * bitte ausfüllen</p>';
        } else {
                $plz = clean_text($_POST["plz"]);
                if (!preg_match("/[0-9]{5}/", $plz)) {
                        $error .= '<p class="error">PLZ * Bitte fünfstellige Postleitzahl eingegeben</p>';
                }
        }

        if (empty($_POST["place"])) {
                $error .= '<p class="error">Ort * bitte ausfüllen</p>';
        } else {
                $place = clean_text($_POST["place"]);
        }

        if (!isset($_POST['dat'])) {
                $error .= '<p class="error">Datenschutzerklärung * bestätigen Sie, dass Sie die Bestimmungen gelesen haben und damit einverstanden sind</p>';
        }else{
                $dat_checked = 'checked';
        }

        $agb = '';
        if (!isset($_POST['agb'])) {
                $error .= '<p class="error">allgemeine Geschäftsbedingungen und Widerrufsbelehrung * bestätigen Sie, dass Sie die Bestimmungen gelesen haben und damit einverstanden sind</p>';
        }else{
                $agb_checked = 'checked';
        }



        if ($error == '') {

                $error = '<div class="no_error">Danke für deine Registrierung</div>';

                unset($email);
                unset($name);
                unset($surname);
                unset($fb_name);
                unset($street);
                unset($add);
                unset($house);
                unset($plz);
                unset($place);

                $dat_checked = '';
                $agb_checked = '';
        }
}

?>
<!DOCTYPE html>
<html>

<head>
        <title>Your-Bestfashion</title>
        <link rel="icon" type="image/x-icon" href="img/favicon_32x32.webp">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.0/css/all.min.css" integrity="sha512-AyOHI/tIMgoG+32apAs3OdqFowPSDqiz5vLcD2wdhBJ4J/xF1PI6UITcyhS5HCmsiioapRaONqYBvimxzFfnoA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="styles.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>

<body>
        <br />
        <div class="container">

                <div class="col-md-6" style="margin:0 auto; float:none;">

                        <div class="logo">

                        </div>
                        <form class="form" method="post" autocomplete="off">


                                <?php
                                if (isset($error)) { echo $error; }
                                ?>

                                <h3>REGISTRIERE DICH</h3>


                                <div class="form-group">

                                        <input type="text" maxlength="30" name="fb_name" placeholder="Facebook Name *" class="form-control" value="<?= isset($fb_name) ?  $fb_name  : ''; ?>" />
                                </div>
                                <div class="form-group">

                                        <input type="email" name="email" class="form-control" placeholder="E-Mail Adresse *" value="<?= isset($email) ?  $email  : ''; ?>" />
                                </div>
                                <div class="form-group">

                                        <input type="text" maxlength="30" name="name" placeholder="Vorname *" class="form-control" value="<?= isset($name) ?  $name  : ''; ?>" />
                                </div>
                                <div class="form-group">

                                        <input type="text" maxlength="30" name="surname" placeholder="Name *" class="form-control" value="<?= isset($surname) ?  $surname  : ''; ?>" />
                                </div>

                                <div class="form-group">
                                        <input type="text" maxlength="30" name="add" class="form-control" placeholder="Adresszusatz" value="<?= isset($add) ?  $add  : ''; ?>" />
                                </div>
                                <div class="form-group">

                                        <input type="text" maxlength="30" name="street" class="input_street form-control" placeholder="Straße *" value="<?= isset($street) ?  $street  : ''; ?>" />
                                        <input type="text" maxlength="10" name="house" class="input_num form-control" placeholder="Nr. *" value="<?= isset($house) ?  $house  : ''; ?>" />
                                </div>

                                <div class="form-group">

                                        <input type="number" min="01067" max="99999" name="plz" class="input_plz form-control " placeholder="PLZ *" value="<?= isset($plz) ?  $plz  : ''; ?>" />
                                        <input type="text" maxlength="30" name="place" class="input_place form-control" placeholder="Ort *" value="<?= isset($place) ?  $place  : ''; ?>" />

                                </div>

                                <div class="form-group">
                                        <input type="checkbox" name="dat" <?= $dat_checked; ?>>
                                        <p class="dat"> Ich akzeptiere die Speicherung und Verarbeitung meiner Daten laut Datenschutzerklärung. *
                                                <a href="https://google.com" target="_blank"><i class="fa fa-external-link-alt"></i></a>
                                        </p>

                                </div>

                                <div class="form-group">
                                        <input type="checkbox" name="agb" <?= $agb_checked; ?>>
                                        <p class="dat">
                                                Ich habe die
                                                <a href="https://google.com" target="_blank">allgemeinen Geschäftsbedingungen</a>
                                                und
                                                <a href="https://google.com" target="_blank">Widerrufsbelehrung</a>
                                                gelesen und zur Kenntnis genommen. *
                                        </p>
                                        <input type="submit" name="submit" class="btn-sub btn" value="Registrieren" />
                                </div>

                        </form>




                        <div class="footer">
                                <hr>
                                <p>
                                        <a href="https://google.com" target="_blank">Allgemeine Geschäftsbedingungen</a> |
                                        <a href="https://google.com" target="_blank">Widerrufsbelehrung</a> |
                                        <a href="https://google.com" target="_blank">Impressum</a> |
                                        <a href="https://google.com" target="_blank">Datenschutz</a>

                                </p>
                                <p>©2023 <a href="https://google.com" target="_blank">Your-Bestfashion</a></p>
                        </div>


                </div>
        </div>
</body>

</html>