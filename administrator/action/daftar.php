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
    // cek apa kamar dan grup masih tersedia atau sudah penuh 
    // $kosong = "SELECT COUNT(tiket.grup_id) as gukos, grup.seat FROM tiket,grup WHERE tiket.grup_id='$grup' AND tiket.grup_id=grup.grup_id ;";
    // $kosong .= "SELECT COUNT(tiket.kamar_id) as kakos FROM tiket WHERE tiket.kamar_id='$kamar';";
    // $data = $peserta->getData($kosong);
    // foreach ($data as $key => $value) {
    //     $kakos = 4 - $value['kakos'];
    //     $gukos = $value['seat'] - $value['gukos'];
    //     var_dump($value['kakos']);
    //     var_dump($gukos);
    //     // if ($kakos != 0 && $gukos != 0) {
            $query = "INSERT INTO peserta(nim,nama,prodi,kontak,kelas) VALUES('$nim', '$nama', '$prodi', '$kontak', '$kelas');";
            $query .= "INSERT INTO tiket(nim,grup_id,kamar_id,waktu) VALUES('$nim', '$grup', '$kamar', now());";
            // var_dump($query);
            $id = base64_encode($nim);
            if ($act = $peserta->execute($query)) {
                echo '<meta http-equiv="refresh" content="1;url=?daftar=ok&id='.$id.'">';
            }
        // }else{
        //     if ($kakos == 0) {
        //         $message = 'Kamar dengan id '.$kamar.' penuh';
        //     } else if($gukos == 0){
        //         $message = 'Grup dengan id '.$grup.' penuh';
        //     }
        // }    
    // } 
}
?>