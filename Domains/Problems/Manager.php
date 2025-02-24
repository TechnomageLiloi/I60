<?php

namespace Liloi\I60\Domains\Problems;

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
        return self::getTablePrefix() . 'problems';
    }

    public static function loadCollection(): Collection
    {
        $name = self::getTableName();

        $rows = self::getAdapter()->getArray(sprintf(
            'select * from %s order by key_problem desc;',
            $name
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
            'select * from %s where key_problem="%s"',
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

        $RID = $data['key_problem'];

        self::update(
            $name,
            $data,
            sprintf('key_problem = "%s"', $RID)
        );
    }

    /**
     * Remove problem from database.
     *
     * @param Entity $entity
     */
    public static function remove(Entity $entity): void
    {
        $name = self::getTableName();
        $key = $entity->getKey();

        self::getAdapter()->delete($name, sprintf('key_problem="%s"', $key));
    }

    /**
     * Create problem in database.
     */
    public static function create(): Entity
    {
        $key = date('Y-m-d H:i:s');

        $name = self::getTableName();
        $data = [
            'key_problem' => $key,
            'title' => 'Enter the problem'
        ];

        self::insert($name, $data);
        return Entity::create($data);
    }
}