<?php

namespace Yosmy;

use Yosmy;
use Traversable;

/**
 * @di\service()
 */
class AuditMissingPrivileges
{
    /**
     * @var ManagePrivilegeCollection
     */
    private $managePrivilegeCollection;

    /**
     * @param ManagePrivilegeCollection $managePrivilegeCollection
     */
    public function __construct(
        ManagePrivilegeCollection $managePrivilegeCollection
    ) {
        $this->managePrivilegeCollection = $managePrivilegeCollection;
    }

    /**
     * @param Yosmy\Mongo\ManageCollection $manageCollection
     *
     * @return Traversable
     */
    public function audit(
        Yosmy\Mongo\ManageCollection $manageCollection
    ): Traversable
    {
        return $manageCollection->aggregate(
            [
                [
                    '$lookup' => [
                        'localField' => '_id',
                        'from' => $this->managePrivilegeCollection->getName(),
                        'as' => 'privileges',
                        'foreignField' => '_id',
                    ]
                ],
                [
                    '$match' => [
                        'privileges._id' => [
                            '$exists' => false
                        ]
                    ],
                ]
            ]
        );
    }
}