<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
        <a class="navbar-brand" href="home.php"><img src="foto/logo9.png" alt="logo" width="120" height="45"></a>
             <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                
                <?php if ($user['level'] == "1") { ?>
                 
                <?php }  elseif ($user['level'] == "2" ){?>
                    <li class="nav-item">
                        <a class="nav-link" href="home.php"><i class="bi bi-file-text"></i> Absen</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="admin.php"><i class="bi bi-people-fill"></i> Karyawan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="divisi.php"><i class="bi bi-pie-chart-fill"></i> Divisi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="info.php"><i class="bi bi-graph-up"></i> Infografis</a>
                    </li>
                
                 
                <?php } ?>
                <li class="nav-item">
                        <a class="nav-link" href="profil.php"><i class="bi bi-person-circle"></i> Profil</a>
                    </li>
                <li class="nav-item">
                        <a class="nav-link" href="logout.php"><i class="bi bi-box-arrow-right"></i> Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>