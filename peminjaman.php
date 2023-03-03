<?php
include_once("../partials/links-css.php");
include_once("../class/Buku.php");
include_once("../class/Peminjaman.php");

session_start();

$peminjaman = new Peminjaman;
$data_peminjaman = $peminjaman->all();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
                    <th>Nama Anggota</th>
                    <th>Judul Buku</th>
                    <th>Tanggal Peminjaman</th>
                    <th>Kondisi Buku Saat Dipinjam</th>
                    <th>Aksi</th>
                </thead>
                <?php
                foreach ($data_peminjaman as $key => $dp) {
                ?>
                    <tbody>
                        <td><?= $key + 1 ?></td>
                        <td><?= $dp["nama"] ?></td>
                        <td><?= $dp["buku"] ?></td>
                        <td><?= $dp["tanggal_peminjaman"] ?></td>
                        <td><?= $dp["kondisi_buku_saat_dipinjam"] ?></td>
                        <td><a href="form_pengembalian.php?buku_id=<?= $dp["
                        "] ?>">Kembalikan</a></td>
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