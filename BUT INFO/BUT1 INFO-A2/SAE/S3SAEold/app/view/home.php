<?php
  session_start(); // must be before any output
  if(isset($_SESSION['login'])) $username = $_SESSION['login']["pseudo"]; 
?>
</html>
<!doctype html>
<html lang="fr">
<link rel="stylesheet" href="./../scripts/script.css">
<head>
    <meta charset="utf-8">
    <title>Mon magasin</title>
</head>
<body>
<nav>
    <ul>
        <?php
        if(isset($username) ) { ?>
            <h4>Hello <?=$username ?></h4>
            <li> <a href="<?=CFG['siteURL'].'User/logout'?>">  Logout </a></li>
            <li> <a href="<?=CFG['siteURL'].'Product/add'?>"> Add product </a> </li>
        <?php }else{ ?>
        <li> <a href="<?=CFG['siteURL'].'User/login'?>"> Login </a></li>
        <?php } ?> 
    </ul>
</nav>
<table>
    <thead>
        <tr>
            <th> id </th>
            <th> name </th>
            <th> price </th>
            <th> quantity </th>
            <?php
            if(isset($_SESSION['login'])&&$_SESSION["login"]["status"]=="Administrator"){
            ?>
                <th> update </th>
                <th> delete </th>
            <?php } ?>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($data as $product):?>
       <tr>
        <td> <?= $product->getId() ?> </td>
        <td> <a href="<?=CFG['siteURL'].'Product/display/'.$product->getId() ?>"><?= $product->getName() ?></a> </td>
        <td> <?= $product->getPrice() ?> </td>
        <td> <?= $product->getQuantity() ?> </td>
        <?php
        if(isset($_SESSION['login'])&&$_SESSION["login"]["status"]=="Administrator"){
        ?>
            <td> <a href="<?=CFG['siteURL'].'Product/update/'.$product->getId() ?>"> update </a></td>
            <td> <a href="<?=CFG['siteURL'].'Product/delete/'.$product->getId() ?>"> delete </a></td>
        <?php } ?>
       </tr>
    <?php endforeach;
    ?>
    </tbody>
</table>
</body>
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
</html>
