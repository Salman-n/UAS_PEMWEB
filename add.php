<?php 
require_once("koneksi.php");
$user = getAdmin();
$alert = "";
$edit = false;
$level = 1;



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
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $level = $_POST['level'];
    $notelp = $_POST['notelp'];
    $divisi_id = $_POST['divisi_id'];
    $passquery = "";
    if (!empty($_POST['password'])) {
      $passquery = "`password` = '" . $_POST['password'] . "' ,";
    }
    if (isset($id)) {
      $sql = "UPDATE `user` SET `nama` = '$nama', `notelp` = '$notelp', $fotoq `email` = '$email', `level` = '$level', $passquery `divisi_id` = '$divisi_id' WHERE `user`.`id` = $id;";
    } else {
    $sql = "INSERT INTO `user` (`id`, `nama`, `email`, `password`, `level`, `divisi_id`) VALUES (NULL, '$nama', '$email', SHA1('$password'), '$level', '$divisi_id');";
    }

    if ($conn->query($sql) !== TRUE) {
     die("Gagal menambah karyawan : " . $conn->error);
    }

    header("Location: admin.php");
    die();
} else {
  if (isset($_GET['id'])) {
    $edit = true;
    $sql = "SELECT * FROM user WHERE `id` = " . $_GET['id'];
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
        $id = $row['id'];
        $nama = $row['nama'];
        $email = $row['email'];
        $level = $row['level'];
        $notelp = $row['notelp'];
        $foto = $row['foto'];

        $divisi_id = $row['divisi_id'];
      }
    } else {
      die("User tidak valid");
    }
  }



}



require_once("modular/header.php");
require_once("modular/navbar.php");
?>
<div class="container text-white ">
  <div class="rounded tbg m-2 p-2">


<h2><?= $edit ? "Edit Karyawan " : "Tambah Karyawan" ?></h2>
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
        <select class="form-select" name="divisi_id" aria-label="Default select example">
     
    
        <?php 

$sql = "SELECT * FROM divisi";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    $selected = "";
    if ($row['id'] == $divisi_id) {
      $selected = "selected";
    }
?>
   <option  <?= $selected ?> value="<?= $row['id'] ?>" ><?= $row['nama'] ?> (Rp <?= number_format($row['gaji']) ?> / bln)</option>
<?php 
  }
} else {
  echo "Tidak ada karyawan yang terdaftar";
}

?>
    
</select>
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
        <select class="form-select" name="level" aria-label="Default select example">
       <option <?= $level == 1 ? "selected" : "" ?> value="1">Karyawan</option>
        <option <?= $level == 2 ? "selected" : "" ?> value="2">Admin</option>
</select>
</div>
  <button type="submit" class="btn btn-success">Submit</button>
</form>





<hr>
</div>
</div>

<?php

require_once("modular/footer.php");
?>