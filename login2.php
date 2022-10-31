<?php

require 'functions.php';

if (isset($_POST["login"])) {

    $username = $_POST["nama"];
    $password = $_POST["pass"];

    $result = mysqli_query($conn, "SELECT * FROM user WHERE idUser = '$username'");
    // cek username
    if(mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        if(password_verify($password, $row["pass"])) {
            exit(header("Location: index.php"));
        } else {
            $error = true;
            $errorMessage = 'password salah';
        }
    } else {
        $error = true;
        $errorMessage = 'id user tidak ditemukan';
    }

}
?>


<!DOCTYPE html>
<html>
    <head>
        <title>Halaman Login</title>
    </head>
    <body>
        <h1>Halaman Login</h1>

        <?php if( isset($error) ) : ?>
            <p style="color: red; font-style: italic; "><?= $errorMessage ?></p>
        <?php endif; ?>

        <form action="" method="post">
            <ul>
                <li>
                    <label for="username">Username : </label>
                    <input type="text" name="nama" id="nama">
                </li>
                <li>
                <label for="password">Password : </label>
                    <input type="password" name="pass" id="pass">
                </li>
                <li>
                    <button type="submit" name="login">Login</button>
                </li>
            </ul>
        </form>



    </body>
</html>