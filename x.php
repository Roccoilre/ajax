<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_forrocco";
$name = $_POST['nome'];
$power = $_POST['potenza'];
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    echo "Connessione Fallita: " . $conn->connect_error;
}
$query = "INSERT INTO trattore (nome, potenza) VALUES ('$name', '$power')";
if ($conn->query($query) === TRUE) {
    echo "<script>alert('TRATTORE INSERITO CON SUCCESSO OTTIMO')</script>";
} else {
    echo "<script>alert('ERRORE,RIPROVA INSERENDO LE INFORMAZIONI NEI CAMPI SOPRA')</script>";    
}
$conn->close();