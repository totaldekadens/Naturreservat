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
    <div class="inputContainer">
        <div class="title"><h2>Djur</h2></div>
        <div class="animals">
            <div class="check">
                <h4>Apa:</h4>
                <input type="number" name="apa">
            </div>
            <div class="check">
                <h4>Giraff:</h4>
                <input type="number" name="giraff">
            </div>
            <div class="check">
                <h4>Tiger:</h4>
                <input type="number" name="tiger">
            </div>            
            <div class="check">
                <h4>Lejon:</h4>
                <input type="number" name="lejon">
            </div>            
            <div class="check">
                <h4>Antiloop:</h4>
                <input type="number" name="antiloop">
            </div>            
            <div class="check">
                <h4>Gorilla:</h4>
                <input type="number" name="gorilla">
            </div>              
        </div> 
        <div class="title"><h2>Övrigt</h2></div>
        <div class="other">
            <div class="check">
                <h4>Kokosnöt:</h4>
                <input type="number" name="coconut">
            </div>  
            <div class="check">
                <h4>Palmträd:</h4>
                <input type="number" name="palm">
            </div>  
            <div class="check">
                <h4>Gran:</h4>
                <input type="number" name="gran">
            </div>  
            <div class="check">
                <h4>Ros:</h4>
                <input type="number" name="ros">
            </div>
        </div>
    </div>
        <input class="button" type="submit">
</form>

</body>
</html>



