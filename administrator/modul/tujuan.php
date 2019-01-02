<?php
require_once("action/tujuan.php");
?>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <a href="?modul=tujuan&act=tambah" class="btn btn-info btn-sm"><i class="fa fa-plus-circle" aria-hidden="true"></i> Tambah Tujuan</a>
                <p></p>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-8">
                    <table id="dataku" class="table table-striped">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama Tujuan</th>
                                <th>Prodi</th>
                                <th>Gambar</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query = "SELECT * FROM tujuan ORDER BY prodi";
                            $data = $tujuan->getData($query);
                            $no = 1;
                            foreach ($data as $key => $res) {
                                // tampilkan gambar
                                $gambar = '';
                                if($res["image"] != '')
                                {
                                    $gambar = '<img src="upload/'.$res["image"].'" class="img-thumbnail" width="50" height="35" alt="No Image"/>';
                                }
                                else
                                {
                                    $gambar = '';
                                }

                                //$ket = substr($res['keterangan'], 0,20);
                                echo'<tr class="odd gradeX">
                                <td>'.$no.'.</td>
                                <td>'.$res['nama_tujuan'].'</td>
                                <td>'.$res['prodi'].'</td>
                                <td>'.$gambar.'</td>
                                <td class="center">
                                    <a href="?modul=tujuan&act=edit&id='.$res['tujuan_id'].'" class="btn btn-success btn-sm"><i class="fa fa-edit" aria-hidden="true"></i></a>
                                    <a href="?modul=tujuan&act=delete&id='.$res['tujuan_id'].'" class="btn btn-danger btn-sm"><i class="fa fa-trash" aria-hidden="true"></i></a>  
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
                        <legend>Form Tambah Data Tujuan</legend>
                        <hr>
                        <form role="form" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                              <input type="text" name="nama_tujuan" id="nama_tujuan" class="form-control form-control-sm" placeholder="Nama Tujuan">
                            </div>
                            <div class="form-group">
                              <select class="form-control form-control-sm" name="prodi" id="prodi">
                                <option selected>Prodi</option>
                                <option value="Arsitek">Arsitek</option>
                                <option value="Teknik Sipil">Teknik Sipil</option>
                                <option value="Teknik Informatika">Teknik Informatika</option>
                                <option value="Manajemen Informatika">Manajemen Informatika</option>
                                <option value="Teknik Mesin">Teknik Mesin</option>
                              </select>
                            </div>
                            <div class="form-group">
                              <input type="file" class="form-control-file form-control-sm" name="gambar" id="gambar" placeholder="" aria-describedby="fileHelpId">
                            </div>
                            <div class="form-group">
                              <textarea class="form-control form-control-sm" name="keterangan" id="keterangan" rows="3"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary btn-sm " name="btnSimpan">Simpan</button>
                        </form>
                    <!-- / col-lg-6 (nested) -->
                    <?php }?>
                    
                    <!--Edit data-->
                    <?php if($_GET['act'] == 'edit'){
                    $id = $tujuan->escape_string($_GET['id']);

                    $data = $tujuan->getData("SELECT * FROM tujuan WHERE tujuan_id='$id'");
                    foreach ($data as $res) {
                        $nama_tujuan = $res['nama_tujuan'];
                        $prodi = $res['prodi'];
                        $keterangan = $res['keterangan'];
                        $image = $res['image'];
                        //dapatkan gambar
                        if($res["image"] != '')
                        {
                            $gambar = '<img src="upload/'.$image.'" class="img-thumbnail" width="50" height="35" /><input type="hidden" name="hidden_gambar" value="'.$image.'" />';
                        }
                        else
                        {
                            $gambar = '<input type="hidden" name="hidden_gambar" value="" />';
                        }
                    }
                    ?>
                        <legend>Form Edit Data Tujuan</legend>
                        <hr>
                        <form role="form" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="tujuan_id" value="<?=$id?>">
                            <div class="form-group">
                              <input type="text" name="nama_tujuan" id="nama_tujuan" class="form-control form-control-sm" value="<?=$nama_tujuan?>">
                            </div>
                            <div class="form-group">
                              <select class="form-control form-control-sm" name="prodi" id="prodi">
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
                              <?=$gambar?>  
                              <input type="file" class="form-control-file form-control-sm" name="gambar" id="gambar" placeholder="" aria-describedby="fileHelpId">
                              <input type="hidden" name="image" value="<?=$image?>">
                            </div>
                            <div class="form-group">
                              <textarea class="form-control form-control-sm" name="keterangan" id="keterangan" rows="3"><?=$keterangan?></textarea>
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