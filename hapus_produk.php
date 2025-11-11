<?php
require('koneksi.php');

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($conn)) {
        $id_produk = isset($_GET['id_produk']) ? (int) $_GET['id_produk'] : 0;

        if ($id_produk > 0) {
            $sql = "DELETE FROM produk WHERE id_produk = $id_produk";
            mysqli_query($conn, $sql);
            header('Location: index.php');
            exit();
        }
    }
}