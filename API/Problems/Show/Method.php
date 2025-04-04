<?php

namespace Liloi\I60\API\Problems\Show;

use Liloi\I60\API\Method as AbstractMethod;
use Liloi\I60\Domains\Problems\Manager as ProblemsManager;

class Method extends AbstractMethod
{
    public function execute(): array
    {
        $entity = ProblemsManager::load($_POST['parameters']['key_problem']);

        return [
            'render' => $this->render(__DIR__ . '/Template.tpl', [
                'entity' => $entity
            ])
        ];
    }
}