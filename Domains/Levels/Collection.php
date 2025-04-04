<?php

namespace Liloi\I60\Domains\Levels;

use Liloi\Tools\Collection as AbstractCollection;

/**
 * @package Engine\Domain\Exercise
 */
class Collection extends AbstractCollection
{
    public function getCurrent(): int
    {
        return max(array_keys($this->getArrayCopy()));
    }
}