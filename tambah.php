<?php
session_start();
require 'controller/Control.php';

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

// LOGIC TAMBAH
if (isset($_POST['submit'])) {
    // print_r($_POST);
    $judul = $_POST['judul'];
    $tag = $_POST['tag'];
    $id_artikel = substr($_POST['tag'], 0, 1);
    $gambar = $_POST['gambar'];
    $artikel = $_POST['artikel'];

    // // print_r($id_artikel);

    if ($conn->tambah($judul, $tag, $id_artikel, $gambar, $artikel) > 0) {
        echo "<script>
                alert ('Artikel Berhasil Ditambahkan !');
                document.location.href='tambah.php'
            </script>";
        exit;
    } else {
        echo "<script>
                alert ('Artikel Gagal Ditambahkan !');
                document.location.href='tambah.php'
             </script>";
    }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Artikel</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;400;500;600;800&display=swap" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            font-family: 'Poppins', sans-serif;
        }

        /* MAIN */
        .container {
            display: grid;
            grid-template-columns: 23% auto;
            height: 100vh;
            width: 100%;
        }

        /* content 1 */
        .container .content:nth-child(1) {
            border-right: 2px solid black;
            background-color: #BDBDBD;
            position: relative;
        }

        .container .content section {
            background-color: white;
            padding-bottom: 18px;
            text-align: center;
            background-color: #757575;
            color: white;
        }

        .container .content section h4 {
            text-shadow: 2px 2px 2px black;
        }

        .container .content img {
            padding-bottom: 30px;
            margin-top: 20px;
        }

        .container .content .list {
            font-size: 14px;
            font-weight: 500;
            padding: 15px 15px;
            box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.6);
            transition: 0.2s;
        }


        .container .content .list a {
            text-decoration: none;
            color: #212121;
            display: inline-block;
            width: 100%;
            transition: 0.2s;
        }

        .container .content .list:hover,
        .container .content .list a:hover {
            background-color: lightgrey;
            color: white;
        }

        .container .content form {
            position: absolute;
            right: 10px;
            bottom: 10px;
        }

        .container .content form .see {
            margin-right: 9.5em;
        }

        .container .content form button {
            width: 80px;
            height: 35px;
            background-color: #1E88E5;
            border: 1px solid black;
            border-radius: 4px;
            cursor: pointer;
            transition: 0.2s;
        }

        .container .content form button:hover {
            background-color: lightblue;
        }

        .container .content:nth-child(2) {
            background-color: #E0E0E0;
            position: relative;
        }

        .container .content:nth-child(2) form {
            position: absolute;
            top: 0;
            left: 0;
            padding: 15px;
        }

        .container .content form fieldset {
            padding: 20px;
            height: 90vh;
        }

        .container .content form fieldset legend {
            font-size: 20px;
            font-weight: 500;
        }

        .container .content form fieldset .input,
        input {
            margin-top: 8px;
        }
    </style>

</head>

<body>

    <div class="container">

        <div class="content">
            <section>
                <img src="img/user4.png" alt="user" width="110" height="110">
                <h4>Halaman Tambah Artikel</h4>
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
            <form method="post">
                <fieldset>
                    <legend>TAMBAH ARTIKEL</legend>
                    <div class="input">
                        <span>Judul Artikel : </span>
                        <br>
                        <input required type="text" name="judul">
                    </div>
                    <div class="input">
                        <span>Tag : </span>
                        <br>
                        <select name="tag" id="tag">
                            <option value="1.HTML">HTML</option>
                            <option value="2.CSS">CSS</option>
                            <option value="3.PHP">PHP</option>
                            <option value="4.JavaScript">JavaScript</option>
                        </select>
                    </div>
                    <div class="input">
                        <span>Upload Header : </span>
                        <br>
                        <input required type="text" name="gambar">
                    </div>
                    <div class="input">
                        <span>Isi Artikel : </span>
                        <br>
                        <textarea required name="artikel" id="" cols="50" rows="12"></textarea>
                    </div>
                    <button type="submit" name="submit">Posting</button>
                </fieldset>
            </form>
        </div>

    </div>
</body>

</html>