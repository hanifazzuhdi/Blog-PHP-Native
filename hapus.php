<?php
require 'controller/Control.php';

$id = $_GET['id'];

if ($conn->delete($id) > 0) {
  echo "<script>
            alert ('Artikel Berhasil Dihapus !');
            document.location.href='admin.php'
          </script>";
  exit;
}
