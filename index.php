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
    <form method="POST" action="submit.php">
        <label for="naam-achtbaan">Naam Achtbaan:</label>
        <input type="text" id="naam-achtbaan" name="naam-achtbaan" required>

        <label for="naam-pretpark">Naam Pretpark:</label>
        <input type="text" id="naam-pretpark" name="naam-pretpark" required>

        <label for="naam-land">Naam Land:</label>
        <input type="text" id="naam-land" name="naam-land" required>

        <label for="topsnelheid">Topsnelheid (km/h): (must be between 0-200)</label>
        <input type="number" id="topsnelheid" name="topsnelheid" min="1" max="200" required>

        <label for="hoogte">Hoogte (m):</label>
        <input type="number" id="hoogte" name="hoogte" min="1" max="200" required>

        <label for="opening">Datum eerste opening:</label>
        <input type="date" id="opening" name="opening" required>

        <label for="cijfer">Cijfer voor achtbaan:</label>
        <span id="slider-value">5.0</span>
        <input type="range" id="cijfer" name="cijfer" min="1" max="10" step="0.1" onchange="updateSliderValue(this.value)">

        <input type="submit" value="Verstuur">
    </form>
    <a href="read.php">show table</a>
    <script>
        function updateSliderValue(val) {
            document.getElementById('slider-value').innerHTML = val;
        }
    </script>
</body>
</html>