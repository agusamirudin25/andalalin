<?php
class perusahaan
{
    public function tampil_perusahaan($nik = null)
    {
        $koneksi = new koneksi();
        if ($nik == null) {
            $query = $koneksi->conn->query("SELECT perusahaan.no_registrasi, perusahaan.nik, pemohon.nama, perusahaan.nama_perusahaan, perusahaan.tanggal_daftar, perusahaan.status
        FROM perusahaan JOIN pemohon ON perusahaan.nik = pemohon.nik");
        } elseif ($nik != null) {
            $query = $koneksi->conn->query("select perusahaan.*, tinjauan.keterangan as 'ket_tinjauan', rekomendasi.keterangan as 'ket_rekomendasi'
            FROM perusahaan JOIN pemohon ON perusahaan.nik = perusahaan.nik
            LEFT JOIN tinjauan ON perusahaan.no_registrasi = tinjauan.no_registrasi
            LEFT JOIN rekomendasi ON perusahaan.no_registrasi = rekomendasi.no_registrasi
            WHERE perusahaan.nik = '$nik' GROUP BY perusahaan.no_registrasi");
        }
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

    public function ubah($no_reg, $kode_terakhir, $data = null)
    {
        $koneksi = new koneksi();
        if ($data == null) {
            $tanggal = date('yy-m-d');
            $row_tinjauan = $koneksi->conn->query("SELECT nik, no_registrasi FROM perusahaan WHERE no_registrasi = '$no_reg'")->fetch_assoc();
            $nik = $row_tinjauan['nik'];
            $no_reg = $row_tinjauan['no_registrasi'];
            $query1 = $koneksi->conn->query("UPDATE perusahaan SET status = 1 WHERE no_registrasi = '$no_reg'");
            $query2 = $koneksi->conn->query("INSERT INTO tinjauan VALUES('$kode_terakhir', '$nik', '$no_reg', '', '0', '$tanggal')");
            return $koneksi->conn->affected_rows;
        } else if ($data != null) {
            $tipe_berkas            = array('pdf', 'jpg', 'jpeg', 'png');
            $no_reg                 = $data['no_reg'];
            $no_nib                 = $data['no_nib'];
            $nik                    = $data['nik'];
            $nama_perusahaan        = $data['nama_perusahaan'];
            $no_akte                = $data['no_akte'];
            $tanggal_akte           = $data['tanggal_akte'];
            $no_npwp_perusahaan     = $data['no_npwp_perusahaan'];
            $nama_npwp_perusahaan   = $data['nama_npwp_perusahaan'];
            $alamat_npwp_perusahaan = $data['alamat_npwp_perusahaan'];
            $no_surat_bpn           = '-';
            $tanggal_bpn            = $data['tanggal_bpn'];
            $nama_pembangunan_bpn   = 'Pemukiman';
            $nama_lokasi_bpn        = $data['alamat_npwp_perusahaan'];
            $luas_lahan_bpn         = $data['luas_lahan_bpn'];
            $no_alih_fungsi         = $data['no_alih_fungsi'];
            $tanggal_alih_fungsi    = $data['tanggal_alih_fungsi'];
            $perihal_alih_fungsi    = $data['perihal_alih_fungsi'];
            $no_izin_lokasi         = $data['no_izin_lokasi'];
            $tanggal_izin_lokasi    = $data['tanggal_izin_lokasi'];
            $jumlah_pembangunan     = $data['jumlah_pembangunan'];
            $jumlah_ruang_terbangun = $data['jumlah_ruang_terbangun'];
            $status                 = 0;

            //ambil data unggahan AKTE
            $nama_berkas_akte       = $_FILES['akte_perusahaan']['name'];
            $tmp_akte               = explode('.', $nama_berkas_akte);
            $file_ext_akte          = strtolower(end($tmp_akte));
            $file_size_akte         = $_FILES['akte_perusahaan']['size'];
            $file_tmp_akte          = $_FILES['akte_perusahaan']['tmp_name'];

            // ambil data unggahan NPWP perusahaan
            $nama_berkas_npwp       = $_FILES['npwp_perusahaan']['name'];
            $tmp_npwp               = explode('.', $nama_berkas_npwp);
            $file_ext_npwp          = strtolower(end($tmp_npwp));
            $file_size_npwp         = $_FILES['npwp_perusahaan']['size'];
            $file_tmp_npwp          = $_FILES['npwp_perusahaan']['tmp_name'];

            // ambil data unggahan SURAT BPN
            $nama_berkas_bpn        = $_FILES['surat_bpn']['name'];
            $tmp_bpn                = explode('.', $nama_berkas_bpn);
            $file_ext_bpn           = strtolower(end($tmp_bpn));
            $file_size_bpn          = $_FILES['surat_bpn']['size'];
            $file_tmp_bpn           = $_FILES['surat_bpn']['tmp_name'];

            // ambil data unggahan KRITERIA
            $nama_berkas_kriteria   = $_FILES['kriteria_pembangunan']['name'];
            $tmp_kriteria           = explode('.', $nama_berkas_kriteria);
            $file_ext_kriteria      = strtolower(end($tmp_kriteria));
            $file_size_kriteria     = $_FILES['kriteria_pembangunan']['size'];
            $file_tmp_kriteria      = $_FILES['kriteria_pembangunan']['tmp_name'];

            //pengecekan tipe berkas
            $cek_tipeberkas_akte        = in_array($file_ext_akte, $tipe_berkas);
            $cek_tipeberkas_npwp        = in_array($file_ext_npwp, $tipe_berkas);
            $cek_tipeberkas_bpn         = in_array($file_ext_bpn, $tipe_berkas);
            $cek_tipeberkas_kriteria    = in_array($file_ext_kriteria, $tipe_berkas);

            if ($cek_tipeberkas_akte && $cek_tipeberkas_npwp && $cek_tipeberkas_bpn && $cek_tipeberkas_kriteria) {
                //cek ukuran berkas 1044070 = 1Mb
                if ($file_size_akte < 3044070 && $file_size_npwp < 3044070 && $file_size_bpn < 3044070 && $file_size_kriteria < 3044070) {
                    //atur nama berkas
                    $nama_berkas_akte   = "akte_" . $no_reg . "." . $file_ext_akte;
                    $nama_berkas_npwp   = "npwp_" . $no_reg . "." . $file_ext_npwp;
                    $nama_berkas_bpn    = "bpn_" . $no_reg . "." . $file_ext_bpn;
                    $nama_berkas_kriteria   = "kriteria_" . $no_reg . "." . $file_ext_kriteria;

                    //pindahkan lokasi berkas
                    $lokasi_berkas_akte     = 'berkas/' . $nama_berkas_akte;
                    $lokasi_berkas_npwp     = 'berkas/' . $nama_berkas_npwp;
                    $lokasi_berkas_bpn      = 'berkas/' . $nama_berkas_bpn;
                    $lokasi_berkas_kriteria = 'berkas/' . $nama_berkas_kriteria;
                    move_uploaded_file($file_tmp_akte, $lokasi_berkas_akte);
                    move_uploaded_file($file_tmp_npwp, $lokasi_berkas_npwp);
                    move_uploaded_file($file_tmp_bpn, $lokasi_berkas_bpn);
                    move_uploaded_file($file_tmp_kriteria, $lokasi_berkas_kriteria);

                    //Simpan data
                    $query  = "UPDATE perusahaan SET no_nib = '$no_nib', nama_perusahaan = '$nama_perusahaan', no_akte = '$no_akte', tanggal_akte = '$tanggal_akte', akte_perusahaan = '$nama_berkas_akte', no_npwp_perusahaan = '$no_npwp_perusahaan', nama_npwp_perusahaan = '$nama_npwp_perusahaan', alamat_npwp_perusahaan = '$alamat_npwp_perusahaan', npwp_perusahaan = '$nama_berkas_npwp', no_surat_bpn = '$no_surat_bpn', tanggal_bpn = '$tanggal_bpn', nama_pembangunan_bpn = '$nama_pembangunan_bpn', nama_lokasi_bpn = '$nama_lokasi_bpn', luas_lahan_bpn = '$luas_lahan_bpn', surat_bpn = '$nama_berkas_bpn', no_alih_fungsi = '$no_alih_fungsi', tanggal_alih_fungsi = '$tanggal_alih_fungsi', perihal_alih_fungsi = '$perihal_alih_fungsi', no_izin_lokasi = '$no_izin_lokasi', tanggal_izin_lokasi = '$tanggal_izin_lokasi', kriteria_pembangunan = '$nama_berkas_kriteria', jumlah_pembangunan = '$jumlah_pembangunan', jumlah_ruang_terbangun = '$jumlah_ruang_terbangun' WHERE no_registrasi = '$no_reg'";
                    $hasil  = $koneksi->conn->query($query);
                    if ($hasil) {
                        echo "<script>
                        alert('Berhasil.');
                        window.location = '?p=kelola_permohonan';
                    </script>";
                    } else {
                        echo "<script>
                        alert('Gagal.');
                        window.location = '?p=permohonan';
                    </script>";
                    }
                } else {
                    echo "<script>
                        alert('Ukuran berkas maksimal 2Mb');
                        window.location = '?p=permohonan';
                    </script>";
                }
            } else {
                echo "<script>
                    alert('Berkas Harus pdf atau image');
                    window.location = '?p=permohonan';
                </script>";
            }
        }
    }

    public function detail_perusahaan($no_reg, $mode = null)
    {
        $koneksi = new koneksi();
        if ($mode == null) {
            $query = $koneksi->conn->query("SELECT perusahaan.*, pemohon.nama, pemohon.ktp, pemohon.npwp FROM perusahaan JOIN pemohon ON perusahaan.nik = pemohon.nik WHERE perusahaan.no_registrasi = '$no_reg'");
        } else if ($mode != null) {
            $query = $koneksi->conn->query("select perusahaan.*, tinjauan.keterangan as 'ket_tinjauan', rekomendasi.keterangan as 'ket_rekomendasi'
            FROM perusahaan JOIN pemohon ON perusahaan.nik = perusahaan.nik
            LEFT JOIN tinjauan ON perusahaan.no_registrasi = tinjauan.no_registrasi
            LEFT JOIN rekomendasi ON perusahaan.no_registrasi = rekomendasi.no_registrasi
            WHERE perusahaan.no_registrasi = '$no_reg'");
        }
        $row = $query->fetch_assoc();
        return $row;
    }

    public function tambah_perusahaan($data)
    {
        $koneksi = new koneksi();
        //auto increment no_registrasi
        $awalan = "R";
        $q = $koneksi->conn->query("SELECT max(no_registrasi) as kode FROM perusahaan");
        $cek = $q->num_rows;

        if ($cek > 0) {
            $kode = $q->fetch_assoc();
            $nilai = substr($kode['kode'], 7);
            $id = (int) $nilai;

            //tambahkan sebanyak + 1
            $id = $id + 1;
            $no_reg = $awalan . date('ymd') . str_pad($id, 3, "0",  STR_PAD_LEFT);
        } else {
            $no_reg = $awalan . date('ymd') . "001";
        }
        $tipe_berkas            = array('pdf', 'jpg', 'jpeg', 'png');
        $no_nib                 = $data['no_nib'];
        $nik                    = $data['nik'];
        $nama_perusahaan        = $data['nama_perusahaan'];
        $no_akte                = $data['no_akte'];
        $tanggal_akte           = $data['tanggal_akte'];
        $no_npwp_perusahaan     = $data['no_npwp_perusahaan'];
        $nama_npwp_perusahaan   = $data['nama_npwp_perusahaan'];
        $alamat_npwp_perusahaan = $data['alamat_npwp_perusahaan'];
        $no_surat_bpn           = '-';
        $tanggal_bpn            = $data['tanggal_bpn'];
        $nama_pembangunan_bpn   = 'Pemukiman';
        $nama_lokasi_bpn        = $data['alamat_npwp_perusahaan'];
        $luas_lahan_bpn         = $data['luas_lahan_bpn'];
        $no_alih_fungsi         = $data['no_alih_fungsi'];
        $tanggal_alih_fungsi    = $data['tanggal_alih_fungsi'];
        $perihal_alih_fungsi    = $data['perihal_alih_fungsi'];
        $no_izin_lokasi         = $data['no_izin_lokasi'];
        $tanggal_izin_lokasi    = $data['tanggal_izin_lokasi'];
        $jumlah_pembangunan     = $data['jumlah_pembangunan'];
        $jumlah_ruang_terbangun = $data['jumlah_ruang_terbangun'];
        $status                 = 0;
        $tanggal_daftar         = date('Y-m-d h:M:s');

        //ambil data unggahan AKTE
        $nama_berkas_akte       = $_FILES['akte_perusahaan']['name'];
        $tmp_akte               = explode('.', $nama_berkas_akte);
        $file_ext_akte          = strtolower(end($tmp_akte));
        $file_size_akte         = $_FILES['akte_perusahaan']['size'];
        $file_tmp_akte          = $_FILES['akte_perusahaan']['tmp_name'];

        // ambil data unggahan NPWP perusahaan
        $nama_berkas_npwp       = $_FILES['npwp_perusahaan']['name'];
        $tmp_npwp               = explode('.', $nama_berkas_npwp);
        $file_ext_npwp          = strtolower(end($tmp_npwp));
        $file_size_npwp         = $_FILES['npwp_perusahaan']['size'];
        $file_tmp_npwp          = $_FILES['npwp_perusahaan']['tmp_name'];

        // ambil data unggahan SURAT BPN
        $nama_berkas_bpn        = $_FILES['surat_bpn']['name'];
        $tmp_bpn                = explode('.', $nama_berkas_bpn);
        $file_ext_bpn           = strtolower(end($tmp_bpn));
        $file_size_bpn          = $_FILES['surat_bpn']['size'];
        $file_tmp_bpn           = $_FILES['surat_bpn']['tmp_name'];

        // ambil data unggahan KRITERIA
        $nama_berkas_kriteria   = $_FILES['kriteria_pembangunan']['name'];
        $tmp_kriteria           = explode('.', $nama_berkas_kriteria);
        $file_ext_kriteria      = strtolower(end($tmp_kriteria));
        $file_size_kriteria     = $_FILES['kriteria_pembangunan']['size'];
        $file_tmp_kriteria      = $_FILES['kriteria_pembangunan']['tmp_name'];

        //pengecekan tipe berkas
        $cek_tipeberkas_akte        = in_array($file_ext_akte, $tipe_berkas);
        $cek_tipeberkas_npwp        = in_array($file_ext_npwp, $tipe_berkas);
        $cek_tipeberkas_bpn         = in_array($file_ext_bpn, $tipe_berkas);
        $cek_tipeberkas_kriteria    = in_array($file_ext_kriteria, $tipe_berkas);

        if ($cek_tipeberkas_akte && $cek_tipeberkas_npwp && $cek_tipeberkas_bpn && $cek_tipeberkas_kriteria) {
            //cek ukuran berkas 1044070 = 1Mb
            if ($file_size_akte < 3044070 && $file_size_npwp < 3044070 && $file_size_bpn < 3044070 && $file_size_kriteria < 3044070) {
                //atur nama berkas
                $nama_berkas_akte   = "akte_" . $no_reg . "." . $file_ext_akte;
                $nama_berkas_npwp   = "npwp_" . $no_reg . "." . $file_ext_npwp;
                $nama_berkas_bpn    = "bpn_" . $no_reg . "." . $file_ext_bpn;
                $nama_berkas_kriteria   = "kriteria_" . $no_reg . "." . $file_ext_kriteria;

                //pindahkan lokasi berkas
                $lokasi_berkas_akte     = 'berkas/' . $nama_berkas_akte;
                $lokasi_berkas_npwp     = 'berkas/' . $nama_berkas_npwp;
                $lokasi_berkas_bpn      = 'berkas/' . $nama_berkas_bpn;
                $lokasi_berkas_kriteria = 'berkas/' . $nama_berkas_kriteria;
                move_uploaded_file($file_tmp_akte, $lokasi_berkas_akte);
                move_uploaded_file($file_tmp_npwp, $lokasi_berkas_npwp);
                move_uploaded_file($file_tmp_bpn, $lokasi_berkas_bpn);
                move_uploaded_file($file_tmp_kriteria, $lokasi_berkas_kriteria);

                //Simpan data
                $query  = "INSERT INTO perusahaan VALUES('$no_reg', '$no_nib', '$nik', '$nama_perusahaan', '$no_akte', '$tanggal_akte', '$nama_berkas_akte', '$no_npwp_perusahaan', '$nama_npwp_perusahaan', '$alamat_npwp_perusahaan', '$nama_berkas_npwp', '$no_surat_bpn', '$tanggal_bpn', '$nama_pembangunan_bpn', '$nama_lokasi_bpn', '$luas_lahan_bpn', '$nama_berkas_bpn', '$no_alih_fungsi', '$tanggal_alih_fungsi', '$perihal_alih_fungsi', '$no_izin_lokasi', '$tanggal_izin_lokasi', '$nama_berkas_kriteria', '$jumlah_pembangunan', '$jumlah_ruang_terbangun', '$status', '$tanggal_daftar')";
                $hasil  = $koneksi->conn->query($query);
                if ($hasil) {
                    echo "<script>
                        alert('Berhasil.');
                        window.location = '?p=kelola_permohonan';
                    </script>";
                } else {
                    echo "<script>
                        alert('Gagal.');
                        window.location = '?p=permohonan';
                    </script>";
                }
            } else {
                echo "<script>
                        alert('Ukuran berkas maksimal 2Mb');
                        window.location = '?p=permohonan';
                    </script>";
            }
        } else {
            echo "<script>
                    alert('Berkas Harus pdf atau image');
                    window.location = '?p=permohonan';
                </script>";
        }
    }
}
