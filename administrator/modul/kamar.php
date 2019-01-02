<?php
require_once("action/kamar.php");
?>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <a href="?modul=kamar&act=tambah" class="btn btn-info btn-sm"><i class="fa fa-plus-circle" aria-hidden="true"></i> Tambah kamar</a>
                <p></p>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-8">
                    <table id="dataku" class="table table-striped">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama kamar</th>
                                <th>Keterangan</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query = "SELECT * FROM kamar ORDER BY nama_kamar";
                            $data = $kamar->getData($query);
                            $no = 1;
                            foreach ($data as $key => $res) {
                                $ket = substr($res['keterangan'], 0,30);
                                echo'<tr class="odd gradeX">
                                <td>'.$no.'.</td>
                                <td>'.$res['nama_kamar'].'</td>
                                <td>'.$ket.'...</td>
                                <td class="center">
                                    <a href="?modul=kamar&act=edit&id='.$res['kamar_id'].'" class="btn btn-success btn-sm"><i class="fa fa-edit" aria-hidden="true"></i></a>
                                    <a href="?modul=kamar&act=delete&id='.$res['kamar_id'].'" class="btn btn-danger btn-sm"><i class="fa fa-trash" aria-hidden="true"></i></a>  
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
                        <legend>Form Tambah Data Kamar</legend>
                        <hr>
                        <form role="form" method="POST">
                            <div class="form-group">
                              <input type="text" name="nama_kamar" id="nama_kamar" class="form-control form-control-sm" placeholder="Nama kamar">
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
                    $id = $kamar->escape_string($_GET['id']);

                    $data = $kamar->getData("SELECT * FROM kamar WHERE kamar_id='$id'");
                    foreach ($data as $res) {
                        $nama_kamar = $res['nama_kamar'];
                        $keterangan = $res['keterangan'];
                    }
                    ?>
                        <legend>Form Edit Data kamar</legend>
                        <hr>
                        <form role="form" method="POST">
                            <input type="hidden" name="kamar_id" value="<?=$id?>">
                            <div class="form-group">
                              <input type="text" name="nama_kamar" id="nama_kamar" class="form-control form-control-sm" value="<?=$nama_kamar?>">
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