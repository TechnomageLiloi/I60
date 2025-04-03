<?php

namespace Liloi\I60\API\Show;

use Liloi\I60\API\Method as AbstractMethod;

class Method extends AbstractMethod
{
    public function execute(): array
    {
        return [
            'render' => $this->render(__DIR__ . '/Show.tpl', [

            ])
        ];
    }
}