<?php
// variablen
$lives = 10;
$userGuess = readline("Kies het maximale nummer: ");
//input om een max nummer te kiezen
$randomNumber = rand(0, $userGuess);

//loopt totdat de levens op zijn
while ($lives > 0){
    $userGuess = readline("Vul een nummer in om te raden: ");

    //kijkt of het antwoord onjuist is en geeft een bericht terug naar de speler, haalt ook 1 leven weg
    if ($userGuess != $randomNumber){
        $lives -= 1;
        echo "Helaas, je hebt hem niet geraden... je hebt nog " . $lives . " levens over. \n";
        //kijkt of de levens op zijn, geef bericht terug naar speler en beëindigd de loop en spel
        if ($lives == 0){
            echo "Je hebt het juiste nummer niet geraden. " . "het juiste nummer was: " . $randomNumber;
            break;
        }
    }
    //kijkt of het woord juist is, zowel, geeft bericht aan speler en beëindigd de loop en spel.
    if ($userGuess == $randomNumber){
        echo "Gefeliciteerd! Je hebt het nummer geraden!";
        break;
    }
}















