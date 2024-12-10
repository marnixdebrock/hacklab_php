<?php
include_once 'service/database.php';
include_once 'dao/DAO.php';
include_once 'dao/MysqlDAO.php';
include_once 'classes/Item.php';
include_once 'classes/Potion.php';
include_once 'classes/Ingredient.php';
include_once 'classes/IngredientRepository.php';
include_once 'classes/PotionRepository.php';

$potionRepo = new PotionRepository(new MysqlDAO('potions'));
$ingredientRepo = new IngredientRepository(new MysqlDAO('ingredients'));


if (isset($_POST['buttonAddPotion'])) {

    $name = htmlspecialchars($_POST['name']);
    $type = htmlspecialchars($_POST['type']);
    $color = htmlspecialchars($_POST['color']);

    $potionRepo->add($name, $type, $color);
}

if (isset($_POST['buttonDeletePotion'])) {

    $id = $_POST['id'];

    $potionRepo->delete($id);
}

if (isset($_POST['buttonAddIngredient'])) {

    $name = htmlspecialchars($_POST['name']);
    $color = htmlspecialchars($_POST['color']);
    $quantity = htmlspecialchars($_POST['quantity']);

    $ingredientRepo->add($name, $color, $quantity);
}

if (isset($_POST['buttonDeleteIngredient'])) {

    $id = $_POST['id'];

    $IngredientRepo->delete($id);
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
<style>
    table,
    th,
    tr,
    td {
        border: 1px solid black;
    }
</style>

<body>
    <h2>Potions:</h2>
    <table>
        <th>id</th>
        <th>name</th>
        <th>type</th>
        <th>color</th>
        <th>delete</th>
        <tr>
            <?php
            $potionRepo = new PotionRepository(new MysqlDAO('potions'));
            $response = $potionRepo->get();

            foreach ($response as $potion) {
                echo "<td>{$potion->getId()}</td>";
                echo "<td>{$potion->getName()}</td>";
                echo "<td>{$row['type']}</td>";
                echo "<td>{$row['color']}</td>";
                echo "<form method='POST'><input type='hidden' name='id' value='{$row['id']}'>";
                echo "<td><input type='submit' name='buttonDeletePotion' value='Delete'</td></form></tr>";
            }


            // $ingredientRepo = new PotionRepository(new MysqlDAO('potions'));
            //             $response = $potionRepo->get();

            //             foreach ($response as $row) {
            //                 echo "<td>{$row['id']}</td>";
            //                 echo "<td>{$row['name']}</td>";
            //                 echo "<td>{$row['type']}</td>";
            //                 echo "<td>{$row['color']}</td>";
            //                 echo "<form method='POST'><input type='hidden' name='id' value='{$row['id']}'>";
            //                 echo "<td><input type='submit' name='buttonDeletePotion' value='Delete'</td></form></tr>";
            ?>
    </table>

    <form method="POST">
        <h2>Add a Potion:</h2>
        <div name="inputs">
            <input type="text" name="name" placeholder="name">
            <input type="text" name="type" placeholder="type">
            <input type="text" name="color" placeholder="color">
            <input type="submit" name="buttonAddPotion" value="Add">
        </div>
    </form>

    <form method="POST">
        <h2>Add an Ingredient:</h2>
        <div name="inputs">
            <input type="text" name="name" placeholder="name">
            <input type="text" name="color" placeholder="color">
            <input type="number" name="quantity" placeholder="quantity">
            <input type="submit" name="buttonAddIngredient" value="Add">
        </div>
    </form>


</body>

</html>