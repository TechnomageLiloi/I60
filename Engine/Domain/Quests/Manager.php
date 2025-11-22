<?php

namespace Liloi\I60\Domain\Quests;

use Liloi\I60\Domain\Manager as DomainManager;
use Liloi\I60\Domain\Levels\Manager as LevelsManager;
use Liloi\I60\Domain\Milestones\Manager as MilestonesManager;

class Manager extends DomainManager
{
    /**
     * Get table name.
     *
     * @return string
     */
    public static function getTableName(): string
    {
        return self::getTablePrefix() . 'quests';
    }

    public static function loadCollection(): Collection
    {
        $name = self::getTableName();

        $rows = self::getAdapter()->getArray(sprintf(
            'select * from %s order by key_quest asc;',
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
     * @param string $keyLevel
     * @return Entity
     */
    public static function load(string $keyLevel): Entity
    {
        $name = self::getTableName();

        $row = self::getAdapter()->getRow(sprintf(
            'select * from %s where key_quest="%s";',
            $name, $keyLevel
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
        unset($data['key_quest']);

        self::update($name, $data, sprintf('key_quest="%s"', $entity->getKey()));
    }

    /**
     * Create new day.
     */
    public static function create(): Entity
    {
        $data = [
            'key_level' => LevelsManager::getHighestLevel(),
            'key_milestone' => MilestonesManager::getHighestMilestone(),
            'title' => 'Enter the title',
            'status' => Statuses::TODO,
            'type' => Types::PRIMARY,
            'summary' => 'Enter the summary',
            'data' => '{}'
        ];

        self::getAdapter()->insert(self::getTableName(), $data);

        return Entity::create($data);
    }
}