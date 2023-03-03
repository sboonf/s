<?php 
include_once("Database.php");

class Pesan extends Database
{

    public function all(){

        $sql = "SELECT user.fullname as pengirim, pesan.judul, pesan.isi, pesan.status, pesan.tanggal_kirim FROM user,pesan WHERE pesan.pengirim_id = user.id";

        return $this->db->query($sql)->fetch_all(MYSQLI_ASSOC);
    }
}
?>