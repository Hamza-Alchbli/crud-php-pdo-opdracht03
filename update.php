<?php
// echo $_GET['Id'];
// Voeg de verbindingsgegevens toe in config.php
require('config.php');

// Maak de data sourcename string
$dsn = "mysql:host=$dbHost;dbname=$dbName;charset=UTF8";

try {
    $pdo =  new PDO($dsn, $dbUser, $dbPass);
    if ($pdo) {
        // echo "Er is een verbinding met de database";
    } else {
        echo "Interne server-error";
    }
} catch (PDOException $e) {
    echo $e->getMessage();
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // var_dump($_POST);
    // Maak een sql update-query en vuur deze af op de database

    try {
        $sql = "UPDATE achtbaan
                SET NaamAchtbaan = :NaamAchtbaan,
                NaamPretpark = :NaamPretpark,
                Land = :Land,
                Topsnelheid = :Topsnelheid,
                Datum = :Datum,
                Cijfer = :Cijfer,
                WHERE  Id = :id";

        // We bereiden de sql-query voor met de method prepare
        $statement = $pdo->prepare($sql);

        $statement->bindValue(':NaamAchtbaan', $_POST['NaamAchtbaan'], PDO::PARAM_STR);
        $statement->bindValue(':NaamPretpark', $_POST['NaamPretpark'], PDO::PARAM_STR);
        $statement->bindValue(':Land', $_POST['Land'], PDO::PARAM_STR);
        $statement->bindValue(':Topsnelheid', $_POST['Topsnelheid'], PDO::PARAM_STR);
        $statement->bindValue(':Hoogte', $_POST['Hoogte'], PDO::PARAM_STR);
        $statement->bindValue(':Datum', $_POST['Datum'], PDO::PARAM_STR);
        $statement->bindValue(':Cijfer', $_POST['Cijfer'], PDO::PARAM_STR);

        $statement->execute();

        echo "Het updaten is gelukt";
        header('Refresh:3; url=read.php');
    } catch (PDOException $e) {
        echo "Het updaten is niet gelukt";
        header('Refresh:3; url=read.php');
    }
    // Stuur de gebruiker door naar de read.php pagina voor het overzicht met een header(Refresh) functie;
    exit();
}

// Maak een sql-query voor de database
$sql = "SELECT `Id`, 
                `NaamAchtbaan`, 
                `NaamPretpark`, 
                `Land`, 
                `Topsnelheid`, 
                `Hoogte`, 
                `Datum`, 
                `Cijfer`
        FROM  achtbaan 
        WHERE Id = :Id";        

// Maak de sql-query klaar om de $_GET['Id'] waarde te koppelen aan de placeholder :Id
$statement = $pdo->prepare($sql);

// Koppel de waarde $_GET['Id'] aan de placeholder :Id
$statement->bindValue(':Id', $_GET['Id'], PDO::PARAM_INT);

// Voer de query uit
$statement->execute();

// Haal het resultaat op met fetch en stop het object in de variabele $result
$result = $statement->fetch(PDO::FETCH_OBJ);

// var_dump($result);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <h1>De 5 snelste achtbanen van Europa</h1>
    <form method="POST">
    <input type="text" hidden name="id" id="id" value="<?= $result->Id?>">
        <label for="NaamAchtbaan">Naam Achtbaan:</label>
        <input type="text" id="NaamAchtbaan" name="NaamAchtbaan" value="<?= $result->NaamAchtbaan?>" required>

        <label for="NaamPretpark">Naam Pretpark:</label>
        <input type="text" id="NaamPretpark" name="NaamPretpark" value="<?= $result->NaamPretpark?>" required>

        <label for="Land">Naam Land:</label>
        <input type="text" id="Land" name="Land" value="<?= $result->Land?>" required>

        <label for="Topsnelheid">Topsnelheid (km/h): (must be between 0-200)</label>
        <input type="number" id="Topsnelheid" name="Topsnelheid" min="1" max="200" value="<?= $result->Topsnelheid?>" required>

        <label for="Hoogte">Hoogte (m):</label>
        <input type="number" id="Hoogte" name="Hoogte" min="1" max="200" value="<?= $result->Hoogte?>" required>

        <label for="Datum">Datum eerste opening:</label>
        <input type="date" id="Datum" name="Datum" value="<?= $result->Datum?>" required>

        <label for="Cijfer">Cijfer voor achtbaan:</label>
        <span id="slider-value"><?= $result->Cijfer?></span>
        <input type="range" value="<?= $result->Cijfer?>" id="Cijfer" name="Cijfer" min="1" max="10" step="0.1" onchange="updateSliderValue(this.value)">

        <input type="submit" value="Verstuur">
    </form>
    <a href="read.php">show table</a>
    <script>
        function updateSliderValue(val) {
            document.getElementById('slider-value').innerHTML = val;
        }
    </script>