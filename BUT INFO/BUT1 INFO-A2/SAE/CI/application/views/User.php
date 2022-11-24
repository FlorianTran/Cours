<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->helper('url');
session_start(); // must be before any output
$username=null;
if(isset($_SESSION['login'])) $username = $_SESSION['login']["pseudo"]; 
if(!isset($_SESSION['login'])) redirect('User/login', 'refresh');
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
            <?php
            if($_SESSION["login"]["pseudo"]==$pseudo){
            ?>
            <a href="<?= base_url()."index.php/User/logout" ?>" >Deconnexion</a>
            <?php } ?>
            <table>
    <thead>
    <tr>
        <th> Pseudo </th>
        <th> Password </th>
        <th> Status </th>
        <?php
            if($_SESSION["login"]["status"]=="Administrator"){
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
        if($_SESSION["login"]["status"]=="Administrator"){
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
