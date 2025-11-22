<?php

namespace Liloi\I60\Domain\Quests;

class Types
{
    public const PRIMARY = 1;
    public const LEVEL = 2;
    public const TICKET = 3;

    public static $list = [
        self::PRIMARY => 'Primary',
        self::LEVEL => 'Level',
        self::TICKET => 'Ticket',
    ];
}