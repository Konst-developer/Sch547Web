<?php

namespace app\models;

class Category extends DBModel
{
    protected $id;
    protected $name;
    protected $description;

    protected $props = [
        'name' => false,
        'description' => false,
    ];

    public function __construct($name = '', $description = '')
    {
        $this->name = $name;
        $this->description = $description;
    }

    public static function getTableName()
    {
        return 'category';
    }
}
