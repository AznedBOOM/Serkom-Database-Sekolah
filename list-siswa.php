<?php include("config.php"); ?>

<!DOCTYPE html>
<html>
<head>
    <title>Website CRUD</title>
</head>

<body>
    <header>
        <h3>Daftar Siswa</h3>
    </header>

    <nav>
        <a href="insert-siswa.php">[+] Tambah Baru</a>
    </nav>

    <br>

    <table border="1">
    <thead>
        <tr>
            <th>ID Siswa</th>
            <th>Nama</th>
            <th>tanggal_lahir</th>
            <th>alamat</th>
            <th>kelas_id</th>
            <th>Jenis_kelamin</th>
        </tr>
    </thead>
    <tbody>

        <?php
        $sql = "SELECT * FROM siswa";
        $query = mysqli_query($db, $sql);

        while($siswa = mysqli_fetch_array($query)){
            echo "<tr>";

            echo "<td>".$siswa['siswa_id']."</td>";
            echo "<td>".$siswa['nama']."</td>";
            echo "<td>".$siswa['tanggal_lahir']."</td>";
            echo "<td>".$siswa['alamat']."</td>";
            echo "<td>".$siswa['kelas_id']."</td>";
            echo "<td>".$siswa['jenis_kelamin']."</td>";

            echo "<td>";
            echo "<a href='edit-siswa.php?id=".$siswa['siswa_id']."'>Edit</a> | ";
            echo "<a href='delete-siswa.php?id=".$siswa['siswa_id']."'>Hapus</a>";
            echo "</td>";

            echo "</tr>";
        }
        ?>

    </tbody>
    </table>

    <p>Total: <?php echo mysqli_num_rows($query) ?></p>

    </body>
</html>