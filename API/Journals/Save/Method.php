<?php

namespace Liloi\I60\API\Journals\Save;

use Liloi\I60\API\Method as AbstractMethod;
use Liloi\I60\Domains\Journals\Manager as JournalsManager;

class Method extends AbstractMethod
{
    public function execute(): array
    {
        $entity = JournalsManager::load($_POST['parameters']['key_journal']);

        $entity->setTitle($_POST['parameters']['title']);
        $entity->setStatus($_POST['parameters']['status']);

        $entity->save();

        return [];
    }
}