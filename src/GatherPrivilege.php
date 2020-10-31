<?php

namespace Yosmy;

interface GatherPrivilege
{
    /**
     * @param string $user
     *
     * @return Privilege|null
     */
    public function gather(
        string $user
    ): ?Privilege;
}
