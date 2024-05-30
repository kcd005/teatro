<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        * {
            margin: 0;
            padding: 0;
            font-family: "Caudex", serif;
        }
        #menu {
            background-color: #1c1c1c;
            padding-top: 10px;
            padding-bottom: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.5);
            opacity: 0.97;
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
            transition: padding 0.3s ease-in-out;
        }
        #scelta {
            font-size: 20px;
            margin-left: 150px;
            padding: 20px;
        }
        a {
            text-decoration: none;
            color: mintcream;
            font-weight: bold;
            position: relative;
            transition: font-size 0.3s, padding 0.3s;
            border-radius: 5px;
        }
        a:hover {
            font-size: 20px;
        }
        .link {
            cursor: not-allowed;
            transition: font-size 0.3s ease-in-out, padding 0.3s ease-in-out, color 0.3s ease-in-out, background-color 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
            margin: 10px 20px;
        }
        .link:hover {            
            color: #313131;
            background-color: #d4d4d4;
            box-shadow: 0 0 8px rgba(0, 0, 0, 0.7);
            opacity: 0.5;
            padding: 10px;
            font-size: 22px;
        }
        #logo {
            width: 120px;
            height: auto;
            transition: opacity 0.3s ease-in-out, height 0.3s ease-in-out;
        }
        #logo.hidden {
            opacity: 0;
            height: 0;
            visibility: hidden;
        }
        #accesso {
            margin-right: 90px;
            font-size: 18px;
            width: 200px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        #menu.shrink .link {
            transition: font-size 0.3s ease-in-out, padding 0.3s ease-in-out, color 0.3s ease-in-out, background-color 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
            font-size: 18px;
            padding: 5px;
            margin-right: 20px;
        }
        #menu.shrink .link:hover 
        {
            font-size: 20px;
        }
    </style>
</head>
<body>
    <div id="menu">
        <img src="../../immagini/2logo.png" alt="logoSiparioIncantato" id="logo">
        <div id="scelta">
            <a href="" id="link1" class="link">SPETTACOLI IN SCENA</a>
            <a href="" id="link2" class="link">GENERI</a>
            <a href="" id="link3" class="link">SCEGLI LA CITTA</a>
            <a href="" id="link4" class="link">TEATRI</a>
        </div>
        <div id="accesso">
            <a href="../../login/registrazione/registrazione.php">Registrati</a>
            <a href="../../login/accesso/accesso.php">Accedi</a>
        </div>
    </div>
    <script>
document.addEventListener("DOMContentLoaded", function() {
    var menu = document.getElementById('menu');
    var logo = document.getElementById('logo');
    window.addEventListener('scroll', function() {
        if (window.scrollY > 50) {
            menu.classList.add('shrink');
            logo.classList.add('hidden');
        } else {
            menu.classList.remove('shrink');
            logo.classList.remove('hidden');
        }
    });
});

var links = document.querySelectorAll(".link");
links.forEach(function(link) {
    link.addEventListener("click", function(event) {
        event.preventDefault();
    });
});

    </script>
</body>
</html>
