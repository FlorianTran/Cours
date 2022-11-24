<div id="overlay"></div>
<div id="sidenavcart" class="classsidenavcart">
    <div class="cartHeader">
        <p>MON PANIER</p>
        <a class="closebtn" onclick="closeNav()">&times;</a>
    </div>
    <div class="cartContent">
        <div class="cartBody" data-scrollable>
            <?php 
                $cartPrice=0;
                foreach ($allcartproducts as $cartproduct):
                    $cartPrice+=$cartproduct[0]->getPrice()* $cartproduct[1];
                ?>
                <div class="cartproduct">
                    <?php $allcartproducts = $cartproduct[0]->getPictures();
                    foreach ($allcartproducts as $cartsproduct) : ?>
                        <img class="img" src=<?= base_url() . 'public/img/products/' . $cartsproduct ?>>
                    <?php endforeach ?>
                    <div class="productInformations">
                        <div class="priceandname">
                            <p class="ya name"> <?= $cartproduct[0]->getName() ?> </p>
                            <p class="price"> <?= $cartproduct[0]->getPrice()."€" ?> </p>
                        </div>
                        <div class="deleteandqty">
                            <div class="QuantitySelector">
                                <button class="Quantity Sign" title="Increase Quantity to <?= $cartproduct[1]+1 ?>" onClick="increase('qtyVal<?= $cartproduct[0]->getId() ?>', <?= $cartproduct[0]->getQuantity() ?>, <?= $cartproduct[0]->getId() ?>)">
                                    +
                                </button>
                                <input  type="text" class="Quantity Number" onChange="updateCookieValue(event, '<?=$cartproduct[0]->getId()?>', '<?=$cartproduct[0]->getQuantity()?>')" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" id="<?="qtyVal".$cartproduct[0]->getId()?>" value="<?= $cartproduct[1] ?>" pattern="[0-9]+"> </input>
                                <button class="Quantity Sign" title="Decrease Quantity to <?= $cartproduct[1]-1 ?>" onClick="decrease('qtyVal<?= $cartproduct[0]->getId() ?>', <?= $cartproduct[0]->getId() ?>)">
                                    -
                                </button>
                            </div>
                            <a class="delete" href="<?=base_url().'index.php/Product/deleteToCart/'.$cartproduct[0]->getId().'/index' ?>"> delete </a>
                        </div>
                    </div>
                </div>
            <?php endforeach;
            
            ?>
        </div>
        <?php 
            if (!empty($allcartproducts)){
        ?>
        <div class="cartBottom">
            <form action="<?=base_url().'index.php/Product/syncCartAndDatabase'?>" method="POST">
                <button type="submit" class="pay">
                    <span>PAYER</span>
                    <span class="sep">|</span>
                    <span><?=$cartPrice."€"?></span> 
                </button>
            </form>
            <a class="delete" href="<?=base_url().'index.php/Product/dropCart' ?>"> VIDER LE PANIER</a>
        </div>
        <?php
            } else {
        ?>
        <p class="cartHeader">VOTRE PANIER EST VIDE</p>
        <?php
            }
        ?>
    </div>
</div>
<script
  src="https://code.jquery.com/jquery-3.6.1.min.js"
  integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ="
  crossorigin="anonymous">
</script> 


