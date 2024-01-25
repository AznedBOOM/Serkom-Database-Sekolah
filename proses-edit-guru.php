<?php

include("config.php");

// cek apakah tombol simpan sudah diklik atau blum?
if(isset($_POST['submit'])){

    // ambil data dari formulir
    $id = $_POST['guru_id'];
    $nama = $_POST['nama'];
    $mata_pelajaran = $_POST['mata_pelajaran'];
    $email = $_POST['email'];
    $nomor_telepon = $_POST['nomor_telepon'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $hak_akses = $_POST['hak_akses'];
    $password = $_POST['password'];

    // buat query update
    $sql = "UPDATE guru SET nama='$nama', mata_pelajaran='$mata_pelajaran', email='$email', nomor_telepon='$nomor_telepon', jenis_kelamin='$jenis_kelamin', hak_akses='$hak_akses', password='$password' WHERE guru_id=$id";
    $query = mysqli_query($db, $sql);

    // apakah query update berhasil?
    if( $query ) {
        // kalau berhasil alihkan ke halaman list-siswa.php
        header('Location: list-guru.php');
    } else {
        // kalau gagal tampilkan pesan
        die("Gagal menyimpan perubahan...");
    }


} else {
    die("Akses dilarang...");
}

?>