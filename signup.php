<?php 
    require 'functions.php';

    if( isset($_POST["register"])) {
        if (registrasi($_POST) > 0 ) {
            echo "<script>
                alert('user telah ditambahkan');
                document.location.href = 'login.php';
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
    <!-- bagian form -->
    <section style="background-color: #eee;">
    <div class="container h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-lg-12 col-xl-11">
            <div class="card text-black" style="border-radius: 25px;">
            <div class="card-body p-md-5">
                <div class="row justify-content-center">
                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                    <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Sign up</p>

                    <form action = "" method = "post" class="mx-1 mx-md-4">

                    <div class="d-flex flex-row align-items-center mb-4">
                        <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                        <div class="form-outline flex-fill mb-0">
                        <input type="text" id="idUser" name="idUser" class="form-control" />
                        <label class="form-label">Username</label>
                        </div>
                    </div>

                    <div class="d-flex flex-row align-items-center mb-4">
                        <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                        <div class="form-outline flex-fill mb-0">
                        <input type="text" id="nama" name="nama" class="form-control" />
                        <label class="form-label">Nama</label>
                        </div>
                    </div>

                    <div class="d-flex flex-row align-items-center mb-4">
                        <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                        <div class="form-outline flex-fill mb-0">
                        <select class="form-select" name="jabatan" id="jabatan" aria-label="Default select example">
                            <option selected>Silahkan memilih</option>
                            <option value="admin">Admin</option>
                            <option value="tamu">Tamu</option>
                        </select>
                        <label class="form-label">Pilih Jabatan</label>
                        </div>
                    </div>

                    <div class="d-flex flex-row align-items-center mb-4">
                        <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                        <div class="form-outline flex-fill mb-0">
                        <input type="password" id="pass" name="pass" class="form-control" />
                        <label class="form-label" for="pass">Password</label>
                        </div>
                    </div>

                    <div class="d-flex flex-row align-items-center mb-4">
                        <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                        <div class="form-outline flex-fill mb-0">
                        <input type="password" id="pass2" name="pass2" class="form-control" />
                        <label class="form-label" for="pass2">Masukan kembali password</label>
                        </div>
                    </div>

                    <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                        <button type="submit" name="register" class="btn btn-primary btn-lg">Register</button>
                    </div>
                    
                </form>
                <p class="small fw-bold mt-2 pt-1 mb-5">Batal daftar? <a href="login.php"
            class="link-danger">kembali</a></p>

                </div>
                <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                    <img src="assets/img/signup.svg"
                    class="img-fluid" alt="Sample image">

                </div>
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>
    </section>
    <!-- penutup form -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  </body>
</html>
