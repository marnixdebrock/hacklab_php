<?php
include('classes/Potion.php');
include('classes/Ingredient.php');
include('classes/IngredientRepository.php');
include('classes/PotionRepository.php');

$serpentsWhisper = new Potion(name: 'serpents whisper', type: 'elixir', color: 'green');
$phoenixAshBrew = new Potion(name: 'phoenix ash brew', type: 'tonic', color: 'red');

$emeraldLeaves = new Ingredient(name: 'emerald leaves', color: 'green', quantity: 1);
$serpentsVenom = new Ingredient(name: 'serpents venom', color: 'light yellow', quantity: 1);
$phoenixFeathers = new Ingredient(name: 'phoenix feather', color: 'yellow', quantity: 3);
$citrusExtract = new Ingredient(name: 'citrus extract', color: 'light yellow', quantity:1);


$serpentsWhisper->addIngredient($emeraldLeaves, $serpentsVenom, $phoenixFeathers);
$phoenixAshBrew->addIngredient($phoenixFeathers, $citrusExtract);

session_start();
$ingredientRepository = new IngredientRepository();
$ingredientRepository->addIngredient($emeraldLeaves, $serpentsVenom, $phoenixFeathers, $citrusExtract);
// $ingredientRepository->deleteIngredient('emerald leaves');


$potionRepository = new PotionRepository();
$potionRepository->addPotion($serpentsWhisper, $phoenixAshBrew);

// $potionRepository->deletePotion('serpents whisper');

session_destroy();

// var_dump($_SESSION['potions']);


$array = (array) $_SESSION['potions'][1];

var_dump($array);

$counter = 0;

foreach($_SESSION['potions'][$counter] as $potion){
    echo $potion;
    $counter + 1;
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>PotionCraft</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="">
    </head>
    <body>
        <table>
            <tr>
                <th>Naam</th>
            </tr>
            <tr>
                <th></th>
            </tr>
        </table>
    </body>
</html>