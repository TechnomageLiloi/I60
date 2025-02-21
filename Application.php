<?php

namespace Liloi\I60;

use Rune\Application\General as GeneralApplication;
use Liloi\I60\Domains\Road\Manager as RoadManager;
use Liloi\I60\Domains\Manager as DomainsManager;
use Liloi\Config\Pool;
use Liloi\Config\Sparkle;

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

    public function apiLayout(): array
    {
        return [
            'render' => $this->render(__DIR__ . '/Layout.tpl')
        ];
    }


    public function apiCreate(): array
    {
        RoadManager::create();
        return [];
    }

    public function apiShow(): array
    {
        $collection = RoadManager::loadCollection();

        return [
            'render' => $this->render(__DIR__ . '/Show.tpl', [
                'collection' => $collection
            ])
        ];
    }

    public function apiEdit(): array
    {
        $entity = RoadManager::load($_POST['parameters']['key']);

        return [
            'render' => $this->render(__DIR__ . '/Edit.tpl', [
                'entity' => $entity
            ])
        ];
    }

    public function apiSave(): array
    {
        $entity = RoadManager::load($_POST['parameters']['key']);

        $entity->setTitle($_POST['parameters']['title']);
        $entity->setSummary($_POST['parameters']['summary']);
        $entity->setStatus($_POST['parameters']['status']);
        $entity->setType($_POST['parameters']['type']);
        $entity->setData($_POST['parameters']['data']);

        $entity->save();

        return [];
    }
}