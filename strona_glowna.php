<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: logowanie.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Strona Główna</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Witaj, <?php echo htmlspecialchars($_SESSION['login']); ?>!</h1>
        <p>Zalogowano pomyślnie.</p>
        <a href="wyloguj.php">Wyloguj się</a>
    </div>
</body>
</html>
