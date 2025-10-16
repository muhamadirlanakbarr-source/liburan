<?php
session_start();
include 'db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$success_message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $destination_id = $_POST['destination'];
    $date = $_POST['date'];
    $ticket_count = $_POST['count'];
    $user_id = $_SESSION['user_id'];

    $dest = mysqli_fetch_assoc(mysqli_query($conn, "SELECT price FROM destinations WHERE id=$destination_id"));
    $total_price = $ticket_count * $dest['price'];

    mysqli_query($conn, "INSERT INTO orders (user_id, destination_id, departure_date, ticket_count, total_price)
                         VALUES ($user_id, $destination_id, '$date', $ticket_count, $total_price)");

    $success_message = "Tiket berhasil dipesan!";
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Pesan Tiket</title>  
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="container">
    <h2>Pesan Tiket Wisata Madrid</h2>

    <?php if ($success_message): ?>
      <div class="success"><?= $success_message; ?></div>
    <?php endif; ?>

    <form method="POST">
      <label>Destinasi:</label>
      <select name="destination" required>
        <?php
        $result = mysqli_query($conn, "SELECT * FROM destinations");
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<option value='{$row['id']}'>{$row['name']}</option>";
        }
        ?>
      </select>

      <label>Tanggal Berangkat:</label>
      <input type="date" name="date" required>

      <label>Jumlah Tiket:</label>
      <input type="number" name="count" min="1" required>

      <button type="submit">Pesan Tiket</button>
    </form>

    <br>
    <a href="dashboard.php">← Kembali ke Dashboard</a>
  </div>
</body>
</html>