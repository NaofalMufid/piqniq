<?php
require_once("action/crud.php");
$tiket = new Crud();
/**
 * Add data ke database
 */
if (isset($_POST['btnSimpan'])) {
    $nim = $tiket->escape_string($_POST['nim']);
    $grup = $tiket->escape_string($_POST['grup']);
    $kamar = $tiket->escape_string($_POST['kamar']);

    $act = $tiket->execute("INSERT INTO tiket SET nim='$nim', grup_id='$grup', kamar_id='$kamar', waktu=now()");
}

/**
 * Ubah data ditabase
 */
if (isset($_POST['btnUpdate'])) {
    $id = $tiket->escape_string($_POST['id']);
    $nim = $tiket->escape_string($_POST['nim']);
    $grup = $tiket->escape_string($_POST['grup']);
    $kamar = $tiket->escape_string($_POST['kamar']);

    $act = $tiket->execute("UPDATE tiket SET nim='$nim', grup_id='$grup', kamar_id='$kamar' WHERE tiket_id='$id'");
}

/**
 * Hapus data didatabase
 */
if ($_GET['act'] == 'delete') {
    $id = $tiket->escape_string($_GET['id']);
    $act = $tiket->delete($id,"tiket");
}
