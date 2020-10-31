<?php

namespace Yosmy;

/**
 * @di\service()
 */
class CollectPrivileges
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
     * @param string[]|null $roles
     *
     * @return Privileges
     */
    public function collectHaving($roles = null): Privileges
    {
        $criteria = [];

        if ($roles !== null) {
            $criteria['roles'] = ['$in' => $roles];
        }

        return $this->collect($criteria);
    }

    /**
     * @param string[]|null $roles
     *
     * @return Privileges
     */
    public function collectNotHaving($roles = null): Privileges
    {
        $criteria = [];

        if ($roles !== null) {
            $criteria['roles'] = ['$nin' => $roles];
        }

        return $this->collect($criteria);
    }

    /**
     * @param array $criteria
     *
     * @return Privileges
     */
    private function collect(array $criteria): Privileges
    {
        $cursor = $this->manageCollection->find($criteria);

        return new Privileges($cursor);
    }
}
