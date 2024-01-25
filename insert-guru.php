<!DOCTYPE html>
<html>
<head>
    <title>Website CRUD</title>
</head>

<body>
    <header>
        <h3>Insert Guru</h3>
    </header>

    <form action="proses-insert-guru.php" method="POST">

        <fieldset>

        <p>
            <label for="nama">Nama: </label>
            <input type="text" name="nama" placeholder="Nama Lengkap" />
        </p>

        <p>
            <label for="mata_pelajaran">Mata Pelajaran</label>
            <input type="text" name="mata_pelajaran" placeholder="Kimia, Biologi, dll." required>
        </p>

        <p>
            <label for="email">Email:</label>
            <input type="text" name="email" placeholder="contoh@contoh.com" required>
        </p>
        
        <p>
            <label for="nomor_telepon">Nomor HP:</label>
            <input type="text" name="nomor_telepon" required>
        </p>

        <p>
            <label for="jenis_kelamin">Jenis Kelamin </label>
            <label><input type="radio" name="jenis_kelamin" value="L"> Laki-Laki</label>
            <label><input type="radio" name="jenis_kelamin" value="P"> Perempuan</label>
        </p>

        <p>
            <label for="hak_akses">Hak Akses: </label>
            <label><input type="radio" name="hak_akses" value="admin"> Admin</label>
            <label><input type="radio" name="hak_akses" value="user"> User</label>
        </p>


        <p>
            <label for="password">Password:</label>
            <input type="password" name="password" required>
        </p>

        <p>
            <input type="submit" value="Submit" name="submit" />
        </p>

        </fieldset>

    </form>

    </body>
</html>