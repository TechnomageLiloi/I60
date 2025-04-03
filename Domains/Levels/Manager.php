<?php

namespace Liloi\I60\Domains\Levels;

use Liloi\Rune\Domain\Manager as DomainManager;

class Manager extends DomainManager
{
    /**
     * Get table name.
     *
     * @return string
     */
    public static function getTableName(): string
    {
        return self::getTablePrefix() . 'levels';
    }

    public static function loadCollection(): Collection
    {
        $name = self::getTableName();

        $rows = self::getAdapter()->getArray(sprintf(
            'select * from %s order by key_level asc;',
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
            'select * from %s where key_level="%s"',
            $name,
            $key
        ));

        return Entity::create($row);
    }

    public static function loadLevel(): int
    {
        $name = self::getTableName();

        $level = self::getAdapter()->getSingle(sprintf(
            'select key_level from %s where status="%s" order by key_level desc limit 1',
            $name, Statuses::DEFENDED
        ));

        if($level === false)
        {
            return 0;
        }

        return (int)$level;
    }

    public static function save(Entity $entity): void
    {
        $name = self::getTableName();
        $data = $entity->get();

        // @todo: Get param name from const.
        $key = $data['key_level'];
        unset($data['key_level']);

        self::getAdapter()->update(
            $name,
            $data,
            sprintf('key_level = "%s"', $key)
        );
    }

    // @todo: rise this method to more abstract level.
    public static function create(): void
    {
        $name = self::getTableName();
        self::getAdapter()->insert($name, [
            'title' => 'Enter the title',
            'status' => Statuses::NOT_DEFENDED,
            'program' => '// comment',
            'goal' => 'Goal: -'
        ]);
    }

    public static function getList(): array
    {
        $name = self::getTableName();

        $rows = self::getAdapter()->getArray(sprintf(
            'select key_level, title from %s where status!="%s" order by key_level asc;',
            $name, Statuses::NOT_DEFENDED
        ));

        $listDefended = [];

        foreach($rows as $row)
        {
            $listDefended[$row['key_level']] = $row['title'];
        }

        return $listDefended;
    }

    public static function getListResource(): array
    {
        $name = self::getTableName();

        $rows = self::getAdapter()->getArray(sprintf(
            'select key_level, title, resource from %s where status!="%s" order by key_level asc;',
            $name, Statuses::NOT_DEFENDED
        ));

        $listDefended = [];

        foreach($rows as $row)
        {
            $listDefended[$row['key_level']] = $row['resource'] . ' (' . $row['title'] . ')';
        }

        return $listDefended;
    }
}