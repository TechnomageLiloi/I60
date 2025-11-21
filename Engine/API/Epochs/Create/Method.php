<?php

namespace Liloi\I60\API\Epochs\Create;

use Liloi\I60\API\Method as SuperMethod;
use Liloi\I60\Domain\Epochs\Manager as DiaryManager;

class Method extends SuperMethod
{
    public function execute(): array
    {
        DiaryManager::create();
        return [];
    }
}