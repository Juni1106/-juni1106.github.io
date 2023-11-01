<?php
require_once "koneksi.php";

if (!isset($_SESSION["login"])) {
    header("location: login.php");
    die;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $id = htmlspecialchars($_POST["id"]);
    $nama = htmlspecialchars($_POST["nama"]);
    $harga = htmlspecialchars($_POST["harga"]);
    $deskripsi = htmlspecialchars($_POST["deskripsi"]);
    $stok = htmlspecialchars($_POST["stok"]);

    if ($nama && $harga && $deskripsi && $stok) {
        // Check if a file was uploaded
        if (isset($_FILES["foto"]) && !empty($_FILES["foto"]["name"])) {
            $file = $_FILES["foto"];
            $file_name = $file["name"];
            $file_tmp_name = $file["tmp_name"];

            // Define the directory where you want to save the uploaded file
            $upload_directory = "uploads/";
            $target_file = $upload_directory . basename($file_name);

            // Remove the old image if it exists
            $sql = "SELECT foto FROM produk WHERE id=" . $id;
            $res = mysqli_query($conn, $sql);
            $produk = $res->fetch_assoc();
            $old_image = $produk['foto'];
            if ($old_image && file_exists($upload_directory . $old_image)) {
                unlink($upload_directory . $old_image);
            }

            // Move the uploaded file to the desired directory
            if (move_uploaded_file($file_tmp_name, $target_file)) {
                // File upload was successful
                $sql = "UPDATE produk SET nama='$nama', harga='$harga', deskripsi='$deskripsi', stok='$stok', foto='$file_name' WHERE id='$id'";
                mysqli_query($conn, $sql);
            } else {
                echo "<script>";
                echo "alert('File upload failed!'); window.location='edit_product.php?id=$id';";
                echo "</script>";
            }
        }
        else {
            $sql = "UPDATE produk SET nama='$nama', harga='$harga', deskripsi='$deskripsi', stok='$stok' WHERE id='$id'";
            mysqli_query($conn, $sql);
        }
        echo "<script>";
        echo "alert('Edit data berhasil!'); window.location='product.php';";
        echo "</script>";
    } else {
        echo "<script>";
        echo "alert('Edit data gagal!'); window.location='product.php';";
        echo "</script>";
    }
}


if (isset($_GET["id"])) {

    $id = $_GET["id"];

    $sql = "SELECT * FROM produk WHERE id=" . $id;
    $res = mysqli_query($conn, $sql);
    $produk = $res->fetch_assoc();
} else {
    echo "<script>";
    echo "alert('Invalid Request!'); window.location='product.php';";
    echo "</script>";
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Produk</title>
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
            <h2>Edit Produk</h2>
            <form action="edit_product.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?= $produk['id'] ?>">
                <label for="nama">Nama Produk:</label>
                <input type="text" name="nama" value="<?= $produk['nama'] ?>" required>
                <label for="harga">Harga:</label>
                <input type="number" name="harga" value="<?= $produk['harga'] ?>" required>
                <label for="deskripsi">Deskripsi:</label>
                <textarea name="deskripsi" required><?= $produk['deskripsi'] ?></textarea>
                <label for="stok">Stok:</label>
                <input type="number" name="stok" value="<?= $produk['stok'] ?>" required>
                <br><br>
                <p>Gambar :</p>
                <?=(strlen($produk['foto']) == 0) ? "belum ditambahkan" : "<img src='uploads/" . $produk['foto']. "' alt='" . $produk['foto'] . "' height='100px'>"?>
                <label for="foto">Upload Gambar Baru :</label>
                <input type="file" name="foto">
                <div class="float-right">
                    <button type="submit">Ubah Data</button>
                </div>
            </form>
        </div>
    </div>
    <footer>
        <p>Copyright @ <?php echo date("Y"); ?> 2023 Juniver Veronika Lili</p>
    </footer>
    <script src="assets/js/script.js"></script>
</body>

</html>