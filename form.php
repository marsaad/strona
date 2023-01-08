<?php

// Pobierz dane z formularza
$name = $_POST['nazwa'];
$email = $_POST['email'];
$subject = $_POST['temat'];
$message = $_POST['wiadomosc'];

// Połącz się z bazą danych
$host = "localhost";
$db_user = "marsad";
$db_password = "marsad";
$db_name = "strona";

$conn = mysqli_connect($host, $db_user, $db_password, $db_name);

// Sprawdź połączenie
if (!$conn) {
    die("Połączenie z bazą danych nie powiodło się: " . mysqli_connect_error());
}

// Walidacja danych (można dodać dodatkowe sprawdzenia, np. czy adres e-mail jest poprawny)
if (!empty($name) && !empty($email) && !empty($subject) && !empty($message)) {
    // Wszystkie pola są wypełnione, więc można przetworzyć dane

    // Przygotuj zapytanie do bazy danych
    $sql = "INSERT INTO kontakt (name, mail, subject, text) VALUES ('$name', '$email', '$subject', '$message')";

    // Wykonaj zapytanie
    if (mysqli_query($conn, $sql)) {
        // Jeśli zapytanie zostało wykonane poprawnie, wyświetl komunikat o powodzeniu
        echo "Dziękujemy za wysłanie formularza. Twoje dane zostały zapisane w bazie danych.";
    } else {
        // Jeśli wystąpił błąd podczas wykonywania zapytania, wyświetl komunikat o błędzie
        echo "Błąd: " . $sql . "<br>" . mysqli_error($conn);
    }
} else {
    // Nie wszystkie pola są wypełnione, więc należy wyświetlić komunikat o błędzie
    echo "Wypełnij wszystkie pola formularza.";
}

// Zamknij połączenie z bazą danych
mysqli_close($conn);

?>