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
                document.location.href = 'menuMhs.php';
            </script>";

    }

    // memanggil fungsi
    require 'functions.php';

    //mengambil data di url
    $nim = $_GET["nim"];
    $mhs = query("SELECT * FROM mhs WHERE nim = '$nim'")[0];

    // ketika tombol submit ditekan
    if ( isset($_POST["submit"])) {
        if (ubahMhs($_POST) > 0) {
            echo "
                <script>
                    alert ('data berhasil ditambahkan');
                    document.location.href = 'menuMhs.php';
                </script>
            ";
        } else {
            echo "
                <script>
                    alert ('data gagal ditambahkan');
                    document.location.href = 'menuMhs.php';
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
        <title>Ubah MHS</title>
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
                <a class="nav-link active" aria-current="page" href="menuMhs.php">Menu Mahasiswa</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="menuKelas.php">Menu Kelas</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="menuDosen.php">Menu Dosen</a>
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
    <h2>Mengubah Mahasiswa</h2>
    <!-- form pengisian -->
    <form action = "" method = "post">
    <input type="hidden" name="nim" value="<?= $mhs["nim"]; ?>">


        <div class="row mb-3">
            <label for="nama" class="form-label">Nama Mahasiswa</label>
            <input type="text" class="form-control" id="NamaMhs" name = "namaMhs" required value="<?= $mhs["namaMhs"]; ?>">
        </div>

        <div class="row mb-3">
            <label for="Nama" class="col-sm-2 col-form-label">Jenis Kelamin</label>
            <div class="col-sm-10">
            <div class="form-check">
                <input class="form-check-input" type="radio" name="JenisKelamin" id="Laki-laki" value="Laki-laki" <?= ($mhs["JenisKelamin"] == 'Laki-laki') ? 'checked' : ''; ?>>
                <label class="form-check-label" for="JenisKelamin">
                Laki-Laki
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="JenisKelamin" id="Perempuan" value="Perempuan" <?= ($mhs["JenisKelamin"] == 'Perempuan') ? 'checked' : ''; ?>>
                <label class="form-check-label" for="JenisKelamin">
                Perempuan
                </label>
            </div>
            </div>
        </div>

        <div class="row mb-3">
            <label for="nim" class="form-label">Tanggal Lahir</label>
            <input type="date" class="form-control" id="tanggalLahir" name = "tanggalLahir" value="<?= $mhs["tanggal_lahirMhs"]; ?>">
            
        </div>

        <div class="row mb-3">
            <label for="nim" class="form-label">Alamat</label>
            <input type="text" class="form-control" id="alamat" name = "alamat" value="<?= $mhs["AlamatMhs"]; ?>">
            
        </div>

        <div class="row mb-3">
            <label for="nim" class="form-label">Semester</label>
            <input type="text" class="form-control" id="semester" name = "semester" value="<?= $mhs["semester"]; ?>">
            
        </div>


        <div class="row mb-3">
            <label for="kodekelas" class="col-sm-2 col-form-label">Pilih Kelas</label>
            <div class="col-sm-10">
                <select class="form-select" aria-label="Default select example" name="kodekelas" id="kodekelas" required>
                
                <?php 
                    $Search = mysqli_query($conn, "SELECT * FROM kelas");
                    while($DataKelas = mysqli_fetch_assoc($Search)) : 
                        if($DataKelas["kodeKelas"] == $mhs["kodeKelas"]) {
                            print '<option value="'.$mhs["kodeKelas"].'" class="text-primary" selected>'.$DataKelas["nama_kelas"].'</option>';
                        } else {
                            print '<option value="'.$DataKelas["kodeKelas"].'">'.$DataKelas["nama_kelas"].'</option>';
                        }
                ?>
                    
                <?php endwhile ?>
                </select>
            </div>
        </div>


        
        <button type="submit" name = "submit" class="btn btn-primary">Submit</button>
    </form>

    <!-- penutup -->

    </main>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    </body>
</html>
