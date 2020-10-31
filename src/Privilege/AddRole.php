<?php

namespace Yosmy\Privilege;

use Yosmy\ManagePrivilegeCollection;

/**
 * @di\service()
 */
class AddRole
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
     * @param string $role
     */
    public function add(
        string $id,
        string $role
    ) {
        $this->manageCollection->updateOne(
            [
                '_id' => $id
            ],
            [
                '$addToSet' => [
                    'roles' => $role
                ]
            ]
        );
    }
}