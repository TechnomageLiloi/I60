<?php

namespace Liloi\I60\API\Problems\Save;

use Liloi\I60\API\Method as AbstractMethod;
use Liloi\I60\Domains\Levels\Manager as LevelsManager;

class Method extends AbstractMethod
{
    public function execute(): array
    {
        $entity = LevelsManager::load($_POST['parameters']['key']);

        $entity->setTitle($_POST['parameters']['title']);
        $entity->setProgram($_POST['parameters']['program']);
        $entity->setStatus($_POST['parameters']['status']);
        $entity->setGoal($_POST['parameters']['goal']);

        $entity->save();

        return [];
    }
}