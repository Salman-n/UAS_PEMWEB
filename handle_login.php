<?php 
require_once("koneksi.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM `user` WHERE email='$email' AND `password` = SHA1('$password')";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $_SESSION["user"] = $row['id'];
        header("Location: home.php");
     
        die("Invalid User Level");
    }
    
    }

    //login gagal
    header("Location: login.php?alert=Email atau Password Salah");
}
?>