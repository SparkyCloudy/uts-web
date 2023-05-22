<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tabel Barang</title>
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

<div>
    <a href="../php_login/action/logoutAction.php">Logout</a>
<!--    menggunakan session untuk mengecek apakah role user Admin atau Staff -->
    <?php
    if ($_SESSION['role'] == "admin") {
    ?>
        <b>|</b>
<!--        Tambahkan Barang-->
        <a href="tambahBarang.php">Tambah barang</a>
    <?php
    }
    ?>
</div>
<h2>Data Barang</h2>

<div>
    <table>
        <tr>
            <td>ID</td>
            <td>Kode</td>
            <td>Nama</td>
            <td>Action</td>
        </tr>

        <?php
//         Minta query dari database berupa array untuk ditampilkan sebanyak row yang ditemukan
        global $bConnectSql;
        $queryData = queryData();
        while ($result = mysqli_fetch_array($queryData)) {
            ?>
            <tr>
                <td> <?php echo $result["id"];?> </td>
                <td> <?php echo $result["kode"];?> </td>
                <td> <?php echo $result["nama"];?> </td>
                <td>
<!--                    Check apakah session saat ini merupakan role Admin atau Staff-->
                    <?php
                    if ($_SESSION['role'] === "admin") {
                    ?>
<!--                        Edit Barang-->
                        <a href="editBarang.php?id=<?php echo $result["id"];?>">Edit</a>
                        <a>|</a>
<!--                        Delete Barang-->
                        <a href="action/deleteAction.php?id=<?php echo $result["id"];?>">Delete</a>
                        <a>|</a>
                    <?php
                    }
                    ?>
<!--                    Detail Barang (Default disetiap $_SESSION['role'])-->
                    <a href="detailBarang.php?id=<?php echo $result["id"];?>">Details</a>
                </td>
            </tr>
            <?php
        }
        ?>
    </table>
</div>
</body>
</html>