<?php
require_once("koneksi.php");
$user = getAdmin();

$sql = "DELETE FROM `user` WHERE `user`.`id` = " . $_GET['id'];
if ($conn->query($sql) !== TRUE) {
    die("Gagal hapus karyawan : " . $conn->error);
   }

   header("Location: admin.php");
   die();
?>