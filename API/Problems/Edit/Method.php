<?php

namespace Liloi\I60\API\Problems\Edit;

use Liloi\I60\Domains\Levels\Statuses as LevelsStatuses;
use Liloi\I60\Domains\Levels\Manager as LevelsManager;
use Liloi\I60\API\Method as AbstractMethod;

class Method extends AbstractMethod
{
    public function execute(): array
    {
        $entity = LevelsManager::load($_POST['parameters']['key']);

        return [
            'render' => $this->render(__DIR__ . '/Template.tpl', [
                'entity' => $entity,
                'statuses' => LevelsStatuses::$list,
            ])
        ];
    }
}