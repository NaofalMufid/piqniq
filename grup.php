<?php
$grup = new View();
?>
<section id="grup" class="bg-light">
    <div class="container">
    <div class="row">
        <div class="col-lg-8 mx-auto">
        <h2 class="text-center">Grup</h2>
        <hr>
        <p class="lead text-center">Grup atau rombongan berdasarkan bus dan prodi</p>
        <ul class="list-group">
        <?php
            $query = "SELECT grup.*,tujuan.nama_tujuan,tujuan.prodi FROM grup,tujuan WHERE grup.tujuan_id=tujuan.tujuan_id ORDER BY nama_grup";
            $data = $grup->getData($query);
            $no = 1;
            foreach ($data as $key => $res) {
                $q = "SELECT COUNT(tiket.grup_id) as isi FROM tiket WHERE tiket.grup_id='".$res['grup_id']."'";
                $d = $grup->getData($q);
                foreach ($d as $key => $val) {
                    $kosong = $res['seat'] - $val['isi'];
                    if ($no % 2 == 0) {
                        echo '
                        <li class="list-group-item list-group-item-primary d-flex justify-content-between align-items-center">
                        '.$res['nama_grup'].' : '.$res['prodi'].' Jumlah kursi '.$res['seat'].'
                        <span class="badge badge-success badge-pill">'.$kosong.' kosong</span>
                        </li>';
                    } else {
                        echo '
                        <li class="list-group-item  d-flex justify-content-between align-items-center">
                        '.$res['nama_grup'].' : '.$res['prodi'].' Jumlah kursi '.$res['seat'].'
                        <span class="badge badge-warning badge-pill">'.$kosong.' kosong</span>
                        </li>';
                    }
                }    
                $no++;
            }
            ?>
        </ul>
        </div>
    </div>
    </div>
</section>