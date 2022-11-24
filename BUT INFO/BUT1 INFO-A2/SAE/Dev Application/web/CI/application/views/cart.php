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
<html>
<head>
    <meta charset="utf-8">
    <title>Cart</title>
    <link rel="stylesheet" href=<?= base_url() . CSS . "style.css" ?>>
    <link rel="stylesheet" href=<?= base_url() . CSS . "productstyle.css" ?>>
    <link rel="stylesheet" href=<?= base_url() . CSS . "headerstyle.css" ?>>
</head>
<body>
<?php foreach ($allproducts as $product):?>
    <div class="cartproduct">
        <?php $allpictures = $product[0]->getPictures();
        foreach ($allpictures as $picture) : ?>
            <img class="img" src=<?= base_url() . 'public/img/products/' . $picture ?>>
        <?php endforeach ?>
        <div class="productInformations">
            <div class="priceandname">
                <p class="ya name"> <?= $product[0]->getName() ?> </p>
                <p class="price"> <?= $product[0]->getPrice()."€" ?> </p>
            </div>
            <div class="deleteandqty">
                <div class="QuantitySelector">
                    <button class="Quantity Sign" title="Increase Quantity to <?= $product[1]+1 ?>" onClick="increase('qtyVal<?= $product[0]->getId() ?>', <?= $product[0]->getQuantity() ?>, <?= $product[0]->getId() ?>)">
                        +
                    </button>
                    <input  type="text" class="Quantity Number" id="<?="qtyVal".$product[0]->getId()?>" value="<?= $product[1] ?>" min="1"> </input>
                    <button class="Quantity Sign" title="Decrease Quantity to <?= $product[1]-1 ?>" onClick="decrease('qtyVal<?= $product[0]->getId() ?>')">
                        -
                    </button>
                </div>
                <a href="<?=base_url().'index.php/Product/deleteToCart/'.$product[0]->getId() ?>"> delete </a>
            </div>
        </div>
    </div>
    <?php endforeach;?>
</body>
<script
  src="https://code.jquery.com/jquery-3.6.1.min.js"
  integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ="
  crossorigin="anonymous"></script> 

<script type="text/javascript" srv="<?=base_url().JS."cart.js"?>">
    
</script>
</html>
<?php } ?>