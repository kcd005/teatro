<!DOCTYPE html>
<html lang="en">
   <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Inserisci Spettacoli</title>
        <link rel="stylesheet" href="style.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Caudex:ital,wght@0,400;0,700;1,400;1,700&family=MedievalSharp&display=swap" rel="stylesheet">
    </head>
    <body>
        <?php
            include "../sidebar.php";
        ?>
        <div id="div">
            <h1>Inserisci un nuovo spettacolo</h1><br>

            <!-- FORM TEATRO --> 

            <form action="" method="post" id="Form">
                
                <label for="spettacolo">Nome spettacolo:</label><br><br>
                <input type="text" name="spettacolo" id="spettacolo" required><br><br>

                <label for="prezzo">Prezzo:</label><br><br>
                <input type="number" id="prezzo" name="prezzo" min="5" max="20" required/><br><br>

                <label for="prezzo">Genere:</label><br><br>
                <select name="genere" id="genereSelect" onfocus='this.size=1; this.style.padding=1;' onblur='this.size=1;' onchange='this.size=1; this.blur()'> 
                    <option value="" disabled selected hidden required></option>
                    <?php
                        require "../connessione.php";

                        $query = "SELECT ID_genere, tipo FROM generi ORDER BY tipo";
                        $risultato = $connessione->query($query);

                        while($row = $risultato->fetch_assoc())
                        {
                            echo '<option value ="' . $row["ID_genere"] . '">' . $row["tipo"] . '</option>';
                        }
                        
                    ?>
                </select><br><br>
                
                <button type="submit" name="submit">Invia</button><br>
                <?php
                    
                    require "../connessione.php";
                    
                    if(isset($_POST['submit'])) 
                    {
                        $spettacolo = $_POST["spettacolo"];
                        $prezzo = $_POST["prezzo"];
                        $genere = $_POST["genere"];

                        $sql = "INSERT INTO `spettacoli`(`titolo`, `prezzo`,`genere` ) VALUES ('$spettacolo','$prezzo', '$genere')";
                        $query = $connessione->query($sql);
                        
                        if($query) 
                        {
                            echo "<br><br><p style='font-size: 16px;'>Dati inseriti correttamente nel database.</p>";
                        } 
                        else 
                        {
                            echo "Si è verificato un errore durante l'inserimento dei dati nel database.";
                        }

                        $connessione->close();
                    }
                ?>
            </form>
        </div>
    </body>
</html>