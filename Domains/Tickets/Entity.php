<?php

namespace Liloi\I60\Domains\Tickets;

use Liloi\Tools\Entity as AbstractEntity;
use Liloi\Stylo\Parser;

/**
 * @method string getTitle()
 * @method void setTitle(string $value)
 *
 * @method string getStatus()
 * @method void setStatus(string $value)
 *
 * @method string getStart()
 * @method void setStart(string $value)
 *
 * @method string getFinish()
 * @method void setFinish(string $value)
 *
 * @method string getTrophy()
 * @method void setTrophy(string $value)
 *
 * @method string getData()
 * @method void setData(string $value)
 */
class Entity extends AbstractEntity
{
    public function getKey(): string
    {
        return $this->getField('key_ticket');
    }

    public function getID(): string
    {
        return str_pad(
            base_convert($this->getKey(), 10, 36),
            7,
            '0',
            STR_PAD_LEFT
        );
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
}