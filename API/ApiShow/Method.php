<?php

namespace Liloi\I60\API\ApiShow;

use Liloi\I60\Domains\Problems\Manager as ProblemsManager;
use Liloi\I60\Domains\Road\Manager as RoadManager;
use Liloi\I60\API\Method as AbstractMethod;

class Method extends AbstractMethod
{

    public function execute(): array
    {
        $collection = RoadManager::loadCollection();
        $problems = ProblemsManager::loadCollection();

        return [
            'render' => $this->render(__DIR__ . '/Show.tpl', [
                'collection' => $collection,
                'problems' => $problems
            ])
        ];
    }
}