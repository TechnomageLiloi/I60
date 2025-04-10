<?php

namespace Liloi\I60;

use Rune\Application\General as GeneralApplication;
use Liloi\I60\Domains\Manager as DomainsManager;
use Liloi\Config\Pool;
use Liloi\Config\Sparkle;
use Liloi\I60\Exceptions\NotFoundException;

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

        Pool::getSingleton()->set(new Sparkle('connection', function() use ($config) { return $config['connection'];}));
        Pool::getSingleton()->set(new Sparkle('prefix', function() use ($config) { return $config['prefix'];}));
        DomainsManager::setConfig(Pool::getSingleton());
    }

    /**
     * Gets response of API method.
     *
     * @param string $name API method name.
     * @param array $parameters API parameters.
     * @return array API
     * @throws \Exception
     */
    public function api(string $name, array $parameters): array
    {
        if(empty($parameters)) {
            $parameters = [];
        }

        if(method_exists($this, $name)) {
            return $this->$name($parameters);
        }

        $classMethod = self::PREFIX . '\\API\\' . ucfirst(str_replace('.', '\\', $name)) . '\\Method';

        if(class_exists($classMethod))
        {
            $apiMethod = new $classMethod();
            return $apiMethod->execute();
        }

        throw new NotFoundException('No API method.');
    }

    public function apiLayout(): array
    {
        return [
            'render' => $this->render(__DIR__ . '/API/Layout.tpl', [
                'config' => $this->getConfig()
            ]),
        ];
    }
}