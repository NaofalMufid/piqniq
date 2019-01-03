<?php
$kamar = new View();
?>
<section id="kamar">
    <div class="container">
    <div class="row">
        <div class="col-lg-10 mx-auto">
        <h2 class="text-center">Kamar</h2>
        <hr>
        <p class="lead text-center">Memilih kamar sendiri berdasarkan prodi dan Mahasiswa tidak bisa dengan Mahasiswi</p>
        <div id="accordion">
            
            <!--Kamar mahasiswa-->
            <div class="card">
                <div class="card-header" id="headingOne">
                <h5 class="mb-0">
                    <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    Kamar Mahasiswa
                    </button>
                </h5>
                </div>
            
                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead class="table-dark">
                            <tr>
                            <th>Nama Kamar</th>
                            <th>Kuota</th>
                            <th>Kosong</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $query = "SELECT * FROM kamar WHERE nama_kamar LIKE'%HL%' OR keterangan LIKE '%laki%' ORDER BY nama_kamar";
                            $data = $kamar->getData($query);
                            $no = 1;
                            foreach ($data as $key => $res) {
                                echo'
                                    <tr>
                                        <td>'.$res['nama_kamar'].'</td>
                                        <td>'.$res['isi'].'</td>
                                        <td>
                                        <span class="badge badge-danger badge-pill">0</span>
                                        </td>
                                    </tr>';    
                            }
                            ?>
                            </tbody>
                        </table>
                </div>
                </div>
            </div>

            <!--Kamar mahasiswi-->
            <div class="card">
                <div class="card-header" id="headingTwo">
                <h5 class="mb-0">
                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    Kamar Mahasiswi
                    </button>
                </h5>
                </div>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                <div class="card-body">
                    <table class="table table-bordered">
                    <thead class="table-dark">
                        <tr>
                        <th>Nama Kamar</th>
                        <th>Kuota</th>
                        <th>Kosong</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query = "SELECT * FROM kamar WHERE nama_kamar LIKE'%HP%' OR keterangan LIKE '%perempuan%' ORDER BY nama_kamar";
                            $data = $kamar->getData($query);
                            $no = 1;
                            foreach ($data as $key => $res) {
                                echo'
                                    <tr>
                                        <td>'.$res['nama_kamar'].'</td>
                                        <td>'.$res['isi'].'</td>
                                        <td>
                                        <span class="badge badge-danger badge-pill">0</span>
                                        </td>
                                    </tr>';    
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                </div>
            </div>
            </div>
        </div>
    </div>
    </div>
</section>