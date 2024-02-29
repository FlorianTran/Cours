<?php 
define("HOME","~E214194U".DIRECTORY_SEPARATOR.
    "alex".DIRECTORY_SEPARATOR."td2".
    DIRECTORY_SEPARATOR."app".DIRECTORY_SEPARATOR);
const CFG = array(
    "db" => array(
    "host" => HOME."data".DIRECTORY_SEPARATOR,
    "port" => null,
    "database" => "mdb.db",
    "login" => "",
    "password" => "",
    "options" => array(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION),
    "exec" => "PRAGMA foreign_keys = ON;"
    ),
    "siteURL" => "http://srv-infoweb.iut-nantes.univ-nantes.prive/~E214194U/alex/td2/app/" //votre url
    );

?>
