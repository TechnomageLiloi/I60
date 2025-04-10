<?php

namespace Liloi\I60\Domains\Tickets;

use Liloi\I60\Domains\Manager as DomainManager;
use Liloi\Rune\Domain\Config\Manager as ConfigManager;
use Liloi\Rune\Domain\Config\Keys as ConfigKeys;

class Manager extends DomainManager
{
    /**
     * Get table name.
     *
     * @return string
     */
    public static function getTableName(): string
    {
        return self::getTablePrefix() . 'tickets';
    }

    public static function loadCollection(): Collection
    {
        $name = self::getTableName();

        $rows = self::getAdapter()->getArray(sprintf(
            'select * from %s order by key_ticket desc;',
            $name
        ));

        $collection = new Collection();

        foreach($rows as $row)
        {
            $collection[$row['key_ticket']] = Entity::create($row);
        }

        return $collection;
    }

    public static function load(string $key): Entity
    {
        $name = self::getTableName();

        $row = self::getAdapter()->getRow(sprintf(
            'select * from %s where key_ticket="%s"',
            $name,
            $key
        ));

        return Entity::create($row);
    }

    public static function save(Entity $entity): void
    {
        $name = self::getTableName();
        $data = $entity->get();

        // @todo: Get param name from const.
        $key = $data['key_ticket'];
        unset($data['key_ticket']);

        self::getAdapter()->update(
            $name,
            $data,
            sprintf('key_ticket = "%s"', $key)
        );
    }

    public static function create(): void
    {
        $name = self::getTableName();
        self::getAdapter()->insert($name, [
            'title' => 'Enter the title',
            'status' => Statuses::TODO,
            'start' => date('Y-m-d H:i:s'),
            'finish' => date('Y-m-d H:i:s'),
            'trophy' => '0',
            'data' => '{}'
        ]);
    }
}