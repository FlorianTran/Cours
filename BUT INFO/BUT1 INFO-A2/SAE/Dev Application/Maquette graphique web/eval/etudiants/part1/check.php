<?php
require_once "VegetablesEntities.php";
$vegeTab = new VegetablesEntities();
$vege = $vegeTab->findByName($_POST['name']);
$vege->setComment($_POST["comment"]);
if($vege == null) {
    include 'error.php';
}else if ($vege->isCommentable()==true) {
    if ($vege->getComment() != null) {
        include 'welcome.php';
    } else {
        include 'error.php';
    }
} else if ($vege->isCommentable()==false){
    if ($vege->getComment() == null) {
        include 'welcome.php';
    } else {
        include 'error.php';
    }
} else {
    include 'error.php';
}
?>






