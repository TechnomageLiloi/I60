<?php

namespace Liloi\I60\Domains\Lessons;

class Statuses
{
    public const TODO = 1;
    public const IN_PROGRESS = 2;
    public const DONE = 3;

    public static $list = [
        self::TODO => 'To Do',
        self::IN_PROGRESS => 'In progress',
        self::DONE => 'Done',
    ];
}