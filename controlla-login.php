<?php     
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "db_agritrak"; 
    $conn = new mysqli($servername, $username, $password, $dbname);    
    if ($conn->connect_error) {
        echo "Connessione fallita: " . $conn->connect_error;
    }
$tab_nome = "utente";  
$email = strtolower($_POST["email"]);  
$password = $_POST["password"];   
$password = stripslashes($password);  
$email = $conn->real_escape_string($email);  
$password = $conn->real_escape_string($password);
$controllo = false;  
$sql = "SELECT * FROM $tab_nome WHERE email='$email'";  
$result = $conn->query($sql);  
$conta = $result->num_rows;     
if ($conta == 1) {  
    $row = $result->fetch_assoc(); 
    $passc = $row['password'];  
    $id = $row['id_utente'];
    $nome = $row['nome'];
    if (password_verify($password, $passc)) {  
        $controllo = true;        
    }     
}     

if ($controllo) {         
    session_start();  
    $_SESSION['email'] = $email;  
    $_SESSION['id_utente'] = $id;
    $_SESSION['nome'] = $nome;
    header("Location: 1.html");
} else {        
    echo '<script>alert("Credenziali Errate"); window.location = "login.html";</script>';
}

$conn->close();