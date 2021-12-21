<?php 
session_start();
function getUser($admin =false) {
    global $conn;
    $userdata = null;

    if (isset($_SESSION["user"]) ) {
        $userid = $_SESSION["user"];
        $sql = "SELECT * FROM `user` WHERE `id` = '$userid'";
        $result = $conn->query($sql);
    
        if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
           $userdata = $row;
        }
        
        }
    
        if ($userdata != null) {
            if (!$admin) {
                return $userdata;
            }
            if ($userdata['level'] == 2) {
                return $userdata;
                
            }
        }
    }

    unset($_SESSION["user"]); 
    header("Location: login.php?alert=Silahkan Login untuk melanjutkan");
    die();
}
function getAdmin() {
    return getUser(true);
}

function getDivisi($divisi) {
    global $conn;
    $sql = "SELECT * FROM divisi WHERE `id` = $divisi";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    return $row['nama'];
    }
} else {
return "Tidak Diketahui";
}

}

function parseAbsen($uid) {
    global $conn;
  
    $hadir = $conn->query("SELECT * FROM `absen` WHERE `user_id` = $uid AND `tanggal` LIKE '" . date("Y-m"). "-%' AND `status` = 0")->num_rows;
    $izin = $conn->query("SELECT * FROM `absen` WHERE `user_id` = $uid AND `tanggal` LIKE '" . date("Y-m"). "-%' AND `status` = 1")->num_rows;
    return "Hadir : $hadir<br>Izin : $izin";
}

function calculateGaji($uid,$divisi) {
    global $conn;
    $sql = "SELECT * FROM divisi WHERE `id` = $divisi";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
       $gaji = $row['gaji'];
        }
    } else {
    return "Tidak Diketahui";
    }

    $izin = $conn->query("SELECT * FROM `absen` WHERE `user_id` = $uid AND `tanggal` LIKE '" . date("Y-m"). "-%' AND `status` != 0")->num_rows;
    if ($izin >= 3) {
        $gaji = $gaji * 0.91;
    } else if ($izin >= 2) {
        $gaji = $gaji *0.95;
    }

    return "Rp " . number_format((float) $gaji );
    //hadir  * hari
}


?>