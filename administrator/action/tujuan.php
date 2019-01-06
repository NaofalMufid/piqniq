<?php
require_once("action/crud.php");
$tujuan = new Crud();

/**
 * Get data dari FORM
 */
$nama_tujuan = $tujuan->escape_string($_POST['nama_tujuan']);
$prodi = $tujuan->escape_string($_POST['prodi']);
$keterangan = $tujuan->escape_string($_POST['keterangan']);

/**
 * Add data ke database
 */
if (isset($_POST['btnSimpan'])) {
    //upload gambar
    $gambar = '';
    if($_FILES["gambar"]["name"] != '')
    {
        $gambar = $tujuan->upload_image();
    }

    // ambil data dari form yang disubmit

    $act = $tujuan->execute("INSERT INTO tujuan SET nama_tujuan='$nama_tujuan',prodi='$prodi',image='$gambar',keterangan='$keterangan'");
}

/**
 * Ubah data ditabase
 */
if (isset($_POST['btnUpdate'])) {
    $gambar = '';
    if($_FILES["gambar"]["name"] != '')
    {
        unlink("upload/" . $_POST['image']);
	    $gambar = $tujuan->upload_image();
    }
    else
    {
        $gambar = $_POST["hidden_gambar"];
    }
            
    $tujuan_id = $tujuan->escape_string($_POST['tujuan_id']);
    $nama_tujuan = $tujuan->escape_string($_POST['nama_tujuan']);
    $prodi = $tujuan->escape_string($_POST['prodi']);
    $keterangan = $tujuan->escape_string($_POST['keterangan']);

    $act = $tujuan->execute("UPDATE tujuan SET nama_tujuan='$nama_tujuan',prodi='$prodi',image='$gambar',keterangan='$keterangan' 
    WHERE tujuan_id='$tujuan_id'");
}

/**
 * Hapus data didatabase
 */
if ($_GET['act'] == 'delete') {
    $id = $tujuan->escape_string($_GET['id']);
    
    // hapus gambar
    $query = "SELECT image FROM tujuan WHERE tujuan_id='".$_GET['id']."'";
    $data = $tujuan->getData($query);
    foreach ($data as $key) {
        unlink("upload/" . $key['image']);
    }

    //hapus data
    $act = $tujuan->delete($id,"tujuan");
}
