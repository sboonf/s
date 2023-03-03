<?php
include_once("../class/Buku.php");
include_once("../partials/links-css.php");
include_once("../class/User.php");
include_once("../class/Peminjaman.php");

session_start();

$buku = new Buku;
$data_buku = $buku->find($_GET["id_buku"]);

$user = new User;
$u = $user->find($_SESSION["id"]);


if (isset($_POST["submit"])) {
    $data = [
        "user_id" => $_POST["user_id"],
        "buku_id" => $_POST["buku_id"],
        "tanggal_peminjaman" => $_POST["tanggal_peminjaman"],
        "kondisi_buku_saat_dipinjam" => $_POST["kondisi_buku_saat_dipinjam"],
    ];

    $peminjaman = new Peminjaman;
    $submit = $peminjaman->create($data);
    header("Location: peminjaman.php");
}
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
            <div class="card p-3 row">
                <form action="" method="POST">
                    <div class="">
                        <label for="">Peminjam</label>
                        <input class="col-4" type="text" readonly value=" <?= $u["fullname"] ?>">
                        <input type="text" readonly name="user_id" value="<?= $u["id"] ?>">
                    </div>
                    <div class="">
                        <label for="">Judul Buku</label>
                        <input type="text" name="id" id="" value="<?= $data_buku["judul"] ?>">
                        <input class="col-4" name="buku_id" hidden type="text" value="<?= $data_buku["id"] ?>">
                    </div>
                    <div class="">
                        <label for="">Tanggal Peminjaman</label>
                        <input type="datetime" readonly name="tanggal_peminjaman" id="" value="<?= date("Y-m-d H:i:d") ?>">
                    </div>
                    <div class="">
                        <label for="">Kondisi Buku</label>
                        <select name="kondisi_buku_saat_dipinjam" id="">
                            <option value="baik">Baik</option>
                            <option value="rusak">Rusak</option>
                        </select>
                    </div>
                    <div class="">
                        <button type="submit" name="submit" class="btn btn-success">SUBMIT</button>
                    </div>
            </div>
            </form>
        </div>
</body>

</html>

<?php
include_once("../partials/link-script.php");
?>