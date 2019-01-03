<!--Header-->
<?php
require_once "header.php";
?>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="#page-top">PiQniQ</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#tujuan">Tujuan</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#grup">Grup</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#kamar">Kamar</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <header class="bg-primary">
      <div class="container text-center">
        <div class="jumbotron">
          <div class="container">
            <h1 class="display-5">KKL Fastikom 2019</h1>
            <p class="lead">Yuk ikut dan rasakan keseruannya</p>
            <p class="lead">
              <a class="btn btn-primary btn-lg js-scroll-trigger" href="#daftar" role="button">Daftar Sekarang</a>
            </p>
          </div>
        </div>
      </div>
    </header>
    
    <!--Tujuan-->
    <?php
    require_once"tujuan.php";
    ?>

    <!--Grup-->
    <?php
    require_once"grup.php";
    ?>

    <!--Kamar-->
    <?php
    require_once"kamar.php";
    ?>
    
    <!--Daftar-->
    <?php
    require_once"daftar.php";
    ?>

<!--Footer-->
<?php
require_once "footer.php";
?>    