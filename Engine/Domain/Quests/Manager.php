<?php

namespace Liloi\I60\Domain\Quests;

use Liloi\I60\Domain\Manager as DomainManager;
use Liloi\I60\Domain\Epochs\Manager as EpochsManager;
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

    public static function load(string $keyQuest, string $keyMilestone, string $keyEpoch): Entity
    {
        $name = self::getTableName();

        $row = self::getAdapter()->getRow(sprintf(
            'select * from %s where key_quest="%s" and key_milestone="%s" and key_epoch="%s";',
            $name, $keyQuest, $keyMilestone, $keyEpoch
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

        self::update($name, $data, sprintf(
            'key_quest="%s" key_milestone="%s" and key_epoch="%s"',
            $entity->getKey(), $entity->getKeyMilestone(), $entity->getKeyEpoch()
        ));
    }

    /**
     * Create new day.
     */
    public static function create(): Entity
    {
        $data = [
            'key_quest' => self::getHighestQuest() + 1,
            'key_milestone' => MilestonesManager::getHighestMilestone(),
            'key_epoch' => EpochsManager::getHighestEpoch(),
            'title' => 'Enter the title',
            'status' => Statuses::TODO,
            'type' => Types::PRIMARY,
            'summary' => 'Enter the summary',
            'data' => '{}'
        ];

        self::getAdapter()->insert(self::getTableName(), $data);

        return Entity::create($data);
    }

    public static function getHighestQuest(): int
    {
        $name = self::getTableName();

        $milestone = self::getAdapter()->getSingle(sprintf(
            'select key_quest from %s where key_milestone="%s" and key_epoch="%s" order by key_quest desc;',
            $name, MilestonesManager::getHighestMilestone(), EpochsManager::getHighestEpoch()
        ));

        if(!$milestone)
        {
            return 0;
        }

        return $milestone;
    }
}