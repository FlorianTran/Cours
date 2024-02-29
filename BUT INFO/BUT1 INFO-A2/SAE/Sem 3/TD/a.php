<?php 
    if (isset($_POST['name'])&&isset($_POST['password'])){
        if ($_POST['name']!=null&&$_POST['password']!=null){
            setcookie('name', $_POST['name']);
            echo "Bienvenue : " . $_POST['name'];
        }
    } elseif (isset($_COOKIE['name'])){
        echo "De retour : " . $_COOKIE['name'];
    } else {
        header( "refresh:2; url=http://srv-infoweb.iut-nantes.univ-nantes.prive/~E214194U/alex/index.php");
        echo ("Nom et/ou prénom incomplet. Vous allez être redirigés...");
    }
?>    