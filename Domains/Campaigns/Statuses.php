<?php

namespace Liloi\I60\Domains\Campaigns;

class Statuses
{
    public const TODO = 1;
    public const IN_HAND = 2;
    public const NOT_IN_HAND = 3;

    public static $list = [
        self::TODO => 'To Do',
        self::IN_HAND => 'In Hand',
        self::NOT_IN_HAND => 'Not In Hand',
    ];
}