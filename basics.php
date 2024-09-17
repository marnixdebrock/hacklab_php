<?php
// variables
$lives = 10;
$userNumber = readline("Kies het maximale nummer: ");
//picks a random number between 0 and a number chosen by the player
$randomNumber = rand(0, $userNumber);

//loops until user runs out of lives
while ($lives > 0){
    $userGuess = readline("Vul een nummer in om te raden: ");

    //checks if number is correct, if so.. displays message for user and ends the game
    if ($userGuess == $randomNumber){
        echo "Gefeliciteerd! Je hebt het nummer geraden!";
        break;
    }
    //if the answer is incorrect, it removes a life
    $lives -= 1;
    echo "Helaas, je hebt hem niet geraden... je hebt nog " . $lives . " levens over. \n";
}
    
//displays message after running out of lives
echo "Je hebt het juiste nummer niet geraden. " . "het juiste nummer was: " . $randomNumber;
















