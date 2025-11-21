<?php

namespace Liloi\I60\API\Epochs\Show;

use Liloi\I60\API\Method as SuperMethod;
use Liloi\I60\Domain\Epochs\Manager as DiaryManager;

class Method extends SuperMethod
{
    public function execute(): array
    {
        $this->checkAccess();
        $entity = DiaryManager::load($_POST['parameters']['key_epoch']);

        return [
            'render' => $this->render(__DIR__ . '/Template.tpl', [
                'entity' => $entity
            ])
        ];
    }
}