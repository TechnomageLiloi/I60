<?php

namespace Liloi\I60\Domains\Lessons;

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
        return self::getTablePrefix() . 'lessons';
    }

    public static function loadCollection(string $keyLevel): Collection
    {
        $name = self::getTableName();

        $rows = self::getAdapter()->getArray(sprintf(
            'select * from %s where key_level="%s" order by key_lesson desc;',
            $name, $keyLevel
        ));

        $collection = new Collection();

        foreach($rows as $row)
        {
            $collection[$row['key_lesson']] = Entity::create($row);
        }

        return $collection;
    }

    public static function load(string $key): Entity
    {
        $name = self::getTableName();

        $row = self::getAdapter()->getRow(sprintf(
            'select * from %s where key_lesson="%s"',
            $name,
            $key
        ));

        return Entity::create($row);
    }

    public static function loadLevel(): int
    {
        $name = self::getTableName();

        $level = self::getAdapter()->getSingle(sprintf(
            'select key_lesson from %s where status="%s" order by key_lesson desc limit 1',
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
        $key = $data['key_lesson'];
        unset($data['key_lesson']);

        self::getAdapter()->update(
            $name,
            $data,
            sprintf('key_lesson = "%s"', $key)
        );
    }

    // @todo: rise this method to more abstract level.
    public static function create(string $keyLevel): void
    {
        $name = self::getTableName();
        self::getAdapter()->insert($name, [
            'key_level' => $keyLevel,
            'title' => 'Enter the title',
            'status' => Statuses::TODO,
            'program' => '// comment',
            'data' => '{}'
        ]);
    }
}