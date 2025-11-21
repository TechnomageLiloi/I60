<?php

namespace Liloi\I60\Domain\Epochs;

class Statuses
{
    public const TODO = 1;
    public const DEFENDING = 2;
    public const DEFENDED = 3;

    public static $list = [
        self::TODO => 'To Do',
        self::DEFENDING => 'Defending',
        self::DEFENDED => 'Defended',
    ];
}