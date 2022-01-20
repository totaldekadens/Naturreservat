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
<!-- Reset Link -->
<div class="hej">
<a class="resetButton" href="result.php?click=true">RESET</a>
</div>
<?php

session_start();


/* Reset Link */
function resetNatureReserve() {

    session_destroy();

    header("Location: settings.php");
}

if(isset($_GET['click'])) {

    resetNatureReserve();
}





/* SuperClass */

abstract class Animal {
    public $name;
    public $picture;

    abstract function makeSound();

    public function Click() {
        $text = 'alert(" ';
        $text .= $this->name;
        $text .= " säger: ";
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
        return "Woohahaha!";
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
        return "Smacksmack!";
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
        return "Roarr!";
    }
}

class Lejon extends Animal {

    function __construct($picture, $name){
        $this-> name = $name;
        $this-> picture = $picture;
        $this-> makeSound();
        $this-> render();
    }

    public function makeSound() {
        return "Roarr!";
    }
}

class Antiloop extends Animal {

    function __construct($picture, $name){
        $this-> name = $name;
        $this-> picture = $picture;
        $this-> makeSound();
        $this-> render();
    }

    public function makeSound() {
        return "Gnägggnägg!";
    }
}

class Gorilla extends Animal {

    function __construct($picture, $name){
        $this-> name = $name;
        $this-> picture = $picture;
        $this-> makeSound();
        $this-> render();
    }

    public function makeSound() {
        return "Hoogachacka";
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
                "amountCoconut" => $_POST['coconut'],
                "amountLejon" => $_POST['lejon'],
                "amountAntiloop" => $_POST['antiloop'],
                "amountGorilla" => $_POST['gorilla'],
                "amountPalm" => $_POST['palm'],
                "amountGran" => $_POST['gran'],
                "amountRos" => $_POST['ros']
                );
            

                
                $_SESSION['amountAnimals'] = $animals;

            }

            $animals = $_SESSION['amountAnimals'];
            
            for ($i=0; $i < $animals['amountApa'] ; $i++) { 

                $randomName = getName();
                $ape = new Apa ('./assets/apa.png', $randomName); 

                array_push($animals, $ape);

                $_SESSION['renderanimal'] = $animals;
                $animals = $_SESSION['renderanimal'];
            }

            for ($i=0; $i < $animals['amountGiraff'] ; $i++) { 
        
                $randomName = getName();
                $giraffen = new Giraff ('./assets/giraff.png', $randomName);   
            }
            for ($i=0; $i < $animals['amountTiger'] ; $i++) { 
                
                $randomName = getName();
                $tigger = new Tiger ('./assets/tiger.png', $randomName); 
            }

            for ($i=0; $i < $animals['amountLejon'] ; $i++) { 
        
                $randomName = getName();
                $lejonet = new Lejon ('./assets/lejon.png', $randomName);   
            }
            for ($i=0; $i < $animals['amountAntiloop'] ; $i++) { 
        
                $randomName = getName();
                $antiloopen = new Antiloop ('./assets/antiloop.png', $randomName);   
            }
            for ($i=0; $i < $animals['amountGorilla'] ; $i++) { 
        
                $randomName = getName();
                $gorillan = new Gorilla ('./assets/gorilla.png', $randomName);   
            }

            for ($i=0; $i < $animals['amountCoconut'] ; $i++) { 
                
                $contentCoco = './assets/coconut.png';
                echo '<img src="'.$contentCoco.'">'; 
            }

            for ($i=0; $i < $animals['amountPalm'] ; $i++) { 
                
                $contentPalm = './assets/palm.png';
                echo '<img src="'.$contentPalm.'">'; 
            }

            for ($i=0; $i < $animals['amountGran'] ; $i++) { 
                
                $contentGran = './assets/gran.png';
                echo '<img src="'.$contentGran.'">'; 
            }

            for ($i=0; $i < $animals['amountRos'] ; $i++) { 
                
                $contentRos = './assets/ros.png';
                echo '<img src="'.$contentRos.'">'; 
            }


            error_log(serialize($animals)); 

            error_log(serialize($_SESSION));

/*             foreach($animals as $listOfAnimals){
                $listOfAnimals ->render();
            } */

        } else {

            header("Location: settings.php");
            exit();
        }

    } else {
        echo "Du har inte använt POST. Dubbelkolla attribut i <form> på sidan index.php";
    }

} else {
    echo "Du har inte satt någon REQUEST METHOD. Dubbelkolla attribut i <form> på sidan index.php";
}


?>
    
</body>
</html>



