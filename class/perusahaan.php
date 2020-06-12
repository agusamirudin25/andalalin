<?php
class perusahaan
{
    public function tampil_perusahaan()
    {
        $koneksi = new koneksi();
        $query = $koneksi->conn->query("SELECT perusahaan.no_registrasi, perusahaan.nik, pemohon.nama, perusahaan.nama_perusahaan, perusahaan.tanggal_daftar, perusahaan.status
        FROM perusahaan JOIN pemohon ON perusahaan.nik = pemohon.nik");
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

    public function ubah($no_reg, $kode_terakhir)
    {
        $koneksi = new koneksi();
        $tanggal = date('yy-m-d');
        $row_tinjauan = $koneksi->conn->query("SELECT nik, no_registrasi FROM perusahaan WHERE no_registrasi = '$no_reg'")->fetch_assoc();
        $nik = $row_tinjauan['nik'];
        $no_reg = $row_tinjauan['no_registrasi'];
        $query1 = $koneksi->conn->query("UPDATE perusahaan SET status = 1 WHERE no_registrasi = '$no_reg'");
        $query2 = $koneksi->conn->query("INSERT INTO tinjauan VALUES('$kode_terakhir', '$nik', '$no_reg', '', '0', '$tanggal')");
        return $koneksi->conn->affected_rows;
    }

    public function detail_perusahaan($no_reg)
    {
        $koneksi = new koneksi();
        $query = $koneksi->conn->query("SELECT perusahaan.*, pemohon.nama, pemohon.ktp, pemohon.npwp FROM perusahaan JOIN pemohon ON perusahaan.nik = pemohon.nik WHERE perusahaan.no_registrasi = '$no_reg'");
        $row = $query->fetch_assoc();
        return $row;
    }

    public function tambah_perusahaan($data)
    {
        $koneksi = new koneksi();
        //auto increment no_registrasi
        $awalan = "R";
        $q = $koneksi->conn->query("SELECT max(no_registrasi) FROM perusahaan");
        $cek = $q->num_rows;

        if ($cek > 0) {
            $kode = $q->fetch_assoc();
            $nilai = substr($kode[0], 7);
            $id = (int) $nilai;

            //tambahkan sebanyak + 1
            $id = $id + 1;
            $no_reg = $awalan . date('ymd') . str_pad($id, 3, "0",  STR_PAD_LEFT);
        } else {
            $no_reg = $awalan . date('ymd') . "001";
        }

        $no_nib                 = $_POST['no_nib'];
        $nik                    = $_POST['nik'];
        $nama_perusahaan        = $_POST['nama_perusahaan'];
        $no_akte                = $_POST['no_akte'];
        $tanggal_akte           = $_POST['tanggal_akte'];
        $no_npwp_perusahaan     = $_POST['no_npwp_perusahaan'];
        $nama_npwp_perusahaan   = $_POST['nama_npwp_perusahaan'];
        $alamat_npwp_perusahaan = $_POST['alamat_npwp_perusahaan'];
        $no_surat_bpn           = $_POST['no_surat_bpn'];
        $tanggal_bpn            = $_POST['tanggal_bpn'];
        $nama_pembangunan_bpn   = 'Pemukiman';
        $nama_lokasi_bpn        = $_POST['alamat_npwp_perusahaan'];
        $luas_lahan_bpn         = $_POST['luas_lahan_bpn'];
        $no_alih_fungsi         = $_POST['no_alih_fungsi'];
        $tanggal_alih_fungsi    = $_POST['tanggal_alih_fungsi'];
        $perihal_alih_fungsi    = $_POST['perihal_alih_fungsi'];
        $no_izin_lokasi         = $_POST['no_izin_lokasi'];
        $tanggal_izin_lokasi    = $_POST['tanggal_izin_lokasi'];
        $jumlah_pembangunan     = $_POST['jumlah_pembangunan'];
        $jumlah_ruang_terbangun = $_POST['jumlah_ruang_terbangun'];
        $tanggal_daftar         = date('Y-m-d');
    }
}
