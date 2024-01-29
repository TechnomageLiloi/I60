<?php

namespace Liloi\Nexus\Domain\Topics;

use Liloi\Nexus\Domain\Manager as DomainManager;

class Manager extends DomainManager
{
    /**
     * Get table name.
     *
     * @return string
     */
    public static function getTableName(): string
    {
        return self::getTablePrefix() . 'topics';
    }

    public static function loadCollection(): Collection
    {
        $name = self::getTableName();

        $rows = self::getAdapter()->getArray(sprintf(
            'select * from %s order by key_topic desc;',
            $name
        ));

        $collection = new Collection();

        foreach($rows as $row)
        {
            $collection[] = Entity::create($row);
        }

        return $collection;
    }

    public static function loadPublished(): Collection
    {
        $name = self::getTableName();

        $rows = self::getAdapter()->getArray(sprintf(
            'select * from %s where status in ("%s", "%s") order by key_topic desc;',
            $name, Statuses::PUBLISHED, Statuses::DEPRECATED
        ));

        $collection = new Collection();

        foreach($rows as $row)
        {
            $collection[] = Entity::create($row);
        }

        return $collection;
    }

    public static function load(string $key_topic): Entity
    {
        $name = self::getTableName();

        $row = self::getAdapter()->getRow(sprintf(
            'select * from %s where key_topic="%s";',
            $name, $key_topic
        ));

        return Entity::create($row);
    }

    public static function save(Entity $entity): void
    {
        $name = self::getTableName();
        $data = $entity->get();
        unset($data['key_topic']);

        self::update($name, $data, sprintf('key_topic="%s"', $entity->getKey()));
    }

    public static function create(): void
    {
        self::getAdapter()->insert(self::getTableName(), [
            'title' => 'Enter the title',
            'url' => 'http://',
            'summary' => 'Enter the summary',
            'status' => Statuses::TODO,
            'tags' => 'Enter the tags',
            'ts' => date('Y-m-d H:i:s')
        ]);
    }
}