<?php
namespace Marnix\BookManagementSystem;
require_once "../vendor/autoload.php";


$main = new Main(new BookRepository());

$run = True;

while ($run) {
    $main->showMainMenu();
}