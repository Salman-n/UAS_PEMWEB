<?php
require_once("koneksi.php");
$user = getAdmin();
if ($_GET['type'] == "1") {
$sql = "UPDATE `absen` SET `tugas` = '" . $_GET['tugas'] . "' WHERE `user_id` = " . $_GET['id'] . " AND `tanggal` = '" . date("Y-m-d"). "'";
if ($conn->query($sql) !== TRUE) {
    die("Gagal memberi tugas");
   }

} else if ($_GET['type'] == "2") {
    $sql = "UPDATE `absen` SET `approve` = 1  WHERE `user_id` = " . $_GET['id'] . " AND `tanggal` = '" . date("Y-m-d"). "'";
    if ($conn->query($sql) !== TRUE) {
        die("Gagal acc izin");
       }
    
}

header("Location: admin.php");
die();
?>