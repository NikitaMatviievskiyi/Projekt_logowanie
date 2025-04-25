<?php
session_start();

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
$stmt->bind_param("s", $login);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 1) {
    $user = $result->fetch_assoc();
    if (password_verify($haslo, $user['haslo'])) {
        $_SESSION['login'] = $user['login'];
        header("Location: strona_glowna.php");
        exit();
    } else {
        header("Location: logowanie.php?error=Nieprawidłowe hasło");
        exit();
    }
} else {
    header("Location: logowanie.php?error=Użytkownik nie istnieje");
    exit();
}
?>
