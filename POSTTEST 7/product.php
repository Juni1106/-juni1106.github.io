<?php
require_once "koneksi.php";

if (!isset($_SESSION["login"])) {
    header("location: login.php");
    die;
}

$sql = "SELECT * FROM produk";
$res = mysqli_query($conn, $sql);
if (!$res) {
    die("Kesalahan SQL: " . mysqli_error($conn));
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PRODUK</title>
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="assets/css/table.css">
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
        <h1>Daftar Produk</h1>

        <div class="float-left">
            <p><?php echo date('l, d F Y ') ?></p>
            <p><?php date_default_timezone_set('Asia/Makassar');
                echo date('h:i:sa')
                ?></p>
        </div>
        <div class="float-right">
            <a class="button" href="add_product.php">Tambah Produk</a>
        </div>
        <table border="1">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Harga</th>
                <th>Deskripsi</th>
                <th>Stok</th>
                <th>Foto</th>
                <th>Aksi</th>
            </tr>
            <?php
            if ($res->num_rows > 0) {
                $num = 1;
                // output data of each row
                while ($row = $res->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td style='text-align:center;'>" . $num . "</td>";
                    echo "<td>" . $row['nama'] . "</td>";
                    echo "<td>" . $row['harga'] . "</td>";
                    echo "<td>" . $row['deskripsi'] . "</td>";
                    echo "<td style='text-align:center;'>" . $row['stok'] . "</td>";
                    echo "<td style='text-align:center;'><img src='uploads/" . $row['foto'] . "' alt='" . $row['foto'] . "' height='100px'></td>";
                    echo "<td style='text-align:center;'><a class='button-edit' href='edit_product.php?id=" . $row['id'] . "'>Edit</a><a class='button-delete' href='delete_product.php?id=" . $row['id'] . "'>Hapus</a></td>";
                    echo "</tr>";
                    $num++;
                }
            } else {
                echo "<tr><td colspan=6 style='text-align: center'>Data Kosong</td></tr>";
            }
            ?>
        </table>
    </div>
    <footer>
        <p>Copyright @ <?php echo date("Y"); ?> Juniver Veronika Lili</p>
    </footer>
    <script src="assets/js/script.js"></script>
</body>

</html>