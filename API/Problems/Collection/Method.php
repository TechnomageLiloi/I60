<?php

namespace Liloi\I60\API\Problems\Collection;

use Liloi\I60\API\Method as AbstractMethod;
use Liloi\I60\Domains\Problems\Manager as ProblemsManager;

/**
 * Rune API: Blueprint.Blueprints.Show
 * @package Liloi\Librarium\API\Blueprints\Show
 */
class Method extends AbstractMethod
{
    public function execute(): array
    {
        $keyProblem = $_POST['parameters']['key_problem'];
        $problems = ProblemsManager::loadCollection($keyProblem);

        return [
            'render' => $this->render(__DIR__ . '/Template.tpl', [
                'problems' => $problems,
                'key_problem' => $keyProblem,
            ])
        ];
    }
}