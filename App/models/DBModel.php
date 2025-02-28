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
    public static function getOne($id)
    {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE id=:id";
        return Db::getInstance()->queryOne($sql, ['id' => $id]);
    }

    public static function getAll()
    {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName}";
        return Db::getInstance()->queryAll($sql);
    }

    protected function insert()
    {
        $columns = [];
        $params = [];
        $tableName = static::getTableName();
        foreach ($this->props as $key => $value) {
            $params[':' . $key] = $this->$key;
            $columns[] = $key;
        }
        $columns = implode(',', $columns);
        $values = implode(',', array_keys($params));
        $sql = "INSERT INTO {$tableName} ({$columns}) VALUES ({$values})";
        Db::getInstance()->execute($sql, $params);
        $this->id = Db::getInstance()->lastInsertId();
        return $this;
    }

    protected function update()
    {
        $columns = [];
        $params = [];
        $tableName = static::getTableName();
        foreach ($this->props as $key => $value) {
            $params[':' . $key] = $this->$key;
            $columns[] = $key;
        }
        $params[':id'] = $this->id;
        if (!empty($columns)) {
            $par_str = '';
            foreach ($columns as $value) {
                $par_str .= ' ' . $value . '=:' . $value . ', ';
            }
            $par_str = substr($par_str, 0, -2) . ' ';
        }
        $sql = "UPDATE {$tableName} SET $par_str WHERE `id`=:id";
        Db::getInstance()->execute($sql, $params);
        foreach ($columns as $value)
            $this->props[$value] = false;
        return $this;
    }

    public function delete()
    {
        $tableName = static::getTableName();
        $sql = "DELETE FROM {$tableName} WHERE id=:id";
        Db::getInstance()->execute($sql, [':id' => $this->id]);
    }

    public function save()
    {
        if ($this->id == null)
            return $this->insert();
        else
            return $this->update();
    }
}