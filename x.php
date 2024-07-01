<?php
session_start();

// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_agritrak";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    echo "Connessione Fallita: " . $conn->connect_error;
    exit();
}

// Retrieve and sanitize input
$name = $_POST['nome'];
$power = $_POST['potenza'];
$id_utente = $_SESSION["id_utente"];

// Insert query
$query = "INSERT INTO trattore (marca, potenza, id_utente) VALUES ('$name', '$power', '$id_utente')";

if ($conn->query($query) === TRUE) {
    echo "TRATTORE INSERITO CON SUCCESSO OTTIMO";
} else {
    echo "ERRORE, RIPROVA INSERENDO LE INFORMAZIONI NEI CAMPI SOPRA: " . $conn->error;
}

// Close connection
$conn->close();

