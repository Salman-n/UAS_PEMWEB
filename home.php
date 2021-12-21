<?php 
require_once("koneksi.php");
$user = getUser();
$foto = $user['foto'] ?? null;
$alert = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $statusq = "";
  if ($_POST['submit'] == "izin") {
    $statusq = "status = 1 ,";
  } else if ($_POST['submit'] == "tdkizin"){
    $statusq = "status = 0 ,";
  }
  $sql = "UPDATE `absen` SET  $statusq  `jurnal` = '" .  $_POST['jurnal']."' WHERE `user_id` = " . $user['id'] . " AND `tanggal` = '" . date("Y-m-d"). "'";
  
  if ($conn->query($sql) === TRUE) {
    $alert = "Jurnal berhasil diperbarui";
  } else {
    $alert = "Gagal Memperbarui Jurnal" . $conn->error;
  }
  
}

//handle 
$jurnal = "";
$tugas = "";
$status = 0;
$sql = "SELECT * FROM `absen` WHERE `tanggal` = '" . date("Y-m-d")  . "' AND user_id = " .$user['id'];
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    $status = $row['status'];
    $jurnal = $row['jurnal'];
    $tugas = $row['tugas'];
    $approve = $row['approve'];
 
  }
} else {
 //create
 $sql2 = "INSERT INTO `absen` (`id`, `user_id`, `tanggal`, `jurnal`, `tugas`) VALUES (NULL, '" . $user['id'] ."', '" . date("Y-m-d")."', null, null);";
 
 if ($conn->query($sql2) !== TRUE) {
   echo "Error: " . $sql2 . "<br>" . $conn->error;
 }

}


require_once("modular/header.php");
require_once("modular/navbar.php");
?>
<div class="container text-white ">
  <div class="rounded tbg m-2 p-2">
<?php if ($alert != "") { ?>
  <div class="alert alert-info" role="alert">
  <?= $alert ?>
</div>
<?php } ?>
<div class="text-white">
<h1>Selamat Datang <?= $user['nama'] ?> </h1>
<?php if (!empty($foto)) {
  echo "<img src='$foto' height='100px'>";
}

?>

<?php if ($status== 0 ) { ?>
  <p>Anda sudah absen hari ini <b><?= date("Y-m-d") ?></b></p>
<hr>
<p>
<?php if ($tugas == '') { ?>
<b>Anda belum mendapatkan tugas</b>
  <?php  } else { ?>
<b>Tugas Hari ini : </b> <?= $tugas ?>
  <?php } ?>
</p>
<hr>
<b>Jurnal Harian</b>
<?php } else {?>
  <p>Anda sudah <b>IZIN</b> hari ini <b><?= date("Y-m-d") ?></b></p>
  <b>Izin anda <?=$approve == 1 ? "sudah" : "belum" ?> di ACC</b>
<hr>
<p>
<b>Alasan Izin</b>
  <?php } ?>

<form method="POST">
<textarea rows="5" id="jurnal" class="w-100" name="jurnal"></textarea><br>
<button class="btn btn-success" name="submit" type="submit" value="update">Perbarui</button>
<hr>
<?php if ($status == 0 ) { ?>
<button class="btn btn-danger btn-lg" name="submit" value="izin">Izin</button>
<?php } else { ?>
<button class="btn btn-danger btn-lg" name="submit" value="tdkizin">Tidak jadi izin</button>

<?php } ?>
</form>
</div>
</div>
</div>
<script>
// A $( document ).ready() block.
$( document ).ready(function() {
});
</script>
<?php
require_once("modular/footer.php");
?>