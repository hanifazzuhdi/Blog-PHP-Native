<?php

class Control
{
    public function __construct()
    {
        $host = "localhost";
        $user = "hanif";
        $pass = "123";
        $dbname = "blog";

        try {
            $this->conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function tambah($judul, $tag, $id_artikel, $gambar, $artikel)
    {
        $query = "INSERT INTO artikel (judul,tag,gambar,isiArtikel,id_artikel) VALUES (?,?,?,?,?)";

        $tambah = $this->conn->prepare($query);

        $tambah->bindParam(1, $judul);
        $tambah->bindParam(2, $tag);
        $tambah->bindParam(3, $gambar);
        $tambah->bindParam(4, $artikel);
        $tambah->bindParam(5, $id_artikel);

        $tambah->execute();

        return $tambah->rowCount();
    }
    public function tampil($query)
    {
        $tampil = $this->conn->query($query);

        $hasil = $tampil->fetchAll(PDO::FETCH_ASSOC);
        return $hasil;
    }
    public function update($data, $id)
    {
        $judul = $data['judul'];
        $tag = $data['tag'];
        $id_artikel = substr($data['tag'], 0, 1);
        $gambar = $data['gambar'];
        $isi = $data['artikel'];

        $query = "UPDATE artikel SET judul = '$judul', tag = '$tag', gambar = '$gambar', isiArtikel = '$isi', id_artikel = $id_artikel WHERE id = $id";

        $update = $this->conn->query($query);

        return $update->rowCount();
    }
    public function delete($id)
    {
        $query = "DELETE FROM artikel WHERE id = $id";

        $delete = $this->conn->query($query);

        return $delete->rowCount();
    }
    public function cari($key)
    {
        $query = "SELECT * FROM artikel WHERE judul LIKE '%$key%' OR tag LIKE '$key'";

        return $this->tampil($query);
    }
}

$conn = new Control();
