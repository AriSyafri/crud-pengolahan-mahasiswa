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

    require 'functions.php';

    $dsn = $_GET["id_dosen"];

    if (hapusdsn($dsn) > 0 ) {
        echo "
            <script>
                alert('data berhasil dihapus');
                document.location.href= 'menuDosen.php';
    
            </script>
        ";
    } else {
        echo "
            <script>
                alert('data gagal dihapus, periksa apakah ada tabel berelasi');
                document.location.href= 'menuDosen.php';
            </script>
        ";
    }
?>