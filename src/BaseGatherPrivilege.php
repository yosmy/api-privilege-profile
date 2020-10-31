<?php

namespace Yosmy;

/**
 * @di\service()
 */
class BaseGatherPrivilege implements GatherPrivilege
{
    /**
     * @var ManagePrivilegeCollection
     */
    private $manageCollection;

    /**
     * @param ManagePrivilegeCollection $manageCollection
     */
    public function __construct(ManagePrivilegeCollection $manageCollection)
    {
        $this->manageCollection = $manageCollection;
    }

    /**
     * {@inheritDoc}
     */
    public function gather(
        string $user
    ): ?Privilege {
        /** @var Privilege $privilege */
        $privilege = $this->manageCollection->findOne([
            '_id' => $user
        ]);

        return $privilege;
    }
}
