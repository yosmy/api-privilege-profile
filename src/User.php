<?php

namespace Yosmy\Privilege;

interface User
{
    /**
     * @return string
     */
    public function getId(): string;

    /**
     * @return array
     */
    public function getRoles(): array;
}
