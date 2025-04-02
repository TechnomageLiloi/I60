<?php

namespace Liloi\I60\API\ApiProblemEdit;

use Liloi\I60\Domains\Problems\Manager as ProblemsManager;
use Liloi\I60\API\Method as AbstractMethod;

class Method extends AbstractMethod
{
    public function execute(): array
    {
        $entity = ProblemsManager::load($_POST['parameters']['key']);

        return [
            'render' => $this->render(__DIR__ . '/ProblemEdit.tpl', [
                'entity' => $entity
            ])
        ];
    }
}