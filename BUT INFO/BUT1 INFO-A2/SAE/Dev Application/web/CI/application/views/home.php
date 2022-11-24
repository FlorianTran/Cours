<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->helper('url');
session_start(); // must be before any output
$username='null';
if(isset($_SESSION['login'])) $username = $_SESSION['login']["pseudo"]; 
if(isset($_SESSION['login'])) $status = $_SESSION['login']["status"]; 
?>




<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href=<?=base_url().CSS."style.css" ?>>
    <link rel="stylesheet" href=<?=base_url().CSS."headerstyle.css" ?>>
    <title>Home</title>
  </head>
  <body>
    <?php include 'header.php';?>
    
    <div id="preloader">
      <img src="public\img\skatewheel.png" alt="skatewheel" />
    </div>     

    <article class="container">
      <section id="home">
        <div class="section-container">
          <h1>SKATE</h1>
          <h2>
            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Natus
            alias, error ex dolores omnis rerum corrupti dolore explicabo
            pariatur iusto nam voluptates, tempora totam perspiciatis assumenda
            vero, accusamus repellat iure?
          </h2>
        </div>
      </section>

      <section id="">
        <div class="section-container">
          <h1>Salut</h1>
        </div>
      </section>
    </article>

    <?php include 'footer.php';?>
  </body>
</html>

