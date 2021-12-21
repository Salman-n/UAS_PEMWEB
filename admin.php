<?php 
require_once("koneksi.php");
$user = getAdmin();
$alert = "";


require_once("modular/header.php");
require_once("modular/navbar.php");
?>
<div class="container text-white ">
  <div class="rounded tbg m-2 p-2">

<h2>Manajemen Karyawan</h2>
<button class="btn btn-lg btn-success" onclick="add()">Tambah Karyawan</button>
<hr>
<div class="table-responsive">
<table class="table table-dark" id="tabel-admin">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Foto</th>
      <th scope="col">Nama</th>
      <th scope="col">Divisi</th>
      <th scope="col">Absensi</th>
      <th scope="col">Gaji</th>
      <th scope="col">Aksi</th> 
    </tr>
  </thead>
  <tbody>
<?php 

$sql = "SELECT * FROM `user`  ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
?>
  <tr>
      <th scope="row"><?= $row['id'] ?></th>
      <td><?= $row['nama'] ?><br><i>(<?= $row['level'] == "1" ? "Karyawan" : "Admin"  ?>)</i></td>
      <td><?= !empty($row['foto']) ? "<img src='" .  $row['foto']."' width='100px' >": ""?></td>
      <td><?= getDivisi( $row['divisi_id'] ) ?></td>
      <td><?= parseAbsen( $row['id'] ) ?></td>
      <td><?= calculateGaji( $row['id'],$row['divisi_id'] ) ?></td>
    
     
      <td>
      <button type="button" class="btn btn-warning" onclick="edit(<?= $row['id'] ?>)">Edit</button>
      <button type="button" class="btn btn-secondary" onclick="hapus(<?= $row['id'] ?>)">Hapus</button>
      <button type="button" class="btn btn-primary" onclick="tugas(<?= $row['id'] ?>)">Tugas</button>
      <button type="button" class="btn btn-success" onclick="acc(<?= $row['id'] ?>)">ACC IZIN</button>
      </td>
    </tr>
<?php 
  }
} else {
  echo "Tidak ada karyawan yang terdaftar";
}

?>
  </tbody>
</table>
<hr>
<button type="button" class="btn btn-success" onclick="generatePDF()">Print PDF</button>
</div>

</div>
</div>
<script>
// A $( document ).ready() block.
$( document ).ready(function() {

});

function add() {
    window.location.href = "add.php";
}
function edit(id) {
  window.location.href = "add.php?id=" + id;
}
function hapus(id){
  window.location.href = "hapus.php?id=" + id;
}
function tugas(id) {
  let text;
  let person = prompt("Silahkan Tulis Tugas yang ingin diberikan untuk hari ini : ");
  if (person == null || person == "") {
    
  } else {
    window.location.href = "tugas.php?type=1&id=" + id + "&tugas=" + encodeURI(person);
  }
}
function acc(id) {
  window.location.href = "tugas.php?type=2&id=" + id ;
}
function generatePDF() {
  window.location.href = "adminpdf.php";
}
</script>
<?php

require_once("modular/footer.php");
?>