<?php

namespace Liloi\I60\Domains\Road;

class Statuses
{
    public const TODO = 1;
    public const IN_HAND = 2;
    public const SUCCESS = 3;
    public const FAILURE = 4;

    public static $list = [
        self::TODO => 'To Do',
        self::IN_HAND => 'In Hand',
        self::SUCCESS => 'Success',
        self::FAILURE => 'Failure',
    ];
}