<?php

namespace Liloi\I60\API\ApiSave;

use Liloi\I60\Domains\Road\Manager as RoadManager;

class Method
{
    public function execute(): array
    {
        $entity = RoadManager::load($_POST['parameters']['key']);

        $entity->setTitle($_POST['parameters']['title']);
        $entity->setSummary($_POST['parameters']['summary']);
        $entity->setStatus($_POST['parameters']['status']);
        $entity->setType($_POST['parameters']['type']);
        $entity->setData($_POST['parameters']['data']);

        $entity->save();

        return [];
    }
}