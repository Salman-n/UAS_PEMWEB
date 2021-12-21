
<?php 
require_once("koneksi.php");
$user = getAdmin();
require_once('fpdf/fpdf.php');

class PDF extends FPDF
{
// Simple table
function BasicTable($header, $data)
{
    // Header
    // foreach($header as $col)
    $this->Cell(10,7,"No",1);
    $this->Cell(50,7,"Nama",1);
    $this->Cell(40,7,"Email",1);
    $this->Cell(40,7,"Nomor HP",1);
    $this->Cell(20,7,"Level",1);
    $this->Cell(30,7,"Divisi",1);
    
    $this->Ln();

    // $this->Ln();
    // // Data
  
    foreach($data as $row)
    {
        $colnum = 0;
        foreach($row as $col){
        if ($colnum == 0) {
            $cw = 10;
        } else if ($colnum == 1) {
            $cw = 50;
        }else if ($colnum == 4) {
                $cw = 40;
        } else if ($colnum == 3 OR $colnum == 5) {
            $colnum++;
            continue;
        } else if ($colnum==6) {
        $cw = 20;
        $col = ($col == 1 ? "Karyawan" : "Admin");    
        }else if ($colnum==7) {
            $cw = 30;
            $col =  getDivisi($col) ?? "Tidak tahu";
        } else {
            $cw = 40;
        
        }
        $this->Cell($cw,6,$col,1);
        $colnum++;
          
        }
        $this->Ln();
    }
}



}


$sql = "SELECT * FROM `user`  ";
$result = $conn->query($sql);
$data = [];
if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    $data[] = $row;
}
} else {
  die("Tidak ada karyawan yang terdaftar");
}
$header = "";
$pdf = new PDF('P','mm','A4');
$pdf->AddPage();
$pdf->SetFont('Helvetica','',11);
$pdf->BasicTable($header,$data);
$pdf->Output();
?>