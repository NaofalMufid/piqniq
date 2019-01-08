<?php
require_once("administrator/action/view.php");
$peserta = new View();

/**
* Dapatkan data dari form
*/
$nim = $peserta->escape_string($_POST['nim']);
$nama = $peserta->escape_string($_POST['nama']);
$prodi = $peserta->escape_string($_POST['prodi']);
$kontak = $peserta->escape_string($_POST['kontak']);
$kelas = $peserta->escape_string($_POST['kelas']);

// data untuk tiket
$grup = $peserta->escape_string($_POST['grup']);
$kamar = $peserta->escape_string($_POST['kamar']);

/**
 * Add data ke database
 */
if (isset($_POST['daftar'])) {
	$query = "INSERT INTO peserta(nim,nama,prodi,kontak,kelas) VALUES('$nim', '$nama', '$prodi', '$kontak', '$kelas');";
	$query .= "INSERT INTO tiket(nim,grup_id,kamar_id,waktu) VALUES('$nim', '$grup', '$kamar', now());";
    // var_dump($query);
    $id = base64_encode($nim);
    if ($act = $peserta->execute($query)) {
    	echo '<meta http-equiv="refresh" content="1;url=?daftar=ok&id='.$id.'">';
    }
}
?>