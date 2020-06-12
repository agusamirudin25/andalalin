<?php
require_once "koneksi.php";
class saran
{
    var $id_saran;
    var $email;
    var $komentar;
    var $nama;
    var $tanggal;

    public function hapus()
    {
        echo "HAPUS";
    }

    public function lihat($nama, $email, $komentar)
    {
        $koneksi = new koneksi();
        // kode otomatis di rekomendasi
        $query_kode = $koneksi->conn->query("SELECT max(id_saran) AS kode FROM saran");
        $row = $query_kode->fetch_assoc();
        $tanggal = date('Y-m-d h:i:s');
        if ($row) {
            $nilai_kode = substr($row['kode'], 4);
            $id_saran = (int) $nilai_kode;
            $id_saran = $id_saran + 1;
            $id_saran_otomatis = "S" . str_pad($id_saran, 4, "0", STR_PAD_LEFT);
        } else {
            $id_saran_otomatis = "S0001";
        }
        $query = $koneksi->conn->query("INSERT INTO saran VALUES('$id_saran_otomatis', '$nama', '$email', '$komentar', '$tanggal')");
        return $koneksi->conn->affected_rows;
    }

    public function ubah()
    {
        echo "ubah";
    }
}
