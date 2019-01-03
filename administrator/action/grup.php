<?php
require_once("action/crud.php");
$grup = new Crud();
/**
 * Add data ke database
 */
if (isset($_POST['btnSimpan'])) {
    $nama_grup = $grup->escape_string($_POST['nama_grup']);
    $tujuan = $grup->escape_string($_POST['tujuan']);
    $pendamping = $grup->escape_string($_POST['pendamping']);
    $kursi = $grup->escape_string($_POST['seat']);
    $keterangan = $grup->escape_string($_POST['keterangan']);

    $act = $grup->execute("INSERT INTO grup SET nama_grup='$nama_grup',tujuan_id='$tujuan',pendamping='$pendamping',seat='$kursi',keterangan='$keterangan'");
}

/**
 * Ubah data ditabase
 */
if (isset($_POST['btnUpdate'])) {
    $grup_id = $grup->escape_string($_POST['grup_id']);
    $nama_grup = $grup->escape_string($_POST['nama_grup']);
    $tujuan = $grup->escape_string($_POST['tujuan']);
    $pendamping = $grup->escape_string($_POST['pendamping']);
    $kursi = $grup->escape_string($_POST['seat']);
    $keterangan = $grup->escape_string($_POST['keterangan']);

    $act = $grup->execute("UPDATE grup SET nama_grup='$nama_grup',tujuan_id='$tujuan',pendamping='$pendamping',seat='$kursi',keterangan='$keterangan'
     WHERE grup_id='$grup_id'");
}

/**
 * Hapus data didatabase
 */
if ($_GET['act'] == 'delete') {
    $id = $grup->escape_string($_GET['id']);
    $act = $grup->delete($id,"grup");
}
