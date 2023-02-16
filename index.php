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
    <form method="POST" action="create.php">
        <label for="NaamAchtbaan">Naam Achtbaan:</label>
        <input type="text" id="NaamAchtbaan" name="NaamAchtbaan" required>

        <label for="NaamPretpark">Naam Pretpark:</label>
        <input type="text" id="NaamPretpark" name="NaamPretpark" required>

        <label for="Land">Naam Land:</label>
        <input type="text" id="Land" name="Land" required>

        <label for="Topsnelheid">Topsnelheid (km/h): (must be between 0-200)</label>
        <input type="number" id="Topsnelheid" name="Topsnelheid" min="1" max="200" required>

        <label for="Hoogte">Hoogte (m):</label>
        <input type="number" id="Hoogte" name="Hoogte" min="1" max="200" required>

        <label for="Datum">Datum eerste opening:</label>
        <input type="date" id="Datum" name="Datum" required>

        <label for="cijfer">Cijfer voor achtbaan:</label>
        <span id="slider-value">5.0</span>
        <input type="range" id="Cijfer" name="Cijfer" min="1" max="10" step="0.1" onchange="updateSliderValue(this.value)">

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