
<?php
require_once "koneksi.php";
class Pemohon
{
    public function simpan($data)
    {
        $koneksi = new koneksi();
        $nik = $_POST['nik'];
        $nama = $_POST['nama'];
        $tempat_lahir = $_POST['tempat_lahir'];
        $tanggal_lahir = $_POST['tanggal_lahir'];
        $jk = $_POST['jk'];
        $alamat = $_POST['alamat'];
        $agama = $_POST['agama'];
        $no_npwp = $_POST['no_npwp'];
        $katasandi = $_POST['katasandi'];
        $katasandi      = md5($katasandi);
        $tanggal_daftar = date('Y-m-d');

        //ambil data unggahan KTP
        $nama_berkas_ktp    = $_FILES['ktp']['name'];
        $tmp_ktp = explode('.', $nama_berkas_ktp);
        $file_ext_ktp = strtolower(end($tmp_ktp));
        $file_size_ktp        = $_FILES['ktp']['size'];
        $file_tmp_ktp        = $_FILES['ktp']['tmp_name'];

        // ambil data unggahan NPWP
        $nama_berkas_npwp   = $_FILES['npwp']['name'];
        $tmp_npwp = explode('.', $nama_berkas_npwp);
        $file_ext_npwp = strtolower(end($tmp_npwp));
        $file_size_npwp        = $_FILES['npwp']['size'];
        $file_tmp_npwp        = $_FILES['npwp']['tmp_name'];

        if ($file_size_ktp < 1044070 && $file_size_npwp < 1044070) {
            //atur nama berkas
            $nama_berkas_ktp    = "ktp_" . $nik . "." . $file_ext_ktp;
            $nama_berkas_npwp   = "npwp_" . $nik . "." . $file_ext_npwp;

            //pindahkan lokasi berkas
            $lokasi_berkas_ktp  = 'berkas/' . $nama_berkas_ktp;
            $lokasi_berkas_npwp = 'berkas/' . $nama_berkas_npwp;
            move_uploaded_file($file_tmp_ktp, $lokasi_berkas_ktp);
            move_uploaded_file($file_tmp_npwp, $lokasi_berkas_npwp);

            //Simpan data
            $query  = "INSERT INTO pemohon VALUES('$nik', '$nama', '$tempat_lahir', '$tanggal_lahir', '$jk', '$alamat', '$agama', '$no_npwp', '$nama_berkas_ktp', '$nama_berkas_npwp', '$katasandi', '$tanggal_daftar')";
            $hasil  = $koneksi->conn->query($query);
            $status = $koneksi->conn->affected_rows;
            if ($status > 0) {
                echo "<script>
                    alert('Registrasi Berhasil.');
                    window.location = 'index.php';
                </script>";
            } else {
                echo "<script>
                    alert('Registrasi Gagal.');
                    window.location = 'registrasi.php';
                </script>";
            }
        } else {
            echo "<script>
                    alert('Ukuran berkas maksimal 1Mb');
                    window.location = 'registrasi.php';
                </script>";
        }
    }
}
