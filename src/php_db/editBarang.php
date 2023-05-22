<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Barang</title>
</head>

<body>
<?php
include "dbConnect.php";

//Mulai session
session_start();

//Lakukan pengecekan apakah array $_SESSION['username'],
//telah menerima nilai data atau belum
if (!isset($_SESSION['username'])) {
    header("location: ../loginApp.php");
}

//Minta data query dari Database berdasarkan string query "?id="
$query = editData();

//Ubah data query row yang ditemukan menjadi array
//untuk mencari data disetiap field tabel dari id yang dituju
$fetchQuery = mysqli_fetch_array($query);
?>

<!--Karena kita tidak ingin menampilkan string query data yang dirubah,
    maka kita gunakan method "post", akibatnya kita tidak bisa memanggil
    function query dari dbConnect.php akibat perbedaan cara menerima data,
    karenanya kita kirim menuju action/updateEditAction.php untuk menerima
    string query "id" menggunakan $_POST sebelum akhirnya dikembalikan lagi
    melalui parameter function menuju dbConnect.php  untuk melakukan query
    UPDATE kembali ke Database-->
<form action="action/updateEditAction.php" method="post">
    <table>
        <tr>
            <td>Detail</td>
            <td>Value</td>
        </tr>

        <tr>
            <td><label for="idBarang" hidden>ID Barang</label></td>
            <td>
                <input id="idBarang" type="text" name="id" value="<?php echo $fetchQuery['id']; ?>" hidden>
            </td>
        </tr>

        <tr>
            <td>
                <label for="kodeBarang">Kode Barang</label>
            </td>
            <td>
                <input id="kodeBarang" type="text" name="kode" value="<?php echo $fetchQuery['kode']; ?>">
            </td>
        </tr>

        <tr>
            <td>
                <label for="namaBarang">Nama Barang</label>
            </td>
            <td>
                <input id="namaBarang" type="text" name="nama" value="<?php echo $fetchQuery['nama']; ?>">
            </td>
        </tr>

        <tr>
            <td>
                <label for="jenisBarang">jenis</label>
            </td>
            <td>
                <select id="jenisBarang" name="jenis">
                    <option value="<?php echo $fetchQuery['jenis']; ?>"><?php echo $fetchQuery['jenis']; ?> (Pilihan Saat ini)</option>
                    <option name="jenis[]" value="Elektronik Dapur">Elektronik Dapur</option>
                    <option name="jenis[]" value="Elektronik Smartphone">Elektronik Smartphone</option>
                    <option name="jenis[]" value="A">A</option>
                </select>
            </td>
        </tr>

        <tr>
            <td>
                <label for="deskripsiBarang">Deskripsi Barang</label>
            </td>
            <td>
                <textarea id="deskripsiBarang" name="deskripsi"><?php echo $fetchQuery['deskripsi']; ?></textarea>
            </td>
        </tr>

        <tr>
            <td>
                <label for="hargaBarang">Harga</label>
            </td>
            <td>
                <input id="hargaBarang" name="harga" type="text" value="<?php echo $fetchQuery['harga']; ?>">
            </td>
        </tr>

        <tr>
            <td>
                <label for="stockBarang">Stock</label>
            </td>
            <td>
                <input id="stockBarang" name="stok" type="text" value="<?php echo $fetchQuery['stok']; ?>">
            </td>
        </tr>
    </table>

    <button type="submit">Edit Barang</button>
</form>
</body>
</html>