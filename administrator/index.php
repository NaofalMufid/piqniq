<?php
session_start();
require_once"action/crud.php";
$auth = new Crud();

//jika belum login
if (!$auth->login())
{
  // $auth->redirect('login.php');
}

error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
require_once"header.php";
?>
    <div class="container-fluid">
      <div class="row">
        <!--Sidebar-->
        <?php
        require_once"sidebar.php";
        ?>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">
              <?php
              if (isset($_GET['modul'])) {
                echo "Modul ".ucfirst($_GET['modul']);
              } else {
                echo "Dashboard";
              }
              ?>
            </h1>
            <div class="btn-toolbar mb-2 mb-md-0">
            </div>
          </div>
                <?php
                require_once"modul/modul.php";
                if (!isset($_GET['modul'])):
                ?>
                  <div class="jumbotron">
                    <h1 class="display-3">Jumbo heading</h1>
                    <p class="lead">Jumbo helper text</p>
                    <hr class="my-2">
                    <p>More info</p>
                    <p class="lead">
                      <a class="btn btn-primary btn-lg" href="Jumbo action link" role="button">Jumbo action name</a>
                    </p>
                  </div>
                <?php
                endif;
                ?>
        </main>
      </div>
    </div>

<!--Footer-->
<?php
require_once"header.php";
?>