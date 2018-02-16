<?php

namespace Yosmy\Privilege;

/**
 * @di\service()
 */
class CollectUsers
{
    /**
     * @var ManageUserCollection
     */
    private $manageCollection;

    /**
     * @param ManageUserCollection $manageCollection
     */
    public function __construct(ManageUserCollection $manageCollection)
    {
        $this->manageCollection = $manageCollection;
    }

    /**
     * @param string[]|null $roles
     *
     * @return Users
     */
    public function collectHaving($roles = null)
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
     * @return Users
     */
    public function collectNotHaving($roles = null)
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
     * @return Users
     */
    private function collect(array $criteria)
    {
        $cursor = $this->manageCollection->find($criteria);

        return new Users($cursor);
    }
}
