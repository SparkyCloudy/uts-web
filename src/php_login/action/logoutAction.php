<?php
//Mulai session terlebih dahulu
session_start();

//Lalu destroy untuk menghapus isi array $SESSION dan arahkan kembali ke loginApp.php
session_destroy();
header("location: ../loginApp.php");