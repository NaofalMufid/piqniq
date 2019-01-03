<?php
require_once("action/grup.php");
?>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <a href="?modul=grup&act=tambah" class="btn btn-info btn-sm"><i class="fa fa-plus-circle" aria-hidden="true"></i> Tambah grup</a>
                <p></p>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-8">
                    <table id="dataku" class="table table-striped">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama Grup</th>
                                <th>Tujuan</th>
                                <th>Prodi</th>
                                <th>Pendamping</th>
                                <th>Kursi</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query = "SELECT grup.*,tujuan.nama_tujuan,tujuan.prodi FROM grup,tujuan WHERE grup.tujuan_id=tujuan.tujuan_id ORDER BY nama_grup";
                            $data = $grup->getData($query);
                            $no = 1;
                            foreach ($data as $key => $res) {
                                echo'<tr class="odd gradeX">
                                <td>'.$no.'.</td>
                                <td>'.$res['nama_grup'].'</td>
                                <td>'.$res['nama_tujuan'].'</td>
                                <td>'.$res['prodi'].'</td>
                                <td>'.$res['pendamping'].'</td>
                                <td>'.$res['seat'].'</td>
                                <td class="center">
                                    <a href="?modul=grup&act=edit&id='.$res['grup_id'].'" class="btn btn-success btn-sm"><i class="fa fa-edit" aria-hidden="true"></i></a>
                                    <a href="?modul=grup&act=delete&id='.$res['grup_id'].'" class="btn btn-danger btn-sm"><i class="fa fa-trash" aria-hidden="true"></i></a>  
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
                        <legend>Form Tambah Data Grup</legend>
                        <hr>
                        <form role="form" method="POST">
                            <div class="form-group">
                              <input type="text" name="nama_grup" id="nama_grup" class="form-control form-control-sm" placeholder="Nama grup">
                            </div>
                            <div class="form-group">
                              <select class="form-control form-control-sm" name="tujuan" id="tujuan">
                                  <option selected>Tujuan</option>
                                <?php
                                $tujuan = "SELECT tujuan_id,nama_tujuan FROM tujuan ORDER BY prodi";
                                $row = $grup->getData($tujuan);
                                foreach ($row as $key => $value) {
                                ?>
                                    <option value="<?=$value['tujuan_id']?>"><?=$value['nama_tujuan']?></option>
                                <?php
                                }
                                ?>
                              </select>
                            </div>
                            <div class="form-group">
                              <input type="text" name="pendamping" id="pendamping" class="form-control form-control-sm" placeholder="Pendamping">
                            </div>
                            <div class="form-group">
                              <input type="number" name="seat" id="seat" class="form-control form-control-sm" placeholder="Kursi">
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
                    $id = $grup->escape_string($_GET['id']);

                    $data = $grup->getData("SELECT * FROM grup WHERE grup_id='$id'");
                    foreach ($data as $res) {
                        $nama_grup = $res['nama_grup'];
                        $tujuan = $res['tujuan_id'];
                        $pendamping = $res['pendamping'];
                        $kursi = $res['kursi'];
                        $keterangan = $res['keterangan'];
                    }
                    ?>
                        <legend>Form Edit Data grup</legend>
                        <hr>
                        <form role="form" method="POST">
                            <input type="hidden" name="grup_id" value="<?=$id?>">
                            <div class="form-group">
                              <input type="text" name="nama_grup" id="nama_grup" class="form-control form-control-sm" value="<?=$nama_grup?>">
                            </div>
                            <div class="form-group">
                                <select class="form-control form-control-sm" name="tujuan" id="tujuan">
                                    <?php
                            // show tujuan
                            $query = "SELECT tujuan_id,nama_tujuan FROM tujuan ORDER BY prodi";
                            $row = $grup->getData($query);
                            foreach ($row as $key => $value) {
                                // mencocokan tujuan yag terpilih
                                if ($value['tujuan_id'] == $tujuan) {
                                    echo '<option value="'.$value['tujuan_id'].'" selected>'.$value['nama_tujuan'].'</option>';
                                } else {
                                    echo '<option value="'.$value['tujuan_id'].'">'.$value['nama_tujuan'].'</option>';
                                }
                            }
                            ?>
                              </select>
                            </div>
                            <div class="form-group">
                              <input type="text" name="pendamping" id="pendamping" class="form-control form-control-sm" value="<?=$pendamping?>">
                            </div>
                            <div class="form-group">
                              <input type="number" name="seat" id="seat" class="form-control form-control-sm" value="<?=$kursi?>">
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