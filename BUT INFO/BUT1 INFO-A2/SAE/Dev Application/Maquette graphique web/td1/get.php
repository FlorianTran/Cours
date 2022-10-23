<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Test2</title>
</head>
<body>
    <a href="get2.php?pseudo=laurent&login=pass&statut=admin">Je suis admin</a>
    </br>
    <a href="get2.php?pseudo=laurent&login=pass&statut=visiteur">je suis visiteur</a>

    <?php
    if (isset($_GET['Connexion'])) {
        $nom = $_GET['name'];
        $age = $_GET['password'];
    }
    ?>
</body>
</html>
