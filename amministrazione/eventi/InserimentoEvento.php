<?php
include "../sidebar.php";
?> 
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Inserisci evento</title>
        <link rel="stylesheet" href="style.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Caudex:ital,wght@0,400;0,700;1,400;1,700&family=MedievalSharp&display=swap" rel="stylesheet">
    </head>
    <body>
        <h1>Programma il nuovo evento</h1>
        <div id="DivPrincipale">
            <br><br>
            <div id="divCitta">
                <!--  PRIMO FORM -->
                <form action="" method="post" id="cityForm">
                    <label for="citta" id="labelCitta">Seleziona la città:</label>
                    <select name="SelectCitta" id="SelectCitta" required>
                        <option value="" disabled selected hidden ></option>
                        <?php
                            require "../connessione.php";

                            $selectedCitta = (isset($_POST['SelectCitta'])) ? $_POST['SelectCitta'] : "";
                            $queryCitta = "SELECT * FROM citta";
                            $risultatoCitta = $connessione->query($queryCitta);

                            while($row = $risultatoCitta->fetch_assoc()) 
                            {
                                $selected = ($row['ID_citta'] == $selectedCitta) ? "selected" : "";
                                echo '<option value="' . $row["ID_citta"] . '" ' . $selected . '>' . $row["nomeCitta"] . '</option>';
                            } 
                            $connessione->close();
                        ?>
                    </select><br>
                </form>
                <script>
                    document.getElementById('SelectCitta').addEventListener('change', function() {
                        document.getElementById('cityForm').submit();
                    });
                </script>
            </div><br>

           <!-- SECONDO FORM -->
            <form method="post">
                <input type="hidden" name="SelectedCity" value="<?php echo isset($_POST['SelectCitta']) ? $_POST['SelectCitta'] : ''; ?>">
                <div id="divTeatro"> 
                    <!-- SELECT TEATRO -->
                    <label for="teatro">Seleziona il teatro:</label>
                    <select name="SelectTeatro" id="SelectTeatro" required>
                        <option value="" disabled selected hidden></option>
                        <?php 
                            require "../connessione.php";

                            if(isset($_POST["SelectCitta"]) && !empty($_POST["SelectCitta"])) 
                            {
                                $cittaInserita = $_POST["SelectCitta"];
                                $queryTeatro = "SELECT * FROM teatri WHERE FK_citta = ?";
                                $stmt = $connessione->prepare($queryTeatro);
                                $stmt->bind_param("i", $cittaInserita);
                                $stmt->execute();
                                $risultatoTeatro = $stmt->get_result();

                                if($risultatoTeatro->num_rows > 0) 
                                {
                                    while($row = $risultatoTeatro->fetch_assoc()) 
                                    {
                                        echo '<option value ="' . $row["ID_teatro"] . '">' . $row["nome"] . ' </option>';
                                    }  
                                } 
                                else 
                                {
                                    echo "<option disabled selected value>Nessun teatro trovato</option>";
                                }
                                $stmt->close();
                            }
                        ?>
                    </select>
                </div><br>

                <!-- SELECT SPETTACOLO -->
                <div id="divSpettacolo">
                    <label for="spettacolo">Seleziona lo spettacolo:</label>
                    <select name="SelectSpettacolo" id="SelectSpettacolo" required>
                        <option value="" disabled selected hidden></option>
                        <?php
                            require "../connessione.php";

                            $querySpettacolo = "SELECT * FROM spettacoli";
                            $risultatoSpettacolo = $connessione->query($querySpettacolo);

                            while($row = $risultatoSpettacolo->fetch_assoc()) 
                            {
                                echo '<option value="' . $row["ID_spettacolo"] . '">' . $row["titolo"] . ' </option>';
                            }
                        ?>
                    </select>
                </div><br>

                <!-- INSERIMENTO DATA -->
                <div id="divData">
                    <label for="data">Scegli la data:</label>
                    <input type="date" name="DataInserita" min="<?php echo date("Y-m-d");?>" required>
                </div><br><br>

                <!-- TASTO INVIO -->
                <button type="submit" name="submit" id="PulsanteInvio">Invia</button><br>          
                <?php

                require "../connessione.php";

                if(isset($_POST['submit'])) 
                {
                    $spettacolo = $_POST["SelectSpettacolo"];
                    $data = $_POST["DataInserita"];
                    $teatro = $_POST["SelectTeatro"];

                    $sql = "INSERT INTO `eventi`(`spettacolo`, `teatro`, `data` ) VALUES (?, ?, ?)";
                    $stmt = $connessione->prepare($sql);
                    $stmt->bind_param("iss", $spettacolo, $teatro, $data);
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
</html>