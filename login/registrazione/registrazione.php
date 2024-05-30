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
        <form id="form" method="post">
            <div>
                <h2>Nome:</h2>
                <input type="text" name="nome" id="nome" required>
            </div>
            <div>
                <h2>Cognome:</h2>
                <input type="text" name="cognome" id="cognome" required>
            </div>
            <div>
                <h2>Username:</h2>
                <input type="text" name="username" id="username" required>
            </div>
            <div id="passwordDiv">
                <h2>Password:</h2>
                <input type="password" name="password" id="password" required>
            </div>
            <div>
                <h2>Email:</h2>
                <input type="email" name="email" id="email" required>
            </div>
            <div>
                <h2>Regione:</h2>
                <Select name="regione" id="regione">
                    <option value="" disabled selected hidden>Seleziona la tua regione</option>
                    <option value="Abruzzo">Abruzzo</option>
                    <option value="Basilicata">Basilicata</option>
                    <option value="Calabria">Calabria</option>
                    <option value="Campania">Campania</option>
                    <option value="Emilia-Romagna">Emilia-Romagna</option>
                    <option value="Friuli Venezia Giulia">Friuli Venezia Giulia</option>
                    <option value="Lazio">Lazio</option>
                    <option value="Liguria">Liguria</option>
                    <option value="Lombardia">Lombardia</option>
                    <option value="Marche">Marche</option>
                    <option value="Molise">Molise</option>
                    <option value="Piemonte">Piemonte</option>
                    <option value="Puglia">Puglia</option>
                    <option value="Sardegna">Sardegna</option>
                    <option value="Sicilia">Sicilia</option>
                    <option value="Toscana">Toscana</option>
                    <option value="Trentino-Alto Adige">Trentino-Alto Adige</option>
                    <option value="Umbria">Umbria</option>
                    <option value="Valle d'Aosta">Valle d'Aosta</option>
                    <option value="Veneto">Veneto</option>
                </Select>
            </div><br><br>

            <button type="submit" id="invia" >Invia</button><br><br><br>
        </form> 
        <?php
            session_start();

            $_SESSION['error'] = '';

            if ($_SERVER['REQUEST_METHOD'] == 'POST') 
            {
                $nome = $_POST['nome'];
                $cognome = $_POST['cognome'];
                $username = $_POST['username'];
                $password = $_POST['password'];
                $passwordCriptata = password_hash($password, PASSWORD_DEFAULT);
                $email = $_POST['email'];
                $regione = $_POST['regione'];

                if (!empty($nome)  && !empty($cognome) && !empty($username) && !empty($username) && !empty($email) && !empty($regione)) 
                {
                    require "../../amministrazione/connessione.php";
                
                    $query = "INSERT INTO `utenti`(`Nome`, `Cognome`, `username`, `email`, `regione`, `password`) VALUES ('$nome','$cognome','$username','$email','$regione','$passwordCriptata')";
                    $risultato = $connessione->query($query);
                
                    if (!$risultato) 
                    {
                        echo "Errore nella query: " . $connessione->error;
                    } 
                    else 
                    {
                        $_SESSION['success'] = true; 
                    }
                }
            }
            if (isset($_SESSION['success']) && $_SESSION['success'] == true) 
            {
                echo "<script>document.getElementById('form').style.display = 'none';</script>";
                echo "<p style='margin-top: 200px; margin-left: 536px; font-size: 30px'>Registrazione avvenuta con successo!</p><br><p style='margin-top: 20px; margin-left: 770px; font-size: 30px'>&#129155;</p>";
                unset($_SESSION['success']);
            }
        ?>
    </body> 
    <footer>
        <a href="../accesso/accesso.php">Clicca qui per effettuare l'accesso!</a>
        <p style="margin-left:37px;">Copyright © 2024 - SiparioIncantato.com</p>
    </footer>
</html>
