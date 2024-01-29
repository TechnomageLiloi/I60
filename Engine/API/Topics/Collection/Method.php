<?php

namespace Liloi\Nexus\API\Application\Topics\Collection;

use Liloi\API\Response;
use Liloi\Nexus\API\Method as SuperMethod;
use Liloi\Nexus\Domain\Topics\Manager;

/**
 * Rune API: Blueprint.Blueprints.Show
 * @package Liloi\Librarium\API\Blueprints\Show
 */
class Method extends SuperMethod
{
    public static function execute(): Response
    {
        $collection = Manager::loadPublished();

        $response = new Response();
        $response->set('render', static::render(__DIR__ . '/User.tpl'), [
            'collection' => $collection
        ]);

        return $response;
    }
}