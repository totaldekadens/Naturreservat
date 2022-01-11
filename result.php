<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Resultat</title>
</head>
<body>

<?php

/* SuperClass */

abstract class Animal {
    public $name;

    /* Borde vara mer här , onclick? en ny funktion som skickar ut? Har nte riktigt skapat ett samband än mellan for och klass. VICTOR hjälp*/

    abstract function makeSound();
}




/* SubClass */

class Apa extends Animal {

    function __construct($name){
        $this-> name = $name;
    }

    public function makeSound() {
        return "Woohahaha";
    }
}


class Giraff extends Animal {

    function __construct($name){
        $this-> name = $name;
    }

    public function makeSound() {
        return "Giraffljud";
    }
}
    

class Tiger extends Animal {

    function __construct($name){
        $this-> name = $name;
    }

    public function makeSound() {
        return "Roarr";
    }
}






/* Fetching random name from API and returns it to the function */
function getName(){
    $rawData = file_get_contents("https://randomuser.me/api/");

    $arr = json_decode($rawData, true);
    
    foreach ($arr['results'] as $yaay) {
        $randomName = $yaay['name']['first'];
    }
    return $randomName;
}


function whenClicked() {

    echo "jag kom in i clicked";

    /* Skall få in en alert med makeSound och unikt namn. Skall funktionen vara i en klass? */
}




/* IF */

if($_SERVER["REQUEST_METHOD"]) {

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        if(isset($_POST['apa']) && isset($_POST['tiger']) && isset($_POST['giraff']) && isset($_POST['coconut'])) {
        
            $antalApa = $_POST['apa'];
            $antalTiger = $_POST['tiger'];
            $antalGiraff = $_POST['giraff'];
            $antalCoconut = $_POST['coconut'];

            

            for ($i=0; $i < $antalApa ; $i++) { 

                $randomName = getName();

                $content = 'apa.png';
                
                echo '<img src="'.$content.'">'.$randomName; 

            }

            for ($i=0; $i < $antalTiger ; $i++) { 
                
                $randomName = getName();
            
                $contentTiger = 'tiger.png';
                
                echo '<img src="'.$contentTiger.'"onClick="'.whenClicked().'">'.$randomName;  /* Onclick funkar inte. Den laddas med en gång istället. VICTOR hjälp! något annat sätt?  // randomName skall flyttas till alert senare */

            }


            for ($i=0; $i < $antalGiraff ; $i++) { 
                
                $randomName = getName();
                
                $contentGiraff = 'giraff.png';
                
                echo '<img src="'.$contentGiraff.'">'.$randomName; 
            }
            

            for ($i=0; $i < $antalCoconut ; $i++) { 
                
                $contentCoco = 'coconut.png';
                
                echo '<img src="'.$contentCoco.'">'; 
            }
                
            
            

        } else {
            echo "Du har inte fyllt i antal för samtliga djur. Backa och gör om";
        }

    } else {
        echo "Du har inte använt POST. Dubbelkolla attribut i <form> på sidan index.php";
    }

} else {
    echo "Du har satt någon REQUEST METHOD. Dubbelkolla attribut i <form> på sidan index.php";
}
?>
    
</body>
</html>



