<?php

namespace Liloi\I60\API\Journals\Collection;

use Liloi\I60\API\Method as AbstractMethod;
use Liloi\I60\Domains\Journals\Manager as JournalsManager;

/**
 * Rune API: Blueprint.Blueprints.Show
 * @package Liloi\Librarium\API\Blueprints\Show
 */
class Method extends AbstractMethod
{
    public function execute(): array
    {
        $keyProblem = $_POST['parameters']['key_problem'];
        $journals = JournalsManager::loadCollection($keyProblem);

        return [
            'render' => $this->render(__DIR__ . '/Template.tpl', [
                'journals' => $journals,
                'key_problem' => $keyProblem,
            ])
        ];
    }
}