<?php

namespace app\controllers;

use app\models\User;

class ShopController extends Controller
{
    public function actionIndex()
    {
        echo $this->render('index', ['name' => 'Konst']);
    }

    public function actionInsertUser()
    {
        $user = new User('Администратор', 'admin@mail.ru', '1234', 'admin');
        $user->save();
        echo "Пользователь {$user->name} сохранен!";
    }
}
