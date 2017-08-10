<?php
namespace Microsoft\Azure\Management\MachineLearning;
final class AzureMLCommitmentPlansManagementClient
{
    /**
     * @param \Microsoft\Rest\RunTimeInterface $_runTime
     * @param string $subscriptionId
     */
    public function __construct(
        \Microsoft\Rest\RunTimeInterface $_runTime,
        $subscriptionId
    )
    {
        $_client = $_runTime->createClientFromData(
            self::_SWAGGER_OBJECT_DATA,
            ['subscriptionId' => $subscriptionId]
        );
        $this->_CommitmentAssociations_group = new \Microsoft\Azure\Management\MachineLearning\CommitmentAssociations($_client);
        $this->_CommitmentPlans_group = new \Microsoft\Azure\Management\MachineLearning\CommitmentPlans($_client);
        $this->_UsageHistory_group = new \Microsoft\Azure\Management\MachineLearning\UsageHistory($_client);
    }
    /**
     * @return \Microsoft\Azure\Management\MachineLearning\CommitmentAssociations
     */
    public function getCommitmentAssociations()
    {
        return $this->_CommitmentAssociations_group;
    }
    /**
     * @return \Microsoft\Azure\Management\MachineLearning\CommitmentPlans
     */
    public function getCommitmentPlans()
    {
        return $this->_CommitmentPlans_group;
    }
    /**
     * @return \Microsoft\Azure\Management\MachineLearning\UsageHistory
     */
    public function getUsageHistory()
    {
        return $this->_UsageHistory_group;
    }
    /**
     * @var \Microsoft\Azure\Management\MachineLearning\CommitmentAssociations
     */
    private $_CommitmentAssociations_group;
    /**
     * @var \Microsoft\Azure\Management\MachineLearning\CommitmentPlans
     */
    private $_CommitmentPlans_group;
    /**
     * @var \Microsoft\Azure\Management\MachineLearning\UsageHistory
     */
    private $_UsageHistory_group;
    const _SWAGGER_OBJECT_DATA = [
        'host' => 'management.azure.com',
        'paths' => [
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.MachineLearning/commitmentPlans/{commitmentPlanName}/commitmentAssociations/{commitmentAssociationName}' => ['get' => [
                'operationId' => 'CommitmentAssociations_Get',
                'parameters' => [
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'commitmentPlanName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'commitmentAssociationName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-05-01-preview']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/CommitmentAssociation']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.MachineLearning/commitmentPlans/{commitmentPlanName}/commitmentAssociations' => ['get' => [
                'operationId' => 'CommitmentAssociations_List',
                'parameters' => [
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'commitmentPlanName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => '$skipToken',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-05-01-preview']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/CommitmentAssociationListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.MachineLearning/commitmentPlans/{commitmentPlanName}/commitmentAssociations/{commitmentAssociationName}/move' => ['post' => [
                'operationId' => 'CommitmentAssociations_Move',
                'parameters' => [
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'commitmentPlanName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'commitmentAssociationName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-05-01-preview']
                    ],
                    [
                        'name' => 'movePayload',
                        'in' => 'body',
                        'required' => TRUE,
                        'schema' => ['$ref' => '#/definitions/MoveCommitmentAssociationRequest']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/CommitmentAssociation']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.MachineLearning/commitmentPlans/{commitmentPlanName}' => [
                'get' => [
                    'operationId' => 'CommitmentPlans_Get',
                    'parameters' => [
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'commitmentPlanName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-05-01-preview']
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/CommitmentPlan']]]
                ],
                'put' => [
                    'operationId' => 'CommitmentPlans_CreateOrUpdate',
                    'parameters' => [
                        [
                            'name' => 'createOrUpdatePayload',
                            'in' => 'body',
                            'required' => TRUE,
                            'schema' => ['$ref' => '#/definitions/CommitmentPlan']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'commitmentPlanName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-05-01-preview']
                        ]
                    ],
                    'responses' => [
                        '200' => ['schema' => ['$ref' => '#/definitions/CommitmentPlan']],
                        '201' => ['schema' => ['$ref' => '#/definitions/CommitmentPlan']]
                    ]
                ],
                'delete' => [
                    'operationId' => 'CommitmentPlans_Remove',
                    'parameters' => [
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'commitmentPlanName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-05-01-preview']
                        ]
                    ],
                    'responses' => ['200' => []]
                ],
                'patch' => [
                    'operationId' => 'CommitmentPlans_Patch',
                    'parameters' => [
                        [
                            'name' => 'patchPayload',
                            'in' => 'body',
                            'required' => TRUE,
                            'schema' => ['$ref' => '#/definitions/CommitmentPlanPatchPayload']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'commitmentPlanName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-05-01-preview']
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/CommitmentPlan']]]
                ]
            ],
            '/subscriptions/{subscriptionId}/providers/Microsoft.MachineLearning/commitmentPlans' => ['get' => [
                'operationId' => 'CommitmentPlans_List',
                'parameters' => [
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => '$skipToken',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-05-01-preview']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/CommitmentPlanListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.MachineLearning/commitmentPlans' => ['get' => [
                'operationId' => 'CommitmentPlans_ListInResourceGroup',
                'parameters' => [
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => '$skipToken',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-05-01-preview']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/CommitmentPlanListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.MachineLearning/commitmentPlans/{commitmentPlanName}/usageHistory' => ['get' => [
                'operationId' => 'UsageHistory_List',
                'parameters' => [
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'commitmentPlanName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => '$skipToken',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-05-01-preview']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/PlanUsageHistoryListResult']]]
            ]]
        ],
        'definitions' => [
            'Resource' => [
                'properties' => [
                    'id' => ['type' => 'string'],
                    'name' => ['type' => 'string'],
                    'location' => ['type' => 'string'],
                    'type' => ['type' => 'string'],
                    'tags' => [
                        'type' => 'object',
                        'additionalProperties' => ['type' => 'string']
                    ]
                ],
                'required' => ['location']
            ],
            'CommitmentAssociationProperties' => [
                'properties' => [
                    'associatedResourceId' => ['type' => 'string'],
                    'commitmentPlanId' => ['type' => 'string'],
                    'creationDate' => [
                        'type' => 'string',
                        'format' => 'date-time'
                    ]
                ],
                'required' => []
            ],
            'CommitmentAssociation' => [
                'properties' => [
                    'etag' => ['type' => 'string'],
                    'properties' => ['$ref' => '#/definitions/CommitmentAssociationProperties']
                ],
                'required' => []
            ],
            'ResourceSku' => [
                'properties' => [
                    'capacity' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'name' => ['type' => 'string'],
                    'tier' => ['type' => 'string']
                ],
                'required' => []
            ],
            'CommitmentAssociationListResult' => [
                'properties' => [
                    'nextLink' => ['type' => 'string'],
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/CommitmentAssociation']
                    ]
                ],
                'required' => []
            ],
            'MoveCommitmentAssociationRequest' => [
                'properties' => ['destinationPlanId' => ['type' => 'string']],
                'required' => []
            ],
            'CommitmentPlanPatchPayload' => [
                'properties' => [
                    'tags' => [
                        'type' => 'object',
                        'additionalProperties' => ['type' => 'string']
                    ],
                    'sku' => ['$ref' => '#/definitions/ResourceSku']
                ],
                'required' => []
            ],
            'PlanQuantity' => [
                'properties' => [
                    'allowance' => [
                        'type' => 'number',
                        'format' => 'double'
                    ],
                    'amount' => [
                        'type' => 'number',
                        'format' => 'double'
                    ],
                    'includedQuantityMeter' => ['type' => 'string'],
                    'overageMeter' => ['type' => 'string']
                ],
                'required' => []
            ],
            'CommitmentPlanProperties' => [
                'properties' => [
                    'chargeForOverage' => ['type' => 'boolean'],
                    'chargeForPlan' => ['type' => 'boolean'],
                    'creationDate' => [
                        'type' => 'string',
                        'format' => 'date-time'
                    ],
                    'includedQuantities' => [
                        'type' => 'object',
                        'additionalProperties' => ['$ref' => '#/definitions/PlanQuantity']
                    ],
                    'maxAssociationLimit' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'maxCapacityLimit' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'minCapacityLimit' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'planMeter' => ['type' => 'string'],
                    'refillFrequencyInDays' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'suspendPlanOnOverage' => ['type' => 'boolean']
                ],
                'required' => []
            ],
            'CommitmentPlan' => [
                'properties' => [
                    'etag' => ['type' => 'string'],
                    'properties' => ['$ref' => '#/definitions/CommitmentPlanProperties'],
                    'sku' => ['$ref' => '#/definitions/ResourceSku']
                ],
                'required' => []
            ],
            'CommitmentPlanListResult' => [
                'properties' => [
                    'nextLink' => ['type' => 'string'],
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/CommitmentPlan']
                    ]
                ],
                'required' => []
            ],
            'PlanUsageHistory' => [
                'properties' => [
                    'planDeletionOverage' => [
                        'type' => 'object',
                        'additionalProperties' => [
                            'type' => 'number',
                            'format' => 'double'
                        ]
                    ],
                    'planMigrationOverage' => [
                        'type' => 'object',
                        'additionalProperties' => [
                            'type' => 'number',
                            'format' => 'double'
                        ]
                    ],
                    'planQuantitiesAfterUsage' => [
                        'type' => 'object',
                        'additionalProperties' => [
                            'type' => 'number',
                            'format' => 'double'
                        ]
                    ],
                    'planQuantitiesBeforeUsage' => [
                        'type' => 'object',
                        'additionalProperties' => [
                            'type' => 'number',
                            'format' => 'double'
                        ]
                    ],
                    'planUsageOverage' => [
                        'type' => 'object',
                        'additionalProperties' => [
                            'type' => 'number',
                            'format' => 'double'
                        ]
                    ],
                    'usage' => [
                        'type' => 'object',
                        'additionalProperties' => [
                            'type' => 'number',
                            'format' => 'double'
                        ]
                    ],
                    'usageDate' => [
                        'type' => 'string',
                        'format' => 'date-time'
                    ]
                ],
                'required' => []
            ],
            'PlanUsageHistoryListResult' => [
                'properties' => [
                    'nextLink' => ['type' => 'string'],
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/PlanUsageHistory']
                    ]
                ],
                'required' => []
            ]
        ]
    ];
}
