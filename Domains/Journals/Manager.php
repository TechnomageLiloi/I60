<?php

namespace Liloi\I60\Domains\Journals;

use Liloi\Rune\Domain\Manager as DomainManager;
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
        return self::getTablePrefix() . 'journals';
    }

    public static function loadCollection(): Collection
    {
        $name = self::getTableName();

        $rows = self::getAdapter()->getArray(sprintf(
            'select * from %s order by key_journal asc;',
            $name
        ));

        $collection = new Collection();

        foreach($rows as $row)
        {
            $collection[] = Entity::create($row);
        }

        return $collection;
    }

    public static function load(string $key): Entity
    {
        $name = self::getTableName();

        $row = self::getAdapter()->getRow(sprintf(
            'select * from %s where key_journal="%s"',
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
        $key = $data['key_journal'];
        unset($data['key_journal']);

        self::getAdapter()->update(
            $name,
            $data,
            sprintf('key_journal = "%s"', $key)
        );
    }

    // @todo: rise this method to more abstract level.
    public static function create(string $keyQuest): void
    {
        $name = self::getTableName();
        self::getAdapter()->insert($name, [
            'key_quest' => $keyQuest,
            'title' => 'Enter the title',
            'status' => Statuses::TODO,
            'program' => '// comment'
        ]);
    }
}