<?php

namespace app\models;

use app\engine\Db;

abstract class DBModel extends Model
{
    abstract public static function getTableName();

    public static function clearTable()
    {
        $tableName = static::getTableName();
        $sql = "DELETE FROM {$tableName}";
        return DB::getInstance()->query($sql, []);
    }
}