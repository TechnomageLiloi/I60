<?php

namespace Liloi\I60\API\ApiProblemSave;

use Liloi\I60\Domains\Problems\Manager as ProblemsManager;

class Method
{
    public function execute(): array
    {
        $entity = ProblemsManager::load($_POST['parameters']['key']);
        $entity->setTitle($_POST['parameters']['title']);
        $entity->save();

        return [];
    }
}