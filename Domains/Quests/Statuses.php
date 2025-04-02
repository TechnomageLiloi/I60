<?php

namespace Liloi\I60\Domains\Quests;

class Statuses
{
    public const TODO = 1;
    public const IN_HAND = 2;
    public const PAUSE = 3;
    public const VICTORY = 4;
    public const DEFEAT = 5;

    public static $list = [
        self::TODO => 'To Do',
        self::IN_HAND => 'In hand',
        self::PAUSE => 'Pause',
        self::VICTORY => 'Victory',
        self::DEFEAT => 'Defeat',
    ];
}