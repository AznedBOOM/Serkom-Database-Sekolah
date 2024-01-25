<?php

include("config.php");

if( isset($_GET['id']) ){

    // ambil id dari query string
    $guru_id = $_GET['id'];

    // buat query hapus
    $sql = "DELETE FROM guru WHERE guru_id=$guru_id";
    $query = mysqli_query($db, $sql);

    // apakah query hapus berhasil?
    if( $query ){
        header('Location: list-guru.php');
    } else {
        die("gagal menghapus...");
    }

} else {
    die("akses dilarang...");
}

?>