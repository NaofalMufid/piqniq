<?php
require_once("action/crud.php");
$kamar = new Crud();

/**
 * Get data dari FORM
 */
$kamar_id = $kamar->escape_string($_POST['kamar_id']);
$nama_kamar = $kamar->escape_string($_POST['nama_kamar']);
$isi = $kamar->escape_string($_POST['isi']);
$keterangan = $kamar->escape_string($_POST['keterangan']);
$id = $kamar->escape_string($_GET['id']);


/**
 * Add data ke database
 */
if (isset($_POST['btnSimpan'])) {

    $act = $kamar->execute("INSERT INTO kamar SET nama_kamar='$nama_kamar',isi='$isi',keterangan='$keterangan'");
}

/**
 * Ubah data ditabase
 */
if (isset($_POST['btnUpdate'])) {
    $act = $kamar->execute("UPDATE kamar SET nama_kamar='$nama_kamar',isi='$isi',keterangan='$keterangan' 
    WHERE kamar_id='$kamar_id'");
}

/**
 * Hapus data didatabase
 */
if ($_GET['act'] == 'delete') {
    $act = $kamar->delete($id,"kamar");
}
