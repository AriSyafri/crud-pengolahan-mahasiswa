<?php
//koneksi ke database
$conn = mysqli_connect("localhost","root","","db_mhs");
// membuat fungsi query
function query($query){
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while( $row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }
    return $rows;
}

// pencarian mhs

function cari($keyword) {
    $query = "SELECT * FROM mhs 
    left join kelas
    on mhs.kodeKelas = kelas.kodeKelas
    left JOIN dosen
    on kelas.id_dosen = dosen.id_dosen
                WHERE
            namaMhs LIKE '%$keyword%' OR-- (biar fleksibel) guna persen biar di awal biar awal bebas juga sebaliknya
            nim LIKE '%$keyword%'
        ";
    return query($query);
}

//pencarian kelas
function carikls($keyword) {
    $query = "SELECT * FROM kelas
    left join dosen
    on kelas.id_dosen = dosen.id_dosen
    where 
    kodeKelas like '%$keyword%' or
    nama_kelas like '%$keyword%' or
    fakultas like '%$keyword%'
    ";
    return query($query);
}

//pencarian dosen
function caridsn($keyword) {
    $query = "SELECT * FROM dosen
    where 
    id_dosen like '%$keyword%' or
    nama_dsn like '%$keyword%' or
    Alamat like '%$keyword%'
    ";
    return query($query);
}

// penambahan data mahasiswa
function tambahmhs($data) {
    global $conn;

    $nim = htmlspecialchars($data["Nim"]);
    $namaMhs = htmlspecialchars($data["NamaMhs"]);
    $jeniskelamin = htmlspecialchars($data["JenisKelamin"]);
    $tanggal_lahir = htmlspecialchars($data["tanggalLahir"]);
    $alamat = htmlspecialchars($data["alamat"]);
    $semester = htmlspecialchars($data["semester"]);
    $kelas = htmlspecialchars($data["kodekelas"]);

    //  query insert
    $query = "insert into  mhs
        values 
        ('$nim','$namaMhs','$jeniskelamin','$tanggal_lahir','$alamat','$semester','$kelas')
    ";
    mysqli_query($conn,$query);
    // cek koneksi
    return mysqli_affected_rows($conn);
}

// hapus mahasiswa
function hapusmhs($nim) {
    global $conn;
    mysqli_query($conn, "DELETE FROM mhs WHERE nim = $nim");
    return mysqli_affected_rows($conn);
}

// ubah mahasiswa
function ubahMhs($data) {
    global $conn;

    $nim = htmlspecialchars($data["nim"]);
    $namaMhs = htmlspecialchars($data["namaMhs"]);
    $jeniskelamin = htmlspecialchars($data["JenisKelamin"]);
    $tanggal_lahir = htmlspecialchars($data["tanggalLahir"]);
    $alamat = htmlspecialchars($data["alamat"]);
    $semester = htmlspecialchars($data["semester"]);
    $kelas = htmlspecialchars($data["kodekelas"]);

    $query = "update mhs set
                namaMhs = '$namaMhs',
                JenisKelamin = '$jeniskelamin',
                tanggal_lahirMhs = '$tanggal_lahir',
                AlamatMhs = '$alamat',
                semester = '$semester',
                kodeKelas = '$kelas'
            where nim = $nim
            ";
    mysqli_query($conn,$query);
    // cek koneksi
    return mysqli_affected_rows($conn);
}

// tambah dosen
function tambahdsn($data) {
    global $conn;

    $dosen = htmlspecialchars($data["id_dosen"]);
    $namadsn = htmlspecialchars($data["nama_dsn"]);
    $tanggal_lahir = htmlspecialchars($data["tanggalLahir"]);
    $alamat = htmlspecialchars($data["alamat"]);

    //  query insert
    $query = "insert into dosen
        values 
        ('$dosen','$namadsn','$tanggal_lahir','$alamat')
    ";
    mysqli_query($conn,$query);
    // cek koneksi
    return mysqli_affected_rows($conn);
}

// ubah dosen
function ubahdsn($data) {
    global $conn;

    $dosen = htmlspecialchars($data["id_dosen"]);
    $namadsn = htmlspecialchars($data["nama_dsn"]);
    $tanggal_lahir = htmlspecialchars($data["tanggalLahir"]);
    $alamat = htmlspecialchars($data["alamat"]);

    $query = "update dosen set
                nama_dsn = '$namadsn',
                TanggalLahir = '$tanggal_lahir',
                Alamat = '$alamat'
            where id_dosen = $dosen
            ";
    mysqli_query($conn,$query);
    // cek koneksi
    return mysqli_affected_rows($conn);
}

// hapus dosen
function hapusdsn($id) {
    global $conn;
    mysqli_query($conn, "DELETE FROM dosen WHERE id_dosen = $id");
    return mysqli_affected_rows($conn);
}

// tambah kelas
function tambahkls($data) {
    global $conn;

    $kode = htmlspecialchars($data["kodekls"]);
    $nama = htmlspecialchars($data["namaKls"]);
    $fakultas = htmlspecialchars($data["fakultas"]);
    $iddos = htmlspecialchars($data["kodekelas"]);

    //  query insert
    $query = "insert into kelas
        values 
        ('$kode','$nama','$fakultas','$iddos')
    ";
    mysqli_query($conn,$query);
    // cek koneksi
    return mysqli_affected_rows($conn);
}

function ubahkls($data) {
    global $conn;

    $kode = htmlspecialchars($data["kodeKelas"]);
    $namaKls = htmlspecialchars($data["namaKls"]);
    $fakultas = htmlspecialchars($data["fakultas"]);
    $kodekls = htmlspecialchars($data["kodekelas"]);

    $query = "update kelas set
                nama_kelas = '$namaKls',
                fakultas = '$fakultas',
                id_dosen = '$kodekls'
            where kodeKelas = '$kode'
            ";
    mysqli_query($conn,$query);
    // cek koneksi
    return mysqli_affected_rows($conn);
}


// hapus kelas
function hapuskls($id) {
    global $conn;
    mysqli_query($conn, "DELETE FROM kelas WHERE kodeKelas = $id");
    return mysqli_affected_rows($conn);
}

// registrasi
function registrasi($data) {
    global $conn;

    $username = strtolower(stripslashes($data["idUser"]));
    $nama = htmlspecialchars($data["nama"]);
    $jabatan = htmlspecialchars($data["jabatan"]);
    $password = mysqli_real_escape_string($conn, $data["pass"]);
    $password2 = mysqli_real_escape_string($conn, $data["pass2"]);

    // cek username sudah ada atau belum
    $result = mysqli_query($conn, "SELECT idUser FROM user WHERE
        idUser = '$username'"); 
    if( mysqli_fetch_assoc($result) ) {
        echo "<script>
                alert('username sudah terdaftar')
            </script>";
        return false;
    }

    // cek konfirmasi pass
    if ($password !== $password2) {
        echo "<script>
                alert('konfirmasi password tidak sesuai');
            </script>";
        return false;
    }

    // enkripsi pass
    $password = password_hash($password, PASSWORD_DEFAULT);

    // tambahkan user baru ke database
    mysqli_query($conn, "INSERT INTO user VALUES('$username','$nama','$jabatan','$password')");

    return mysqli_affected_rows($conn);
}



?>
