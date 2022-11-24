<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->helper('url');
session_start(); // must be before any output
$username=null;
if(isset($_SESSION['login'])) $username = $_SESSION['login']["pseudo"]; 
if(!isset($_SESSION['login'])) redirect('User/login', 'refresh');
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
<p> <a href="<?=base_url()?>"> Home </a></p>
<?php 
    $cartPrice=0;
    foreach ($allproducts as $product):
        var_dump($product);
        $cartPrice+=$product[0]->getPrice() * $product[1];
    ?>
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
                    <input  type="text" class="Quantity Number" onChange="updateCookieValue(event, '<?=$product[0]->getId()?>', '<?=$product[0]->getQuantity()?>')" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" id="<?="qtyVal".$product[0]->getId()?>" value="<?= $product[1] ?>" pattern="[0-9]+"> </input>
                    <button class="Quantity Sign" title="Decrease Quantity to <?= $product[1]-1 ?>" onClick="decrease('qtyVal<?= $product[0]->getId() ?>', <?= $product[0]->getId() ?>)">
                        -
                    </button>
                </div>
                <a class="delete" href="<?=base_url().'index.php/Product/deleteToCart/'.$product[0]->getId().'/cart' ?>"> delete </a>
            </div>
        </div>
    </div>
    <?php endforeach;?>
    <a class="pay" href="<?=base_url().'index.php/Product/syncCartAndDatabase'?>"><?= "PAYER      |      ".$cartPrice?> €</a>
</body>
<script
  src="https://code.jquery.com/jquery-3.6.1.min.js"
  integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ="
  crossorigin="anonymous"></script> 
<script type="text/javascript">
    function increase(className, maxStock, productId){
        var oldval=parseInt(document.getElementById(className).value);
        if (document.getElementById(className).value <= maxStock-1){
            document.getElementById(className).value=parseInt(document.getElementById(className).value)+1;
            $.post("<?php echo base_url().'index.php/Product/increaseCartQty/';?>"+productId+"/"+oldval,
                function(data) {
                    alert(data+"a");
                }, 'json'
            );
        }
    }

    function decrease(className, productId){
        
        var oldval=parseInt(document.getElementById(className).value);
        if(parseInt(document.getElementById(className).value) >1){
            document.getElementById(className).value=parseInt(document.getElementById(className).value)-1;
            $.post("<?php echo base_url().'index.php/Product/decreaseCartQty/';?>"+productId+"/"+oldval,
                function(data) {
                    alert(data+"a");
                }, 'json'
            );
        }
    }

    function updateCookieValue(e,productId, productMaxQty) {
        console.log(productId);
        console.log(e.target.value);
        if (parseInt(e.target.value)>parseInt(productMaxQty)){
            e.target.value=productMaxQty;
        } 
        else if (parseInt(e.target.value)==0) {
            e.target.value=1;
        } else {
            $.post("<?php echo base_url().'index.php/Product/updateCartQty/';?>"+productId+"/"+e.target.value,
                function(data) {
                    alert(data+"a");
                }, 'json'
            );
        } 
    }

    obj.addEventListener("change", updateCookieValue);
</script>
</html>