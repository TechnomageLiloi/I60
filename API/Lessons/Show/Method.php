<?php

namespace Liloi\I60\API\Lessons\Show;

use Liloi\I60\API\Method as AbstractMethod;
use Liloi\I60\Domains\Lessons\Manager as LessonsManager;

class Method extends AbstractMethod
{
    public function execute(): array
    {
        $entity = LessonsManager::load($_POST['parameters']['key_level']);

        return [
            'render' => $this->render(__DIR__ . '/Template.tpl', [
                'entity' => $entity
            ])
        ];
    }
}