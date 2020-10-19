<?php
session_start();
require 'controller/Control.php';
// CEK SESSION
if (!isset($_SESSION['status'])) {
    header("Location: login.php");
    exit;
}
if (isset($_POST['logout'])) {
    $_SESSION = [];
    session_unset();
    session_destroy();

    setcookie('id', '', time() - 3600);
    header("Location: login.php");
}

if (isset($_POST["lihat"])) {
    header("Location: index.php");
}
//LOGIC TAMPIL
$artikel = $conn->tampil("SELECT id, judul, tag FROM artikel");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beranda - Hanif Blog</title>

    <!-- MYCSS -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;400;500;600;800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/style.css">

    <style>
        .container .content form .see {
            margin-right: 9.5em;
        }
    </style>


</head>

<body>

    <div class="container">

        <div class="content">
            <section>
                <img src="img/user4.png" alt="user" width="110" height="110">
                <h4>Selamat Datang Admin</h4>
            </section>

            <div class="list">
                <a href="admin.php"> Daftar Artikel </a>
            </div>
            <div class="list">
                <a href="tambah.php"> Tambah Artikel </a>
            </div>
            <div class="list">
                <a href="user.php"> Settings </a>
            </div>

            <form method="post">
                <button class="see" name="lihat" type="submit">Lihat Blog</button>
                <button type="submit" name="logout">Logout</button>
            </form>
        </div>

        <div class="content">

            <h1>Daftar Artikel</h1>

            <table border="1px" cellpadding="5" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Judul</th>
                        <th>Tag</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <?php $i = 1 ?>
                <?php foreach ($artikel as $art) : ?>
                    <tr>
                        <th><?= $i ?></th>
                        <td><?= $art['judul'] ?></td>
                        <td><?= substr($art['tag'], 2) ?></td>
                        <td>
                            <a href="edit.php?id=<?= $art['id'] ?>">Edit | </a>
                            <a href="hapus.php?id=<?= $art['id'] ?>" onclick="return confirm('Yakin Hapus Artikel ?');">Hapus</a>
                        </td>
                    </tr>
                    <?php $i++ ?>
                <?php endforeach ?>
            </table>
        </div>

    </div>

</body>

</html>