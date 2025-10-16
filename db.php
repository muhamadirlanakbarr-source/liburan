<?php
$conn = mysqli_connect("localhost", "root", "", "tiket_madrid");

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>