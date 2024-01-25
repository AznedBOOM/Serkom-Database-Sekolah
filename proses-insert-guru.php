<?php

include("config.php");

// cek apakah tombol daftar sudah diklik atau blum?
if(isset($_POST['submit'])){

    // ambil data dari formulir
    $nama = $_POST['nama'];
    $mata_pelajaran = $_POST['mata_pelajaran'];
    $email = $_POST['email'];
    $nomor_telepon = $_POST['nomor_telepon'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $hak_akses = $_POST['hak_akses'];
    $password = $_POST['password'];

    // buat query
    $sql = "INSERT INTO guru (nama, mata_pelajaran, email, nomor_telepon, jenis_kelamin, hak_akses, password) VALUE ('$nama', '$mata_pelajaran', '$email', '$nomor_telepon', '$jenis_kelamin', '$hak_akses', '$password')";
    $query = mysqli_query($db, $sql);

    // apakah query simpan berhasil?
    if( $query ) {
        // kalau berhasil alihkan ke halaman index.php dengan status=sukses
        header('Location: index.php?status=sukses');
    } else {
        // kalau gagal alihkan ke halaman indek.php dengan status=gagal
        header('Location: index.php?status=gagal');
    }


} else {
    die("Akses dilarang...");
}

?>