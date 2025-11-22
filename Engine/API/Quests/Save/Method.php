<?php

namespace Liloi\I60\API\Quests\Save;

use Liloi\I60\API\Method as SuperMethod;
use Liloi\I60\Domain\Quests\Manager as DiaryManager;

class Method extends SuperMethod
{
    public function execute(): array
    {
        $entity = DiaryManager::load(
            $_POST['parameters']['key_quest'],
            $_POST['parameters']['key_milestone'],
            $_POST['parameters']['key_epoch']
        );

        $entity->setStatus($_POST['parameters']['status']);
        $entity->setType($_POST['parameters']['type']);
        $entity->setSummary($_POST['parameters']['summary']);
        $entity->setTitle($_POST['parameters']['title']);
        $entity->setData($_POST['parameters']['data']);

        $entity->save();

        return [];
    }
}