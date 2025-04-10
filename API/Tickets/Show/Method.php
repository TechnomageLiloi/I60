<?php

namespace Liloi\I60\API\Tickets\Show;

use Liloi\Rune\Modules\Levels\Domain\Levels\Manager;
use Liloi\I60\API\Method as AbstractMethod;
use Liloi\I60\Domains\Tickets\Manager as TicketsManager;

class Method extends AbstractMethod
{
    public function execute(): array
    {
        $entity = TicketsManager::load($_POST['parameters']['key_ticket']);

        return [
            'render' => $this->render(__DIR__ . '/Template.tpl', [
                'entity' => $entity
            ])
        ];
    }
}