<?php

use app\engine\Autoload;
use app\engine\Render;
use app\engine\Request;

error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);

include "../config/config.php";
include "../engine/Autoload.php";

spl_autoload_register([new Autoload(), 'loadClass']);

$request = new Request();

$controllerName = $request->getControllerName() ?: 'shop';
$actionName = $request->getActionName() ?: 'index';

$controllerClass = CONTROLLER_NAMESPACE . ucfirst($controllerName) . "Controller";

if (class_exists($controllerClass)) {
    $controller = new $controllerClass(new Render());
    $controller->runAction($actionName);
} else echo "Контроллер " . $controllerClass . " не найден!";