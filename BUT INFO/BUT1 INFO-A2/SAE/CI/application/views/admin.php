<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->helper('url');
session_start(); // must be before any output
$username='null';
if(isset($_SESSION['login'])) $username = $_SESSION['login']["pseudo"]; 
if(!isset($_SESSION['login'])||$_SESSION["login"]["status"]!="Administrator") redirect('Home/accessDenied', 'refresh');
else {  
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Admin</title>
</head>
<body>
    <!------------------------------------------------------------------------- Redir home ------------------------------------------------------------------------------->
    <p> <a href="<?=base_url()?>"> Home </a></p>
    <!------------------------------------------------------------------------- TABLEAU USER ------------------------------------------------------------------------------->
    <table>
        <thead>
            <tr>
                <th> pseudo </th>
                <th> password </th>
                <th> status </th>
                <?php
                if(isset($_SESSION['login'])&&$_SESSION["login"]["status"]=="Administrator"){
                ?>
                    <th> update </th>
                    <th> delete </th>
                    <th> history of orders </th>
                <?php } ?>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($allusers as $user):?>
        <tr>
            <td> <a href="<?=base_url().'index.php/User/display/'.$user->getPseudo() ?>"><?= $user->getPseudo() ?></a> </td>
            <td> <?= $user->getPassword() ?> </td>
            <td> <?= $user->getStatus() ?> </td>
            <?php
            if(isset($_SESSION['login'])&&$_SESSION["login"]["status"]=="Administrator"){
            ?>
                <td> <a href="<?=base_url().'index.php/User/update/'.$user->getPseudo() ?>"> update </a></td>
                <td> <a href="<?=base_url().'index.php/User/delete/'.$user->getPseudo() ?>"> delete </a></td>
                <td> <a href="<?=base_url().'index.php/Commande/displayCmdFromUser/'.$user->getPseudo() ?>"> see </a></td>
            <?php } ?>
            </tr>
        <?php endforeach;
        ?>
        </tbody>
    </table>
    <!------------------------------------------------------------------------- Redir USER ------------------------------------------------------------------------------->
    <p> <a href="<?=base_url()."index.php/User/add"?>"> Add User </a></p>
    <!------------------------------------------------------------------------- TABLEAU PROD ------------------------------------------------------------------------------->
    <table>
        <thead>
            <tr>
                <th> id </th>
                <th> name </th>
                <th> price </th>
                <th> quantity </th>
                <th> number of pictures </th>
                <?php
                if(isset($_SESSION['login'])&&$_SESSION["login"]["status"]=="Administrator"){
                ?>
                    <th> update </th>
                    <th> delete </th>
                <?php } ?>
                <th> Panier </th>
            </tr>
        </thead>
        <tbody>
        <?php
        foreach ($allproducts as $product):?>
        <tr>
            <td> <?= $product->getId() ?> </td>
            <td> <a href="<?=base_url().'index.php/Product/display/'.$product->getId() ?>"><?= $product->getName() ?></a> </td>
            <td> <?= $product->getPrice() ?> </td>
            <td> <?= $product->getQuantity() ?> </td>
            <td> <?= $product->getPicturesSize() ?> </td>
            <?php
            if(isset($_SESSION['login'])&&$_SESSION["login"]["status"]=="Administrator"){
            ?>
                <td> <a href="<?=base_url().'index.php/Product/update/'.$product->getId() ?>"> update </a></td>
                <td> <a href="<?=base_url().'index.php/Product/delete/'.$product->getId() ?>"> delete </a></td>
            <?php } ?>

            <td>
                <form action="<?=base_url().'index.php/Product/addToCart/'.$product->getId()?>" method="post">
                <select name="<?="qtyOf".$product->getId()?>">
                    <?php for ($i=0; $i<$product->getQuantity()&&$i<10; $i++){ ?>
                        <option value="<?= $i+1 ?>"><?= $i +1?></option>
                    <?php } ?>
                </select>
                <?php $_SESSION["redirect"]=uri_string(); 
                ?>
                <input type="submit" value="ADD TO CART">
                </form>
            </td>
        </tr>
        <?php endforeach;
        ?>
            
        </tbody>
    </table>

    
    <!------------------------------------------------------------------------- Redir PROD ------------------------------------------------------------------------------->
    <p> <a href="<?=base_url()."index.php/Product/add"?>"> Add Product </a></p>
</body>
    <!---------------------------------------------------------------------------------------------------------------------------------------------------------------------->

    <p>CONTENU DU PANIER : <?php var_dump($cart) ?></p>
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
        .img{
            width:150px;
            height:150px;
        }
</style>
</html>
<?php }?>