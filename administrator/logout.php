<?php
session_start();
require_once('action/crud.php');
$user_logout = new Crud();

//jika belum login
if (!$user_logout->login())
{
    $user_logout->redirect('login.php');
}	

if($user_logout->login()!="")
{
    $user_logout->redirect('index.php');
}

if(isset($_GET['logout']) && $_GET['logout']=="true")
{
    $user_logout->logout();
    $user_logout->redirect('login.php');
}
