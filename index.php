<?php
require 'controller/Control.php';

$artikel = $conn->tampil("SELECT * FROM artikel");

// LOGIC CARI
if (isset($_POST['cari'])) {
    $key = $_POST['keyword'];

    $artikel = $conn->cari($key);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Coba aja</title>

    <!-- FONT + ICON -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;400;500;600;800&display=swap" rel="stylesheet">

    <!-- MY CSS -->
    <link rel="stylesheet" href="css/user.css">

</head>

<body>

    <header>
        <div class="jumbotron" id="jumbo">
            <h1>WELCOME TO MY BLOG</h1>
            <p>Belajar Programming Dimanapun dan Kapanpun. Happy Learning </p>
        </div>
        <nav>
            <h3><a href="index.php">Koding-Z</a></h3>
            <ul>
                <li><a href="index.php"> Home </a></li>
                <li><a href="https://stackoverflow.com/" target="_blank">Forum</a></li>
                <li><a href="https://github.com/hanifazzuhdi" target="_blank"> About Me </a></li>
                <!-- <img src="img/login.svg" width="20px"> -->
            </ul>
        </nav>
    </header>

    <!-- MAIN -->
    <main>

        <div class=" content kiri">
            <section class="pembuka">
                <h1>Selamat Datang Di Koding-Z</h1>
                <p>Koding-Z didedikasikan bagi anda yang ingin mempelejari pemrograman khususnya di bidang Web Developer. Saat ini Koding-Z telah memiliki 1000+ tutorial pemrograman dan akan selalu update materi setiap minggunya, Selamat Belajar.
                </p>
            </section>

            <div class="artikel">
                <!-- CARD -->
                <?php foreach ($artikel as $art) : ?>
                    <div class="card">
                        <section class="gambar">
                            <img src="<?= $art["gambar"] ?>" width="250" height="130" alt="user">
                        </section>
                        <h3><a href="artikel.php?id=<?= $art['id'] ?>&tag=<?= $art["tag"] ?>"> <?= $art['judul'] ?> </a></h3>
                        <p><?= substr($art['isiArtikel'], 0, 100) . " ..." ?></p>
                    </div>
                <?php endforeach ?>
            </div>
        </div>

        <div class="content kanan">
            <form method="post">
                <input type="text" name="keyword" placeholder="Cari Materi ..." autofocus>
                <button type="submit" name="cari">Cari</button>
            </form>

            <h3>Kategori </h3>
            <ul>
                <li><a href="kategori.php?id=1">HTML</a> </li>
                <li><a href="kategori.php?id=2">CSS</a></li>
                <li><a href="kategori.php?id=3">PHP</a></li>
                <li><a href="kategori.php?id=4">JavaScript</a></li>
            </ul>

        </div>
    </main>

    <footer>
        <p>Build With <span> Love </span> By <span>Hanif</span> <sup>&copy;</sup> 2019 - <?= date("Y") ?> </p>
    </footer>

</body>

</html>