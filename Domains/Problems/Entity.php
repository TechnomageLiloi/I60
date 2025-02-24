<?php

namespace Liloi\I60\Domains\Problems;

use Liloi\Stylo\Parser;
use Liloi\Tools\Entity as AbstractEntity;

/**
 * @method string getTitle()
 * @method void setTitle(string $value)
 */
class Entity extends AbstractEntity
{
    public function getKey(): string
    {
        return $this->getField('key_problem');
    }

    public function save(): void
    {
        Manager::save($this);
    }

    public function getTimestamp(string $format = "Y-m-d H:i:s")
    {
        return date($format, strtotime($this->getKey()));
    }
}