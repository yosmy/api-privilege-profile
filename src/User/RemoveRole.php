<?php

namespace Yosmy\Privilege\User;

use Yosmy\Privilege\ManageUserCollection;

/**
 * @di\service()
 */
class RemoveRole
{
    /**
     * @var ManageUserCollection
     */
    private $manageCollection;

    /**
     * @param ManageUserCollection $manageCollection
     */
    public function __construct(
        ManageUserCollection $manageCollection
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