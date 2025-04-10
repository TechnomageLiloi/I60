<?php

namespace Liloi\I60\API\Tickets\Edit;

use Liloi\I60\Domains\Tickets\Statuses as LevelsStatuses;
use Liloi\I60\API\Method as AbstractMethod;
use Liloi\I60\Domains\Tickets\Manager as TicketsManager;

class Method extends AbstractMethod
{
    public function execute(): array
    {
        $entity = TicketsManager::load($_POST['parameters']['key_ticket']);

        return [
            'render' => $this->render(__DIR__ . '/Template.tpl', [
                'entity' => $entity,
                'statuses' => LevelsStatuses::$list,
            ])
        ];
    }
}