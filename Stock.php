<?php  
include_once("Database.php");
include_once("Buku.php");

class Stock extends Database{
    public function kurangBukuBaik($id, $data){
        $buku = new Buku;
        $data_buku = $buku->find($data["buku_id"]);
        $id = $data_buku["id"];

        $currenctStock = $data_buku["stock_baik"];
        $tambah = $currenctStock - 1;

        $sql = "UPDATE buku SET stock_baik='$tambah' WHERE id='$id'";

        if($this->db->query($sql) == true){
            echo "Berhasil";
        } else{
            echo "Gagal";
        }
    }
    public function tambahBukuBaik($id){
        $buku = new Buku;
        $data_buku = $buku->find($_GET["buku_id"]);
        $id = $_GET["buku_id"];

        $currenctStock = $data_buku["stock_rusak"];
        $tambah = $currenctStock + 1;

        $sql = "UPDATE buku SET stock_rusak='$tambah' WHERE id='$id'";

        if($this->db->query($sql) == true){
            echo "Berhasil";
        } else{
            echo "Gagal";
        }
    }
    public function kurangBukuRusak($id, $data){
        $buku = new Buku;
        $data_buku = $buku->find($data["buku_id"]);
        $id = $data_buku["id"];

        $currenctStock = $data_buku["stock_rusak"];
        $tambah = $currenctStock - 1;

        $sql = "UPDATE buku SET stock_rusak='$tambah' WHERE id='$id'";

        if($this->db->query($sql) == true){
            echo "Berhasil";
        } else{
            echo "Gagal";
        }
    }
    public function tambahBukuRusak($id){
        $buku = new Buku;
        $data_buku = $buku->find($_GET["buku_id"]);
        $id = $_GET["buku_id"];

        $currenctStock = $data_buku["stock_baik"];
        $tambah = $currenctStock + 1;

        $sql = "UPDATE buku SET stock_baik='$tambah' WHERE id='$id'";

        if($this->db->query($sql) == true){
            echo "Berhasil";
        } else{
            echo "Gagal";
        }
    }
}


?>