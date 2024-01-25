<?php include("config.php"); ?>

<!DOCTYPE html>
<html>
<head>
    <title>Website CRUD</title>
</head>

<body>
    <header>
        <h3>Daftar Kelas</h3>
    </header>

    <nav>
        <a href="insert-kelas.php">[+] Tambah Baru</a>
    </nav>

    <br>

    <table border="1">
    <thead>
        <tr>
            <th>ID Kelas</th>
            <th>Nama Kelas</th>
            <th>Jurusan</th>
            <th>Tahun Ajaran</th>
            <th>Wali Kelas</th>
        </tr>
    </thead>
    <tbody>

        <?php
        $sql = "SELECT * FROM kelas";
        $query = mysqli_query($db, $sql);

        while($kelas = mysqli_fetch_array($query)){
            echo "<tr>";

            echo "<td>".$kelas['kelas_id']."</td>";
            echo "<td>".$kelas['nama_kelas']."</td>";
            echo "<td>".$kelas['jurusan']."</td>";
            echo "<td>".$kelas['tahun_ajaran']."</td>";
            echo "<td>".$kelas['wali_kelas']."</td>";

            echo "<td>";
            echo "<a href='edit-kelas.php?id=".$kelas['kelas_id']."'>Edit</a> | ";
            echo "<a href='delete-kelas.php?id=".$kelas['kelas_id']."'>Hapus</a>";
            echo "</td>";

            echo "</tr>";
        }
        ?>

    </tbody>
    </table>

    <p>Total: <?php echo mysqli_num_rows($query) ?></p>

    </body>
</html>