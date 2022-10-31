<?php
    session_start();
    if( !isset($_SESSION["login"]) ) {
        header("Location: login.php");
        exit;
    }

    // memanggil fungsi
    require 'functions.php';

    $mhs = query("SELECT * FROM mhs 
    left join kelas
    on mhs.kodeKelas = kelas.kodeKelas
    left JOIN dosen
    on kelas.id_dosen = dosen.id_dosen;
    ");


    // aksi tombol ditekan
    if( isset($_POST["cari"]) ) {
        $mhs = cari($_POST["keyword"]);
    }

?>





<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Bootstrap demo</title>
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
                <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="menuMhs.php">Menu Mahasiswa</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="menuKelas.php">Menu Kelas</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="menuDosen.php">Menu Dosen</a>
                </li>
            </ul>
            <form class="d-flex" action="" method="post">
                <a button class="btn btn-outline-danger" type="submit" name="cari" href="logout.php">LogOut</a>
            </form>
            </div>
            
        </div>
        </nav>


    <main class="container">
    <div class="bg-light p-5 rounded">
        <h1>Selamat Satang di Pengolahan Mahasiswa</h1>
        <p class="lead">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quasi, praesentium laudantium deserunt voluptas reprehenderit perferendis magnam repellendus voluptate hic iusto? In, commodi? Voluptatibus in quo eligendi quam, asperiores repudiandae molestiae et nostrum, eum non ipsa rem delectus unde temporibus consequuntur nesciunt amet repellat totam! Voluptatem autem hic nobis esse vitae itaque atque non ducimus? Alias, odit numquam?</p>
    </div>




    </main>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    </body>
</html>
