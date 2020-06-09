<?php
class tinjauan
{
    public function tampil_keranjang()
    {
        $koneksi = new koneksi;
        $query = mysqli_query($koneksi->conn, "SELECT * FROM keranjang WHERE no_po NOT IN (SELECT no_po FROM po)");
        if (mysqli_num_rows($query) >  0) {
            while ($row = mysqli_fetch_array($query)) {
                $data[] = $row;
            }
            return $data;
        }
    }
    public function id_terakhir()
    {
        $koneksi = new koneksi;
        $query = mysqli_query($koneksi->conn, "SELECT max(id_keranjang) FROM keranjang");
        $row = mysqli_fetch_array($query);
        if ($row) {
            $nilai_kode = substr($row[0], 2);
            $no_po = (int) $nilai_kode;
            $no_po = $no_po + 1;
            $no_po_otomatis = "KE" . str_pad($no_po, 4, "0", STR_PAD_LEFT);
        } else {
            $no_po_otomatis = "KE0001";
        }
        return $no_po_otomatis;
    }

    public function simpan($no_po, $kode_customer, $kode_barang, $harga, $qty, $satuan, $tanggal)
    {
        $id_keranjang = $this->id_terakhir();
        $koneksi = new koneksi;
        $query = mysqli_query($koneksi->conn, "INSERT INTO keranjang VALUES ('$id_keranjang','$no_po', '$kode_customer','$kode_barang', '$harga','$qty','$satuan','$tanggal')");
        if (!$query) {
            echo "<div class='alert alert-danger'><span class='fa fa-check'></span> Data order gagal disimpan</div>";
        }
    }

    public function hapus_keranjang($id_keranjang)
    {
        $koneksi = new koneksi;
        $query = mysqli_query($koneksi->conn, "DELETE FROM keranjang WHERE id_keranjang = '$id_keranjang'");
        if ($query) {
            echo "<div class='alert alert-success'><span class='fa fa-check'></span> Data order berhasil dihapus</div>";
        }
    }

    public function detail_keranjang($no_po)
    {
        $koneksi = new koneksi;
        $query = mysqli_query($koneksi->conn, "SELECT
            p.no_po, c.kode_customer, b.kode_barang, p.tanggal, p.harga, p.qty, b.satuan
            FROM keranjang p JOIN barang b ON p.kode_barang=b.kode_barang 
            JOIN customer c ON p.kode_customer=c.kode_customer
            WHERE p.no_po = '$no_po'
            ");
        if (mysqli_num_rows($query) > 0) {
            $no = 1;
            $total = 0;
            while ($row = mysqli_fetch_array($query)) {
?>
                <tr>
                    <td><?php echo $no; ?></td>
                    <td><?php echo $row['no_po']; ?></td>
                    <td><?php echo $row['kode_barang']; ?></td>
                    <td><?php echo $row['tanggal']; ?></td>
                    <td><?php echo number_format($row['harga'], 0, ",", "."); ?></td>
                    <td><?php echo $row['qty']; ?></td>
                    <td><?php echo $row['satuan']; ?></td>
                    <th class="text-right"><?= "Rp. " . number_format((floatval($row['harga']) * floatval($row['qty'])), 0, ",", ".") ?></th>
                </tr>
            <?php
                $no++;
                $total = $total + (floatval($row['harga']) * floatval($row['qty']));
            } ?>
            <tr>
                <td colspan="6" style="text-align:right; padding-right: 50px;"><b>TOTAL</b></td>
                <td class="text-right"><b> Rp. <?php echo number_format($total, 0, ",", "."); ?>
                    </b></td>
            </tr>
<?php }
    }
}
