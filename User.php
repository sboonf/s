<?php
include_once("Database.php");

class User extends Database
{
    public function find($id)
    {
        $sql = "SELECT * FROM user WHERE id = '$id' ";

        return $this->db->query($sql)->fetch_assoc();
    }
}
