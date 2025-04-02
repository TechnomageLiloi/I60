<?php

namespace Liloi\I60\API\ApiProblemRemove;

use Liloi\I60\Domains\Problems\Manager as ProblemsManager;

class Method
{
    public function execute(): array
    {
        $entity = ProblemsManager::load($_POST['parameters']['key']);
        $entity->remove();
        return [];
    }
}