<?php

namespace Liloi\I60\API\Journals\Create;

use Liloi\I60\API\Method as AbstractMethod;
use Liloi\I60\Domains\Journals\Manager as JournalsManager;

class Method extends AbstractMethod
{
    public function execute(): array
    {
        $keyProblem = $_POST['parameters']['key_problem'];
        JournalsManager::create($keyProblem);
        return [];
    }
}