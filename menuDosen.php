<?php
    session_start();
    if( !isset($_SESSION["login"]) ) {
        header("Location: login.php");
        exit;
    }
    
    // memanggil fungsi
    require 'functions.php';

    $dosen = query("SELECT * FROM dosen
    ");

    // aksi tombol ditekan
    if( isset($_POST["cari"]) ) {
        $dosen = caridsn($_POST["keyword"]);
    }

?>





<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Menu Dosen</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

        <!-- bagian css -->
        
    <!-- Custom styles for this template -->
    <link href="assets/css/navbar.css" rel="stylesheet">
    </head>
    <body>
            
        <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Pengelolaan Mahasiswa</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav me-auto mb-2 mb-md-0">
                <li class="nav-item">
                <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="menuMhs.php">Menu Mahasiswa</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="menuKelas.php">Menu Kelas</a>
                </li>
                <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="menuDosen.php">Menu Dosen</a>
                </li>

            </ul>
            <form class="d-flex" action="" method="post">
                <input class="form-control me-2" type="text" name="keyword" placeholder="Cari">
                <button class="btn btn-outline-success" type="submit" name="cari">Cari</button>
            </form>
            </div>
        </div>
        </nav>


    <main class="container">

    <h2>Data Kelas</h2>
    <!-- button tambah data -->
    <a class="btn btn-outline-secondary"  href="tambahDsn.php" button type="button">Tambah Data</a>
    <!-- penutup -->
    <div class="table-responsive">
        <table class="table table-striped table-sm table-responsive">
        <thead>
            <tr>
                <th>NO</th>
                <th>Id Dosen</th>
                <th>Nama</th>
                <th>Tanggal Lahir</th>
                <th>Alamat</th>
                <th style="text-align: center;">Aksi</th>
            </tr>
        </thead>
        <tbody>
        <?php $i = 0; ?>
            <?php foreach($dosen as $row) : ?>
            <?php $i++; ?>
            <tr>
                <td><?= $i; ?></td>
                <td><?= $row["id_dosen"]?></td>
                <td><?= $row["nama_dsn"]?></td>
                <td><?= $row["TanggalLahir"]?></td>
                <td><?= $row["Alamat"]?></td>
                <td style="text-align: center;">
                    <a class="btn btn-secondary" href="ubahDsn.php?id_dosen=<?= $row["id_dosen"]; ?>">Ubah</a> 
                    <a class="btn btn-danger" href="hapusDsn.php?id_dosen=<?= $row["id_dosen"]; ?>"onclick="return confirm('yakin?');"> Hapus</a>

                </td>
            </tr>
        <?php endforeach; ?>

        </tbody>



        </table>
    
    </div>

    </main>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    </body>
</html>
