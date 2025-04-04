<?php

namespace Liloi\I60\API\Lessons\Create;

use Liloi\I60\API\Method as AbstractMethod;
use Liloi\I60\Domains\Lessons\Manager as LessonsManager;

class Method extends AbstractMethod
{
    public function execute(): array
    {
        LessonsManager::create($_POST['parameters']['key_level']);
        return [];
    }
}