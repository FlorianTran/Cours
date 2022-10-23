<?php
require_once "UsersEntities.php";
$usertab = new UsersEntities();
$user = $usertab->findByLogin($_POST['login']);
if ($user == null) {
    include 'error.php';
}
else if ($user->isValidePassword($_POST['password'])) {
    include 'welcome.php';
} else {
    include 'error.php';
}
?>







