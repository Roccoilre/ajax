function inserisciDati() {
    var nome = encodeURIComponent(document.getElementById("nameInput").value);
    var potenza = encodeURIComponent(document.getElementById("powerInput").value);
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "x.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4) {
            if (xhr.status === 200) {
                document.getElementById("message").innerHTML = xhr.responseText;
                alert('TRATTORE INSERITO CON SUCCESSO OTTIMO');
                document.getElementById("nameInput").value = '';
                document.getElementById("powerInput").value = '';
            } else {
                document.getElementById("message").innerHTML = "Errore in corso.";
                alert('ERRORE, RIPROVA INSERENDO LE INFORMAZIONI NEI CAMPI');
            }
        }
    };
    xhr.send("nome=" + nome + "&potenza=" + potenza);
}

