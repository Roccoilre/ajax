<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualizzazione dati da Database in Tabella</title>
    <link rel="stylesheet" href="styleindex.css" >
    <link rel="stylesheet" href="footer.css" >
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" crossorigin="anonymous">
</head>
<body>
<navbar class="topnav">
        <a class="active" href="index.html"><i class="fa fa-home"></i> Home</a>
        <a href="#contatti"><i class="fas fa-address-book"></i> Contattami</a>
        
        <img src="logo-navbar.jpg" alt="logo">
    </navbar>
    <div class="supercontainer3">
        <div class="container-visualizza">
    <table>
    <tr><th>Marca</th><th>Potenza</th></tr>
<?php
    session_start();

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "db_agritrak";
    
    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        echo "Connessione fallita: " . $conn->connect_error;
    }
    $id_utente = $_SESSION['id_utente'];
     
    $sql = "SELECT marca,potenza FROM trattore where id_utente = '$id_utente' ";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["marca"] . "</td>";
            echo "<td>" . $row["potenza"] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "Nessun risultato trovato";
    }

    
    $conn->close();
    ?>
        </div>



    </div>
    
    <footer class="site-footer" id="contatti">
        <div class="footer-container">
            <div class="footer-column">
                <h3>Sito</h3>
                <p>Sviluppato da <div class="color-developer">ROCCO GIORGIO</div></p>
            </div>
            <div class="footer-column">
                <h3>Contatti</h3>
                <ul>
                    <li><i class="fas fa-phone"></i> TELEFONO: <a href="tel:3662080631">3662080631</a></li>
                    <li><i class="fas fa-envelope"></i> MAIL: <a href="mailto:rocco6360@gmail.com">rocco6360@gmail.com</a></li>
                    <li><i class="fab fa-whatsapp" style="color: greenyellow;"></i> <a href="https://wa.me/+393662080631">WhatsApp</a></li>
                </ul>
            </div>
            <div class="footer-column">
                <h3>Seguimi su</h3>
                <ul class="social-links">
                    <li><a href="https://github.com/Roccoilre" target="_blank"><i class="fab fa-github"></i> GitHub</a></li>
                    <li><a href="https://www.instagram.com/rocco_giorgio__/" target="_blank"><i class="fab fa-instagram"></i> Instagram</a></li>
                </ul>
            </div>
        </div>      
        <div class="footer-bottom">
            <p>&copy; 2024 Giorgio's Company. All Rights Reserved.</p>
        </div>
    </footer>
</body>
</html>
