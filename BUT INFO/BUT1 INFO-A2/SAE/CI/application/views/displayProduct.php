<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->helper('url');
session_start(); // must be before any output
if (isset($_SESSION['login'])) $username = $_SESSION['login']["pseudo"];
?>
<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Sheeeesh2</title>
    <link rel="stylesheet" href=<?= base_url() . CSS . "style.css" ?>>
    <link rel="stylesheet" href=<?= base_url() . CSS . "productstyle.css" ?>>
    <link rel="stylesheet" href=<?= base_url() . CSS . "headerstyle.css" ?>>
</head>

<body>
    <?php include 'header.php'; ?>
    <!-- <div id="preloader">
        <img src=<?= base_url() . "public\img\skatewheel.png" ?> alt="skatewheel" />
    </div> -->

    <article class="default-product">
        <div class="container">
            <section id="product" class="product">
                <div class="left-container">
                    <div class="container-image">
                        <div class="product-image">
                            <?php $allpictures = $product->getPictures();
                            foreach ($allpictures as $picture) : ?>
                                <img class="img" src=<?= base_url() . 'public/img/products/' . $picture ?>>
                            <?php endforeach ?>
                        </div>
                    </div>
                </div>
                <div class="right-container">
                    <h3><?= $product->getName() ?></h3>
                    <p class="numprod">No. de produit: <?= $product->getId() ?></p>
                    <div class="price">
                        <p><?= $product->getPrice() ?>EUR</p>
                        <p>INC. TVA</p>
                        <p>EXCLU. FRAIS DE LIVRAISON</p>
                    </div>
                    <h4>QUANTITÉ</h4>
                    <form class="shopping" action="<?=base_url().'index.php/Product/addToCart/'.$product->getId()?>" method="post">
                        <select name="<?= "qtyOf" . $product->getId() ?>">
                            <?php for ($i = 0; $i < $product->getQuantity() && $i < 6; $i++) { ?>
                                <option value="<?= $i + 1 ?>"><?= $i + 1 ?></option>
                            <?php } ?>
                        </select>
                        <button type="submit">
                            <img src=<?= base_url() . "public\img\logo_cart.svg" ?> alt="">
                            AJOUTER AU PANIER
                        </button>
                        <?php $_SESSION["redirect"]=uri_string(); 
                        ?>
                        <button>ACHETER</button>
                    </form>
                </div>
            </section>
        </div>
    </article>
    <?php include 'cartSide.php';?>
    <?php include 'footer.php'; ?>
</body>

</html>