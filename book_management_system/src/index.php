<?php
namespace Marnix\BookManagementSystem;
use Marnix\BookManagementSystem\services\Router;

require_once "../vendor/autoload.php";

$router = new Router();
$router->route();