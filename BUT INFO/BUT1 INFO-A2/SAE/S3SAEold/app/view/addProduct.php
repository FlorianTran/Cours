<?php
  session_start(); // must be before any output
  if(isset($_SESSION['login'])&&$_SESSION["login"]["status"]=="Administrator"){
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Ajout magasin</title>
</head>
<body>
<p> <a href="<?=CFG["siteURL"]?> "> Home </a></p>
<form action="<?=CFG['siteURL'].'Product/addProduct'?>" method="post">
    <input type="text" name="id" placeholder="id">
    <input type="text" name="name" placeholder="name">
    <input type="text" name="price" placeholder="price">
    <input type="text" name="quantity" placeholder="quantity">
    <input type="submit">
</form>
</body>
</html>
  
<?php
}else include 'view/accessDenied.php';
?>