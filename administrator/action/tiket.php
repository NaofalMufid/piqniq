<?php
require_once("action/crud.php");
$tiket = new Crud();

/**
 * Get data dari FORM
 */
$tid = $tiket->escape_string($_POST['id']);
$nim = $tiket->escape_string($_POST['nim']);
$grup = $tiket->escape_string($_POST['grup']);
$kamar = $tiket->escape_string($_POST['kamar']);
$id = $tiket->escape_string($_GET['id']);

/**
 * Add data ke database
 */
if (isset($_POST['btnSimpan'])) {
    $act = $tiket->execute("INSERT INTO tiket SET nim='$nim', grup_id='$grup', kamar_id='$kamar', waktu=now()");
}

/**
 * Ubah data ditabase
 */
if (isset($_POST['btnUpdate'])) {
    $act = $tiket->execute("UPDATE tiket SET nim='$nim', grup_id='$grup', kamar_id='$kamar' WHERE tiket_id='$tid'");
}

/**
 * Hapus data didatabase
 */
if ($_GET['act'] == 'delete') {
    $act = $tiket->delete($id,"tiket");
}
