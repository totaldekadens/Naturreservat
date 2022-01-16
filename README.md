# Naturreservat
Övningsuppgifter PHP (klasser)



Uppgift 1. - Klar

* Ni ska göra två PHP sidor, en index.php och en results.php.
* Från index.php ska man i ett formulär kunna välja hur många apor, giraffer, tigrar och kokosnötter som ska finnas i naturreservatet.
* Djuren ska vara varsin klass som ska ärva från samma superklass (Animal) där makeSound är en abstrakt funktion.
* När formuläret skickas ska man komma till results.php, och på den sidan ska man se bilder på alla djur som man skickat.
    * exempel: 2 apbilder, 1 giraffbild, 1 tigerbild, 10 bilder på kokosnötter.

* När man klickar på ett djur ska dom göra ett läte med Alert, varje typ av djur ska göra ett typ av läte. Varje enskilt djur ska ha ett unikt namn som ska stå med i Alerten.

Uppgift 2. - Klar

* Döp namn på er nuvarande index.php till settings.php och gör en ny index.php, settings.php ska alltså innehålla formuläret.
* Om man inte besökt settings.php och skickat formuläret, så ska man inte kunna se results.php.
* Om man besöker er nya index.php så ska man skickas vidare till results.php om man redan har skickat formuläret en gång.
* Om man försöker gå ut på settings.php då man redan har skickat formuläret så ska sidan dö.
* Från results.php ska man kunna starta om sitt naturreservat med en knapp.
* I formuläret ska man kunna välja fler djur och växter: lejon, antilooper, gorillor, palmträn, granar och rosor som ska finnas i naturreservatet.
