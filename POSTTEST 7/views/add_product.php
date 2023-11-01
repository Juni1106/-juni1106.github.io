<?php
require_once "koneksi.php";
date_default_timezone_set('Asia/Makassar');

if (!isset($_SESSION["login"])) {
    header("location: login.php");
    die;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = htmlspecialchars($_POST["nama"]);
    $harga = htmlspecialchars($_POST["harga"]);
    $deskripsi = htmlspecialchars($_POST["deskripsi"]);
    $stok = htmlspecialchars($_POST["stok"]);

    if ($nama && $harga && $deskripsi && $stok) {

        if (isset($_FILES["foto"])) {
            $file = $_FILES["foto"];
            $file_name = $file["name"];
            $file_tmp_name = $file["tmp_name"];

            // Define the directory where you want to save the uploaded file
            $upload_directory = "uploads/";
            $target_file = $upload_directory . basename($file_name);

            // Move the uploaded file to the desired directory
            if (move_uploaded_file($file_tmp_name, $target_file)) {
                // File upload was successful
                $sql = "INSERT INTO produk (nama, deskripsi, stok, foto, harga) VALUES('$nama', '$deskripsi', '$stok', '$file_name', '$harga')";
                mysqli_query($conn, $sql);
            } else {
                echo "<script>";
                echo "alert('File upload failed!'); window.location='product.php';";
                echo "</script>";
            }
        }
        else {
            $sql = "INSERT INTO produk (nama, deskripsi, stok, foto, harga) VALUES('$nama', '$deskripsi', '$stok', '', '$harga')";
            mysqli_query($conn, $sql);
        }
        echo "<script>";
        echo "alert('Tambah data berhasil!'); window.location='product.php';";
        echo "</script>";
    } else {
        echo "<script>";
        echo "alert('Tambah data gagal!'); window.location='product.php';";
        echo "</script>";
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Produk</title>
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="assets/css/form-product.css">
</head>

<body>
    <nav class="navigation">
        <h2 class="Logo">Fabelio</h2>
        </div>
        <div class="nav-items">
            <a href="index.php#Home" class="nav-link">Home</a>
            <a href="index.php#about" class="nav-link">About</a>
            <a href="index.php#products" class="nav-link">Furniture</a>
            <a href="product.php" class="nav-link active">Product</a>
            <a href="user.php" class="nav-link">Users</a>
            <a href="logout.php" class="nav-link">Logout</a>
            <a class="btn_darkmode">GANTI MODE</a>
        </div>
        </div>
    </nav>
    <div class="container">
        <div class="product-form">
            <p><?= date('l, d F Y ') ?></p>
            <p><?= date('h:i: sa') ?></p>
            <h2>Tambah Produk Baru</h2>
            <form action="add_product.php" method="POST" enctype="multipart/form-data">
                <label for="nama">Nama Produk:</label>
                <input type="text" name="nama" required>
                <label for="harga">Harga:</label>
                <input type="number" name="harga" required>
                <label for="deskripsi">Deskripsi:</label>
                <textarea name="deskripsi" required></textarea>
                <label for="stok">Stok:</label>
                <input type="number" name="stok" required>
                <label for="foto">Upload gambar:</label>
                <input type="file" name="foto" required>
                <div class="float-right">
                    <button type="submit">Tambah Produk</button>
                </div>
            </form>
        </div>
    </div>
    <footer>
        <p>Copyright @ <?php echo date("Y"); ?> Juniver Veronika Lili</p>
    </footer>
    <script src="assets/js/script.js"></script>
</body>

</html>