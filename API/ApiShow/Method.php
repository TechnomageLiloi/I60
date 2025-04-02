<?php

namespace Liloi\I60\API\ApiShow;

use Liloi\I60\Domains\Problems\Manager as ProblemsManager;
use Liloi\I60\Domains\Road\Manager as RoadManager;

class Method
{
    protected function render(string $template, array $data = []): string
    {
        // @todo: assert filename

        extract($data);

        ob_start();
        include($template);
        $output = ob_get_clean();

        return $output;
    }

    public function execute(): array
    {
        $collection = RoadManager::loadCollection();
        $problems = ProblemsManager::loadCollection();

        return [
            'render' => $this->render(__DIR__ . '/Show.tpl', [
                'collection' => $collection,
                'problems' => $problems
            ])
        ];
    }
}