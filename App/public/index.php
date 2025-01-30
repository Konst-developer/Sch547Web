<?php

use app\engine\Autoload;

error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);

include "../config/config.php";
include "../engine/Autoload.php";

spl_autoload_register([new Autoload(), 'loadClass']);