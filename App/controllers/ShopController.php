<?php

namespace app\controllers;

class ShopController extends Controller
{
    public function actionIndex()
    {
        echo $this->render('index', ['name' => 'Konst']);
    }
}