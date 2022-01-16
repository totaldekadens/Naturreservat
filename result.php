<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script defer src="logic.js"></script>
    <title>Resultat</title>
</head>
<body>

<a href="result.php?click=true">RESET</a>

<?php

session_start();



function resetReservation() {

    session_destroy();

    header("Location: settings.php");
}

if(isset($_GET['click'])) {

    resetReservation();
}


/* SuperClass */

abstract class Animal {
    public $name;
    public $picture;

    abstract function makeSound();

    public function Click() {
        $text = 'alert("Name: ';
        $text .= $this->name;
        $text .= " Sound: ";
        $text .= $this->makeSound();
        $text .= '");';
        return $text;
    }

    public function render() {
        echo "<img src='".$this->picture."' onClick='".$this->Click()."'/>";
    }
}


/* SubClass */

class Apa extends Animal {
    function __construct($picture, $name){
        $this-> name = $name;
        $this-> picture = $picture;
        $this-> makeSound();
        $this-> render();
    }

    public function makeSound() {
        return "Woohahaha";
    }
}



class Giraff extends Animal {

    function __construct($picture, $name){
        $this-> name = $name;
        $this-> picture = $picture;
        $this-> makeSound();
        $this-> render();
    }

    public function makeSound() {
        return "Giraffljud";
    }
}
    

class Tiger extends Animal {

    function __construct($picture, $name){
        $this-> name = $name;
        $this-> picture = $picture;
        $this-> makeSound();
        $this-> render();
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


/* IF */

if($_SERVER["REQUEST_METHOD"]) {


    if (isset($_SERVER["REQUEST_METHOD"]) == "POST") {

        
        if(isset($_POST['apa']) && isset($_POST['tiger']) && isset($_POST['giraff']) && isset($_POST['coconut']) || isset($_SESSION["amountAnimals"])) {
        
        

            if(!$_SESSION["amountAnimals"]) {

                $animals = array (
                "amountApa" => $_POST['apa'],
                "amountTiger" => $_POST['tiger'],
                "amountGiraff" => $_POST['giraff'],
                "amountCoconut" => $_POST['coconut']
                );
            
                $_SESSION['amountAnimals'] = $animals;

            }

            $animals = $_SESSION['amountAnimals'];
            
            for ($i=0; $i < $animals['amountApa'] ; $i++) { 

                $randomName = getName();
                $ape = new Apa ('/assets/apa.png', $randomName); 
            }
            for ($i=0; $i < $animals['amountTiger'] ; $i++) { 
                
                $randomName = getName();
                $tigger = new Tiger ('/assets/tiger.png', $randomName); 
            }
            for ($i=0; $i < $animals['amountGiraff'] ; $i++) { 
        
                $randomName = getName();
                $giraffen = new Giraff ('/assets/giraff.png', $randomName);   
            }
            
            for ($i=0; $i < $animals['amountCoconut'] ; $i++) { 
                
                $contentCoco = '/assets/coconut.png';
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



