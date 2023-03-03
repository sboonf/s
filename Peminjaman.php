<?php
include_once("Database.php");

class Peminjaman extends Database
{

    public function all()
    {
        $sql = "SELECT user.fullname as nama, buku.judul as buku, peminjaman.buku_id, peminjaman.id, peminjaman.tanggal_peminjaman, peminjaman.tanggal_pengembalian, peminjaman.kondisi_buku_saat_dipinjam, peminjaman.kondisi_buku_saat_dikembalikan, peminjaman.denda from buku, user, peminjaman where user.id = peminjaman.user_id and buku.id = peminjaman.buku_id";

        return $this->db->query($sql)->fetch_all(MYSQLI_ASSOC);
    }

    public function create($data)
    {
        $user_id = $data["user_id"];
        $buku_id = $data["buku_id"];
        $tanggal_peminjaman = $data["tanggal_peminjaman"];
        $kondisi_buku_saat_dipinjam = $data["kondisi_buku_saat_dipinjam"];

        $sql = "INSERT INTO peminjaman (user_id, buku_id, tanggal_peminjaman, kondisi_buku_saat_dipinjam) VALUES('$user_id', '$buku_id', '$tanggal_peminjaman', '$kondisi_buku_saat_dipinjam')";

        if ($this->db->query($sql) === TRUE) {
            return "Berhasil menambah data";
        } else {
            return "Gagal menambah data";
        }
    }
}
