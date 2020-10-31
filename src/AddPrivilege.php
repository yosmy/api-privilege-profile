<?php

namespace Yosmy;

/**
 * @di\service()
 */
class AddPrivilege
{
    /**
     * @var ManagePrivilegeCollection
     */
    private $manageCollection;

    /**
     * @param ManagePrivilegeCollection $manageCollection
     */
    public function __construct(
        ManagePrivilegeCollection $manageCollection
    ) {
        $this->manageCollection = $manageCollection;
    }

    /**
     * @param string $id
     * @param array  $roles
     */
    public function add(
        string $id,
        array $roles
    ) {
        $this->manageCollection->insertOne([
            '_id' => $id,
            'roles' => $roles
        ]);
    }
}