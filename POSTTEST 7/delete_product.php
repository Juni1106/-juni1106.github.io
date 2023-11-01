<?php

require_once "koneksi.php";

if (!isset($_SESSION["login"])) {
    header("location: login.php");
    die;
}

if (isset($_GET["id"])) {

    $id = $_GET["id"];
    $sql = "SELECT foto FROM produk WHERE id=" . $id;
    $res = mysqli_query($conn, $sql);
    $produk = $res->fetch_assoc();
    $image = $produk['foto'];
    if ($image && file_exists("uploads/" . $image)) {
        unlink("uploads/" . $image);
    }

    $sql = "DELETE FROM produk WHERE id=" . $id;
    if (mysqli_query($conn, $sql)) {
        echo "<script>";
        echo "alert('Data telah dihapus!'); window.location='product.php';";
        echo "</script>";
    } else {
        echo "<script>";
        echo "alert('Hapus data gagal!'); window.location='product.php';";
        echo "</script>";
    }
} else {
    echo "<script>";
    echo "alert('Invalid Request!'); window.location='product.php';";
    echo "</script>";
}
