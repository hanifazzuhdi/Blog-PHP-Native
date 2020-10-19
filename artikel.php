<?php
require 'controller/Control.php';

$id = $_GET["id"];
$tag = $_GET["tag"];

// Logic tampil sesuai di klik
$artikel = $conn->tampil("SELECT * FROM artikel WHERE id = $id");

// logic untuk materi terkait
$article = $conn->tampil("SELECT * FROM artikel WHERE tag = '$tag'")
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php foreach ($artikel as $art) : ?>
        <title>KodingZ - <?= $art["judul"] ?></title>

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
            }

            nav {
                position: fixed;
                top: 0;
                width: 100%;
                background-color: #455A64;
                height: 50px;
                display: flex;
                justify-content: space-between;
                align-items: center;
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

            /* MAIN */
            .container_2 {
                display: grid;
                grid-template-columns: 75% auto;
                margin-top: 50px;
                padding: 30px 10px;
            }

            .container_2 .artikel:nth-child(1) {
                box-shadow: -1px 0px 2px rgba(0, 0, 0, 0.3);
            }

            .container_2 .kiri {
                padding: 20px 80px;
            }

            .container_2 .kiri h1 {
                margin-top: 40px;
                font-weight: 400;
            }

            .container_2 .kiri p {
                line-height: 1.5em;
                text-align: justify;
                padding: 30px 0;
            }

            .container_2 .artikel:nth-child(2) {
                background-color: #fff;
                box-shadow: -1px 0px 3px rgba(0, 0, 0, 0.3);
            }

            .container_2 .kanan h2 {
                margin-top: 10px;
                margin-bottom: 15px;
                padding: 20px;
                font-weight: 300;
                text-align: center;
            }

            .kanan ul li {
                text-align: center;
                border-bottom: 3px solid rgba(0, 0, 0, 0.3);
                padding: 8px;
            }

            .kanan ul li a {
                font-size: 15px;
                transition: 0.3s;
            }

            .kanan ul li a:hover {
                color: lightgray;
            }

            footer {
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

    <div class="container_2">

        <div class="artikel kiri">
            <img src="<?= $art["gambar"] ?>" width="600px" height="350px" alt="Foto">
            <h1><?= $art["judul"] ?></h1>
            <!-- <div class="atribut">
                <p> Hanif </p>
            </div> -->
            <p><?= $art['isiArtikel'] ?></p>
        </div>
        <div class="artikel kanan">
            <h2>Materi Terkait</h2>
            <ul>
                <?php foreach ($article as $art) : ?>
                    <li> <a href="artikel.php?id=<?= $art["id"] ?>&tag=<?= $art["tag"] ?>"> <?= $art["judul"] ?> </a> </li>
                <?php endforeach ?>
            </ul>
        </div>

    </div>

<?php endforeach ?>


<footer>
    <p>Build With <span> Love </span> By <span>Hanif</span> <sup>&copy;</sup> 2019 - <?= date("Y") ?> </p>
</footer>

</body>

</html>