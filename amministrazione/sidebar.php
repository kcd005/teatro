<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <style>
            .sidebar 
            {
                height: 120%;
                width: 250px;
                position: fixed;
                top: -20px;
                left: 0;
                background-color: #1c1c1c;
                box-shadow: 0 2px 5px rgba(0, 0, 0, 0.5);
                font-weight: bold;
            }

            .sidebar h2
            {
                color: #fff;
                margin-top: 20px;
            }

            .sidebar h2
            {
         
                margin-bottom: 20px;
            }

            .sidebar h2
            {
                padding-top: 20px;
                padding-left: 10px;
                padding-bottom: 40px;
            }

            h2
            {
                padding-top: 10px;
                padding-bottom: 10px;
            }

            .sidebar ul 
            {
                list-style-type: none;
                margin-left: 15px;
                margin-right: 30px;
                border-left: 2px solid #151515;
                border-radius: 1px;
            }

            .sidebar ul li a 
            {
                color: #fff;
                text-decoration: none;
                padding: 5px 0;
                border-radius: 10px;
                display: block;
                transition: text-shadow 0.3s ease ;
            }

            .sidebar ul li a:hover 
            {
                text-shadow: 0 0 15px rgba(212, 175, 55, 1);
            }

            img
            {
                width: 120px;
                height: 120px;
                margin-top: 30px;
                background-color: #81a57b;
                margin-left: 69px;
                margin-bottom: -15px;
            }

            .menu
            {
                background-color: #1c1c1c;
                padding-bottom: 30px;
                padding-top: 10px;
                margin-left: -10px;
            }

        </style>
    </head>
    <body>
        <div class="sidebar">
            <div class="menu">
                <a href="../benvenuto/benvenuto.php"><img src="../../immagini/2logo.png" alt="logoSiparioIncantato" id="logo"></a>
            </div>
            <h2>Inserisci:</h2>
            <ul>
                <li><a href="../citta/InserimentoCitta.php">Citta</a></li><br>
                <li><a href="../teatri/InserimentoTeatro.php">Teatro</a></li><br>
                <li><a href="../spettacoli/InserimentoSpettacolo.php">Spettacolo</a></li><br>
                <li><a href="../eventi/InserimentoEvento.php">Evento</a></li><br><br>
                <li><a href="../../utente/iniziale/index.php">Esci</a></li>
            </ul>
        </div>
    </body>
</html>