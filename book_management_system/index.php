<?php

require_once 'classes/Main.php';

require_once 'classes/BookRepository.php';

require_once 'classes/Book.php';

require_once 'classes/Author.php';


$main = new Main();

$run = True;

while ($run) {
    $main->showMainMenu();
}


