<?php
class pemohon
{
    public function tampil_barang()
    {
        $koneksi = new koneksi;
        $query = mysqli_query($koneksi->conn, "SELECT * FROM barang");
        if (mysqli_num_rows($query) > 0) {
            while ($row = mysqli_fetch_array($query)) {
                $data[] = $row;
            }
            return $data;
        }
    }

    public function kode_terakhir()
    {
        $koneksi = new koneksi;
        $query = mysqli_query($koneksi->conn, "SELECT max(kode_barang) FROM barang");
        $row = mysqli_fetch_array($query);
        if ($row) {
            $nilai_kode = substr($row[0], 3);
            $kode_barang = (int) $nilai_kode;
            $kode_barang = $kode_barang + 1;
            $kode_barang_otomatis = "BRG" . str_pad($kode_barang, 3, "0", STR_PAD_LEFT);
        } else {
            $kode_barang_otomatis = "BRG001";
        }
        return $kode_barang_otomatis;
    }

    public function simpan_barang($kode_barang, $part_no, $nama_barang, $harga, $satuan)
    {
        $koneksi = new koneksi;
        $cek = mysqli_query($koneksi->conn, "SELECT * FROM barang WHERE kode_barang = '$kode_barang'");
        if (mysqli_num_rows($cek) == 0) {
            $query = mysqli_query($koneksi->conn, "INSERT INTO barang VALUES ('$kode_barang','$part_no', '$nama_barang', '$harga', '$satuan')");
            if ($query) {
                echo "<div class='alert alert-success'><span class='fa fa-check'></span> Data barang berhasil disimpan</div>";
            }
        }
    }
    public function hapus_barang($kode_barang)
    {
        $koneksi = new koneksi;
        $query = mysqli_query($koneksi->conn, "DELETE FROM barang WHERE kode_barang = '$kode_barang'");
        if ($query) {
            echo "<div class='alert alert-success'><span class='fa fa-check'></span> Data barang dengan kode " . $kode_barang . " berhasil dihapus</div>";
        }
    }

    public function edit_barang($kode_barang, $part_no, $nama_barang, $harga, $satuan)
    {
        $koneksi = new koneksi;
        $query = mysqli_query($koneksi->conn, "UPDATE barang SET part_no = '$part_no', nama_barang ='$nama_barang', harga='$harga', satuan='$satuan' WHERE kode_barang = '$kode_barang'");
        if ($query) {
            echo "<div class='alert alert-success'><span class='fa fa-check'></span> Data barang berhasil diperbarui</div>";
        }
    }

    public function detail_barang($kode_barang)
    {
        $koneksi = new koneksi;
        $query = mysqli_query($koneksi->conn, "SELECT * FROM barang WHERE kode_barang = '$kode_barang'");
        $row = mysqli_fetch_array($query);
        $this->part_no = $row['part_no'];
        $this->nama_barang = $row['nama_barang'];
        $this->harga = $row['harga'];
        $this->satuan = $row['satuan'];
    }
}
