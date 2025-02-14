<?php

namespace app\engine;

use app\traits\TSingleton;

class Db
{
    private $config = [
        'driver' => 'mysql',
        'host' => 'localhost',
        'login' => 'root',
        'password' => '',
        'database' => 'shop',
        'charset' => 'utf8'
    ];
    use TSingleton;
}