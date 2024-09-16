<?php

$lives = 3;
$userGuess = readline("Kies het maximale nummer: ");
$randomNumber = rand(0, $userGuess);
echo $randomNumber;

while ($lives > 0){
    $userGuess = readline("Vul een nummer in om te raden: ");

    if ($userGuess != $randomNumber){
        $lives -= 1;
        echo "Helaas, je hebt hem niet geraden... je hebt nog " . $lives . " levens over. \n";

        if ($lives == 0){
            echo "Je hebt het juiste nummer niet geraden. " . "het juiste nummer was: " . $randomNumber;
            break;
        }
    }

    if ($userGuess == $randomNumber){
        echo "Gefeliciteerd! Je hebt het nummer geraden!";
        break;
    }
}















