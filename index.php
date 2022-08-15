<?php

require 'proses.php';

$i = 1;

$data = query("SELECT * FROM orang");

if (isset($_POST['cari'])) {
    $data = cari($_POST['keyword']);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Live Search</title>
</head>

<body>

    <div style="padding: 50px;">
        <form action="" method="post">
            <label for="keyword">Cari : </label>
            <input type="search" name="keyword" id="keyword" style="width: 300px; height: 30px;" placeholder="Cari..." autofocus>
            <button type="submit" name="cari" style="height: 30px;" id="cari">Cari</button>

            <img src="loading.gif" alt="Loading" style="width: 25px; display: none; margin-bottom: -10px; z-index: -1;" id="loading">

        </form>

        <br>

        <div id="data">
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
        </div>
    </div>

    <script src="jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#cari').hide();
            $('#keyword').on('keyup', function() {
                $('#loading').show();
                $.get('ajax/data.php?keyword=' + $('#keyword').val(), function(data) {
                    $('#data').html(data);
                    $('#loading').hide();
                });
            });
        });
    </script>

</body>

</html>