<?php

namespace Liloi\I60\API;

abstract class Method
{
    public function render(string $template, array $data = []): string
    {
        // @todo: assert filename

        extract($data);

        ob_start();
        include($template);
        $output = ob_get_clean();

        return $output;
    }

    abstract public function execute(): array;
}