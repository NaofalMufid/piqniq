<?php
$daftar = new View();
?>
<section id="daftar" class="bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 mx-auto">
                <h2 class="text-center">Formulir Pendaftaran</h2>
                <hr>
                <form>
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
                            <div class="form-group col-md-6">
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
                            <div class="form-group col-md-6">
                                <label for="">Kontak</label>
                                <input type="text" class="form-control" name="kontak" id="kontak" placeholder="Kontak">
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
                                <input type="text" class="form-control" name="kamar" id="kamar" value="" placeholder="Kamar">
                                <input type="hidden" name="kamar_id" name="kamar_id" value="">
                            </div>
                            <button type="submit" class="btn btn-primary btn-xs">Submit</button>
                        </div>        
                    </fieldset>
                </form>
                <p></p>
                <div class="alert alert-primary" role="alert">
                    <strong>Sesuaikan dengan data diri Anda dan ingat untuk kamar laki-laki perempuan dipisah</strong>
                </div>      
            </div>
        </div>
    </div>
    </section>