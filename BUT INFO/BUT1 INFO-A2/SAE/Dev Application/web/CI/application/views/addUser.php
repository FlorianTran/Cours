<?php
  session_start(); // must be before any output
  $this->load->helper("url");
  if(isset($_SESSION['login'])) $username = $_SESSION['login']["pseudo"]; 
  if(!isset($_SESSION['login'])||$_SESSION["login"]["status"]!="Administrator")
    redirect('Home/accessDenied', 'refresh');
  else {
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Ajout magasin</title>
</head>
<body>
<p> <a href="<?=base_url()."index.php/Home/admin"?> "> Admin </a></p>
<form action="<?='./addUser'?>" method="post">
    <input type="text" name="pseudo" placeholder="Pseudo" required>
    <input type="password" name="password" placeholder="Password" required>
    <div>
      <input type="radio" id="visitor" name="status" value="Visitor" = REQUIRED>
      <label for="visitor">Visitor</label>
      <input type="radio" id="administrator" name="status" value="Administrator" required>
      <label for="administrator">Admin</label>
    </div>
    <input type="submit">
</form>
</body>
</html>
<?php
  }
?>


