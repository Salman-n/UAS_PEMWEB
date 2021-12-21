<?php 
require_once("koneksi.php");
$user = getUser();
$alert = "";
$edit = true;
$level = 1;
$id = $user['id'];


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $fotoq = "";
    if(!empty($_FILES["foto"]["name"])) {
      //upload
      $target_dir = "foto/";
      $target_file = $target_dir . basename(md5($_FILES["foto"]["name"] . rand(69,420)) . ".". end(explode('.', $_FILES['foto']['name'])) );
      $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
      if (move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file)) {
       $fotoq =  "`foto` = '" . $target_file . "' ,";
      } else {
      die("Gagal upload file");
      }
    }
  
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $notelp = $_POST['notelp'];
  
    $passquery = "";
    if (!empty($_POST['password'])) {
      $passquery = "`password` = '" . $_POST['password'] . "' ,";
    }
      $sql = "UPDATE `user` SET `nama` = '$nama', $passquery `notelp` = '$notelp', $fotoq `email` = '$email'   WHERE `user`.`id` = $id;";
  

    if ($conn->query($sql) !== TRUE) {
     die("Gagal ubah profil : " . $conn->error . $sql);
    }

    header("Location: profil.php");
    die();
} else {
 
    $edit = true;
    $sql = "SELECT * FROM user WHERE `id` = " . $id;
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
        $id = $row['id'];
        $nama = $row['nama'];
        $email = $row['email'];
       $divisi = getDivisi($row["divisi_id"]);
        $notelp = $row['notelp'];
        $foto = $row['foto'];
        $level = $row['level'];

      }
    } else {
      die("User tidak valid");
    }
  



}



require_once("modular/header.php");
require_once("modular/navbar.php");
?>
<div class="container text-white ">
  <div class="rounded tbg m-2 p-2">


<h2>Profil</h2>
<hr>



<form  enctype="multipart/form-data"  method="POST">
  <div class="mb-3">
    <label  class="form-label">Email</label>
    <input type="email" class="form-control" value="<?= $email ?? '' ?>" name="email">
  </div>
  <div class="mb-3">
    <label  class="form-label">Nama</label>
    <input type="text" class="form-control" name="nama" value="<?= $nama ?? '' ?>">
  </div>
  <div class="mb-3">
    <label class="form-label">Password</label>
    <input type="password" class="form-control"   placeholder="<?php if ($edit) { echo 'Tidak Diubah'; }?>" name="password">
  </div>

  <?php if ($edit) { ?>
    <input type="hidden" name="id" value="<?= $_GET['id'] ?>">
    <?php } ?>

  <div class="mb-3">
    <label class="form-label">Divisi</label>
       <div class="form-control"><?= $divisi ?></div>
</div>
<div class="mb-3">
    <label  class="form-label">Nomor Telepon / HP</label>
    <input type="tel" class="form-control" name="notelp" value="<?= $notelp ?? '' ?>">
  </div>

  <div class="mb-3">
    <label  class="form-label">Foto</label>
    <?php if (!empty($foto)) { ?><br>
    <img style="width:100%;max-width:200px;max-height:100px" src="<?= $foto ?>">
      <?php } ?>
    <input type="file" class="form-control"  name="foto" id="foto">
  </div>
 
<div class="mb-3">
    <label class="form-label">Level</label>
    <div class="form-control"><?= $level == 1 ? "Karyawan" : "Admin" ?></div>
</div>
  <button type="submit" class="btn btn-success">Submit</button>
</form>





<hr>
</div>
</div>

<?php

require_once("modular/footer.php");
?>