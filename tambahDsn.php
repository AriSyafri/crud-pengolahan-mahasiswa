<?php
    session_start();
    if( !isset($_SESSION["login"]) ) {
        header("Location: login.php");
        exit;
    }

    // <!-- session untuk pembatas masuk -->
    if ($_SESSION["Jabatan"] != "admin") {
        echo "<script>
                alert('Anda bukan Admin');
                document.location.href = 'menuDosen.php';
            </script>";

    }

    // memanggil fungsi
    require 'functions.php';

    // ketika tombol submit ditekan
    if ( isset($_POST["submit"])) {
        if (tambahdsn($_POST) > 0) {
            echo "
                <script>
                    alert ('data berhasil ditambahkan');
                    document.location.href = 'menuDosen.php';
                </script>
            ";
        } else {
            echo "
                <script>
                    alert ('data gagal ditambahkan');
                    document.location.href = 'menuDosen.php';
                </script>
            ";
        }
    }

?>





<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Tambah Dosen</title>
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


    <main class="container" style="max-width:640px;margin:auto;">
    <h2>Tambah Dosen</h2>
    <!-- form pengisian -->
    <form action = "" method = "post">
        <div class="row mb-3">
            <label for="id_dosen" class="form-label">Id Dosen</label>
            <input type="text" class="form-control" id="id_dosen" name = "id_dosen">
            
        </div>

        <div class="row mb-3">
            <label for="nama_dsn" class="form-label">Nama</label>
            <input type="text" class="form-control" id="nama_dsn" name = "nama_dsn">
            
        </div>


        <div class="row mb-3">
            <label for="nim" class="form-label">Tanggal Lahir</label>
            <input type="date" class="form-control" id="tanggalLahir" name = "tanggalLahir">
            
        </div>

        <div class="row mb-3">
            <label for="nim" class="form-label">Alamat</label>
            <input type="text" class="form-control" id="alamat" name = "alamat">
            
        </div>

        <button type="submit" name = "submit" class="btn btn-primary">Submit</button>
    </form>

    <!-- penutup -->

    </main>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    </body>
</html>
