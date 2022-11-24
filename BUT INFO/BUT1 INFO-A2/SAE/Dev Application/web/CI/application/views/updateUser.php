<?php
  defined('BASEPATH') OR exit('No direct script access allowed');
  $this->load->helper("url");
  session_start(); // must be before any output
  if(isset($_SESSION['login'])) $username = $_SESSION['login']["pseudo"]; 
  if(!isset($_SESSION['login'])||$_SESSION["login"]["status"]!="Administrator") $this->load->view('accessDenied');
else {
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Modification utilisateur</title>
</head>
<body>
<p> <a href="<?=base_url()."index.php/Home/admin"?> "> Admin </a></p>
<form action="<?='./../../User/updateUser'?>" method="post">
    <input type="text" name="pseudo" value="<?=$pseudo?>" readonly>
    <input type="text" name="password" value="<?=$password?>" placeholder="name" required>
    <div>
      <input type="radio" id="visitor" name="status" value="Visitor" = REQUIRED>
      <label for="visitor">Visitor</label>
      <input type="radio" id="administrator" name="status" value="Administrator" required>
      <label for="administrator">Admin</label>
    </div>
    <!-- GERER LE CHANGEMENT DE STATUT -->
    <input type="submit">
</form>
</body>
</html>
<?php 
}
?>