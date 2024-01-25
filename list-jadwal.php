<?php include("config.php"); ?>

<!DOCTYPE html>
<html>
<head>
    <title>Website CRUD</title>
</head>

<body>
    <header>
        <h3>Jadwal Pelajaran</h3>
    </header>

    <nav>
        <a href="insert-kelas.php">[+] Tambah Baru</a>
    </nav>

    <br>

    <table border="1">
    <thead>
        <tr>
            <th>ID Jadwal</th>
            <th>ID Kelas</th>
            <th>mata Pelajaran</th>
            <th>Hari</th>
            <th>Jam Mulai</th>
            <th>Jam Berakhir</th>
            <th>ID Guru</th>
        </tr>
    </thead>
    <tbody>

        <?php
        $sql = "SELECT * FROM jadwal";
        $query = mysqli_query($db, $sql);

        while($jadwal = mysqli_fetch_array($query)){
            echo "<tr>";

            echo "<td>".$jadwal['jadwal_id']."</td>";
            echo "<td>".$jadwal['kelas_id']."</td>";
            echo "<td>".$jadwal['mata_pelajaran']."</td>";
            echo "<td>".$jadwal['hari']."</td>";
            echo "<td>".$jadwal['jam_mulai']."</td>";
            echo "<td>".$jadwal['jam_selesai']."</td>";
            echo "<td>".$jadwal['guru_id']."</td>";

            echo "<td>";
            echo "<a href='edit-jadwal.php?id=".$jadwal['kelas_id']."'>Edit</a> | ";
            echo "<a href='delete-jadwal.php?id=".$jadwal['kelas_id']."'>Hapus</a>";
            echo "</td>";

            echo "</tr>";
        }
        ?>

    </tbody>
    </table>

    <p>Total: <?php echo mysqli_num_rows($query) ?></p>

    </body>
</html>