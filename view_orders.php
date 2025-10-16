<?php
session_start();
include 'db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$user_id = $_SESSION['user_id'];
$query = mysqli_query($conn, "SELECT o.*, d.name as destination_name FROM orders o JOIN destinations d ON o.destination_id = d.id WHERE o.user_id = $user_id");
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Riwayat Pemesanan</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="container">
    <h2>Riwayat Pemesanan Tiket</h2>
    <table>
      <thead>
        <tr>
          <th>Destinasi</th>
          <th>Tanggal</th>
          <th>Jumlah Tiket</th>
          <th>Total Harga</th>
        </tr>
      </thead>
      <tbody>
        <?php while ($row = mysqli_fetch_assoc($query)) { ?>
        <tr>
          <td><?= $row['destination_name']; ?></td>
          <td><?= $row['departure_date']; ?></td>
          <td><?= $row['ticket_count']; ?></td>
          <td>Rp <?= number_format($row['total_price']); ?></td>
        </tr>
        <?php } ?>
      </tbody>
    </table>
    <br>
    <a href="dashboard.php">← Kembali ke Dashboard</a>
  </div>
</body>
</html>