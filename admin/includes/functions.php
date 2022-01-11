<?php
    function classAutoLoader($class){
        $class= strtolower($class); // om de classe met een kleine letter gebruiken
        $the_path = "includes/{$class}.php"; // in de includes zoekt hij de classesn,
        if(is_file($the_path)){ // is deze bestand die binnenkomt wel een file, als die bestand echt een file is, als hij bestaat
            if (file_exists($the_path) && !class_exists($class)){ // staat er iets in die file en als de file en de class bestaat nog niet in programma
                include ($the_path); // ga ik hem overal includen, die includes in init zou practisch overbodig worden. bij init zou je die class niet moeten includen
            } else{
                die("This file name {$class}.php was not found.");
            }
        }
    }
spl_autoload_register('classAutoLoader'); // spl is een build in functie van php, je kan daar alles insteken datje wil, bestanden die autoload zijn in je programma
// callback, hij roep zichtzelf aan, deze callback heeft een functie ndg, dan gaat hij verder lezen, stringtolower, dan weet de spl wel wat hij moet doen.
// zoekt bepaalde locatie de register apl is altijd voor
?>