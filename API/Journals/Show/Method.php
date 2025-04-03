<?php

namespace Liloi\I60\API\Journals\Show;

use Liloi\Rune\Modules\Levels\Domain\Levels\Manager;
use Liloi\I60\API\Method as AbstractMethod;

class Method extends AbstractMethod
{
    public function execute(): array
    {
        $entity = Manager::load($_POST['parameters']['key']);

        return [
            'render' => $this->render(__DIR__ . '/Template.tpl', [
                'entity' => $entity
            ])
        ];
    }
}