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
        $key_lesson = $_POST['parameters']['key_lesson'];
        $problems = ProblemsManager::loadCollection($key_lesson);

        return [
            'render' => $this->render(__DIR__ . '/Template.tpl', [
                'problems' => $problems,
                'key_problem' => $key_lesson,
            ])
        ];
    }
}