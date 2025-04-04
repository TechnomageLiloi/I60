<?php

namespace Liloi\I60\API\Problems\Save;

use Liloi\I60\API\Method as AbstractMethod;
use Liloi\I60\Domains\Problems\Manager as ProblemsManager;

class Method extends AbstractMethod
{
    public function execute(): array
    {
        $entity = ProblemsManager::load($_POST['parameters']['key_problem']);

        $entity->setTitle($_POST['parameters']['title']);
        $entity->setProgram($_POST['parameters']['program']);
        $entity->setStatus($_POST['parameters']['status']);

        $entity->save();

        return [];
    }
}