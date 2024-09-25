<?php
// Verbindung zur MySQL-Datenbank herstellen
$servername = "localhost";
$username = "DEIN_USERNAME"; // Setze deinen Uberspace-Username ein
$password = "DEIN_PASSWORT"; // Dein MySQL Passwort aus .my.cnf
$dbname = "DEINE_DATENBANK"; // Dein MySQL-Datenbankname (i.d.R. dein Username)

// Verbindung erstellen
$conn = new mysqli($servername, $username, $password, $dbname);

// Verbindung prüfen
if ($conn->connect_error) {
  die("Verbindung fehlgeschlagen: " . $conn->connect_error);
}

// POST-Daten erhalten
$platz = $_POST['platz'];
$manager = $_POST['manager'];
$noten = $_POST['noten'];
$tore = $_POST['tore'];
$gegentore = $_POST['gegentore'];
$elf = $_POST['elf'];
$assists = $_POST['assists'];
$gesamt = $_POST['gesamt'];

// SQL-Abfrage, um die Daten in die Datenbank einzufügen
$sql = "INSERT INTO kader (platz, manager_name, noten, tore, gegentore, elf, assists, gesamt)
VALUES ('$platz', '$manager', '$noten', '$tore', '$gegentore', '$elf', '$assists', '$gesamt')";

if ($conn->query($sql) === TRUE) {
  echo "Daten erfolgreich gespeichert";
} else {
  echo "Fehler: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
