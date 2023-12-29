<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "poliklinik";

$conn = new mysqli($servername, $username, $password, $dbname);



if ($conn->connect_error) {
  die("Koneksi gagal: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Dapatkan nilai yang dimasukkan oleh pengguna
    $username = $_POST["username"];
    $password = $_POST["password"];
    $konfirmasi_password = $_POST["konfirmasi_password"];
    $email = $_POST["email"];

  $sql = "INSERT INTO user (username, password, email) VALUES ('$username', '$password', '$email')";
  $result = $conn->query($sql);
    // Periksa apakah password dan konfirmasi password sesuai
    if ($password === $konfirmasi_password) {

        header("Location: login.php");
        exit();
    } else {
        echo "Konfirmasi password tidak cocok. Silakan coba lagi.";
    }
}
?>
