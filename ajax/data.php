<?php
require '../proses.php';

$keyword = $_GET['keyword'];

$i = 1;

if ($keyword == true) {
    $query = "SELECT * FROM orang WHERE nama LIKE '%$keyword%' OR alamat LIKE '%$keyword%' OR bidang LIKE '%$keyword%'";
} else {
    $query = "SELECT * FROM orang";
}

$data = query($query);
?>

<table border="1" cellpadding="10" cellspacing="0">
    <tr>
        <th>#</th>
        <th>Nama</th>
        <th>Alamat</th>
        <th>Bidang</th>
    </tr>
    <?php foreach ($data as $d) : ?>
        <tr>
            <td><?= $i++; ?></td>
            <td><?= $d['nama']; ?></td>
            <td><?= $d['alamat']; ?></td>
            <td><?= $d['bidang']; ?></td>
        </tr>
    <?php endforeach; ?>
</table>