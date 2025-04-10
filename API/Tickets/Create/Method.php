<?php

namespace Liloi\I60\API\Tickets\Create;

use Liloi\I60\API\Method as AbstractMethod;
use Liloi\I60\Domains\Tickets\Manager as TicketsManager;

class Method extends AbstractMethod
{
    public function execute(): array
    {
        TicketsManager::create();
        return [];
    }
}