<?php

namespace Liloi\I60\API\ApiCreate;

use Liloi\I60\Domains\Road\Manager as RoadManager;

class Method
{
    public function execute(): array
    {
        RoadManager::create();
        return [];
    }
}