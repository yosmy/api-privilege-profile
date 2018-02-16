<?php

namespace Yosmy\Privilege\User;

use Yosmy\Privilege\ManageUserCollection;

/**
 * @di\service()
 */
class AddRole
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