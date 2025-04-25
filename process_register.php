<?php
$host = 'localhost';
$dbname = 'projekt_logowanie';
$user = 'root';
$password = '';

$conn = new mysqli($host, $user, $password, $dbname);
if ($conn->connect_error) {
    die("Błąd połączenia: " . $conn->connect_error);
}

$login = $_POST['login'];
$haslo = $_POST['haslo'];

$sql = "SELECT * FROM uzytkownicy WHERE login = ?";
$stmt = $conn->prepare($sql);
if (!$stmt) {
    die("Błąd przygotowania zapytania: " . $conn->error);
}
$stmt->bind_param("s", $login);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    header("Location: rejestracja.php?error=Login jest już zajęty.");
    exit();
}

$hashed_password = password_hash($haslo, PASSWORD_DEFAULT);

$sql = "INSERT INTO uzytkownicy (login, haslo) VALUES (?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $login, $hashed_password);

if ($stmt->execute()) {
    header("Location: rejestracja.php?success=Rejestracja zakończona sukcesem!");
} else {
    header("Location: rejestracja.php?error=Błąd rejestracji.");
}
?>
