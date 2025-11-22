<?php

namespace Liloi\I60\API\Milestones\Edit;

use Liloi\I60\API\Method as SuperMethod;
use Liloi\I60\Domain\Milestones\Manager as DiaryManager;
use Liloi\I60\Domain\Milestones\Statuses as MilestonesStatuses;

/**
 * Rune API: Interstate60.Application.Diary.Edit
 */
class Method extends SuperMethod
{
    public function execute(): array
    {
        $entity = DiaryManager::load(
            $_POST['parameters']['key_milestone'],
            $_POST['parameters']['key_epoch']
        );

        return [
            'render' => $this->render(__DIR__ . '/Template.tpl', [
                'entity' => $entity,
                'statuses' => MilestonesStatuses::$list
            ])
        ];
    }
}