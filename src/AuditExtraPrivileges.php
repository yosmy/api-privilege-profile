<?php

namespace Yosmy;

use Yosmy;
use Traversable;

/**
 * @di\service()
 */
class AuditExtraPrivileges
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
        return $this->managePrivilegeCollection->aggregate(
            [
                [
                    '$lookup' => [
                        'localField' => '_id',
                        'from' => $manageCollection->getName(),
                        'as' => 'parent',
                        'foreignField' => '_id',
                    ]
                ],
                [
                    '$match' => [
                        'parent._id' => [
                            '$exists' => false
                        ]
                    ],
                ]
            ]
        );
    }
}