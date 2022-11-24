<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->helper('url');
session_start(); // must be before any output
$username=null;
if(isset($_SESSION['login'])) $username = $_SESSION['login']["pseudo"]; 
if(!isset($_SESSION['login'])||$password!=$_SESSION['login']["pseudo"]&&$_SESSION["login"]["status"]!="Administrator") redirect('Home/accessDenied', 'refresh');

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
            <a href="<?= base_url()."index.php/User/logout" ?>" >Deconnexion</a>
            <a href="<?= base_url()."index.php/Home/admin" ?>" >Admin</a>
            <table>
    <thead>
    <tr>
        <th> Pseudo </th>
        <th> Password </th>
        <th> Status </th>
        <?php
            if(isset($_SESSION['login'])&&$_SESSION["login"]["status"]=="Administrator"){
            ?>
                <th> update </th>
                <th> delete </th>
            <?php } ?>
    </tr>
    </thead>
    <tbody>

    <tr>
        <td> <?= $pseudo?> </td>
        <td> <?= $password ?> </td>
        <td> <?= $status ?> </td>
        <?php
        if(isset($_SESSION['login'])&&$_SESSION["login"]["status"]=="Administrator"){
        ?>
            <td> <a href="<?=base_url().'index.php/User/update/'.$pseudo ?>"> update</a></td>
            
            <td> <a href="<?=base_url().'index.php/User/delete/'.$pseudo ?>"> delete </a></td>
        <?php } ?>
    </tr>
    </tbody>
</table>
<!--UPDATE == SELECTION POUR ADMIN-->
   <style>
        table,
        td {
            background-color: #fff;
            text-align:center;
        }

        thead,
        tfoot {
            background-color: #fff;
        }
        table {
            background-color: #333;
        }
    </style>

        </div>


        <?php include 'footer.php';?>
    </body>
    
</html>
