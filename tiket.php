<?php
session_start();
require_once("administrator/action/view.php");
$tiket = new View();
$nim = base64_decode($tiket->escape_string($_GET['id']));
$query_tiket = "SELECT tiket.tiket_id, tiket.nim, peserta.nama, grup.nama_grup, tujuan.nama_tujuan, kamar.nama_kamar FROM tiket, peserta, grup, tujuan, kamar WHERE peserta.nim = '$nim' AND tiket.nim=peserta.nim AND tiket.grup_id=grup.grup_id AND grup.tujuan_id=tujuan.tujuan_id AND tiket.kamar_id=kamar.kamar_id";
$data_tiket = $tiket->getData($query_tiket);
?>
<section id="daftar" class="bg-light">
    <div class="container">
        <div class="row">
                <div class="col-lg-5 mx-auto">
                    <h2 class="text-center">KKL Fastikom 2019</h2>
                    <hr>
                    <?php
                    foreach ($data_tiket as $key => $value) {
                    ?>
                    <div class="card">
                        <div class="card-header text-center" style="background-color:darkgray;">
                            <?=$value['nama_grup']?> - <?=$value['nama_tujuan']?> 
                        </div>
                        <div class="card-body" style="background-color:mediumaquamarine;">
                            <div class="row">
                            <div class="col-sm-3">
                                <p class="card-text">NIM</p>
                                <p class="card-text">Nama</p>
                                <p class="card-text">Kamar</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="card-text"><?=$value['nim']?></p>
                                <p class="card-text"><?=$value['nama']?></p>
                                <p class="card-text"><?=$value['nama_kamar']?></p>
                            </div>    
                            </div>
                        </div>
                        <div class="card-footer text-center" style="background-color:darkgrey;">
                            Fastikom 2019
                        </div>
                    </div>
                    <div class="row">
                        &nbsp;
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                        <button type="button" name="" id="" class="btn btn-primary btn-lg btn-block"><i class="fa fa-pencil" aria-hidden="true"></i> Ubah</button>
                        </div>
                        <div class="col-sm-4">
                        <button type="button" name="" id="" class="btn btn-primary btn-lg btn-block"><i class="fa fa-print" aria-hidden="true"> Cetak</i></button>
                        </div>
                        <div class="col-sm-4">
                        <a href="index.php" class="btn btn-primary btn-lg btn-block"><i class="fa fa-home" aria-hidden="true"> Kembali</i></a>
                        </div>
                    </div>
                    <?php
                    }
                    ?>
                </div>
        </div>
    </div>
</section>