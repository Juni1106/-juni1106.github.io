<?php
require_once "koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = htmlspecialchars($_POST["email"]);
    $password = htmlspecialchars($_POST["password"]);

    if ($email && $password) {

        $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";

        $res = mysqli_query($conn, $sql);

        $cek = mysqli_fetch_assoc($res);

        if (count($cek)) {

            $_SESSION["login"] = $cek;
            header("location: index.php");
            die;
        } else {
            echo "<script>";
            echo "alert('Email Atau Password Salah!'); window.location='login.php'";
            echo "</script>";
        }
    } else {
        echo "<script>";
        echo "alert('Email Dan Password Tidak Boleh Kosong!'); window.location='login.php'";
        echo "</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
    <link rel="stylesheet" type="text/css" href="assets/css/login.css">
</head>

<body>
    <header>
        <!-- <h2 class="logo">Fabelio</h2>
        <nav class ="navigation">
            <a href="#">Home</a>
            <a href="#">About</a>
            <a href="#">Furniture</a>
            <a href="#">Contact</a> -->
        <!-- <button class= "btnLogin-popup">Login</button> -->
        </nav>
    </header>
    <div class="wrapper" style="height: inherit;">
        <span class="icon-close">
            <ion-icon name="close"></ion-icon>
        </span>
        <div class="from-box Login">
            <h2>Login</h2>
            <form action="#" method="POST">
                <div class="input-box">
                    <span class="icon">
                        <ion-icon name="mail"></ion-icon>
                    </span>
                    <input type="text" required name="email">
                    <label>Email</label>
                </div>
                <div class="input-box">
                    <span class="icon">
                        <ion-icon name="lock-closed"></ion-icon>
                    </span>
                    <input type="password" required name="password">
                    <label>Password</label>
                </div>
                <div class="remember-forgot">
                    <label><input type="checkbox">
                        Remember Me</label>
                    <a href="#">Forgot Password?</a>
                </div>
                <button type="submit" class="btn">Login</button>
                <div class="login-register">
                    <p>Don't have an account? <a href="register.php" class="login-link">Register</a></p>
                </div>
            </form>
        </div>
    </div>
    <script src="assets/js/script.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>