<?php

namespace Liloi\I60\API\Journals\Edit;

use Liloi\I60\Domains\Journals\Statuses as LevelsStatuses;
use Liloi\I60\API\Method as AbstractMethod;
use Liloi\I60\Domains\Journals\Manager as JournalsManager;

class Method extends AbstractMethod
{
    public function execute(): array
    {
        $entity = JournalsManager::load($_POST['parameters']['key_journal']);

        return [
            'render' => $this->render(__DIR__ . '/Template.tpl', [
                'entity' => $entity,
                'statuses' => LevelsStatuses::$list,
            ])
        ];
    }
}