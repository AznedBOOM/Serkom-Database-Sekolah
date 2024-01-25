<!DOCTYPE html>
<html>
<head>
    <title>Website CRUD</title>
</head>

<body>
    <header>
        <h2>Website Pendataan dan Penjadwalan Sekolah</h2>
    </header>

    <h4>Menu</h4>
    <nav>
        <ul>
            <li><a href="list-guru.php">Daftar Semua Guru</a></li>
            <li><a href="list-siswa.php">Daftar Semua Siswa</a></li>
            <li><a href="list-kelas.php">Daftar Kelas</a></li>
            <li><a href="list-jadwal.php">Jadwal Pelajaran</a></li>
        </ul>
    </nav>
    <?php if(isset($_GET['status'])): ?>
    <p>
        <?php
            if($_GET['status'] == 'sukses'){
                echo "Submit data berhasil!";
            } else {
                echo "Submit Gagal!";
            }
        ?>
    </p>
<?php endif; ?>
    </body>
</html>