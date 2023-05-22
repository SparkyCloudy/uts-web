<?php
//Data sqli_connect()
$szUser = "root";
$szPass = "0934";
$szTable = "db_uts";
$szHost = "localhost";

//Terima username dan password dari form
$username = $_POST['username'] ?? null;
$password = $_POST['password'] ?? null;

//Meminta query ke database untuk mencocokan username dan password
$bConnectSql = mysqli_connect($szHost, $szUser, $szPass, $szTable);
$sqlQuery = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";

/* Function siap pakai untuk melakukan query pengecekan data login,
 * kembalian berupa hasil query Database
*/
function queryCheckLogin(): bool|mysqli_result {
    global $bConnectSql, $sqlQuery;
    return mysqli_query($bConnectSql, $sqlQuery);
}