<?php
require_once("action/user.php");
?>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <a href="?modul=user&act=tambah" class="btn btn-info btn-sm"><i class="fa fa-plus-circle" aria-hidden="true"></i> Tambah user</a>
                <p></p>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-8">
                    <table id="dataku" class="table table-striped">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Username</th>
                                <th>Level</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query = "SELECT * FROM user ORDER BY username";
                            $data = $user->getData($query);
                            $no = 1;
                            foreach ($data as $key => $res) {
                                echo'<tr class="odd gradeX">
                                <td>'.$no.'.</td>
                                <td>'.$res['username'].'</td>
                                <td>'.$res['level'].'</td>
                                <td class="center">
                                    <a href="?modul=user&act=edit&id='.$res['user_id'].'" class="btn btn-success btn-sm"><i class="fa fa-edit" aria-hidden="true"></i></a>
                                    <a href="?modul=user&act=delete&id='.$res['user_id'].'" class="btn btn-danger btn-sm"><i class="fa fa-trash" aria-hidden="true"></i></a>  
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
                        <legend>Form Tambah Data User</legend>
                        <hr>
                        <form role="form" method="POST">
                            <div class="form-group">
                              <input type="text" name="username" id="username" class="form-control form-control-sm" placeholder="Username">
                            </div>
                            <div class="form-group">
                              <input type="password" name="password" id="password" class="form-control form-control-sm" placeholder="Password">
                            </div>
                            <div class="form-group">
                              <label for=""></label>
                              <select class="form-control" name="level" id="level">
                                <option value="S">Super</option>
                                <option value="A">Admin</option>
                              </select>
                            </div>
                            <button type="submit" class="btn btn-primary btn-sm " name="btnSimpan">Simpan</button>
                        </form>
                    <!-- / col-lg-6 (nested) -->
                    <?php }?>
                    
                    <!--Edit data-->
                    <?php if($_GET['act'] == 'edit'){
                    $id = $user->escape_string($_GET['id']);

                    $data = $user->getData("SELECT * FROM user WHERE user_id='$id'");
                    foreach ($data as $res) {
                        $username = $res['username'];
                        $password = $res['password'];
                        $level = $res['level'];
                    }
                    ?>
                        <legend>Form Edit Data user</legend>
                        <hr>
                        <form role="form" method="POST">
                            <input type="hidden" name="user_id" value="<?=$id?>">
                            <div class="form-group">
                              <input type="text" name="username" id="username" class="form-control form-control-sm" value="<?=$username?>">
                            </div>
                            <div class="form-group">
                              <input type="password" name="password" id="password" class="form-control form-control-sm" value="">
                            </div>
                            <div class="form-group">
                              <select class="form-control" name="level" id="level">
                              <?php
                                if ($level == "S") {
                                    $a = "selected"; $b="";
                                } else {
                                    $a = ""; $b="selected";
                                }
                                ?>
                                <option value="S" <?=$a?>>Super</option>
                                <option value="A" <?=$b?>>Admin</option>
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