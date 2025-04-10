<?php

namespace Liloi\I60\API\Tickets\Collection;

use Liloi\I60\API\Method as AbstractMethod;
use Liloi\I60\Domains\Tickets\Manager as TicketsManager;

use Liloi\I60\Domains\Config\Keys as ConfigKeys;
use Liloi\I60\Domains\Config\Manager as ConfigManager;

/**
 * Rune API: Blueprint.Blueprints.Show
 * @package Liloi\Librarium\API\Blueprints\Show
 */
class Method extends AbstractMethod
{
    public function execute(): array
    {
        $tickets = TicketsManager::loadCollection();

        return [
            'render' => $this->render(__DIR__ . '/Template.tpl', [
                'tickets' => $tickets
            ])
        ];
    }
}