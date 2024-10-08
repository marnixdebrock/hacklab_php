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


$ingredientRepository = new IngredientRepository();
$ingredientRepository->addIngredient($emeraldLeaves, $serpentsVenom, $phoenixFeathers, $citrusExtract);
$ingredientRepository->deleteIngredient('emerald leaves');


$potionRepository = new PotionRepository();
$potionRepository->addPotion($serpentsWhisper, $phoenixAshBrew);

$potionRepository->deletePotion('serpents whisper');
