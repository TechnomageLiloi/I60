<?php

namespace Liloi\I60;

use Liloi\Config\Pool;
use Liloi\Config\Sparkle;
use Liloi\I60\API\Method;
use Liloi\I60\Domain\Config\Manager as ConfigManager;
use Liloi\I60\Domain\Manager as DomainManager;
use Rune\Application\General as GeneralApplication;

/**
 * I60 application.
 *
 * @package Liloi\I60
 */
class Application extends GeneralApplication
{
    /**
     * @inheritDoc
     */
    public function __construct(array $config)
    {
        parent::__construct($config);

        Pool::getSingleton()->set(new Sparkle('connection', function() use ($config) { return $config['connection'];}));
        Pool::getSingleton()->set(new Sparkle('admin', function() use ($config) { return $config['admin'];}));
        Pool::getSingleton()->set(new Sparkle('prefix', function() use ($config) { return $config['prefix'];}));
        Pool::getSingleton()->set(new Sparkle('root', function() use ($config) { return $config['root'];}));
        DomainManager::setConfig(Pool::getSingleton());
        Method::setConfig($config);
    }

    /**
     * @inheritDoc
     */
    public function compile(): string
    {
        if(isset($_POST['method']))
        {
            return json_encode(['response' => $this->api($_POST['method'], $_POST['parameters'])]);
        }

        return $this->render(__DIR__ . '/Layout.tpl', [
            'config' => $this->getConfig()
        ]);
    }

    /**
     * @inheritDoc
     */
    public function api(string $name, array $parameters): array
    {
        if(!in_array($name, ['Admin.Show', 'Admin.Login']))
        {
            if(!$_SESSION['admin'])
            {
                $update = ConfigManager::load('update')->getString();
                if($update)
                {
                    return [
                        'render' => '<div style="text-align: center; font-size: xx-large;">Updating I60 game.</div>'
                    ];
                }
            }
        }

        if(empty($parameters)) {
            $parameters = [];
        }

        if(method_exists($this, $name)) {
            return $this->$name($parameters);
        }

        $classMethod = 'Liloi\\I60\\API\\' . ucfirst(str_replace('.', '\\', $name)) . '\\Method';

        if(class_exists($classMethod))
        {
            $apiMethod = new $classMethod();
            return $apiMethod->execute();
        }

        throw new \Exception('No API method.');
    }
}