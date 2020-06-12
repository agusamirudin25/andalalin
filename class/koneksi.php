<?php
class koneksi
{
    private $dbhost = "localhost";
    private $dbuser = "root";
    private $dbpass = "";
    private $dbname = "db_andalalin";
    public $conn;

    public function __construct()
    {
        $this->conn = new mysqli($this->dbhost, $this->dbuser, $this->dbpass, $this->dbname);
    }
    public function login()
    {
        // $_SESSION['id_user'] = $id_user;
        // $_SESSION['nama_user'] = $nama_user;
        // $_SESSION['level'] = $level;
        echo "<script> alert('Login Berhasil'); </script>";
        echo "<script> window.location='index.php'; </script>";
    }
    public function logout()
    {
        unset($_SESSION['nip']);
        unset($_SESSION['nik']);
        unset($_SESSION['nama']);
        unset($_SESSION['jabatan']);
        unset($_SESSION['level']);
        echo "<script> window.location='index.php'; </script>";
    }
}
