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

    abstract function makeSound();
}



/* SubClass */

class Apa extends Animal {

    function __construct($name){
        
        $this-> name = $name;

    }

    public function makeSound() {

        return "Apljud";
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


class Coconut extends Animal {

    function __construct(){
        $this-> name = $name;
    }

    public function makeSound() {

        alert("Kokoko");

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





/* IF */

if($_SERVER["REQUEST_METHOD"]) {

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        if($_POST['apa'] && $_POST['tiger'] && $_POST['giraff'] && $_POST['coconut']) {
        
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
                
                echo '<img src="'.$contentTiger.'">'.$randomName; 

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
            echo "Du har inte fyllt i för samtliga djur. Backa och gör om";
        }

    }
    
}
?>
    
</body>
</html>



