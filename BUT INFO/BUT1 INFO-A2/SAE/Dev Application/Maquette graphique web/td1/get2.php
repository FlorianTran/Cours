<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Test2</title>
</head>
<body>
<pre>
<?php
    foreach(array('pseudo','password','statut') as $value) {
        echo($value . ' : ' . $_GET[$value] . "<br>");
    }
?>
</pre>
</body>
</html>

