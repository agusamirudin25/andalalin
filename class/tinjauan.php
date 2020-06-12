<?php
class Tinjauan
{
    public function lihat_data()
    {
        $koneksi = new koneksi();
        $query = $koneksi->conn->query("SELECT tinjauan.*, perusahaan.nama_perusahaan, pemohon.nama
        FROM tinjauan JOIN perusahaan ON tinjauan.no_registrasi = perusahaan.no_registrasi
        JOIN pemohon ON tinjauan.nik = pemohon.nik
        WHERE perusahaan.`status` = 1;");
        if ($query->num_rows > 0) {
            while ($row = $query->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        }
    }
}
