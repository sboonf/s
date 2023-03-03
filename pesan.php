<?php
include_once("../partials/links-css.php");
include_once("../class/Pesan.php");

session_start();

$pesan = new Pesan;
$data_pesan = $pesan->all();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesan | User</title>
</head>

<body>

    <div class="wrapper d-flex align-items-stretch">
        <!-- include sidebar -->
        <?php include_once("../partials/sidebar-user.php") ?>
        <!-- Page Content  -->
        <div id="content" class="p-4 p-md-5">
            <!-- include navbar -->
            <?php include_once("../partials/navbar-user.php") ?>
            <!-- ISI KONTEN -->
            <table class="table table-dark table-striped">
                <thead>
                    <th>No</th>
                    <th>Penerima</th>
                    <th>Pengirim</th>
                    <th>Judul</th>
                    <th>Isi</th>
                    <th>Status</th>
                    <th>Tanggal Kirim</th>
                    <th>Aksi</th>       
                </thead>

                <?php
                foreach ($data_pesan as $key => $dpsn) {
                ?>
                    <tbody>
                        <td><?= $key + 1 ?></td>
                        <td><?= $dpsn["Penerima_id"] ?></td>
                        <td><?= $dpsn["Pengirim_id"] ?></td>
                        <td><?= $dpsn["judul"] ?></td>
                        <td><?= $dpsn["isi"] ?></td>
                        <td><?= $dpsn["status"] ?></td>
                        <td><?= $dpsn["tanggal_kirim"] ?></td>
                        <td><a href="form_peminjaman.php?id_buku=<?= $db["id"] ?>">Pinjam</a></td>
                    </tbody>
                <?php
                }
                ?>
            </table>

        </div>
    </div>
</body>

</html>
<?php
include_once("../partials/link-script.php");
?>