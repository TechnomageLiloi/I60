<?php

namespace Liloi\I60\API\Milestones\Collection;

use Liloi\I60\API\Method as SuperMethod;
use Liloi\I60\Domain\Milestones\Manager as DiaryManager;

class Method extends SuperMethod
{
    public function execute(): array
    {
        $collection = DiaryManager::loadCollection();

        return [
            'render' => $this->render(__DIR__ . '/Template.tpl', [
                'collection' => $collection,
            ])
        ];
    }
}