<?php

namespace Liloi\I60\Domains\Games;

class Statuses
{
    public const TODO = 1;
    public const IN_PROGRESS = 2;
    public const WIN = 3;

    public static $list = [
        self::TODO => 'To Do',
        self::IN_PROGRESS => 'In progress',
        self::WIN => 'Win',
    ];
}