<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->helper('url');
session_start(); // must be before any output
$username = 'null';
if (isset($_SESSION['login'])) $username = $_SESSION['login']["pseudo"];
if (isset($_SESSION['login'])) $status = $_SESSION['login']["status"];
?>




<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href=<?= base_url() . CSS . "productstyle.css" ?>>
  <link rel="stylesheet" href=<?= base_url() . CSS . "style.css" ?>>
  <link rel="stylesheet" href=<?= base_url() . CSS . "home.css" ?>>
  <link rel="stylesheet" href=<?= base_url() . CSS . "headerstyle.css" ?>>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
  <title>Home</title>
</head>

<body>
  <?php include 'header.php'; ?>

  <div id="preloader">
    <img src="public\img\skatewheel.png" alt="skatewheel" />
  </div>

  <article id="home">
    <section>
      <div class="container">
        <div class="section-container">
          <h1>SKATE</h1>
          <a href="#showcase">explore</a>
        </div>
      </div>
    </section>

    <section id="showcase">
      <div class="container">
        <div class="section-container">
          <h1>SKATE</h1>
        </div>
      </div>
    </section>
  </article>
  <?php $_SESSION["redirect"] = uri_string(); ?>
  <?php include 'cartSide.php'; ?>
  <?php include 'footer.php'; ?>
</body>

</html>