<?php

namespace Liloi\I60\API\Levels\Show;

use Liloi\I60\API\Method as AbstractMethod;
use Liloi\I60\Domains\Levels\Manager as LevelsManager;

class Method extends AbstractMethod
{
    public function execute(): array
    {
        $entity = LevelsManager::load($_POST['parameters']['key']);

        return [
            'render' => $this->render(__DIR__ . '/Template.tpl', [
                'entity' => $entity
            ])
        ];
    }
}