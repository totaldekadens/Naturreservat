<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script defer src="logic.js"></script>
    <title>Naturreservat</title>
</head>
<body>

<?php

session_start();

if(isset($_SESSION["amountAnimals"])) {

    header("Location: result.php");
    exit();

}
?>

<form action="result.php" method="POST">
    <h1>Hur många utav nedan finns i reservatet?</h1>
    <p>Fyll i antal med siffror. OBS! decimaltecken är ej tillåtet.</p>
    <h4>Apa:</h4>
    <input type="text" placeholder="Fyll i antal apor" name="apa">
    <h4>Giraff:</h4>
    <input type="text" placeholder="Fyll i antal giraffer" name="giraff">
    <h4>Tiger:</h4>
    <input type="text" placeholder="Fyll i antal tigrar" name="tiger">
    <h4>Lejon:</h4>
    <input type="text" placeholder="Fyll i antal lejon" name="lejon">
    <h4>Antiloop:</h4>
    <input type="text" placeholder="Fyll i antal antilooper" name="antiloop">
    <h4>Gorilla:</h4>
    <input type="text" placeholder="Fyll i antal gorillor" name="gorilla"><br><br><br><br>

    <h4>Kokosnöt:</h4>
    <input type="text" placeholder="Fyll i antal kokosnötter" name="coconut">
    <h4>Palmträd:</h4>
    <input type="text" placeholder="Fyll i antal palmtäd" name="palm">
    <h4>Gran:</h4>
    <input type="text" placeholder="Fyll i antal granar" name="gran">
    <h4>Ros:</h4>
    <input type="text" placeholder="Fyll i antal rosor" name="ros">

    <input type="submit">
</form>

</body>
</html>



