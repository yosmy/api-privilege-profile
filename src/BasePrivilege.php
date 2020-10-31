<?php

namespace Yosmy;

use Yosmy\Mongo;

class BasePrivilege extends Mongo\Document implements Privilege
{
    /**
     * @return string
     */
    public function getUser(): string
    {
        return $this->offsetGet('_id');
    }

    /**
     * @return array
     */
    public function getRoles(): array
    {
        return $this->offsetGet('roles');
    }

    /**
     * {@inheritDoc}
     */
    public function jsonSerialize(): object
    {
        $data = parent::jsonSerialize();

        $data->user = $data->_id;

        unset($data->_id);

        return $data;
    }
}
