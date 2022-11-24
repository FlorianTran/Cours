<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->helper('url');
session_start(); // must be before any output
$username='null';
if(isset($_SESSION['login'])) $username = $_SESSION['login']["pseudo"]; 
?>
<!doctype html>
    <html lang="fr">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href=<?=base_url().CSS."style.css" ?>>
        <link rel="stylesheet" href=<?=base_url().CSS."script.css" ?>>
        <link rel="stylesheet" href=<?=base_url().CSS."headerstyle.css" ?>>
        <title>Mon magasin</title>
    </head>
    <body>
        <?php include 'header.php';?>
        <div class="contentlogin">
            <div class="login-popup">
                <p class="popup-title">S'inscrire</p>
                <form class="login-form" action="<?= base_url()."index.php/User/signinCheck" ?>" method="post">
                    <input type="text" name="login" placeholder="giovanni" required>
                    <input type="password" name="password" placeholder="password" required>
                    <input type="password" name="confpassword" placeholder="confirm password" require>
                    <input type="submit">
                </form>
            </div>
        </div>
    <?php include 'footer.php';?>
    </body>
</html>
