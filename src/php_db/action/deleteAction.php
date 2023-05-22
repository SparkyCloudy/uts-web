<?php
include "../dbConnect.php";

//Jalankan query penghapusan baris dari Database
deleteData();

//Kembali ke list Tabel
header("location:../tabelBarang.php");