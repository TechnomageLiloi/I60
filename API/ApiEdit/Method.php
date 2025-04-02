<?php

namespace Liloi\I60\API\ApiEdit;

use Liloi\I60\Domains\Road\Manager as RoadManager;
use Liloi\I60\API\Method as AbstractMethod;
use Liloi\I60\Domains\Road\Statuses as RoadStatus;
use Liloi\I60\Domains\Road\Types as RoadTypes;

class Method extends AbstractMethod
{

    public function execute(): array
    {
        $entity = RoadManager::load($_POST['parameters']['key']);

        return [
            'render' => $this->render(__DIR__ . '/Edit.tpl', [
                'entity' => $entity,
                'statuses' => RoadStatus::$list,
                'types' => RoadTypes::$list,
            ])
        ];
    }
}