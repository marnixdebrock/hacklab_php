<?php

//gets random card from arrays and returns a random one
function getRandomCard(){
    //variables
    $baseCard = array(2, 3, 4, 5, 6, 7, 8, 9, 10, 'J', 'Q', 'K', 'A');
    $suits = array('clubs', 'diamonds', 'hearts', 'spades');

    //assigns random value from $baseCard and $suits and puts it in random card
    $randomCard = $baseCard[array_rand($baseCard)] . '-' . $suits[array_rand($suits)];
    echo $randomCard . "\n";
    
    return $randomCard;
}

//check if the user input is the same as a the random card, if so, returns true
function checkUserGuessTrue($fuserGuess, $frandomCard){
    if (strtoupper($fuserGuess) == strtoupper($frandomCard)){
        return true;
    }
    return false;
}

//variables
$lives = 10;
$randomCard = getRandomCard();

//loops until lives reach 0
while ($lives > 0){
    $userGuess = readline("Choose a random card (6-spades, J-hearts, etc):");
    //checks if 'checkUserGuessTrue' equals false and gives user appropriate message
    if (checkUserGuessTrue($userGuess, $randomCard) == false){
        echo "incorrect";
        $lives -=1;
        echo "You have " . $lives . " lives left!\n";
        continue;
    }
    echo "Correct!";
    break;
}

