<?php

namespace Liloi\I60;

use Rune\Application\General as GeneralApplication;

class Application extends GeneralApplication
{
    public function apiLayout(): array
    {
        return [
            'render' => $this->render(__DIR__ . '/Layout.tpl')
        ];
    }

    public function apiShow(): array
    {
        return [
            'render' => $this->render(__DIR__ . '/Show.tpl')
        ];
    }
}