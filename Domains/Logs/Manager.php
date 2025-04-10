<?php

namespace Liloi\I60\Domains\Logs;

use Liloi\Rune\Domain\Manager as DomainManager;

/**
 * Question's manager.
 *
 * @package Liloi\Exams\Engine\Domain\Questions
 */
class Manager extends DomainManager
{
    /**
     * Get table name.
     *
     * @return string
     */
    public static function getTableName(): string
    {
        return self::getTablePrefix() . 'logs';
    }

    public static function loadByTags(string $tags): Collection
    {
        $name = self::getTableName();

        $rows = self::getAdapter()->getArray(sprintf(
            'select * from %s where tags like "%%%s%%" limit 100;',
            $name, $tags
        ));

        $collection = new Collection();

        foreach($rows as $row)
        {
            $collection[] = Entity::create($row);
        }

        return $collection;
    }

    public static function load(string $keyLog): Entity
    {
        $name = self::getTableName();

        $row = self::getAdapter()->getRow(sprintf(
            'select * from %s where key_log="%s"',
            $name,
            $keyLog
        ));

        return Entity::create($row);
    }

    public static function save(Entity $entity): void
    {
        $name = self::getTableName();
        $data = $entity->get();

        // @todo: Get param name from const.
        $key = $data['key_log'];
//        unset($data['key_log']);

        self::getAdapter()->update(
            $name,
            $data,
            sprintf('key_log = "%s"', $key)
        );
    }

    public static function remove(Entity $entity): void
    {
        $name = self::getTableName();
        $key = $entity->getKey();

        self::getAdapter()->delete(
            $name,
            sprintf('key_log = "%s"', $key)
        );
    }

    // @todo: rise this method to more abstract level.
    public static function create(\Throwable $exp): Entity
    {
        $name = self::getTableName();
        $data = [
            'ts' => date('Y-m-d H:i:s'),
            'tags' => sprintf('%s %s %s', get_class($exp), $exp->getMessage(), $exp->getCode()),
            'data' => self::getAdapter()->getConnection()->get()->real_escape_string(json_encode([
                'dt' => date('Y-m-d H:i:s'),
                'class' => get_class($exp),
                'message' => $exp->getMessage(),
                'code' => $exp->getCode(),
                'file' => $exp->getFile(),
                'line' => $exp->getLine(),
                'trace' => $exp->getTrace()
            ]))
        ];
        self::getAdapter()->insert($name, $data);

        return self::load(\mysqli_insert_id(self::getAdapter()->getConnection()->get()));
    }
}