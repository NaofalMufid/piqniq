<?php
require_once("action/crud.php");
$user = new Crud();

/**
 * Get data dari FORM
 */
$user_id = $user->escape_string($_POST['user_id']);
$uname = $user->escape_string($_POST['username']);
$upass = $user->escape_string($_POST['password']);
$new_pass = password_hash($upass, PASSWORD_DEFAULT);
$level = $user->escape_string($_POST['level']);
$id = $user->escape_string($_GET['id']);


/**
 * Add data ke database
 */
if (isset($_POST['btnSimpan'])) {
    $query = "INSERT INTO user SET username='$uname',password='$new_pass',level='$level'";
    $act = $user->execute($query);
    var_dump($query);
}

/**
 * Ubah data ditabase
 */
if (isset($_POST['btnUpdate'])) {
    if (!empty($upass)) {
        $act = $user->execute("UPDATE user SET username='$uname',password='$new_pass',level='$level' 
        WHERE user_id='$user_id'");
    } else {
        $act = $user->execute("UPDATE user SET username='$uname',level='$level' 
        WHERE user_id='$user_id'");
    }
}

/**
 * Hapus data didatabase
 */
if ($_GET['act'] == 'delete') {
    $act = $user->delete($id,"user");
}
