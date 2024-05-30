<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accesso</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Caudex:ital,wght@0,400;0,700;1,400;1,700&family=MedievalSharp&display=swap" rel="stylesheet">
</head>
<body>
    <?php include "../header.php"; ?>

    <form method="post">
        <h2 for="username">Username:</h2>
        <input type="text" name="username1" id="username" required><br><br>
        <h2 for="password">Password:</h2>
        <input type="password" name="password1" id="password" required><br><br><br><br>
        <button type="submit">Invia</button><br>
    </form>

    <?php
    require "../../amministrazione/connessione.php";
    session_start();

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST['username1']) && isset($_POST['password1'])) {
            $username = $_POST['username1'];
            $password = $_POST['password1'];

            // Verifica per amministratori
            $queryA = "SELECT ID_amministratore, username, password FROM amministratori WHERE username = ?";
            $stmtA = $connessione->prepare($queryA);
            $stmtA->bind_param("s", $username);
            $stmtA->execute();
            $risultatoA = $stmtA->get_result();

            // Verifica per utenti
            $queryU = "SELECT ID_utente, username, password FROM utenti WHERE username = ?";
            $stmtU = $connessione->prepare($queryU);
            $stmtU->bind_param("s", $username);
            $stmtU->execute();
            $risultatoU = $stmtU->get_result();

            if ($risultatoA->num_rows > 0) {
                $row = $risultatoA->fetch_assoc();
                if (password_verify($password, $row['password'])) {
                    $_SESSION['user_id'] = $row['ID_amministratore'];
                    header("Location: ../../amministrazione/benvenuto/benvenuto.php");
                    exit();
                } else {
                    echo "<br><br>Password errata!";
                }
            } elseif ($risultatoU->num_rows > 0) {
                $row = $risultatoU->fetch_assoc();
                if (password_verify($password, $row['password'])) {
                    $_SESSION['user_id'] = $row['ID_utente'];
                    header("Location: ../../utente/principale/index.php");
                    exit();
                } else {
                    echo "<br><br><p style='text-align: center;'>Password errata!</p>";
                }
            } else {
                echo "<p style='text-align: center'>Utente o password errato/a, riprova.</p>";
            }
        }
    }
    ?>
</body>
<footer>
    <a href="../registrazione/registrazione.php">Clicca qui per effettuare la registrazione!</a>
    <p style="margin-left:6px;">Copyright © 2024 - SiparioIncantato.com</p>
</footer>
</html>
