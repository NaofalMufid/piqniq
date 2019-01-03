<?php
require_once('../administrator/action/view.php');
$auto = new View();

$q = $_GET['query'];

$query = "SELECT kamar_d,nama_kamar FROM kamar WHERE nama_kamar LIKE '%".$q."%' ORDER BY nama_kamar";
$result = $auto->getData($query);

foreach ($result as $key => $value)
{
    $output['suggestions'][] = [
        'value' => $value['nama_kamar'],
        'kamar_id' => $value['kamar_id'],
        'kamar'  => $value['nama_kamar']
    ];
}

if (!empty($output)) {
    // Encode ke format JSON.
    echo json_encode($output);
}