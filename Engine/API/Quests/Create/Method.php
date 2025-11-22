<?php

namespace Liloi\I60\API\Quests\Create;

use Liloi\I60\API\Method as SuperMethod;
use Liloi\I60\Domain\Quests\Manager as DiaryManager;

class Method extends SuperMethod
{
    public function execute(): array
    {
        $this->checkAccess();
        DiaryManager::create();
        return [];
    }
}