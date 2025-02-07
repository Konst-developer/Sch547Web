<?php

namespace   app\controllers;

use app\interfaces\IRenderer;

class Controller
{
    protected $action;
    protected $defaultAction = 'index';
    protected $render;

    public function __construct(IRenderer $render)
    {
        $this->render = $render;
    }

    protected function renderTemplate($template, $params = [])
    {
        return $this->render->renderTemplate($template, $params);
    }

    protected function render($template, $params = [])
    {
        return $this->renderTemplate(
            'layouts/page',
            [
                'header' => $this->renderTemplate('header', []),
                'content' => $this->renderTemplate($template, $params),
                'footer' => $this->renderTemplate('footer', []),
            ]
        );
    }

    public function runAction($action)
    {
        $this->action = $action ?: $this->defaultAction;
        $method = 'action' . ucfirst($this->action);
        if (method_exists($this, $method))
            $this->$method();
        else
            echo "Метод " . $method . " не найден!";
    }
}