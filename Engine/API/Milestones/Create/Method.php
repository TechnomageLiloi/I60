<?php

namespace Liloi\I60\API\Milestones\Create;

use Liloi\I60\API\Method as SuperMethod;
use Liloi\I60\Domain\Milestones\Manager as DiaryManager;

class Method extends SuperMethod
{
    public function execute(): array
    {
        DiaryManager::create();
        return [];
    }
}