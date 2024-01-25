<?php include("config.php"); ?>

<!DOCTYPE html>
<html>
<head>
    <title>Website CRUD</title>
</head>

<body>
    <header>
        <h3>Daftar Guru</h3>
    </header>

    <nav>
        <a href="insert-guru.php">[+] Tambah Baru</a>
    </nav>

    <br>

    <table border="1">
    <thead>
        <tr>
            <th>ID Guru</th>
            <th>Nama</th>
            <th>Mata Pelajaran</th>
            <th>Email</th>
            <th>Nomor Telepon</th>
            <th>Jenis Kelamin</th>
            <th>Hak Akses</th>
            <th>Password</th>
        </tr>
    </thead>
    <tbody>

        <?php
        $sql = "SELECT * FROM guru";
        $query = mysqli_query($db, $sql);

        while($guru = mysqli_fetch_array($query)){
            echo "<tr>";

            echo "<td>".$guru['guru_id']."</td>";
            echo "<td>".$guru['nama']."</td>";
            echo "<td>".$guru['mata_pelajaran']."</td>";
            echo "<td>".$guru['email']."</td>";
            echo "<td>".$guru['nomor_telepon']."</td>";
            echo "<td>".$guru['jenis_kelamin']."</td>";
            echo "<td>".$guru['hak_akses']."</td>";
            echo "<td>".$guru['password']."</td>";

            echo "<td>";
            echo "<a href='edit-guru.php?id=".$guru['guru_id']."'>Edit</a> | ";
            echo "<a href='delete-guru.php?id=".$guru['guru_id']."'>Hapus</a>";
            echo "</td>";

            echo "</tr>";
        }
        ?>

    </tbody>
    </table>

    <p>Total: <?php echo mysqli_num_rows($query) ?></p>

    </body>
</html>