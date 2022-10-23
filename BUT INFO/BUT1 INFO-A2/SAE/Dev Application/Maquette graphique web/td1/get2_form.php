<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Form</title>
</head>
<body>
    <form action="get.php" method="get" class="form">
        <div>
            <label for="name">Pseudo : </label>
            <input type="text" name="name" id="name" required>
        </div>
    </br>
        <div>
            <label for="password">Mot de passe : </label>
            <input type="password" name="password" id="password" required>
        </div>
        <input type="submit" value="Connexion">
    </form>
</body>

<!-- curl -v --noproxy "*" -X GET "http://srv-infoweb/~E213511C/get2.php?pseudo=laurent&login=pass&statut=admin" -->