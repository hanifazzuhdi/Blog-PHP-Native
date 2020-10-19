<?php
require 'controller/Control.php';

$id = $_GET["id"];


// logic+query tampil per kategori
$artikel = $conn->tampil("SELECT artikel.*, tag.tagName FROM artikel INNER JOIN tag ON id_artikel = tag.id WHERE id_artikel = $id");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KodingZ - </title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;400;500;600;800&display=swap" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            font-family: 'Poppins', sans-serif;
            list-style: none;
            text-decoration: none;
            color: black;
            scroll-behavior: smooth;
        }

        body {
            background-color: #F5F5F5;
            /* height: 1000px; */
        }

        /* navbar */

        nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #455A64;
            position: sticky;
            z-index: 999;
            top: 0;
            height: 50px;
            color: white;
        }

        nav h3 a {
            margin-left: 40px;
            color: white;
        }

        nav li {
            display: inline;
            list-style-type: none;
            margin-right: 30px;
        }

        nav li a {
            color: white;
            transition: 0.3s;
        }

        nav li a:hover {
            color: black;
        }

        nav li:last-child {
            margin-right: 40px;
        }

        /* content */

        main {
            display: grid;
            grid-template-columns: 75% auto;
            margin-top: 10px;
        }

        /* CONTENT 1 (SISI KIRI) */
        .content:nth-child(1) {
            position: relative;
            padding: 40px;
            box-shadow: -1px 0px 2px rgba(0, 0, 0, 0.3);
        }

        .kiri h2 {
            text-align: center;
            margin-bottom: 40px;
            font-weight: 400;
        }

        .kiri .artikel {
            position: relative;
            display: flex;
            justify-content: space-evenly;
            flex-wrap: wrap;
        }

        .kiri .card {
            border: 1px solid rgba(0, 0, 0, 0.5);
            position: relative;
            width: 250px;
            height: 310px;
            margin: 20px 0px;
            border-radius: 5px;
            background-color: whitesmoke;
            box-shadow: 0px 3px 8px rgba(0, 0, 0, 0.6);
            transition: 0.3s;
        }

        .kiri .card:hover {
            background-color: #EEEEEE;
            transform: translateY(-8px);
            box-shadow: 0px 0px 2px rgba(0, 0, 0, 0.6);
        }

        .kiri .card .gambar {
            border-bottom: 2px solid black;
        }

        .kiri .card h3 {
            margin-top: 5px;
            padding: 5px;
            font-weight: 400;
        }

        .kiri .card p {
            margin-top: 2px;
            padding: 5px;
            font-size: 13px;
            font-weight: 300;
        }

        /* CONTENT 2 (SIDE PAGE) */

        .content:nth-child(2) {
            position: relative;
            padding: 40px 20px;
            background-color: #fff;
            box-shadow: -1px 0px 3px rgba(0, 0, 0, 0.3);
        }

        .kanan h3 {
            /* margin-top: 10px; */
            margin-bottom: 20px;
            font-weight: 500;
            text-align: center;
        }

        .kanan ul li {
            border-bottom: 3px solid rgba(0, 0, 0, 0.3);
            padding: 3px;
        }

        footer {
            position: absolute;
            bottom: 0;
            width: 100%;
            background-color: #455A64;
            height: 50px;
            display: flex;
            justify-content: center;
            align-items: center;
        }


        footer p {
            color: white;
            font-size: 15px;
        }

        footer span {
            color: salmon;
        }
    </style>
</head>

<body>

    <nav>
        <h3><a href="index.php">Koding-Z</a></h3>
        <ul>
            <li><a href="index.php"> Home </a></li>
            <li><a href="https://stackoverflow.com/" target="_blank">Forum</a></li>
            <li><a href="https://github.com/hanifazzuhdi" target="_blank"> About Me </a></li>
        </ul>
    </nav>

    <main>

        <div class="content kiri">
            <?php foreach ($artikel as $art) : ?>
                <h2>Materi Kategori <?= $art["tagName"] ?> </h2>
                <?php break ?>
            <?php endforeach ?>
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