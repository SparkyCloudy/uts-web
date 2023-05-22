<?php
//Data sqli_connect()
$szUser = "root";
$szPass = "0934";
$szTable = "db_uts";
$szHost = "localhost";

//Terima data yang dibutuhkan dari form atau string
// query yang dikirim melalui address bar
$id = $_GET['id'] ?? null;
$kode = $_POST['kode'] ?? null;
$nama = $_POST['nama'] ?? null;
$jenis = $_POST['jenis'] ?? null;
$deskripsi = $_POST['deskripsi'] ?? null;
$harga = $_POST['harga'] ?? null;
$stok = $_POST['stok'] ?? null;

//Meminta query ke database untuk mencocokan username dan password
$bConnectSql = mysqli_connect($szHost, $szUser, $szPass, $szTable);

//Deklarasi variabel berupa syntax query untuk Database
$dataEditQuery = "SELECT * FROM barang WHERE id='$id'";
$addQuery = "INSERT INTO barang VALUES(DEFAULT,'$kode','$nama','$jenis','$deskripsi','$harga','$stok')";
$deleteQuery = "DELETE FROM barang WHERE id='$id'";
$dataQuery = "SELECT * FROM barang";

/*Meminta hasil query dengan mengambil semua kolom
dari semua baris dalam tabel "barang" di mana nilai
di kolom ID sama dengan nilai variabel "$id"*/
function editData(): bool|mysqli_result {
    global $bConnectSql, $dataEditQuery;
    return mysqli_query($bConnectSql, $dataEditQuery);
}

/*Meminta hasil query dengan memperbarui nilai di
setiap kolom tabel "barang" dengan nilai yang diterima
dari variabel di kolom ID sama dengan nilai variabel "$id"*/
function updateData($idEdit): bool|mysqli_result {
    global $bConnectSql, $kode, $nama, $jenis, $deskripsi, $harga, $stok;
    return mysqli_query($bConnectSql, "UPDATE barang SET kode= '$kode', nama='$nama', jenis='$jenis', 
                      deskripsi='$deskripsi', harga='$harga', stok='$stok' WHERE id='$idEdit'");
}

/*Mengambil semua kolom dari semua baris dalam
tabel Barang*/
function queryData(): mysqli_result {
    global $bConnectSql, $dataQuery;
    return mysqli_query($bConnectSql, $dataQuery);
}

/*Sisipkan baris baru ke dalam tabel "barang" dengan
nilai yang ditentukan oleh variabel $kode, $nama, $jenis,
$deskripsi, $harga, dan $stok. Kolom pertama di baris
baru akan diatur ke nilai defaultnya*/
function addData(): bool|mysqli_result {
    global $bConnectSql, $addQuery;
    return mysqli_query($bConnectSql, $addQuery);
}

/*Menghapus baris dari tabel "barang" di kolom
ID sama dengan variabel "$id"*/
function deleteData(): bool|mysqli_result {
    global $bConnectSql, $deleteQuery;
    return mysqli_query($bConnectSql, $deleteQuery);
}
