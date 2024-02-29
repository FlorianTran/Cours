<?php 
define("HOME","~E214194U".DIRECTORY_SEPARATOR.
    "S3SAE".DIRECTORY_SEPARATOR."app".DIRECTORY_SEPARATOR);
const CFG = array(
    "db" => array(
    "host" => HOME."data".DIRECTORY_SEPARATOR,
    "port" => null,
    "database" => "madb.db",
    "login" => "",
    "password" => "",
    "options" => array(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION),
    "exec" => "PRAGMA foreign_keys = ON;"
    ),
    "siteURL" => "http://srv-infoweb.iut-nantes.univ-nantes.prive/~E214194U/S3SAE/app/" //votre url
    );

?>