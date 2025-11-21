<?php

namespace Liloi\I60\Domain\Epochs;

use Liloi\I60\Domain\Manager as DomainManager;

class Manager extends DomainManager
{
    /**
     * Get table name.
     *
     * @return string
     */
    public static function getTableName(): string
    {
        return self::getTablePrefix() . 'epochs';
    }

    public static function loadCollection(): Collection
    {
        $name = self::getTableName();

        $rows = self::getAdapter()->getArray(sprintf(
            'select * from %s order by key_epoch asc;',
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
     * Load day by key.
     *
     * @param string $keyEpoch
     * @return Entity
     */
    public static function load(string $keyEpoch): Entity
    {
        $name = self::getTableName();

        $row = self::getAdapter()->getRow(sprintf(
            'select * from %s where key_epoch="%s";',
            $name, $keyEpoch
        ));

        if(!$row)
        {
            self::create();
        }

        return Entity::create($row);
    }

    /**
     * Save day.
     *
     * @param Entity $entity
     */
    public static function save(Entity $entity): void
    {
        $name = self::getTableName();
        $data = $entity->get();
        unset($data['key_epoch']);

        self::update($name, $data, sprintf('key_epoch="%s"', $entity->getKey()));
    }

    /**
     * Create new day.
     */
    public static function create(): Entity
    {
        $data = [
            'title' => 'Enter the title',
            'status' => Statuses::TODO,
            'summary' => 'Enter the summary',
            'start' => date('Y-m-d'),
            'finish' => date('Y-m-d', strtotime('+1 year'))
        ];

        self::getAdapter()->insert(self::getTableName(), $data);

        return Entity::create($data);
    }

    public static function getHighestEpoch(): int
    {
        $name = self::getTableName();

        $epoch = self::getAdapter()->getSingle(sprintf(
            'select key_epoch from %s where status="%s" order by key_epoch desc;',
            $name, Statuses::DEFENDED
        ));

        if(!$epoch)
        {
            return 0;
        }

        return $epoch;
    }
}