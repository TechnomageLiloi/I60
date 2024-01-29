<?php

namespace Liloi\Nexus\Domain\Topics;

class Statuses
{
    public const TODO = 1;
    public const COMPOSE = 2;
    public const CLOSED = 3;
    public const PUBLISHED = 4;
    public const DEPRECATED = 6;

    static public array $list = [
        self::TODO => 'To Do',
        self::COMPOSE => 'Compose',
        self::CLOSED => 'Closed',
        self::PUBLISHED => 'Published',
        self::DEPRECATED => 'Deprecated',
    ];

    public static function getClass(string $id): string
    {
        return strtolower(str_replace(' ', '-', self::$list[$id]));
    }
}