<?php

namespace Liloi\I60\API\Tickets\Save;

use Liloi\I60\API\Method as AbstractMethod;
use Liloi\I60\Domains\Tickets\Manager as TicketsManager;

class Method extends AbstractMethod
{
    public function execute(): array
    {
        $entity = TicketsManager::load($_POST['parameters']['key_ticket']);

        $entity->setTitle($_POST['parameters']['title']);
        $entity->setStatus($_POST['parameters']['status']);

        $entity->save();

        return [];
    }
}