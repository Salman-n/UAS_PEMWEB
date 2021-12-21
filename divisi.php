<?php 
require_once("koneksi.php");
$user = getAdmin();
$alert = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama'];
    $gaji = $_POST['gaji'];
    if (!empty($_POST['id'])) {
      $sql = "UPDATE `divisi` SET `nama` = '$nama', `gaji` = '$gaji' WHERE `divisi`.`id` = " . $_POST['id'];
    } else {
      $sql = "INSERT INTO `divisi` (`id`, `nama`, `gaji`) VALUES (NULL, '$nama', '$gaji');";
    }
    if ($conn->query($sql) !== TRUE) {
      $alert = "Gagal Membuat/Mengubah Divisi : " . $conn->error;
    }
    
  }

require_once("modular/header.php");
require_once("modular/navbar.php");
?>
<div class="container text-white ">
  <div class="rounded tbg m-2 p-2">
  <?php if ($alert != "") { ?>
  <div class="alert alert-danger" role="alert">
  <?= $alert ?>
</div>
<?php } ?>
<h2>Manajemen Divisi</h2>
<hr>

<form class="row row-cols-lg-auto g-3 align-items-center" method="POST" >
<div class="col-12">
    <div class="input-group">
      <div class="input-group-text">Nama Divisi</div>
      <input type="text" class="form-control" name="nama" placeholder="Programmer">
    </div>
  </div>
  <div class="col-12">
    <div class="input-group">
      <div class="input-group-text">Gaji</div>
      <input type="text" class="form-control" name="gaji" placeholder="10000">
      <span class="input-group-text">/bulan</span>
    </div>
  </div>



  <div class="col-12">
    <button type="submit" class="btn btn-success">Tambah</button>
  </div>
</form>

<hr>
<div class="table-responsive">
<table class="table table-dark" id="tabel-admin">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Nama</th>
      <th scope="col">Gaji</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>
<?php 

$sql = "SELECT * FROM `divisi`  ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
?>
  <tr>
      <th scope="row"><?= $row['id'] ?></th>
      <td><?= $row['nama'] ?></td>
      <td>Rp <?= number_format($row['gaji']) ?></td>
  
     
      <td>
      <button type="button" class="btn btn-secondary" onclick="hapus(<?= $row['id'] ?>)">Hapus</button>
      <button type="button" class="btn btn-primary" onclick="bukaModal(<?= $row['id'] ?>,'<?= $row['nama'] ?>',<?= $row['gaji'] ?>)">Edit</button>
    
    </td>
    </tr>
<?php 
  }
} else {
  echo "Tidak ada divisi yang tersedia";
}

?>
  </tbody>
</table>
</div>

</div>
</div>
<div class="modal fade" id="editModal"  tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Divisi</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="POST" >
      <div class="modal-body">

    <input type="hidden" name="id" id="modalid" value="0">
 
    <div class="input-group">
      <div class="input-group-text">Nama Divisi</div>
      <input type="text" id="modalnama" class="form-control" name="nama" placeholder="Programmer">
    </div>
  
    <div class="input-group">
      <div class="input-group-text">Gaji</div>
      <input type="text" class="form-control" id="modalgaji" name="gaji" placeholder="10000">
      <span class="input-group-text">/bulan</span>
    </div>
 

    </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
        <button type="submit" class="btn btn-primary">Simpan perubahan</button>

      </div>
      </form>
    </div>
  </div>
</div>

<script>
// A $( document ).ready() block.
var myModal = null;
$( document ).ready(function() {
   myModal = new bootstrap.Modal(document.getElementById('editModal'), {
  keyboard: false
})
});

function bukaModal(id,divisi,gaji){
myModal.show();
$("#modalid").val(id);
$("#modalgaji").val(gaji);
$("#modalnama").val(divisi);

}

function hapus(id){
  window.location.href = "hapusd.php?id=" + id;
}

</script>
<?php

require_once("modular/footer.php");
?>