<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Rejestracja</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Rejestracja</h2>
        <form action="process_register.php" method="POST">
            <input type="text" name="login" placeholder="Login" required>
            <input type="password" name="haslo" placeholder="Hasło" required>
            <button type="submit">Zarejestruj się</button>

            <?php
                if (isset($_GET['error'])) {
                    echo "<p class='error'>" . htmlspecialchars($_GET['error']) . "</p>";
                }
                if (isset($_GET['success'])) {
                    echo "<p class='success'>" . htmlspecialchars($_GET['success']) . "</p>";
                }
            ?>
        </form>
        <p>Masz już konto? <a href="logowanie.php">Zaloguj się</a></p>
    </div>
</body>
</html>
