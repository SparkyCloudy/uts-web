<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detail Barang</title>
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
$result = mysqli_fetch_array($query);
?>

<!--Hanya menampilkan value dari hasil query ke Database-->
<table>
    <tr>
        <td>Detail</td>
        <td>Value</td>
    </tr>

    <tr>
        <td>ID</td>
        <td><?php echo $result['id'] ?></td>
    </tr>

    <tr>
        <td>Kode</td>
        <td><?php echo $result['kode'] ?></td>
    </tr>

    <tr>
        <td>Nama</td>
        <td><?php echo $result['nama'] ?></td>
    </tr>

    <tr>
        <td>Jenis</td>
        <td><?php echo $result['jenis'] ?></td>
    </tr>

    <tr>
        <td>Deskripsi</td>
        <td><?php echo $result['deskripsi'] ?></td>
    </tr>

    <tr>
        <td>Harga</td>
        <td><?php echo $result['harga'] ?></td>
    </tr>

    <tr>
        <td>Stok</td>
        <td><?php echo $result['stok'] ?></td>
    </tr>
</table>
</body>
</html>