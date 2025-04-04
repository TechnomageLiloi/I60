<?php

namespace Liloi\I60\API\Lessons\Edit;

use Liloi\I60\Domains\Lessons\Statuses as LessonsStatuses;
use Liloi\I60\Domains\Lessons\Manager as LessonsManager;
use Liloi\I60\API\Method as AbstractMethod;

class Method extends AbstractMethod
{
    public function execute(): array
    {
        $entity = LessonsManager::load($_POST['parameters']['key_level']);

        return [
            'render' => $this->render(__DIR__ . '/Template.tpl', [
                'entity' => $entity,
                'statuses' => LessonsStatuses::$list,
            ])
        ];
    }
}