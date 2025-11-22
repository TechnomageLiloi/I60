<?php

namespace Liloi\I60\API\Quests\Show;

use Liloi\I60\API\Method as SuperMethod;
use Liloi\I60\Domain\Quests\Manager as DiaryManager;

class Method extends SuperMethod
{
    public function execute(): array
    {
        $entity = DiaryManager::load(
            $_POST['parameters']['key_quest'],
            $_POST['parameters']['key_milestone'],
            $_POST['parameters']['key_epoch']
        );

        return [
            'render' => $this->render(__DIR__ . '/Template.tpl', [
                'entity' => $entity
            ])
        ];
    }
}