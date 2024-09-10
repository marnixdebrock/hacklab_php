<?php
$numberArray = array(42, 67, 35, 89, 24, 76, 58, 93, 7, 30, 83, 46, 13, 25, 98, 53, 17, 79, 57, 8);
$evenUnevenArray = array("even"=>0, "uneven"=>0);


foreach ($numberArray as $number){
    if ($number % 2 == 0){
        $evenUnevenArray['even'] += $number;
    }
    else{
        $evenUnevenArray['uneven'] += $number;
    }
}

var_dump($evenUnevenArray);
?>