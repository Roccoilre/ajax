function inserisciDati() {
    var nome = encodeURIComponent(document.getElementById("nameInput").value);
    var potenza = encodeURIComponent(document.getElementById("powerInput").value);

    var xhr = new XMLHttpRequest();
    xhr.open("POST", "x.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4) {
            console.log(xhr.responseText); // Add this line to log the response
            if (xhr.status === 200) {
                alert(xhr.responseText); // Display the actual response from the server
                document.getElementById("nameInput").value = '';
                document.getElementById("powerInput").value = '';
            } else {
                alert('ERRORE, RIPROVA INSERENDO LE INFORMAZIONI NEI CAMPI');
            }
        }
    };

    xhr.send("nome=" + nome + "&potenza=" + potenza);
}
