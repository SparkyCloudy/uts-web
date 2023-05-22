<?php
include "../dbConnect.php";

/*Dikarenakan form sebelumnya menggunakan method $_POST
maka terima id menggunakan array $_POST*/
$id = $_POST['id'] ?? null;

/*Kirim $id menuju query, lalu lakukan query UPDATE
terhadap Database*/
updateData($id);

// Kembali ke list Tabel
header("location: ../tabelBarang.php");
