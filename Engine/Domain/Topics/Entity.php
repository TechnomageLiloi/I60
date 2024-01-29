<?php

namespace Liloi\Nexus\Domain\Topics;

use Liloi\Stylo\Parser;
use Liloi\Tools\Entity as AbstractEntity;

/**
 * @method string getTitle()
 * @method void setTitle(string $value)
 *
 * @method string getUrl()
 * @method void setUrl(string $value)
 *
 * @method string getSummary()
 * @method void setSummary(string $value)
 *
 * @method string getStatus()
 * @method void setStatus(string $value)
 *
 * @method string getTags()
 * @method void setTags(string $value)
 *
 * @method string getTs()
 * @method void setTs(string $value)
 */
class Entity extends AbstractEntity
{
    public function getKey(): string
    {
        return $this->getField('key_topic');
    }

    public function save(): void
    {
        Manager::save($this);
    }

    public function getStatusTitle(): string
    {
        return Statuses::$list[$this->getStatus()];
    }

    public function parseSummary(): string
    {
        return Parser::parseString($this->getSummary());
    }
}