<?php

namespace Liloi\I60\API\Problems\Create;

use Liloi\I60\API\Method as AbstractMethod;
use Liloi\I60\Domains\Problems\Manager as ProblemsManager;

class Method extends AbstractMethod
{
    public function execute(): array
    {
        ProblemsManager::create($_POST['parameters']['key_lesson']);
        return [];
    }
}