<?php
class perusahaan
{
    public function tampil_customer()
    {
        $koneksi = new koneksi;
        $query = mysqli_query($koneksi->conn, "SELECT * FROM customer");
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
        $query = mysqli_query($koneksi->conn, "SELECT max(kode_customer) FROM customer");
        $row = mysqli_fetch_array($query);
        if ($row) {
            $nilai_kode = substr($row[0], 3);
            $kode_customer = (int) $nilai_kode;
            $kode_customer = $kode_customer + 1;
            $kode_customer_otomatis = "CST" . str_pad($kode_customer, 3, "0", STR_PAD_LEFT);
        } else {
            $kode_customer_otomatis = "CST001";
        }
        return $kode_customer_otomatis;
    }

    public function simpan_customer($kode_customer, $nama_customer, $no_tlp, $alamat)
    {
        $koneksi = new koneksi;
        $cek = mysqli_query($koneksi->conn, "SELECT * FROM customer WHERE kode_customer = '$kode_customer'");
        if (mysqli_num_rows($cek) == 0) {
            $query = mysqli_query($koneksi->conn, "INSERT INTO customer VALUES ('$kode_customer','$nama_customer','$no_tlp','$alamat')");
            if ($query) {
                echo "<div class='alert alert-success'><span class='fa fa-check'></span> Data customer berhasil disimpan</div>";
            }
        }
    }
    public function hapus_customer($kode_customer)
    {
        $koneksi = new koneksi;
        $query = mysqli_query($koneksi->conn, "DELETE FROM customer WHERE kode_customer = '$kode_customer'");
        if ($query) {
            echo "<div class='alert alert-success'><span class='fa fa-check'></span> Data customer dengan kode " . $kode_customer . " berhasil dihapus</div>";
        }
    }

    public function edit_customer($kode_customer, $nama_customer, $no_tlp, $alamat)
    {
        $koneksi = new koneksi;
        $query = mysqli_query($koneksi->conn, "UPDATE customer SET nama_customer = '$nama_customer', no_tlp ='$no_tlp', alamat='$alamat' WHERE kode_customer = '$kode_customer'");
        if ($query) {
            echo "<div class='alert alert-success'><span class='fa fa-check'></span> Data customer berhasil diperbarui</div>";
        }
    }

    public function detail_customer($kode_customer)
    {
        $koneksi = new koneksi;
        $query = mysqli_query($koneksi->conn, "SELECT * FROM customer WHERE kode_customer = '$kode_customer'");
        $row = mysqli_fetch_array($query);
        $this->nama_customer = $row['nama_customer'];
        $this->no_tlp = $row['no_tlp'];
        $this->alamat = $row['alamat'];
    }
}
