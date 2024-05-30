<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        
        * 
        {
            margin: 0;
            padding: 0;
            font-family: "Caudex", serif;
        }

        #menu 
        {
            background-color: #1c1c1c;
            padding-top: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.5);
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding-left: 20px;
            padding-right: 20px;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 1000;
            width: 100%;
        }

        #scelta 
        {        
            position: relative;
            display: inline-block;    
            font-size: 20px;
            margin-left: 120px;
            padding-left: 30px;
            
        }

        #scelta button 
        {        
            font-size: 20px;
            text-decoration: none;
            color: mintcream;
            font-weight: bold;
            position: relative;
            background-color: transparent;
            border: none;
            padding-top: 30px;
        }

        #scelta button::after 
        {
            margin-bottom: 25px;
            content: '';
            position: absolute;
            width: 100%;
            height: 2px;
            background-color: white;
            bottom: 0;
            left: 0;
            transition: transform 300ms, background-color 300ms 300ms;
            transform: scaleX(0);
            transform-origin: left center;
        }

        #scelta button:hover::after 
        {
            background-color: red;
            transform: scaleX(0.99);
            transition: transform 300ms, background-color 0ms; 
        }
        button {
            font-size: 20px;
            text-decoration: none;
            color: mintcream;
            font-weight: bold;

        }

        button:hover::after {
            background-color: red;
        }

        .link {
            margin-top: 10px;
            cursor:pointer;
            transition-duration: 300ms;
            margin-right: 40px;
        }

        #logo 
        {
            width: 120px;
            height: auto;
        }

        #accesso 
        {
            margin-right: 90px;
            font-size: 18px;
            width: 200px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        a
        {
            text-decoration: none;
        }

        .dropdown-content 
        {
            display: none;
            position: absolute;
            background-color: #f1f1f1;
            min-width: 130px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.5);
            z-index: 1;
            transition-duration: 300ms;
            max-height: 200px;
            overflow-y: auto;
            border: black solid 2px;
            border-radius: 5px;
        }

        .dropdown-content a 
        {
            color: black;
            padding: 7px 0px;
            text-decoration: none;
            display: block;
        }

        .spazio
        {
            padding-top: 40px;
        }

        #link1:hover .sp {display: block; min-width: 200px; margin-left: 7px; font-size: 17px;}
        #link1:hover .sp a:hover{color: #a12928; text-shadow: 0 0 2px #c22e2e;}
        #link2:hover .gn {display: block; min-width: 200px; margin-left: -60px; font-size: 17px}
        #link2:hover .gn a:hover{color: #a12928; text-shadow: 0 0 2px #c22e2e;}
        #link3:hover .ct {display: block; min-width: 200px; margin-left: -15px; font-size: 17px}
        #link3:hover .ct a:hover{color: #a12928; text-shadow: 0 0 2px #c22e2e;}
        #link4:hover .tr {display: block; min-width: 200px; margin-left: -65px; font-size: 17px}
        #link4:hover .tr a:hover{color: #a12928; text-shadow: 0 0 2px #c22e2e;}
                    
    </style>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <script src="https://kit.fontawesome.com/c72d8fc73a.js" crossorigin="anonymous"></script>
</head>
<body>
    <div id="menu">
        <a href="../principale/index.php"><img src="../../immagini/2logo.png" alt="logoSiparioIncantato" id="logo"></a>
        <div id="scelta">
            <button href="../spettacoli in scena/spettacoli.php"  id="link1" class="link dropbtn">SPETTACOLI IN SCENA</a>
            <div class="spazio">
                <div class="dropdown-content sp">
                    <?php 
                        require "../../amministrazione/connessione.php";

                        $query = "SELECT titolo FROM spettacoli";
                        $risultato =$connessione->query($query);

                        echo '<a href="" style="margin-bottom: 5px">Tutti gli spettacoli</a> ';
                        while($row = $risultato->fetch_assoc())
                        {
                            echo "<a href=''>" . $row["titolo"] . "</a>";
                        }
                    ?>
                </div>
            </div>
            <button href="../genere/genere.php"  id="link2" class="link dropbtn">GENERI</a>
            <div class="spazio">
                <div class="dropdown-content gn">
                    <?php 
                        require "../../amministrazione/connessione.php";

                        $query = "SELECT tipo FROM generi";
                        $risultato =$connessione->query($query);

                        while($row = $risultato->fetch_assoc())
                        {
                            echo "<a href=''>" . $row["tipo"] . "</a>";
                        }
                    ?>
                </div>
            </div>
            <button href="../citta/citta.php"  id="link3" class="link dropbtn">SCEGLI LA CITTA</a>
            <div class="spazio">
                <div class="dropdown-content ct">
                    <?php 
                        require "../../amministrazione/connessione.php";

                        $query = "SELECT nomeCitta FROM citta";
                        $risultato =$connessione->query($query);

                        while($row = $risultato->fetch_assoc())
                        {
                            echo "<a href=''>" . $row["nomeCitta"] . "</a>";
                        }
                    ?>
                </div>
            </div>
            <button href="../teatro/teatro.php"  id="link4" class="link dropbtn">TEATRI</a>
            <div class="spazio">
                <div class="dropdown-content tr">
                    <?php 
                        require "../../amministrazione/connessione.php";

                        $query = "SELECT nome FROM teatri";
                        $risultato =$connessione->query($query);

                        while($row = $risultato->fetch_assoc())
                        {
                            echo "<a href=''>" . $row["nome"] . "</a>";
                        }
                    ?>
                </div>
            </div>
        </div>
        <div id="accesso">
            <a href="../profilo/profilo.php"> <i style='font-size:20px' class='fas'>&#xf406;</i> PROFILO</a>
        </div>
    </div>        
</body>
</html>
