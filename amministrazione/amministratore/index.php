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

    <?php
        include "./header2.php";
    ?>
        <form method="post">
            <label for="username">Username:</label>
            <input type="text" name="username1" id="username" required><br><br>
            <label for="password">Password:</label>
            <input type="text" name="password1" id="password" required><br><br>
            <button type="submit">Invia</button><br>
            <?php
                require "../../amministrazione/connessione.php";

                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    if (isset($_POST['username1']) && isset($_POST['password1'])) {
                        $username = $_POST['username1'];
                        $password = $_POST['password1'];

                        // Use prepared statements to prevent SQL injection
                        $query = "SELECT username, codice FROM utenti WHERE username = ?";
                        $stmt = $connessione->prepare($query);
                        $stmt->bind_param("s", $username);
                        $stmt->execute();
                        $result = $stmt->get_result();

                        if ($result->num_rows > 0) 
                        {
                            $row = $result->fetch_assoc();
                            $password_hash = $row['codice'];
                            echo "Hashed Password from Database: $password_hash <br>";

                            // Before comparing passwords
                            echo "Hashed Password Input by User: " . password_hash($password, PASSWORD_DEFAULT) . "<br>";

                            // Compare the user's input directly with the hashed password from the database
                            if (password_verify($password, $password_hash)) {
                                // Password is correct
                                header("Location: ../../amministrazione/benvenuto/benvenuto.php");
                                exit();
                            } else {
                                // Password is incorrect
                                echo "Password incorrect.";
                            }

                        } else {
                            echo "User not found.";
                        }
                    }
                }
            ?>


        </form>
    </body>
    <footer>
        <a href="../registrazione/registrazione.php">Clicca qui per effettuare la registrazione!</a>
        <p>Copyright © 2024 - SiparioIncantato.com</p>
    </footer>
</html>
