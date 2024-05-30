<?php
session_start();

if (!isset($_SESSION['user_id'])) 
{
    header("Location: ../../login/accesso/accesso.php");
    exit();
}

require "../../amministrazione/connessione.php";

$user_id = $_SESSION['user_id'];

$query = "SELECT nome, cognome, username, email, regione FROM utenti WHERE ID_utente = ?";
$stmt = $connessione->prepare($query);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();


if ($result->num_rows > 0) 
{
    $user_data = $result->fetch_assoc();
} 
else 
{
    echo "Errore: utente non trovato.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sipario Incantato</title>
    <link href="https://fonts.googleapis.com/css2?family=Caudex:ital,wght@0,400;0,700;1,400;1,700&family=MedievalSharp&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <link rel="icon" type="image/x-icon" href="../../immagini/2logo1.png">
</head>
<body>
    <div id="div1">
        <a  href="javascript:history.go(-1)" onMouseOver="self.status=document.referrer;return true" id="torna" style="float: left;">&#129052; Torna Indietro</a>
        <img src="../../immagini/2logo.png" alt="logoSiparioIncantato" id="logo" style="float: right;">
        <h1><b>PROFILO</b></h1>
    </div>
    <div class="profilo"> 
        <main>
            <div class="infoProfilo">
                <div class="campoProfilo">
                    <p class="etichettaCampo">Nome:</p>
                    <p class="valoreCampo"><?php echo $user_data['nome'] ?></p>
                </div>
                <div class="campoProfilo">
                    <p class="etichettaCampo">Cognome:</p>
                    <p class="valoreCampo"><?php echo $user_data['cognome']; ?></p>
                </div>
                <div class="campoProfilo">
                    <p class="etichettaCampo">Username:</p>
                    <p class="valoreCampo"><?php echo $user_data['username']; ?></p>
                </div>
                <div class="campoProfilo">
                    <p class="etichettaCampo">Email:</p>
                    <p class="valoreCampo"><?php echo $user_data['email']; ?></p>
                </div>
                <div class="campoProfilo">
                    <p class="etichettaCampo">Regione:</p>
                    <p class="valoreCampo"><?php echo $user_data['regione']; ?></p>
                </div>    
            </div>
            <br><a href="../iniziale/index.php" class="anchor"><b>ESCI</b></a>
        </main>
    </div>
    <?php require "../footer.php";?>
</body>
</html>
