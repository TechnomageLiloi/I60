<?php

namespace Liloi\I60\API\Journals\Create;

use Liloi\I60\API\Method as AbstractMethod;
use Liloi\I60\Domains\Levels\Manager as LevelsManager;

class Method extends AbstractMethod
{
    public function execute(): array
    {
        LevelsManager::create();
        return [];
    }
}