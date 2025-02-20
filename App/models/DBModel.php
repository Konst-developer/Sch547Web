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
        return Db::getInstance()->query($sql, []);
    }

    public static function getWhereAssoc($name, $sign, $value)
    {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE {$name}{$sign}:{$name}";
        return Db::getInstance()->queryWhereAssoc($sql, [$name => $value]);
    }
}