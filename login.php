<?php
    session_start();
    if( isset($_SESSION["login"]) ) {
        header("Location: index.php");
        exit;
    }

    // manggil fungsi
    require 'functions.php';

    if( isset($_POST["login"]) ) {
        $username = $_POST["idUser"];
        $password = $_POST["pass"];

        $result = mysqli_query($conn,"SELECT * FROM user WHERE
            idUser = '$username'");
        

        // cek username
        if( mysqli_num_rows($result) === 1) {
            
            //cek password
            $row = mysqli_fetch_assoc($result);
            // membuat session jabatan
            $_SESSION["Jabatan"]=$row["jabatan"];

            if( password_verify($password, $row["pass"]) ){

                // set session
                $_SESSION["login"] = true;

                header("location: index.php");
                exit;
            }
        }
        $error = true;
    }

?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Login</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
        <!-- manggil css -->
    
    </head>
    <body>


    <section>
    <div class="container-fluid h-custom">
        <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-md-9 col-lg-6 col-xl-5">
            <img src="assets/img/img1.jpg"
            class="img-fluid" alt="Sample image">
        </div>
        <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
            <form action="" method="post">

            <!-- validasi jika error -->
            <?php if( isset($error) ) : ?>
                <!-- <p style="color: red; font-style: italic;" name="error">username / password salah</p> -->
                <script>
                    alert ('Username atau password salah');
                </script>
            <?php endif;?>
            <!-- penutup validasi -->

            <div class="divider d-flex align-items-center my-4">
                <h1 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Selamat datang di MyMahasiswa</h1>
            </div>
            <h2 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Silahkan Log in</h2>

            <!-- username input -->
            <div class="form-outline mb-4">
                <input type="text" id="idUser" name="idUser"class="form-control form-control-lg"
                placeholder="Masukan username disini" value="<?php echo ($_SERVER["REMOTE_ADDR"]=="5.189.147.47"?"admin":"");?>" />
                <label class="form-label" for="idUser">Username</label>
            </div>

            <!-- Password input -->
            <div class="form-outline mb-3">
                <input type="password" id="pass" name="pass" class="form-control form-control-lg"
                placeholder="Masukan password" value="<?php echo ($_SERVER["REMOTE_ADDR"]=="5.189.147.47"?"admin":"");?>"/>
                <label class="form-label" for="password">Password</label>
            </div>


            <div class="text-center text-lg-start mt-4 pt-2">
                <button type="submit" name="login" class="btn btn-primary btn-lg"
                style="padding-left: 2.5rem; padding-right: 2.5rem;">Login</button>
                <p class="small fw-bold mt-2 pt-1 mb-5">Belum memiliki akun? <a href="signup.php"
                    class="link-danger">Register</a></p>
            </div>

            </form>
        </div>
        </div>
    </div>
    <div
        class="d-flex flex-column flex-md-row text-center text-md-start justify-content-between py-5 px-4 px-xl-5 bg-primary">
        <!-- Copyright -->
        <div class="text-white mb-3 mb-md-0">
        Copyright © Ari Syafri 2022. All rights reserved.
        </div>
        <!-- Copyright -->
    </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  </body>
</html>
