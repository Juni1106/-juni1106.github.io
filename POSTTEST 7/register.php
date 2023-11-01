<?php
require_once "koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = htmlspecialchars($_POST["username"]);
    $email = htmlspecialchars($_POST["email"]);
    $password = htmlspecialchars($_POST["password"]);

    if ($username && $email && $password) {

        $sql = "INSERT INTO users (username, email, password) VALUES('$username', '$email', '$password')";

        mysqli_query($conn, $sql);

        echo "<script>";
        echo "alert('Registrasi Berhasil, Silahkan Login!')";
        echo "</script>";
    } else {
        echo "<script>";
        echo "alert('Lengakpi Form!')";
        echo "</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
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
            <h2>Register</h2>
            <form action="" method="POST">
                <div class="input-box">
                    <span class="icon">
                        <ion-icon name="person"></ion-icon>
                    </span>
                    <input type="text" name="username" required>
                    <label>Username</label>
                </div>
                <div class="input-box">
                    <span class="icon">
                        <ion-icon name="mail"></ion-icon>
                    </span>
                    <input type="email" name="email" required>
                    <label>Email</label>
                </div>
                <div class="input-box">
                    <span class="icon">
                        <ion-icon name="lock-closed"></ion-icon>
                    </span>
                    <input type="password" required name="password">
                    <label>Password</label>
                </div>

                <button type="submit" class="btn">Register</button>

                <div class="login-register">
                    <p>Already have an account?
                        <a href="login.php" class="login-link">
                            Login</a>
                    </p>
                </div>
            </form>
        </div>
    </div>
    <script src="scriptjs.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>