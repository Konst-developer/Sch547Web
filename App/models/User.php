<?php

namespace app\models;

class User extends DBModel
{
    protected $id;
    protected $name;
    protected $email;
    protected $password;
    protected $role;

    protected $props = [
        'name' => false,
        'email' => false,
        'password' => false,
        'role' => false,
    ];

    public function __construct($name = 'User', $email = 'mail@mail.ru', $password = null, $role = 'user')
    {
        $this->name = $name;
        $this->email = $email;
        $this->password = password_hash($password, PASSWORD_DEFAULT);
        $this->role = $role;
    }

    public static function getTableName()
    {
        return 'users';
    }
}