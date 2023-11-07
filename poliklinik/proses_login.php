<?php
// Koneksi ke database polda
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "poliklinik";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Koneksi gagal: " . $conn->connect_error);
}
// Memproses data login
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $_POST["username"];
  $password = $_POST["password"];

  // Mengecek username dan password pada tabel user
  $sql = "SELECT * FROM user WHERE username='$username' AND password='$password'";
  $result = $conn->query($sql);

  if ($result->num_rows == 1) {
    // Login berhasil
    header("Location: index.php");
    exit();
  } else {
    // Login gagal
    echo "Username atau password salah.";
  }
}

$conn->close();
?>
