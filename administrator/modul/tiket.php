<?php
require_once("action/tiket.php");
?>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <a href="?modul=tiket&act=tambah" class="btn btn-info btn-sm"><i class="fa fa-plus-circle" aria-hidden="true"></i> Tambah tiket</a>
                <p></p>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-8">
                    <table id="dataku" class="table table-striped">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>NIM</th>
                                <th>Nama</th>
                                <th>Grup</th>
                                <th>Kamar</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query = "SELECT tiket.tiket_id,tiket.nim, peserta.nama, grup.nama_grup, kamar.nama_kamar, tiket.waktu FROM tiket, peserta, grup, kamar WHERE tiket.nim=peserta.nim AND tiket.grup_id=grup.grup_id AND tiket.kamar_id=kamar.kamar_id ORDER BY grup.nama_grup";
                            $data = $tiket->getData($query);
                            $no = 1;
                            foreach ($data as $key => $res) {
                                echo'<tr class="odd gradeX">
                                <td>'.$no.'.</td>
                                <td>'.$res['nim'].'</td>
                                <td>'.$res['nama'].'</td>
                                <td>'.$res['nama_grup'].'</td>
                                <td>'.$res['nama_kamar'].'</td>
                                <td class="center">
                                    <a href="?modul=tiket&act=edit&id='.$res['tiket_id'].'" class="btn btn-success btn-sm"><i class="fa fa-edit" aria-hidden="true"></i></a>
                                    <a href="?modul=tiket&act=delete&id='.$res['tiket_id'].'" class="btn btn-danger btn-sm"><i class="fa fa-trash" aria-hidden="true"></i></a>  
                                </td>
                                </tr>';    
                                $no++;
                            }
                            ?>
                        </tbody>
                    </table>
                <!-- /.table-responsive -->
                    </div>
                    <!-- /.col-lg-4 (nested) -->
                    <div class="col-lg-4">
                    
                    <!--Tambah data-->
                    <?php if($_GET['act'] == 'tambah'){?>
                        <legend>Form Tambah Data tiket</legend>
                        <hr>
                        <form role="form" method="POST">
                            <div class="form-group">
                              <input type="number" name="nim" id="nim" class="form-control form-control-sm" placeholder="NIM">
                            </div>
                            <div class="form-group">
                              <input type="text" name="nama" id="nama" class="form-control form-control-sm" placeholder="Nama tiket">
                            </div>
                            <div class="form-group">
                              <select class="form-control" name="prodi" id="prodi">
                                <option value="Arsitek">Arsitek</option>
                                <option value="Teknik Sipil">Teknik Sipil</option>
                                <option value="Teknik Informatika">Teknik Informatika</option>
                                <option value="Manajemen Informatika">Manajemen Informatika</option>
                                <option value="Teknik Mesin">Teknik Mesin</option>
                              </select>
                            </div>
                            <div class="form-group">
                              <input type="text" name="kontak" id="kontak" class="form-control form-control-sm" placeholder="Kontak">
                            </div>
                            <div class="form-group">
                              <select class="form-control" name="kelas" id="kelas">
                                <option value="A">Kelas A</option>
                                <option value="B">Kelas B</option>
                              </select>
                            </div>
                            <button type="submit" class="btn btn-primary btn-sm " name="btnSimpan">Simpan</button>
                        </form>
                    <!-- / col-lg-6 (nested) -->
                    <?php }?>
                    
                    <!--Edit data-->
                    <?php if($_GET['act'] == 'edit'){
                    $id = $tiket->escape_string($_GET['id']);

                    $data = $tiket->getData("SELECT * FROM tiket WHERE tiket_id='$id'");
                    foreach ($data as $res) {
                        $nim = $res['nim'];
                        $nama = $res['nama'];
                        $prodi = $res['prodi'];
                        $kontak = $res['kontak'];
                        $kelas = $res['kelas'];
                    }
                    ?>
                        <legend>Form Edit Data tiket</legend>
                        <hr>
                        <form role="form" method="POST">
                            <div class="form-group">
                              <input type="number" name="nim" id="nim" class="form-control form-control-sm" value="<?=$nim?>" readonly>
                            </div>
                            <div class="form-group">
                              <input type="text" name="nama" id="nama" class="form-control form-control-sm" value="<?=$nama?>">
                            </div>
                            <div class="form-group">
                              <select class="form-control" name="prodi" id="prodi">
                              <?php
                                if ($prodi == "Arsitek") {
                                    $ar = "selected"; $ts=""; $ti=""; $mi=""; $tm="";
                                }else if($prodi == "Teknik Sipil"){
                                    $ar = ""; $ts="selected"; $ti=""; $mi=""; $tm="";
                                }else if($prodi == "Teknik Informatika"){
                                    $ar = ""; $ts=""; $ti="selected"; $mi=""; $tm="";
                                }else if($prodi == "Manajemen Informatika"){
                                    $ar = ""; $ts=""; $ti=""; $mi="selected"; $tm="";
                                } else {
                                    $ar = ""; $ts=""; $ti=""; $mi=""; $tm="selected";
                                }
                                ?>
                                <option value="Arsitek" <?=$ar?>>Arsitek</option>
                                <option value="Teknik Sipil" <?=$ts?>>Teknik Sipil</option>
                                <option value="Teknik Informatika" <?=$ti?>>Teknik Informatika</option>
                                <option value="Manajemen Informatika" <?=$mi?>>Manajemen Informatika</option>
                                <option value="Teknik Mesin" <?=$tm?>>Teknik Mesin</option>
                              </select>
                            </div>
                            <div class="form-group">
                              <input type="text" name="kontak" id="kontak" class="form-control form-control-sm" value="<?=$kontak?>">
                            </div>
                            <div class="form-group">
                              <select class="form-control" name="kelas" id="kelas">
                              <?php
                                if ($kelas == "A") {
                                    $a = "selected"; $b="";
                                } else {
                                    $a = ""; $b="selected";
                                }
                                ?>
                                <option value="A" <?=$a?>>Kelas A</option>
                                <option value="B" <?=$b?>>Kelas B</option>
                              </select>
                            </div>
                            <button type="submit" class="btn btn-primary btn-sm " name="btnUpdate">Update</button>
                        </form>
                        <!-- / col-lg-6 (nested) -->
                        <?php }?>
                    </div>
                </div>
                <!-- /.row (nested) -->
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->