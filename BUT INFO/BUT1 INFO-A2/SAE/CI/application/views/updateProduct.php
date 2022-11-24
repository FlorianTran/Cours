<?php
  defined('BASEPATH') OR exit('No direct script access allowed');
  $this->load->helper("url");
  $this->load->helper('form');
  session_start(); // must be before any output
  if(isset($_SESSION['login'])) $username = $_SESSION['login']["pseudo"]; 
  if(!isset($_SESSION['login'])||$_SESSION["login"]["status"]!="Administrator") $this->load->view('accessDenied');
else {
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Modification produit</title>
</head>
<body>
<p> <a href="<?=base_url()."index.php/Home/admin"?> "> Admin </a></p>
<form action="<?='./../../product/updateProduct'?>" method="post">
    <input type="text" name="id" value="<?=$id?>" readonly>
    <input type="text" name="name" value="<?=$name?>" placeholder="name" required>
    <input type="text" name="price" value="<?=$price?>" placeholder="price" required>
    <input type="text" name="quantity" value="<?=$quantity?>" placeholder="quantity">
    <input type="submit">
</form>
<div class="pictures">
  <?php
    foreach ($allpictures as $picture):?>
      <table>
        <tbody>
          <td> <img class="img" src=<?=base_url().'public/img/products/'.$picture?>></td>
          <td> 
          <?php echo form_open_multipart('Product/updatePictureOfProduct/'.$id."/".$picture);?> Update 
            <input id="file" type="file" name="userfile">
            <br>
            <br>
            <input type="submit" value="valider le changement d'image">
          </form>
          </td>
          <td> <a href="<?=base_url().'index.php/Product/deletePictureOfProduct/'.$id."/".$picture ?>"> delete </a></td>
        </tbody>
      </table>
    <?php 
    endforeach
  ?>
</div>
<div class="newpicture">
  <table>
    <tbody>
      <td> 
        <?php echo form_open_multipart('Product/addPictureOfProduct/'.$id);?> New Picture
          <input id="file" type="file" name="userfile">
          <br>
          <br>
          <?php 
          if (sizeof($allpictures)!=1 or $allpictures[0]!="error/null.jpg"){ ?>
            <label>Position of the new Picture</label>
            <br>
            <br>
            <?php for($i=1; $i<sizeof($allpictures)+2; $i++){ ?>
            <label><?=$i?></label>
            <input type="radio" id="<?=$i?>" name="pos" value="<?=$i?>" >
            <br>
            <?php
            } 
            } 
          ?>
          <br>
          <br>
          <input type="submit" value="Valider la nouvelle image">
      </form>
    </tbody>
  </table>
</div>
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
            width: 200px;
            
            margin:30px;
        }
        .pictures{
          display: flex;
          flex-direction:column;
        }
    </style>
</body>
</html>
<?php } ?>
  