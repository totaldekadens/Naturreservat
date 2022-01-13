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

<?php



/* SuperClass */

abstract class Animal {
    public $name;
    public $picture;

    abstract function makeSound();

}


/* SubClass */

class Apa extends Animal {
    function __construct($picture, $name){
        $this-> name = $name;
        $this-> picture = $picture;
        $this-> makeSound();
        $this-> renderApa();

    }

    public function makeSound() {
        return "Woohahaha";
    }

    public function Click() {
        $text = 'alert("Name: ';
        $text .= $this->name;
        $text .= " Sound: ";
        $text .= $this->makeSound();
        $text .= '");';
        return $text;
    }

    public function renderApa() {
        echo "<img src='".$this->picture."' onClick='".$this->Click()."'/>";
    }


}



class Giraff extends Animal {

    function __construct($picture, $name){
        $this-> name = $name;
        $this-> picture = $picture;
        $this-> makeSound();
        $this-> renderGiraff();

    }

    public function makeSound() {
        return "Giraffljud";
    }

    public function Click() {
        $text = 'alert("Name: ';
        $text .= $this->name;
        $text .= " Sound: ";
        $text .= $this->makeSound();
        $text .= '");';
        return $text;
    }

    public function renderGiraff() {
        echo "<img src='".$this->picture."' onClick='".$this->Click()."'/>";
    }
}
    

class Tiger extends Animal {

    function __construct($picture, $name){
        $this-> name = $name;
        $this-> picture = $picture;
        $this-> makeSound();
        $this-> renderTiger();

    }

    public function makeSound() {
        return "Roarr";
    }

    public function Click() {
        $text = 'alert("Name: ';
        $text .= $this->name;
        $text .= " Sound: ";
        $text .= $this->makeSound();
        $text .= '");';
        return $text;
    }

    public function renderTiger() {
        echo "<img src='".$this->picture."' onClick='".$this->Click()."'/>";
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
        if(isset($_POST['apa']) && isset($_POST['tiger']) && isset($_POST['giraff']) && isset($_POST['coconut'])) {
        
            $antalApa = $_POST['apa'];
            $antalTiger = $_POST['tiger'];
            $antalGiraff = $_POST['giraff'];
            $antalCoconut = $_POST['coconut'];


            for ($i=0; $i < $antalApa ; $i++) { 

                $randomName = getName();
                $ape = new Apa ('apa.png', $randomName); 
            }
            for ($i=0; $i < $antalTiger ; $i++) { 
                
                $randomName = getName();
                $tigger = new Tiger ('tiger.png', $randomName); 
            }
            for ($i=0; $i < $antalGiraff ; $i++) { 
           
                $randomName = getName();
                $giraffen = new Giraff ('giraff.png', $randomName);   
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



