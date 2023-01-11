<?php
$host = "marcinsadowski.database.windows.net";
$user = "marsad";
$pass = "M@rsad77";
$dbname = "marcinsadowski";
$port = 1433;

$nazwa = $_POST['nazwa'];
$email = $_POST['email'];
$temat = $_POST['temat'];
$wiadomosc = $_POST['wiadomosc'];

// Tworzymy połączenie
$conn = new mysqli($host, $user, $pass, $dbname, $port);

// Sprawdzamy czy połączenie się udało
if ($conn->connect_error) {
    die("Połączenie nieudane: " . $conn->connect_error);
}

$sql = "INSERT INTO kontakt (name, mail, subject, text)
VALUES ('$nazwa', '$email', '$temat', '$wiadomosc')";

if ($conn->query($sql) === TRUE) {
    echo "Dane zostały wstawione do tabeli.";
} else {
    echo "Błąd: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
