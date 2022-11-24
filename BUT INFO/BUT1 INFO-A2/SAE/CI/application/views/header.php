<header>
  <nav class="nav">
    <div class="over-container">
      <ul>
        <li class="logo-nav">
          <a href="<?= base_url() ?>">
            <h1>SKATE</h1>
          </a>
        </li>
        <li class="search-nav">
          <div id="cover">
            <form action="">
              <div class="tb">
                <div class="td">
                  <input type="text" autocomplete="off" placeholder="Rechercher..." id="srcbar" class="srcbar" required />
                </div>
                <div class="td" id="s-cover">
                  <button type="submit">
                    <div id="s-circle"></div>
                    <span></span>
                  </button>
                </div>
              </div>
            </form>
          </div>
        </li>
        <ul class="nav-links">
          <li class="location-nav">
            <a href="#">
              <img src=<?= base_url() . IMG . "logo_loc.svg" ?> alt="logo location" />
              <p>Location</p>
            </a>
          </li>
          <li class="connexion-nav">
            <a href="<?= base_url() . 'index.php/User/display/' . $username ?>">
              <img src=<?= base_url() . IMG . "logo_co.svg" ?> alt="logo connexion" />
              <p>Connexion</p>
            </a>
          </li>
          <li class="cart-nav">
            <a onClick="openNav()" data-toggle="modal" data-target="#sidenavcart">
              <img src=<?= base_url() . IMG . "logo_cart.svg" ?> alt="logo cart">
              <?php if (!empty($allcartproducts)){ ?>
                <span class="point"></span>
              <?php } ?>
              </image>
              <p>Panier</p>
            </a>
          </li>

          <?php
          if (isset($_SESSION["login"]) && $_SESSION["login"]["status"] == "Administrator") {
          ?>
            <li class="admin-nav">
              <a href="<?= base_url() . 'index.php/Home/admin' ?>">
                <img src=<?= base_url() . IMG . "logo_admin.png" ?> alt="menu bouton">
                <p>Admin</p>
              </a>
            </li>
          <?php } ?>
        </ul>
        <li>
          <img src=<?= base_url() . IMG . "menu-btn.png" ?> alt="menu bouton" class="menu-btn">
        </li>
      </ul>

    </div>
    <div class="under-container" id="undercontainer">
      <ul class="nav-bar">
        <li class="nav-item">
          <a href="#" class="nav-link skateboard" id="skateboard">SKATEBOARD</a>
          <span class="menu-nav"></span>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link shoes" id="shoes">CHAUSSURES</a>
          <span class="menu-nav"></span>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link clothing" id="clothing">VETMENTS</a>
          <span class="menu-nav"></span>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link accesories" id="accesories">ACCESOIRES</a>
          <span class="menu-nav"></span>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link pieces" id="pieces">PIECES</a>
          <span class="menu-nav"></span>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link brand" id="brand">MARQUE</a>
          <span class="menu-nav"></span>
        </li>
      </ul>
    </div>
  </nav>
  <script src=<?=base_url().JS."cart.js" ?>></script>
  <script src=<?=base_url().JS."home.js" ?>></script>
</header>