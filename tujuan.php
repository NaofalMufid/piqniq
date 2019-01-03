<?php
$tujuan = new View();
?>
<section id="tujuan">
    <div class="container">
    <div class="row">
        <div class="col-lg-10 mx-auto">
        <h2 class="text-center">Tujuan</h2>
        <hr>
        <p class="lead text-center">Tempat Kunjungan KKL Fastikom</p>
        <div id="carouselId" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselId" data-slide-to="0" class="active"></li>
                <li data-target="#carouselId" data-slide-to="1"></li>
                <li data-target="#carouselId" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner row w-100 mx-auto">
                <?php
                $query = "SELECT * FROM tujuan ORDER BY prodi";
                $data = $tujuan->getData($query);
                $no = 1;
                foreach ($data as $key => $res) {
                    // tampilkan gambar
                    $gambar = '';
                    if($res["image"] != '')
                    {
                        $gambar = '<img src="administrator/upload/'.$res["image"].'" class="card-img-top" width="50" height="150" alt="No Image"/>';
                    }
                    else
                    {
                        $gambar = '';
                    }

                    if($res['tujuan_id'] == 1){
                        echo'
                        <div class="carousel-item active col-md-4">
                        <div class="card">
                            '.$gambar.'
                            <div class="card-body">
                            <h5 class="card-title">'.$res['nama_tujuan'].'</h5>
                            <p class="card-text">'.$res['prodi'].'</p>
                            </div>
                        </div>
                        </div>';
                    }else{
                        echo'
                        <div class="carousel-item col-md-4">
                        <div class="card">
                            '.$gambar.'
                            <div class="card-body">
                            <h5 class="card-title">'.$res['nama_tujuan'].'</h5>
                            <p class="card-text">'.$res['prodi'].'</p>
                            </div>
                        </div>
                        </div>';
                    }    
                }
                ?>
            </div>
            <a class="carousel-control-prev" href="#carouselId" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselId" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
            </div>
        </div>
    </div>
    </div>
</section>