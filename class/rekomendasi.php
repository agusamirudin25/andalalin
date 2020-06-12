<?php

class Rekomendasi
{
    public function lihat_data()
    {
        $koneksi = new koneksi();
        $query = $koneksi->conn->query("SELECT rekomendasi.*, perusahaan.nama_perusahaan, pemohon.nama
        FROM rekomendasi JOIN tinjauan ON rekomendasi.kode_tinjauan = tinjauan.kode_tinjauan JOIN perusahaan ON rekomendasi.no_registrasi = perusahaan.no_registrasi
        JOIN pemohon ON rekomendasi.nik = pemohon.nik
        WHERE perusahaan.`status` = 1 AND tinjauan.keterangan = 1");
        if ($query->num_rows > 0) {
            while ($row = $query->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        }
    }
}
