<?php
    define("HOME",__DIR__.DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR);

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
            "siteURL" => "http://srv-infoweb.iut-nantes.univ-nantes.prive/~E213511C/eval/etudiants/part2/app/"
          );

    ?>