<?php
  session_start(); // must be before any output
  $this->load->helper("url");
  $this->load->helper('form');
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

<?php echo form_open_multipart('Product/addProduct');?>
    <input type="text" name="id" placeholder="id" value="<?=$freeId?>" required>
    <input type="text" name="name" placeholder="name" required>
    <input type="text" name="price" placeholder="price" required>
    <input type="text" name="quantity" placeholder="quantity" required>
    <label for="files" class="btn">Selectionner 0, 1 ou plusieurs fichiers... (gif|jpg|png|jpeg)</label>
    <input id="files" type="file" name="userfile[]" multiple="multiple">
    <!-- QUANTITY N'EST PAS REQUIRED? -->
    <input type="submit">
</form>
</body>
</html>
<?php
  }
  if (isset($upload_error))echo $upload_error;
?>


