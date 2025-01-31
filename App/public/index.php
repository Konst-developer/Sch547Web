<?php

use app\engine\Autoload;
use app\engine\Request;

error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);

include "../config/config.php";
include "../engine/Autoload.php";

spl_autoload_register([new Autoload(), 'loadClass']);

$request = new Request();

$controllerName = $request->getControllerName() ?: 'shop';
$actionName = $request->getActionName() ?: 'index';