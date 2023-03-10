<?php
include_once("../partials/links-css.php");
include_once("../class/Buku.php");
include_once("../class/User.php");

session_start();

$buku = new Buku;
$data_buku = $buku->all();

$user = new User;
$data_user = $user->find($_SESSION["id"]);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User</title>
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
                    <th>Judul Buku</th>
                    <th>Kategori</th>
                    <th>Penerbit</th>
                    <th>Pengarang</th>
                    <th>Tahun Terbit</th>
                    <th>Stock</th>
                    <th>Aksi</th>
                </thead>
                <?php
                foreach ($data_buku as $key => $db) {
                ?>
                    <tbody>
                        <td><?= $key + 1 ?></td>
                        <td><?= $db["judul"] ?></td>
                        <td><?= $db["kategori"] ?></td>
                        <td><?= $db["penerbit"] ?></td>
                        <td><?= $db["pengarang"] ?></td>
                        <td><?= $db["tahun_terbit"] ?></td>
                        <td><?= $db["stock"] ?></td>
                        <td><a href="form-peminjaman.php?id_buku=<?= $db["id"] ?>">Pinjam</a></td>
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