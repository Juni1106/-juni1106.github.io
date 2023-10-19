<?php
require_once "koneksi.php";

if (!isset($_SESSION["login"])) {
    header("location: login.php");
    die;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOME</title>
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>

<body>
    <nav class="navigation">
        <h2 class="Logo">Fabelio</h2>
        </div>
        <div class="nav-items">
            <a href="#Home" class="nav-link active">Home</a>
            <a href="#about" class="nav-link">About</a>
            <a href="#products" class="nav-link">Furniture</a>
            <a href="product.php" class="nav-link">Product</a>
            <a href="user.php" class="nav-link">Users</a>
            <a href="logout.php" class="nav-link">Logout</a>
            <a class="btn_darkmode">GANTI MODE</a>
        </div>
        </div>
    </nav>
    <section id="home" class="hero">
        <img class="img-responsive" src="assets/img/bg3.jpg" alt="">
        <div class="hero-title">
            <h1>FURNITURE</h1>
            <p>Discover Quality Furniture for Your Home</p>
        </div>
    </section>
    <section id="about" class="about" style="background-color: #f8e4b0a5;">
        <img src="assets/img/SOFA SINGLE.jpg" alt="Foto saya">
        <div class="about-me ">
            <h1>About Me</h1>
            <table>
                <tr>
                    <td><p>Nama</p></td>
                    <td><p>: Juniver Veronika Lili</p></td>
                </tr>
                <tr>
                    <td><p>NIM</p></td>
                    <td><p>: 2209106013</p></td>
                </tr>
                <tr>
                    <td><p>TTL</p></td>
                    <td><p>: Gersik, 11 Juni 2004</p></td>
                </tr>
                <tr>
                    <td><p>Instagram</p></td>
                    <td><p>: @instagram_account</p></td>
                </tr>
                <tr>
                    <td><p>Email</p></td>
                    <td><p>: juniververonika11@gmail.com</p></td>
                </tr>
            </table>
        </div>
    </section>
    <section id="products" class="products">
        <h2>Featured Products</h2>
        <div class="product-row">
            <div class="product-item">
                <img class="img-responsive rounded" src="assets/img/Furniture 1.jpg" alt="Furniture 1">
                <h3>Appolo</h3>
                <p>Simple Modern Elegan</p>
            </div>
            <div class="product-item">
                <img class="img-responsive rounded" src="assets/img/FURNITURE 9.jpg" alt="Furniture 2">
                <h3>Modern Sofa</h3>
                <p>Comfortable and Stylish</p>
            </div>
            <div class="product-item">
                <img class="img-responsive rounded" src="assets/img/Kursi.jpg" alt="Furniture 3">
                <h3>Clasic Chair</h3>
                <p>Comfortable and Stylish</p>
            </div>
        </div>
    </section>
    <footer>
        <p>Copyright @ <?php echo date("Y"); ?> 2023 Juniver Veronika Lili</p>
    </footer>
    <script src="assets/js/script.js"></script>
</body>

</html>