<?php

namespace Liloi\I60;

use Rune\Application\General as GeneralApplication;

class Application extends GeneralApplication
{
    const PREFIX = 'Liloi\I60';

    public function __construct(array $config)
    {
        parent::__construct($config);

        spl_autoload_register(function ($className) {
            if(!str_starts_with($className, self::PREFIX))
            {
                return;
            }

            $className = str_replace(self::PREFIX, '', $className);
            $className = str_replace('\\', '/', $className);

            $file = __DIR__ . $className . '.php';

            if(file_exists($file))
            {
                require_once $file;
            }
        });
    }

    public function apiLayout(): array
    {
        return [
            'render' => $this->render(__DIR__ . '/Layout.tpl')
        ];
    }

    public function apiShow(): array
    {
        return [
            'render' => $this->render(__DIR__ . '/Show.tpl')
        ];
    }
}