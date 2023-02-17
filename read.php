<?php

/**
 * Maak een verbinding met de mysql-server en database
 */
require('config.php');

// Maak een data sourcename string
$dsn = "mysql:host=$dbHost;dbname=$dbName;charset=UTF8";

try {
    $pdo = new PDO($dsn, $dbUser, $dbPass);
    if ($pdo) {
        // echo "De verbinding is gelukt";
    } else {
        echo "Interne server-error";
    }
} catch (PDOException $e) {
    echo $e->getMessage();
}
/**
 * Maak een select query die alle records uit de tabel Persoon haalt
 */
$sql = "SELECT  `Id`, 
                `NaamAchtbaan`, 
                `NaamPretpark`, 
                `Land`, 
                `Topsnelheid`, 
                `Hoogte`, 
                `Datum`, 
                `Cijfer` 
                FROM 
                `achtbaan`";

// Maak de sql-query gereed om te worden uitgevoerd op de database
$statement = $pdo->prepare($sql);

// Voer de sql-query uit op de database
$statement->execute();

// Zet het resultaat in een array met daarin de objecten (records uit de tabel Persoon)
$q = $pdo->query($sql);
$q->setFetchMode(PDO::FETCH_ASSOC);
$rows = $q->fetchAll();
// var_dump($rows);
?>

<table border="1">
    <thead>
        <tr>
            <th>Id</th>
            <th>NaamAchtbaan</th>
            <th>NaamPretpark</th>
            <th>Land</th>
            <th>Topsnelheid</th>
            <th>Hoogte</th>
            <th>Datum</th>
            <th>Cijfer</th>
            <th>Opties</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($rows as $row) : ?>
            <tr>
                <td><?php echo htmlspecialchars($row['Id']) ?></td>
                <td><?php echo htmlspecialchars($row['NaamAchtbaan']); ?></td>
                <td><?php echo htmlspecialchars($row['NaamPretpark']); ?></td>
                <td><?php echo htmlspecialchars($row['Land']); ?></td>
                <td><?php echo htmlspecialchars($row['Topsnelheid']); ?></td>
                <td><?php echo htmlspecialchars($row['Hoogte']); ?></td>
                <td><?php echo htmlspecialchars($row['Datum']); ?></td>
                <td><?php echo htmlspecialchars($row['Cijfer']); ?></td>
                <td>
                    <button class="btn btn-danger"><a href="delete.php?Id=<?= $row['Id'] ?>" class="text-light">Delete</a></button>
                    <button class="btn btn-danger"><a href="update.php?Id=<?= $row['Id'] ?>" class="text-light">update</a></button>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>