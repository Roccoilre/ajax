<?php      
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "db_agritrak"; 
    $conn = new mysqli($servername, $username, $password, $dbname);    
    if ($conn->connect_error) {
        echo "Connessione fallita: " . $conn->connect_error;
    }
$cognome = $_POST["cognome"];  
$nome = $_POST["nome"];  
$email = strtolower($_POST["email"]);  
$telefono = $_POST["tel"];  
$password = password_hash($_POST["password"], PASSWORD_DEFAULT);
$sql = "INSERT INTO utente (cognome, nome, email, numerotelefono, password) ";  
$sql .= "VALUES ('$cognome', '$nome', '$email', '$telefono', '$password')";  
if ($conn->query($sql)) {         
    echo "<script>alert('Utente registrato correttamente'); window.location.href = 'index.html';</script>";
} else {         
    echo "<script>alert('Utente non registrato ');window.location.href = 'registra.html';</script>";    
}
$conn->close();   

