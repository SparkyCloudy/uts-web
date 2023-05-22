<?php
include "../loginConnect.php";
global $bConnectSql, $username;

//Lakukan check disetiap row Database apakah kita menemukan
//username dan password yang dimasukan
$check = mysqli_num_rows(queryCheckLogin());

//Minta data query row yang ditemukan dan ubah menjadi array
//untuk mencari role dari user
$result = mysqli_fetch_array(queryCheckLogin());

/**
 * Cek apakah row yang diterima ada atau tidak, jika tidak
 * menemukan row yang di maksud mysqli_num_rows() akan
 * mengembalikan nilai 0, sebalikanya >0
 */
if ($check > 0) {
    session_start();
    // Simpan Session username dan role
    $_SESSION['username'] = $username;
    $_SESSION['role'] = $result['role'];

    // Arahkan menuju loginApp.php bersamaan dengan string query message=success
    header("location: ../loginApp.php?message=success");
} else {
    // Sebaliknya, string query message=failed
    header("location: ../loginApp.php?message=failed");
}
