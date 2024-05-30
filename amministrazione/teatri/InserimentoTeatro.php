<!DOCTYPE html>
<html lang="en">
<!------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Inserisci teatri</title>
        <link rel="stylesheet" href="style.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Caudex:ital,wght@0,400;0,700;1,400;1,700&family=MedievalSharp&display=swap" rel="stylesheet">
    </head>
<!------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
    <body>
    <?php
        include "../sidebar.php";
        ?>
        <div id="divPrincipale">
            <h1>Inserisci un nuovo teatro</h1><br>

            <!-- FORM TEATRO --> 

            <form action="" method="post" id="Form">
                <label for="teatro">Seleziona la citta:</label><br><br>
                <select name="cittaSelect" id="cittaSelect" onfocus='this.size=1; this.style.padding=1;' onblur='this.size=1;' onchange='this.size=1; this.blur()'> 
                    <option value="" disabled selected hidden required></option>
                    <?php

                        require "../connessione.php";

                        $query = "SELECT * FROM citta ORDER BY nomeCitta";
                        $risultato = $connessione->query($query);

                        while($row = $risultato->fetch_assoc())
                        {
                            echo '<option value ="' . $row["ID_citta"] . '">' . $row["nomeCitta"] . '</option>';
                        }
                        
                    ?>
                </select><br><br>
                <label for="teatro">Nome teatro:</label><br><br>
                <input type="text"name="teatro" id="teatro" required><br><br>    
                <button type="submit" name="submit">Invia</button><br>
                <?php
                    
                    require "../connessione.php";
                    
                    if(isset($_POST['submit'])) 
                    {
                        $nome = $_POST["teatro"];
                        $citta = $_POST["cittaSelect"];

                        $sql = "INSERT INTO `teatri`(`nome`, `FK_citta`) VALUES ('$nome','$citta')";
                        $stmt = $connessione->prepare($sql);
                        
                        if($stmt->execute()) 
                        {
                            echo "<br><br><p style='font-size: 16px;'>Dati inseriti correttamente nel database.</p>";
                        } 
                        else 
                        {
                            echo "Si è verificato un errore durante l'inserimento dei dati nel database.";
                        }

                        $stmt->close();
                        $connessione->close();
                    }
                ?> 
            </form>
        </div>
    </body>
<!------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
</html>