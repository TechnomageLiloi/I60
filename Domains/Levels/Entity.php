<?php

namespace Liloi\I60\Domains\Levels;

use Liloi\Tools\Entity as AbstractEntity;
use Liloi\Stylo\Parser;

/**
 * @method string getTitle()
 * @method void setTitle(string $value)
 *
 * @method string getStatus()
 * @method void setStatus(string $value)
 *
 * @method string getProgram()
 * @method void setProgram(string $value)
 *
 * @method string getGoal()
 * @method void setGoal(string $value)
 */
class Entity extends AbstractEntity
{
    public function getKey(): string
    {
        return $this->getField('key_level');
    }

    public function save(): void
    {
        Manager::save($this);
    }

    public function getStatusTitle(): string
    {
        return Statuses::$list[$this->getStatus()];
    }

    public function getStatusClass(): string
    {
        return strtolower(str_replace(' ', '-', $this->getStatusTitle()));
    }

    public function getProgramParse(): string
    {
        return Parser::parseString($this->getProgram());
    }
}