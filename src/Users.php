<?php

namespace Yosmy\Privilege;

use MongoDB\Driver\Cursor;
use IteratorAggregate;
use JsonSerializable;
use Traversable;

class Users implements IteratorAggregate, JsonSerializable
{
    /**
     * @var BaseUser[]
     */
    private $cursor;

    /**
     * @param Traversable $cursor
     * @param string|null $type
     */
    public function __construct(
        Traversable $cursor,
        string $type = null
    ) {
        if ($type) {
            /** @var Cursor $cursor */
            $cursor->setTypeMap(['root' => $type]);
        }

        $this->cursor = $cursor;
    }

    /**
     * {@inheritdoc}
     */
    public function getIterator()
    {
        return $this->cursor;
    }

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        $items = [];
        foreach ($this->cursor as $item) {
            $items[] = $item->jsonSerialize();
        }

        return $items;
    }
}

