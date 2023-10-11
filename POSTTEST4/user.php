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
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <nav class="navigation">
        <h2 class="Logo">Fabelio</h2>
        </div>
        <div class="nav-items">
            <a href="#Home " class="nav-link">Home</a>
            <a href="#about" class="nav-link">About</a>
            <a href="#products" class="nav-link">Furniture</a>
            <a href="user.php" class="nav-link">Users</a>
            <a href="logout.php" class="nav-link">Logout</a>
            <a class="btn_darkmode">GANTI MODE</a>
        </div>
        </div>
    </nav>

    <style>
        .content {
            padding: 2rem;
            min-height: 500px;
        }

        .content h4 {
            text-align: center;
        }

        .content table {
            border-collapse: collapse;
            width: 70%;
            margin: 0 auto;
        }

        .content table td {
            padding: 7px;
            text-align: center;
        }
    </style>

    <div class="content">
        <h4>Daftar User</h4>

        <br>

        <table border="1">
            <tr>
                <td>Username</td>
                <td>Email</td>
                <td>Password</td>
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
        <p>Copyright @ <?php echo date("Y"); ?> 2023 Juniver Veronika Lili</p>
    </footer>
    <script src="script.js"></script>
</body>

</html>