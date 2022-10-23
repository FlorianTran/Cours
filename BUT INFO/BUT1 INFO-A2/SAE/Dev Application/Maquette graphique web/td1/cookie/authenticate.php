<?php 
setcookie('user',$_GET['name']);
setcookie('password',$_GET['password']);
//echo($_COOKIE['user'] . '<br>' . $_COOKIE['password']);

$users = array(
    "jojo" => array("password" => "pass1", "status" => "administrator"),
    "raoul" => array("password" => "pass2", "status" => "visitor"),
    "roméo" => array("password" => "pass3", "status" => "customer")
);

/*a finir */

$url = "http://srv-infoweb.iut-nantes.univ-nantes.prive/~E213511C/td1/cookie/perisitent_form.php";

if (isset($_GET['submit'])){
    foreach($users as $user => $value) {
     
        if (($_GET['name']==$user) and($_GET['password']==$value['password'])){
            $url = "http://google.com";
        }
    }
}


header('Location: '.$url);
?>