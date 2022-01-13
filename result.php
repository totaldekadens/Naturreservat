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
    public $picture;
    /* Borde vara mer här , onclick? en ny funktion som skickar ut? samband mellan for och klass. VICTOR hjälp*/

    abstract function makeSound();
}




/* SubClass */

class Apa extends Animal {

    function __construct($picture, $name){
        $this-> name = $name;
        $this-> picture = $picture;
    }

    public function makeSound() {
        return "Woohahaha";
    }
}


class Giraff extends Animal {

    function __construct($picture, $name){
        $this-> name = $name;
        $this-> picture = $picture;
    }

    public function makeSound() {
        return "Giraffljud";
    }
}
    

class Tiger extends Animal {

    function __construct($picture, $name){
        $this-> name = $name;
        $this-> picture = $picture;
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


/* function whenClicked() {

    echo "jag kom in i clicked";

   
} */




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
                

                $ape = new Apa ('<img src="'.$content.'">', $randomName);

                echo $ape -> name . $ape -> picture; 
            }

            

            for ($i=0; $i < $antalTiger ; $i++) { 
                
                $randomName = getName();
            
                $contentTiger = 'tiger.png';

                $tigger = new Tiger ('<img src="'.$contentTiger.'">', $randomName);

                echo $tigger -> name . $tigger -> picture; 
            }


            for ($i=0; $i < $antalGiraff ; $i++) { 
                
                $randomName = getName();
                
                $contentGiraff = 'giraff.png';

                $giraffen = new Giraff ('<img src="'.$contentGiraff.'">', $randomName);

                echo $giraffen -> name . $giraffen -> picture; 
                
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



