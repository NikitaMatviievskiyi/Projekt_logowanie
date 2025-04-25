<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Logowanie</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Logowanie</h2>
        <form action="process_login.php" method="POST">
            <input type="text" name="login" placeholder="Login" required>
            <input type="password" name="haslo" placeholder="Hasło" required>
            <button type="submit">Zaloguj się</button>

            <?php
                if (isset($_GET['error'])) {
                    echo "<p class='error'>" . htmlspecialchars($_GET['error']) . "</p>";
                }
            ?>
        </form>
        <p>Nie masz konta? <a href="rejestracja.php">Zarejestruj się</a></p>
    </div>
</body>
</html>
