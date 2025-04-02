<?php

namespace Liloi\I60\API\ApiProblemCreate;

use Liloi\I60\Domains\Problems\Manager as ProblemsManager;

class Method
{
    public function execute(): array
    {
        ProblemsManager::create();
        return [];
    }
}