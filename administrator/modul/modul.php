<?php
$mod = $_GET['modul'];

if ($mod == 'tujuan') {
    require_once"tujuan.php";
}else if($mod == "grup"){
    require_once"grup.php";
}else if($mod == "kamar"){
    require_once"kamar.php";
}else if($mod == "peserta"){
    require_once"peserta.php";
}else if($mod == "tiket"){
    require_once"tiket.php";
}else if($mod == "user"){
    require_once"user.php";
} else {
    //echo "<h2>404 Rak Ono Latar</h2>";
}
