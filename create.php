<?php

require('config.php');

$dsn = "mysql:host=$dbHost;dbname=$dbName;charset=UTF8";

try {
    $pdo = new PDO($dsn, $dbUser, $dbPass);

    if ($pdo) {
        // echo "Er is een verbinding met de mysql-server";
    } else {
        echo "Er is een interne server-error, neem contact op met de beheerder";
    }

} catch(PDOException $e) {
    echo $e->getMessage();
}

/**
 * We gaan een insert-query maken voor het wegschrijven van de formuliergegevens
 */
$sql = "INSERT INTO achtbaan (`Id`, 
                            `NaamAchtbaan`, 
                            `NaamPretpark`, 
                            `Land`, 
                            `Topsnelheid`, 
                            `Hoogte`, 
                            `Datum`, 
                            `Cijfer` )
        VALUES              (NULL
                            ,:NaamAchtbaan
                            ,:NaamPretpark
                            ,:Land
                            ,:Topsnelheid
                            ,:Hoogte
                            ,:Datum
                            ,:Cijfer);";

// We bereiden de sql-query voor met de method prepare
$statement = $pdo->prepare($sql);

$statement->bindValue(':NaamAchtbaan', $_POST['NaamAchtbaan'], PDO::PARAM_STR);
$statement->bindValue(':NaamPretpark', $_POST['NaamPretpark'], PDO::PARAM_STR);
$statement->bindValue(':Land', $_POST['Land'], PDO::PARAM_STR);
$statement->bindValue(':Topsnelheid', $_POST['Topsnelheid'], PDO::PARAM_STR);
$statement->bindValue(':Hoogte', $_POST['Hoogte'], PDO::PARAM_STR);
$statement->bindValue(':Datum', $_POST['Datum'], PDO::PARAM_STR);
$statement->bindValue(':Cijfer', $_POST['Cijfer'], PDO::PARAM_STR);
// We vuren de sql-query af op de database

$result = $statement->execute();

if ($result) {
    echo "Er is een nieuw record gemaakt in de database.";
    header('Refresh:2; url=read.php');
} else {
    echo "Er is geen nieuw record gemaakt.";
    header('Refresh:2; url=read.php');
}
 