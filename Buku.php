<?php
include_once("Database.php");

class Buku extends Database
{
    public function all()
    {
        $sql = "SELECT buku.id, buku.judul, kategori.nama as kategori, penerbit.nama as penerbit, buku.pengarang, buku.tahun_terbit, buku.stock_baik + buku.stock_rusak as stock FROM buku,kategori,penerbit WHERE buku.kategori_id = kategori.id and buku.penerbit_id = penerbit.id ";

        return $this->db->query($sql)->fetch_all(MYSQLI_ASSOC);
    }
    public function find($id){
        $sql = "SELECT * FROM buku WHERE id = '$id'";

        return $this->db->query($sql)->fetch_assoc();
    }
}
