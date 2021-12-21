<?php
require_once("koneksi.php");
$user = getAdmin();

$sql = "DELETE FROM `divisi` WHERE `divisi`.`id` = " . $_GET['id'];
if ($conn->query($sql) !== TRUE) {
    die("Masih ada karyawan yang berada di divisi ini. harap hapus semua karyawan yang menggunakan divisi ini sebelum menghapus fivisi");
   }

   header("Location: divisi.php");
   die();
?>