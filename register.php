<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $check = mysqli_query($conn, "SELECT * FROM users WHERE username='$username'");
    if (mysqli_num_rows($check) > 0) {
        $error = "Username sudah digunakan!";
    } else {
        mysqli_query($conn, "INSERT INTO users (username, password) VALUES ('$username', '$password')");
        $success = "Registrasi berhasil! <a href='login.php'>Login sekarang</a>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Daftar - Tiket Madrid</title>
    <link rel="stylesheet" href="lores.css">
</head>
<body>

<form method="POST">
    <h2>Daftar Akun</h2>
    <input type="text" name="username" placeholder="Username" required />
    <input type="password" name="password" placeholder="Password" required />
    <button type="submit">Daftar</button>
    <a href="login.php">Sudah punya akun? Login</a>
</form>

</body>
</html>