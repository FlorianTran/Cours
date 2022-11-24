<?php 
if(isset($_COOKIE['name'])){
    header( "refresh:0; url=http://srv-infoweb.iut-nantes.univ-nantes.prive/~E214194U/alex/a.php");
}else{
    echo '
    <form action="a.php" method="post" class="form">
    <div class="form">
        <label for="name">Pseudo : </label>
        <input type="text" name="name" >
    </div>
    <div class="form">
        <label for="password">PSWD : </label>
        <input type="password" name="password" >
    </div>
    <div class="form">
        <input type="submit" value="Envoyer">
    </div>
    </form>
    ';
}
?>
    
      