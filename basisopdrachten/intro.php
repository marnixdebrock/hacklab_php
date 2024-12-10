<?php
//variablen
$numberArray = array(42, 67, 35, 89, 24, 76, 58, 93, 7, 30, 83, 46, 13, 25, 98, 53, 17, 79, 57, 8);
$evenUnevenArray = array("even"=>0, "uneven"=>0);

//looped totdat $numberArray geen items meer heeft
foreach ($numberArray as $number){
    //voegt nummer toe aan de 'even' waarde in $evenUnevenArray wanneer het nummer even is
    if ($number % 2 == 0){
        $evenUnevenArray['even'] += $number;
        continue; 
    }
    //voegt nummer toe aan de 'uneven' waarde in $evenUnevenArray wanneer het nummer uneven is
    $evenUnevenArray['uneven'] += $number;
    
}

var_dump($evenUnevenArray);
?>