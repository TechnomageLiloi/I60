<?php

namespace Liloi\I60\API\Lessons\Collection;

use Liloi\API\Response;
use Liloi\I60\API\Method as AbstractMethod;
use Liloi\I60\Domains\Lessons\Manager as LessonsManager;
use Liloi\I60\Domains\Levels\Manager as LevelsManager;

/**
 * Rune API: Blueprint.Blueprints.Show
 * @package Liloi\Librarium\API\Blueprints\Show
 */
class Method extends AbstractMethod
{
    public function execute(): array
    {
        $lessons = LessonsManager::loadCollection($_POST['parameters']['key_level']);

        return [
            'render' => $this->render(__DIR__ . '/Template.tpl', [
                'lessons' => $lessons
            ])
        ];
    }
}