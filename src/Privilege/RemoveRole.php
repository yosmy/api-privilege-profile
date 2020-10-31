<?php

namespace Yosmy\Privilege;

use Yosmy\ManagePrivilegeCollection;

/**
 * @di\service()
 */
class RemoveRole
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
    )
    {
        $this->manageCollection = $manageCollection;
    }

    /**
     * @param string $id
     * @param string $role
     */
    public function remove(
        string $id,
        string $role
    ) {
        $this->manageCollection->updateOne(
            [
                '_id' => $id
            ],
            [
                '$pull' => [
                    'roles' => $role
                ]
            ]
        );
    }
}