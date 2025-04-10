<?php

namespace Liloi\I60\Domains\Logs;

use Liloi\Tools\Entity as AbstractEntity;
use Liloi\Stylo\Parser;

/**
 * @method string getTs()
 * @method void setTs(string $value)
 *
 * @method string getTags()
 * @method void setTags(string $value)
 *
 * @method string getData()
 * @method void setData(string $value)
 */
class Entity extends AbstractEntity
{
    public function getKey(): string
    {
        return $this->getField('key_log');
    }

    /**
     * Save question to database.
     */
    public function save(): void
    {
        Manager::save($this);
    }
}