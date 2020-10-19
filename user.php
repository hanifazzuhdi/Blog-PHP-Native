<?php
require 'controller/Control.php';
require 'init.php';
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
    <title>Settings - Hanif Blog</title>

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
                <a href="#"> Settings </a>
            </div>

            <form method="post">
                <button class="see" name="lihat" type="submit">Lihat Blog</button>
                <button type="submit" name="logout">Logout</button>
            </form>
        </div>

        <div class="content">

            <h1>Settings</h1>


        </div>

    </div>

</body>

</html>