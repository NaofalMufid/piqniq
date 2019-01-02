<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>PiQniQ - Yuk Ayuk berangkat</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="assets/css/scrolling-nav.css" rel="stylesheet">
  </head>

  <body id="page-top">

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

    <!-- Footer -->
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; PiQniQ 2018</p>
      </div>
      <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom JavaScript for this theme -->
    <script src="assets/js/scrolling-nav.js"></script>
    <script>
      //untuk carousel card
    $(document).ready(function() {
      $("#carouselId").on("slide.bs.carousel", function(e) {
        var $e = $(e.relatedTarget);
        var idx = $e.index();
        var itemsPerSlide = 3;
        var totalItems = $(".carousel-item").length;

        if (idx >= totalItems - (itemsPerSlide - 1)) {
          var it = itemsPerSlide - (totalItems - idx);
          for (var i = 0; i < it; i++) {
            // append slides to end
            if (e.direction == "left") {
              $(".carousel-item")
                .eq(i)
                .appendTo(".carousel-inner");
            } else {
              $(".carousel-item")
                .eq(0)
                .appendTo($(this).find(".carousel-inner"));
            }
          }
        }
      });
    });
    </script>
  </body>

</html>
