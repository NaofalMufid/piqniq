<?php
require_once("action/crud.php");
$kamar = new Crud();
/**
 * Add data ke database
 */
if (isset($_POST['btnSimpan'])) {
    $nama_kamar = $kamar->escape_string($_POST['nama_kamar']);
    $isi = $kamar->escape_string($_POST['isi']);
    $keterangan = $kamar->escape_string($_POST['keterangan']);

    $act = $kamar->execute("INSERT INTO kamar SET nama_kamar='$nama_kamar',isi='$isi',keterangan='$keterangan'");
}

/**
 * Ubah data ditabase
 */
if (isset($_POST['btnUpdate'])) {
    $kamar_id = $kamar->escape_string($_POST['kamar_id']);
    $nama_kamar = $kamar->escape_string($_POST['nama_kamar']);
    $isi = $kamar->escape_string($_POST['isi']);
    $keterangan = $kamar->escape_string($_POST['keterangan']);

    $act = $kamar->execute("UPDATE kamar SET nama_kamar='$nama_kamar',isi='$isi',keterangan='$keterangan' 
    WHERE kamar_id='$kamar_id'");
}

/**
 * Hapus data didatabase
 */
if ($_GET['act'] == 'delete') {
    $id = $kamar->escape_string($_GET['id']);
    $act = $kamar->delete($id,"kamar");
}
