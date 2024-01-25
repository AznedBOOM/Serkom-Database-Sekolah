<?php

include("config.php");

// kalau tidak ada id di query string
if( !isset($_GET['id']) ){
    header('Location: list-guru.php');
}

//ambil id dari query string
$id = $_GET['id'];

// buat query untuk ambil data dari database
$sql = "SELECT * FROM guru WHERE guru_id=$id";
$query = mysqli_query($db, $sql);
$guru = mysqli_fetch_assoc($query);

// jika data yang di-edit tidak ditemukan
if( mysqli_num_rows($query) < 1 ){
    die("data tidak ditemukan...");
}


?>

<!DOCTYPE html>
<html>
<head>
    <title>Website CRUD</title>
</head>

<body>
    <header>
        <h3>Formulir Edit Guru</h3>
    </header>

    <form action="proses-edit-guru.php" method="POST">

        <fieldset>

            <input type="hidden" name="guru_id" value="<?php echo $guru['guru_id'] ?>" />

        <p>
            <label for="nama">Nama: </label>
            <input type="text" name="nama" placeholder="nama Lengkap" value="<?php echo $guru['nama'] ?>" />
        </p>

        <p>
            <label for="mata_pelajaran">Mata Pelajaran: </label>
            <input type="text" name="mata_pelajaran" placeholder="Kimia, Biologi, dll." value="<?php echo $guru['mata_pelajaran'] ?>" required>
        </p>

        <p>
            <label for="email">Email: </label>
            <input type="text" name="email" placeholder="contoh@contoh.com" value="<?php echo $guru['email'] ?>" />
        </p>
        <p>
            <label for="nomor_telepon">Nomor Telepon: </label>
            <input type="text" name="nomor_telepon" value="<?php echo $guru['nomor_telepon'] ?>" />
        </p>

        <p>
            <label for="jenis_kelamin">Jenis Kelamin: </label>
            <?php $jenis_kelamin = $guru['jenis_kelamin']; ?>
            <label><input type="radio" name="jenis_kelamin" value="L" <?php echo ($jenis_kelamin == 'L') ? "checked": "" ?>> Laki-laki</label>
            <label><input type="radio" name="jenis_kelamin" value="P" <?php echo ($jenis_kelamin == 'P') ? "checked": "" ?>> Perempuan</label>
        </p>

        <p>
            <label for="hak_akses">hak_akses </label>
            <?php $hak_akses = $guru['hak_akses']; ?>
            <label><input type="radio" name="hak_akses" value="admin" <?php echo ($hak_akses == 'admin') ? "checked": "" ?>> Admin</label>
            <label><input type="radio" name="hak_akses" value="user" <?php echo ($hak_akses == 'user') ? "checked": "" ?>> User</label>
        </p>

        <p>
            <label for="password">Password:</label>
            <input type="password" name="password" value="<?php echo $guru['password']?>" required>
        </p>

        <p>
            <input type="submit" value="Submit" name="submit" />
        </p>

        </fieldset>


    </form>

    </body>
</html>