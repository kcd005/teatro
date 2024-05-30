<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Inserisci città</title>
        <link rel="stylesheet" href="style.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Caudex:ital,wght@0,400;0,700;1,400;1,700&family=MedievalSharp&display=swap" rel="stylesheet">
    </head>
    <body>
        <?php include "../sidebar.php"; ?>

        <div id="div">
            <h1>Inserisci una nuova città</h1>
            <form method="post" id="Form">
                <label for="citta">Nome città:</label><br><br>
                <input type="text" value="" name="citta" id="citta" required><br><br>
                <button type="submit" name="submit">Invia</button><br>
                <?php

                    require "../connessione.php";

                    if(isset($_POST['submit'])) 
                    {

                        $citta = $_POST['citta'];

                        $sql = "INSERT INTO citta (nomeCitta) VALUES ('$citta')";
                        $invio = $connessione->query($sql);

                        if($invio)
                        {
                            echo "<br><br><p>Citta inserita nel database con successo</p>";
                        }
                        else 
                        {
                            echo "<p>Errore nell'esecuzione della query: " . $connessione->error . "</p>";
                        }
                    
                        $connessione->close();
                    }
                ?>
            </form>             
        </div>
    </body>
</html>