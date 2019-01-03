<?php
require_once("action/crud.php");
$peserta = new Crud();
/**
 * Add data ke database
 */
if (isset($_POST['btnSimpan'])) {
    $nim = $peserta->escape_string($_POST['nim']);
    $nama = $peserta->escape_string($_POST['nama']);
    $prodi = $peserta->escape_string($_POST['prodi']);
    $kontak = $peserta->escape_string($_POST['kontak']);
    $kelas = $peserta->escape_string($_POST['kelas']);

    $act = $peserta->execute("INSERT INTO peserta SET nim='$nim', nama='$nama', prodi='$prodi', kontak='$kontak', kelas='$kelas'");
}

/**
 * Ubah data ditabase
 */
if (isset($_POST['btnUpdate'])) {
    $nim = $peserta->escape_string($_POST['nim']);
    $nama = $peserta->escape_string($_POST['nama']);
    $prodi = $peserta->escape_string($_POST['prodi']);
    $kontak = $peserta->escape_string($_POST['kontak']);
    $kelas = $peserta->escape_string($_POST['kelas']);

    $act = $peserta->execute("UPDATE peserta SET nama='$nama', prodi='$prodi', kontak='$kontak', kelas='$kelas' WHERE nim='$nim'");
}

/**
 * Hapus data didatabase
 */
if ($_GET['act'] == 'delete') {
    $id = $peserta->escape_string($_GET['id']);
    $act = $peserta->delete($id,"peserta");
}
