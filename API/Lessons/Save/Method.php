<?php

namespace Liloi\I60\API\Lessons\Save;

use Liloi\I60\API\Method as AbstractMethod;
use Liloi\I60\Domains\Lessons\Manager as LessonsManager;

class Method extends AbstractMethod
{
    public function execute(): array
    {
        $entity = LessonsManager::load($_POST['parameters']['key_lesson']);

        $entity->setTitle($_POST['parameters']['title']);
        $entity->setProgram($_POST['parameters']['program']);
        $entity->setStatus($_POST['parameters']['status']);

        $entity->save();

        return [];
    }
}