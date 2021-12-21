<?php 
session_start();
 unset($_SESSION["user"]); 
 header("Location: login.php?alert=Anda berhasil logout");
 die();
 ?>