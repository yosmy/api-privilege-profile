<?php

namespace Yosmy;

interface Privilege
{
    /**
     * @return string
     */
    public function getUser(): string;

    /**
     * @return array
     */
    public function getRoles(): array;
}
