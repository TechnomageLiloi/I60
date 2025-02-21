<?php

namespace Liloi\I60\Domains\Road;

use Liloi\I60\Domains\Manager as DomainManager;

class Manager extends DomainManager
{
    /**
     * Get table name.
     *
     * @return string
     */
    public static function getTableName(): string
    {
        return self::getTablePrefix() . 'road';
    }

    public static function loadCollection(): Collection
    {
        $name = self::getTableName();

        $rows = self::getAdapter()->getArray(sprintf(
            'select * from %s where key_road between "%s 00:00:00" and "%s 23:59:59" order by key_road desc;',
            $name, date('Y-m-d'), date('Y-m-d')
        ));

        $collection = new Collection();

        foreach($rows as $row)
        {
            $collection[] = Entity::create($row);
        }

        return $collection;
    }

    /**
     * Load problem from database.
     *
     * @param string $keyRoad
     * @return Entity
     */
    public static function load(string $keyRoad): Entity
    {
        $name = self::getTableName();

        $row = self::getAdapter()->getRow(sprintf(
            'select * from %s where key_road="%s"',
            $name,
            $keyRoad
        ));

        return Entity::create($row);
    }

    /**
     * Save problem to database.
     *
     * @param Entity $entity
     */
    public static function save(Entity $entity): void
    {
        $name = self::getTableName();
        $data = $entity->get();

        $RID = $data['key_road'];

        self::update(
            $name,
            $data,
            sprintf('key_road = "%s"', $RID)
        );
    }

    /**
     * Create problem in database.
     */
    public static function create(string $RID): Entity
    {
        $name = self::getTableName();
        $data = [
            'key_road' => $RID,
            'title' => $RID,
            'summary' => '// summary',
            'status' => Statuses::TODO,
            'type' => Types::NOTE,
            'data' => '{}'
        ];

        self::insert($name, $data);
        return Entity::create($data);
    }
}