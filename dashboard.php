<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Dashboard Tiket Liburan</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="container">
    <h2>Selamat datang, <?= htmlspecialchars($_SESSION['username']); ?> di Tiket Liburan ke Madrid!</h2>
    <ul class="nav-menu">
      <li><a href="order_ticket.php">Pesan Tiket</a></li>
      <li><a href="view_orders.php">Lihat Pemesanan</a></li>
      <li><a href="logout.php">Logout</a></li>
    </ul>
  </div>
</body>
</html>