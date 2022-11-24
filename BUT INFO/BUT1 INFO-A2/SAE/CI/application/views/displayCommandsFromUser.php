<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->helper('url');
session_start(); // must be before any output
if(isset($_SESSION['login'])) $username = $_SESSION['login']["pseudo"];
else {
    //S'OCCUPER DU CAS OU L4URL EST ENTREE MANUELLEMENT, SANS PRECISER DE PARAMETRE
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Sheeeesh2</title>
</head>
<body>
    <?php var_dump($allCommands) ?>
</body>
</html>
<?php } ?>