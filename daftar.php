<?php
$daftar = new View();
require_once("administrator/action/daftar.php");
?>
<section id="daftar" class="bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 mx-auto">
                <h2 class="text-center">Formulir Pendaftaran</h2>
                <hr>
                <form method="POST">
                    <fieldset>
                        <legend>Data diri</legend>
                        <!--Form Data diri-->
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="">NIM</label>
                                <input type="text" class="form-control" name="nim" id="nim" placeholder="NIM">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Nama</label>
                                <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama">
                            </div>
                            <div class="form-group col-md-4">
                              <label for="">Prodi</label>
                              <select class="form-control" name="prodi" id="prodi">
                                <option selected>Prodi</option>
                                <option value="Arsitek">Arsitek</option>
                                <option value="Teknik Sipil">Teknik Sipil</option>
                                <option value="Teknik Informatika">Teknik Informatika</option>
                                <option value="Manajemen Informatika">Manajemen Informatika</option>
                                <option value="Teknik Mesin">Teknik Mesin</option>
                              </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="">Kontak</label>
                                <input type="text" class="form-control" name="kontak" id="kontak" placeholder="Kontak">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="">Kelas</label>
                              <select class="form-control" name="kelas" id="kelas">
                                <option value="A">Kelas A</option>
                                <option value="B">Kelas B</option>
                              </select>
                            </div>
                        </div>
                    </fieldset>

                    <fieldset>
                        <legend>Data Grup dan Kamar</legend>
                        <!--Form Tiket-->
                        <div class="form-row">
                            <div class="col-auto">
                                <select class="form-control" name="grup" id="grup">
                                <?php
                                    $grup = "SELECT grup_id,nama_grup FROM grup ORDER BY nama_grup";
                                    $data = $daftar->getData($grup);
                                    $no = 1;
                                    foreach ($data as $key => $res) {
                                        echo '<option value="'.$res['grup_id'].'">'.$res['nama_grup'].'</option>';
                                    }
                                ?>
                                </select>
                            </div>
                            <div class="col-auto">
                                <input list="kamars" class="form-control" name="kamar">
                                    <datalist id="kamars">
                                    <?php
                                        $kamar = "SELECT * FROM kamar ORDER BY nama_kamar";
                                        $row = $daftar->getData($kamar);
                                        $no = 1;
                                        foreach ($row as $key => $res) {
                                            echo '<option value="'.$res['kamar_id'].'">'.$res['nama_kamar'].'</option>';
                                        }
                                    ?>
                                    </datalist>
                            </div>
                            <button type="submit" class="btn btn-primary btn-xs" name="daftar">Daftar</button>
                        </div>        
                    </fieldset>
                </form>
                <p></p>
                <?php
                if (isset($message)) {
                ?>
                <div class="alert alert-primary alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                    <strong><?=$message?></strong>
                </div>
                <?php
                }
                ?>      
            </div>
        </div>
    </div>
    </section>