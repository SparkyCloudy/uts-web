<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tambah Barang</title>
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
?>

<!--Kirim form menuju addAction.php-->
<form action="action/addAction.php" method="post">
    <table>
        <tr>
            <td>Detail</td>
            <td>Value</td>
        </tr>

        <tr>
            <td>
                <label for="kodeBarang">Kode Barang</label>
            </td>
            <td>
                <input id="kodeBarang" type="text" name="kode">
            </td>
        </tr>

        <tr>
            <td>
                <label for="namaBarang">Nama Barang</label>
            </td>
            <td>
                <input id="namaBarang" type="text" name="nama">
            </td>
        </tr>

        <tr>
            <td>
                <label for="jenisBarang">jenis</label>
            </td>
            <td>
                <select id="jenisBarang" name="jenis">
                    <option name="jenis[]" value="ElektronikDapur">Elektronik Dapur</option>
                    <option name="jenis[]" value="ElektronikSmartphone">Elektronik Smartphone</option>
                    <option name="jenis[]" value="A">A</option>
                </select>
            </td>
        </tr>

        <tr>
            <td>
                <label for="deskripsiBarang">Deskripsi Barang</label>
            </td>
            <td>
                <textarea id="deskripsiBarang" name="deskripsi"></textarea>
            </td>
        </tr>

        <tr>
            <td>
                <label for="hargaBarang">Harga</label>
            </td>
            <td>
                <input id="hargaBarang" name="harga" type="text">
            </td>
        </tr>

        <tr>
            <td>
                <label for="stockBarang">Stock</label>
            </td>
            <td>
                <input id="stockBarang" name="stok" type="text">
            </td>
        </tr>
    </table>

    <button type="submit">Tambah Barang</button>

</form>
</body>
</html>