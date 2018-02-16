<?php

namespace Yosmy\Privilege;

/**
 * @di\service()
 */
class AddUser
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