<!doctype html>
<html lang="fr">
<link rel="stylesheet" href="./../scripts/script.css">
<head>
    <meta charset="utf-8">
    <title>Ajout magasin</title>
</head>
<body>
<p> <a href="<?=CFG["siteURL"]?> "> Home </a></p>
<div class="login-popup">
    <p class="popup-title">Se Connecter</p>
    <div class="popup-selection">
        <div class="selection-log">
            <p>Connexion</p>
        </div>
        <div class="selection-new">
            <p>S'inscrire</p>
        </div>
    </div>
    <div class="bar"></div>
    <div class="bar"></div>
    <form class="login-form" action="<?= CFG["siteURL"]."User/loginCheck" ?>" method="post">
        <input type="text" name="login" placeholder="giovanni">
        <input type="password" name="password" placeholder="password">
        <input type="submit">
    </form>
</div>


</body>
</html>
