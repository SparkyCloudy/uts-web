<?php
include "../dbConnect.php";

//Jalankan query penambahan baris baru menuju Database
addData();

//Kembali ke list Tabel
header("location:../tabelBarang.php");