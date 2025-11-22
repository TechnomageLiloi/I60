<?php

namespace Liloi\I60\Domain\Milestones;

use Liloi\I60\Domain\Manager as DomainManager;
use Liloi\I60\Domain\Epochs\Manager as EpochsManager;

class Manager extends DomainManager
{
    /**
     * Get table name.
     *
     * @return string
     */
    public static function getTableName(): string
    {
        return self::getTablePrefix() . 'milestones';
    }

    public static function loadCollection(): Collection
    {
        $name = self::getTableName();

        $rows = self::getAdapter()->getArray(sprintf(
            'select * from %s order by key_milestone asc;',
            $name
        ));

        $collection = new Collection();

        foreach($rows as $row)
        {
            $collection[] = Entity::create($row);
        }

        return $collection;
    }

    public static function load(string $keyMilestone, string $keyEpoch): Entity
    {
        $name = self::getTableName();

        $row = self::getAdapter()->getRow(sprintf(
            'select * from %s where key_milestone="%s" and key_epoch="%s";',
            $name, $keyMilestone, $keyEpoch
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
        unset($data['key_milestone']);

        self::update($name, $data, sprintf(
            'key_milestone="%s" and key_epoch="%s"',
            $entity->getKey(), $entity->getKeyEpoch()
        ));
    }

    /**
     * Create new day.
     */
    public static function create(): Entity
    {
        $data = [
            'key_milestone' => self::getHighestMilestone() + 1,
            'key_epoch' => EpochsManager::getHighestEpoch(),
            'title' => 'Enter the title',
            'status' => Statuses::TODO,
            'summary' => 'Enter the summary',
            'start' => date('Y-m-d'),
            'finish' => date('Y-m-d', strtotime('+1 year'))
        ];

        self::getAdapter()->insert(self::getTableName(), $data);

        return Entity::create($data);
    }

    public static function getHighestMilestone(): int
    {
        $name = self::getTableName();

        $milestone = self::getAdapter()->getSingle(sprintf(
            'select key_milestone from %s where key_epoch="%s" order by key_milestone desc;',
            $name, EpochsManager::getHighestEpoch()
        ));

        if(!$milestone)
        {
            return 0;
        }

        return $milestone;
    }
}