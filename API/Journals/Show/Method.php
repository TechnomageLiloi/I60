<?php

namespace Liloi\I60\API\Journals\Show;

use Liloi\Rune\Modules\Levels\Domain\Levels\Manager;
use Liloi\I60\API\Method as AbstractMethod;
use Liloi\I60\Domains\Journals\Manager as JournalsManager;

class Method extends AbstractMethod
{
    public function execute(): array
    {
        $entity = JournalsManager::load($_POST['parameters']['key_journal']);

        return [
            'render' => $this->render(__DIR__ . '/Template.tpl', [
                'entity' => $entity
            ])
        ];
    }
}