<?php 
declare(strict_types=1);

require ('config.php');
require (SITE_ROOT . DIRECTORY_SEPARATOR . 'autoload.php');

$router = new Router();
Registry::getInstance()['router'] = $router;
$router->start();

