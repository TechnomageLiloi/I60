<?php

namespace Liloi\I60\API\Quests\Edit;

use Liloi\I60\API\Method as SuperMethod;
use Liloi\I60\Domain\Quests\Manager as DiaryManager;
use Liloi\I60\Domain\Quests\Statuses as QuestsStatuses;
use Liloi\I60\Domain\Quests\Types as QuestsTypes;

/**
 * Rune API: Interstate60.Application.Diary.Edit
 */
class Method extends SuperMethod
{
    public function execute(): array
    {
        $this->checkAccess();
        $entity = DiaryManager::load($_POST['parameters']['key_quest']);

        return [
            'render' => $this->render(__DIR__ . '/Template.tpl', [
                'entity' => $entity,
                'statuses' => QuestsStatuses::$list,
                'types' => QuestsTypes::$list,
            ])
        ];
    }
}