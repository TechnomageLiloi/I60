<?php

namespace Liloi\I60\Domains\Levels;

class Statuses
{
    public const NOT_DEFENDED = 1;
    public const DEFENDING = 2;
    public const DEFENDED = 3;

    public static $list = [
        self::NOT_DEFENDED => 'Not defended level',
        self::DEFENDING => 'Defending now level',
        self::DEFENDED => 'Defended level',
    ];
}