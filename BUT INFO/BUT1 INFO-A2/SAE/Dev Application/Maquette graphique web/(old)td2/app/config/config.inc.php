<?php
define("HOME","E213511C/public_html/td2/app");
const CFG = array(
    "db" => array(
    "host" => "data".DIRECTORY_SEPARATOR,
    "port" => null,
    "database" => "madb.db",
    "login" => "",
    "password" => "",
    "options" => array(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION),
    "exec" => "PRAGMA foreign_keys = ON;"
    ),
    'siteURL' => "http://localhost/E213511C/public_html/td2/app"
    );

?>