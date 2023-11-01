<?php
require_once "koneksi.php";

if (!isset($_SESSION["login"])) {
    header("location: login.php");
    die;
}

$sql = "SELECT * FROM users ";

$res = mysqli_query($conn, $sql);


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users</title>
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="assets/css/table.css">
</head>

<body>
    <nav class="navigation">
        <h2 class="Logo">Fabelio</h2>
        </div>
        <div class="nav-items">
            <a href="index.php#Home" class="nav-link">Home</a>
            <a href="index.php#about" class="nav-link">About</a>
            <a href="index.php#products" class="nav-link">Furniture</a>
            <a href="product.php" class="nav-link">Product</a>
            <a href="user.php" class="nav-link active">Users</a>
            <a href="logout.php" class="nav-link">Logout</a>
            <a class="btn_darkmode">GANTI MODE</a>
        </div>
        </div>
    </nav>
    <div class="container">
        <h1>Daftar User</h1>
        <br>
        <table border="1">
            <tr>
                <th>Username</th>
                <th>Email</th>
                <th>Password</th>
            </tr>

            <?php foreach ($res as $item) : ?>
                <tr>
                    <td><?= $item["username"] ?></td>
                    <td><?= $item["email"] ?></td>
                    <td><?= $item["password"] ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
    <footer>
        <div class='info-container'></div>
        <p>Copyright @ <?php echo date("Y"); ?> Juniver Veronika Lili</p>
    </footer>
    <script src="assets/js/script.js"></script>
</body>

</html>