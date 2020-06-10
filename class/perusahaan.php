<?php
class perusahaan
{
    public function tampil_perusahaan()
    {
        $koneksi = new koneksi();
        $query = $koneksi->conn->query("SELECT perusahaan.no_registrasi, perusahaan.nik, pemohon.nama, perusahaan.nama_perusahaan, perusahaan.tanggal_daftar
        FROM perusahaan JOIN pemohon ON perusahaan.nik = pemohon.nik
        WHERE perusahaan.status = 0");
        if ($query->num_rows > 0) {
            while ($row = $query->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        }
    }


    public function hapus_data($no_reg)
    {
        $koneksi = new koneksi;
        $query = $koneksi->conn->query("DELETE FROM perusahaan WHERE no_registrasi = '$no_reg'");
        return $koneksi->conn->affected_rows;
    }

    public function ubah($no_reg)
    {
        $koneksi = new koneksi();
        $query = $koneksi->conn->query("UPDATE perusahaan SET status = 1 WHERE no_registrasi = '$no_reg'");
        return $koneksi->conn->affected_rows;
    }

    public function detail_perusahaan($no_reg)
    {
        $koneksi = new koneksi();
        $query = $koneksi->conn->query("SELECT perusahaan.*, pemohon.nama, pemohon.ktp, pemohon.npwp FROM perusahaan JOIN pemohon ON perusahaan.nik = pemohon.nik WHERE perusahaan.no_registrasi = '$no_reg'");
        $row = $query->fetch_assoc();
        return $row;
    }
}
