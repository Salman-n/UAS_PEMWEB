<?php 
require_once("koneksi.php");
$user = getAdmin();
$alert = "";

$jmlPegawai =  $conn->query("SELECT `id` FROM user")->num_rows;
$hadir = $conn->query("SELECT * FROM `absen` WHERE  `tanggal` LIKE '" . date("Y-m"). "-%' AND `status` = 0")->num_rows;
$izin = $conn->query("SELECT * FROM `absen` WHERE  `tanggal` LIKE '" . date("Y-m"). "-%' AND `status` = 1")->num_rows;

$sql = "SELECT tanggal ,COUNT(*) AS total FROM absen WHERE `status` = 0 GROUP BY tanggal";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    $data[] = array(
      $row['tanggal'],
      floatval($row['total'])
  );
    
  }
} else {
  echo "Tidak ada karyawan yang terdaftar";
}
$json = json_encode($data);
require_once("modular/header.php");
require_once("modular/navbar.php");
?>
<div class="container text-white ">
  <div class="rounded tbg m-2 p-2">
<h3>Infografis</h3>
<hr>
<h4>Absensi</h4>
<div class="bg-white">
<div id="grafik"></div>
</div>
<script>
Highcharts.chart('grafik', {
    chart: {
        type: 'area',
        zoomType: 'xy'
    },
 
    title: {
        text: 'Absensi Karyawan'
    },
    subtitle: {
        text: ''
    },
   
    xAxis: {
        type: 'datetime', 
        accessibility: {
            rangeDescription: 'Waktu'
        }
    },
    tooltip: {
        pointFormat: '{point.y} Karyawan Hadir'
    },
    legend: {
        layout: 'vertical',
        align: 'right',
        verticalAlign: 'middle'
    },
    plotOptions: {
        series: {
            color:'#00ff00',
            fillColor: {
                linearGradient: [0, 0, 0, 300],
                stops: [
                    [0, Highcharts.getOptions().colors[7]],
                    [1, Highcharts.color(Highcharts.getOptions().colors[6]).setOpacity(0).get('rgba')]
                ]
            }
        }
    },
    series: [{
        name: '',
        lineWidth: 2,
        data: JSON.parse('<?= $json ?>')
        }],
    responsive: {
        rules: [{
        condition: {
        maxWidth: 500
        },
    chartOptions: {
        legend: {
        layout: 'horizontal',
        align: 'center',
        verticalAlign: 'bottom'
        }
    }
 }]
    }
 });
</script>
 <hr>
<p><b>Bulan Ini</b><br> Hadir : <b><?= $hadir ?></b> | Izin : <b><?= $izin ?></b></p>
<hr>
<h4>Divisi</h4>
<div class="table-responsive">
<table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">Divisi</th>
      <th scope="col">Jumlah</th>
    
    </tr>
  </thead>
  <tbody>
<?php 

$sql = "SELECT divisi_id,COUNT(*) AS total FROM user GROUP BY id ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
?>
  <tr>
  <td><?= getDivisi($row['divisi_id']) ?></td>
  <td><?= $row['total'] ?></td>
    </tr>
<?php 
  }
} else {
  echo "Tidak ada karyawan yang terdaftar";
}

?>
  </tbody>
</table>
</div>
<table></table>

Total Pegawai : <b><?= $jmlPegawai ?? 0 ?></b>
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