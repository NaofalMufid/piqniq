<?php
session_start();
require_once"action/crud.php";
$login = new Crud();

// jika sudah login
if ($login->login() !="") {
	$login->redirect('index.php');
}

if (isset($_POST['btn-login'])) {
	$uname = $login->escape_string($_POST['uname']);
	$upass = $login->escape_string($_POST['upass']);
	if ($login->cekLogin($uname, $upass)) {
		$login->redirect('index.php');
	} else {
		$error = "Akun yang anda masukan tidak ada";
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Login Auth</title>
	<!-- Bootstrap core CSS -->
    <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Login Custom -->
    <link rel="stylesheet" href="../assets/css/login.css">
</head>
<body>
	<form class="form-signin" method="post">
      <img class="mb-4" src="https://getbootstrap.com/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
      <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
      <label for="inputUsername" class="sr-only">Username</label>
      <input type="text" name="uname" id="uname" class="form-control" placeholder="Username" required="" autofocus="">
      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" name="upass" id="upass" class="form-control" placeholder="Password" required="">
      <button class="btn btn-lg btn-primary btn-block" name="btn-login" type="submit">Sign in</button>
      &nbsp;
      <div class="error">
		<?php
		if (isset($error)) {
			echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
				  '.$error.'.
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				    <span aria-hidden="true">&times;</span>
				  </button>
				</div>';
		}
		?>
      </div>
    </form>

<script src="../assets/vendor/jquery/jquery.min.js"></script>
<script src="../assets/vendor/bootstrap/js/bootstrap.min.js"></script>
</body>
</body>
</html>