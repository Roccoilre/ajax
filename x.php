<?php
$servername = "localhost";
$username = "rgiorgio2024";
$password = "";
$dbname = "my_rgiorgio2024";

$name = $_POST['nome'];
$power = $_POST['potenza'];

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connessione Fallita: " . $conn->connect_error);
}

$query = "INSERT INTO trattori (nome, potenza) VALUES ('$name', '$power')";

if ($conn->query($query) === TRUE) {
    echo "TRATTORE INSERITO CON SUCCESSO OTTIMO";
} else {
    echo "ERRORE,RIPROVA INSERENDO LE INFORMAZIONI NEI CAMPI SOPRA";
}

$conn->close();
?>
