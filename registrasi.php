<?php 
    require 'functions.php';

    if( isset($_POST["register"])) {
        if (registrasi($_POST) > 0 ) {
            echo "<script>
                alert('user telah ditambahkan');
            </script>";
        } else {
            echo mysqli_error($conn);
        }
    }


?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Halaman Registrasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  </head>
  <body>
    <h1>Halaman Registrasi</h1>
    
    <form action="" method="post">
        <ul>
            <li>
                <label for = "idUser">Username : </label>
                <input type= "text" name="idUser" id="idUser">
            </li>

            <li>
                <label for = "nama">Nama : </label>
                <input type= "text" name="nama" id="nama">
            </li>

            <li>
                <label for = "jabatan">Jabatan : </label>
                <input type= "text" name="jabatan" id="jabatan">
            </li>

            <li>
                <label for = "pass">password : </label>
                <input type= "password" name="pass" id="pass">
            </li>

            <li>
                <label for = "pass2">konfirmasi password : </label>
                <input type= "password" name="pass2" id="pass2">
            </li>

            <li>
                <button type="submit" name="register">Register</button>
            </li>




        </ul>

    </form>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  </body>
</html>
