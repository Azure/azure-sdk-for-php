<?php
namespace Microsoft\Azure\Management\CosmosDb;
final class CosmosDB
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
        $this->_DatabaseAccounts_group = new \Microsoft\Azure\Management\CosmosDb\DatabaseAccounts($_client);
    }
    /**
     * @return \Microsoft\Azure\Management\CosmosDb\DatabaseAccounts
     */
    public function getDatabaseAccounts()
    {
        return $this->_DatabaseAccounts_group;
    }
    /**
     * @var \Microsoft\Azure\Management\CosmosDb\DatabaseAccounts
     */
    private $_DatabaseAccounts_group;
    const _SWAGGER_OBJECT_DATA = [
        'host' => 'management.azure.com',
        'paths' => [
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.DocumentDB/databaseAccounts/{accountName}' => [
                'get' => [
                    'operationId' => 'DatabaseAccounts_Get',
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
                            'name' => 'accountName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2015-04-08']
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/DatabaseAccount']]]
                ],
                'patch' => [
                    'operationId' => 'DatabaseAccounts_Patch',
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
                            'name' => 'accountName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2015-04-08']
                        ],
                        [
                            'name' => 'updateParameters',
                            'in' => 'body',
                            'required' => TRUE,
                            '$ref' => '#/definitions/DatabaseAccountPatchParameters'
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/DatabaseAccount']]]
                ],
                'put' => [
                    'operationId' => 'DatabaseAccounts_CreateOrUpdate',
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
                            'name' => 'accountName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2015-04-08']
                        ],
                        [
                            'name' => 'createUpdateParameters',
                            'in' => 'body',
                            'required' => TRUE,
                            '$ref' => '#/definitions/DatabaseAccountCreateUpdateParameters'
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/DatabaseAccount']]]
                ],
                'delete' => [
                    'operationId' => 'DatabaseAccounts_Delete',
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
                            'name' => 'accountName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2015-04-08']
                        ]
                    ],
                    'responses' => [
                        '202' => [],
                        '204' => []
                    ]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.DocumentDB/databaseAccounts/{accountName}/failoverPriorityChange' => ['post' => [
                'operationId' => 'DatabaseAccounts_FailoverPriorityChange',
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
                        'name' => 'accountName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2015-04-08']
                    ],
                    [
                        'name' => 'failoverParameters',
                        'in' => 'body',
                        'required' => TRUE,
                        '$ref' => '#/definitions/FailoverPolicies'
                    ]
                ],
                'responses' => [
                    '202' => [],
                    '204' => []
                ]
            ]],
            '/subscriptions/{subscriptionId}/providers/Microsoft.DocumentDB/databaseAccounts' => ['get' => [
                'operationId' => 'DatabaseAccounts_List',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2015-04-08']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/DatabaseAccountsListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.DocumentDB/databaseAccounts' => ['get' => [
                'operationId' => 'DatabaseAccounts_ListByResourceGroup',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2015-04-08']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/DatabaseAccountsListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.DocumentDB/databaseAccounts/{accountName}/listKeys' => ['post' => [
                'operationId' => 'DatabaseAccounts_ListKeys',
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
                        'name' => 'accountName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2015-04-08']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/DatabaseAccountListKeysResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.DocumentDB/databaseAccounts/{accountName}/listConnectionStrings' => ['post' => [
                'operationId' => 'DatabaseAccounts_ListConnectionStrings',
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
                        'name' => 'accountName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2015-04-08']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/DatabaseAccountListConnectionStringsResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.DocumentDB/databaseAccounts/{accountName}/readonlykeys' => ['get' => [
                'operationId' => 'DatabaseAccounts_ListReadOnlyKeys',
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
                        'name' => 'accountName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2015-04-08']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/DatabaseAccountListReadOnlyKeysResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.DocumentDB/databaseAccounts/{accountName}/regenerateKey' => ['post' => [
                'operationId' => 'DatabaseAccounts_RegenerateKey',
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
                        'name' => 'accountName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2015-04-08']
                    ],
                    [
                        'name' => 'keyToRegenerate',
                        'in' => 'body',
                        'required' => TRUE,
                        '$ref' => '#/definitions/DatabaseAccountRegenerateKeyParameters'
                    ]
                ],
                'responses' => [
                    '200' => [],
                    '202' => []
                ]
            ]],
            '/providers/Microsoft.DocumentDB/databaseAccountNames/{accountName}' => ['head' => [
                'operationId' => 'DatabaseAccounts_CheckNameExists',
                'parameters' => [
                    [
                        'name' => 'accountName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2015-04-08']
                    ]
                ],
                'responses' => [
                    '200' => [],
                    '404' => []
                ]
            ]]
        ],
        'definitions' => [
            'ConsistencyPolicy' => ['properties' => [
                'defaultConsistencyLevel' => [
                    'type' => 'string',
                    'enum' => [
                        'Eventual',
                        'Session',
                        'BoundedStaleness',
                        'Strong',
                        'ConsistentPrefix'
                    ]
                ],
                'maxStalenessPrefix' => [
                    'type' => 'integer',
                    'format' => 'int64'
                ],
                'maxIntervalInSeconds' => [
                    'type' => 'integer',
                    'format' => 'int32'
                ]
            ]],
            'Location' => ['properties' => [
                'id' => ['type' => 'string'],
                'locationName' => ['type' => 'string'],
                'documentEndpoint' => ['type' => 'string'],
                'provisioningState' => ['type' => 'string'],
                'failoverPriority' => [
                    'type' => 'integer',
                    'format' => 'int32'
                ]
            ]],
            'FailoverPolicy' => ['properties' => [
                'id' => ['type' => 'string'],
                'locationName' => ['type' => 'string'],
                'failoverPriority' => [
                    'type' => 'integer',
                    'format' => 'int32'
                ]
            ]],
            'DatabaseAccountProperties' => ['properties' => [
                'provisioningState' => ['type' => 'string'],
                'documentEndpoint' => ['type' => 'string'],
                'databaseAccountOfferType' => [
                    'type' => 'string',
                    'enum' => ['Standard']
                ],
                'ipRangeFilter' => ['type' => 'string'],
                'enableAutomaticFailover' => ['type' => 'boolean'],
                'consistencyPolicy' => ['$ref' => '#/definitions/ConsistencyPolicy'],
                'writeLocations' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/Location']
                ],
                'readLocations' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/Location']
                ],
                'failoverPolicies' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/FailoverPolicy']
                ]
            ]],
            'DatabaseAccount' => ['properties' => [
                'kind' => [
                    'type' => 'string',
                    'enum' => [
                        'GlobalDocumentDB',
                        'MongoDB',
                        'Parse'
                    ]
                ],
                'properties' => ['$ref' => '#/definitions/DatabaseAccountProperties']
            ]],
            'DatabaseAccountsListResult' => ['properties' => ['value' => [
                'type' => 'array',
                'items' => ['$ref' => '#/definitions/DatabaseAccount']
            ]]],
            'FailoverPolicies' => ['properties' => ['failoverPolicies' => [
                'type' => 'array',
                'items' => ['$ref' => '#/definitions/FailoverPolicy']
            ]]],
            'Resource' => ['properties' => [
                'id' => ['type' => 'string'],
                'name' => ['type' => 'string'],
                'type' => ['type' => 'string'],
                'location' => ['type' => 'string'],
                'tags' => [
                    'type' => 'object',
                    'additionalProperties' => ['type' => 'string']
                ]
            ]],
            'DatabaseAccountCreateUpdateProperties' => ['properties' => [
                'consistencyPolicy' => ['$ref' => '#/definitions/ConsistencyPolicy'],
                'locations' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/Location']
                ],
                'databaseAccountOfferType' => ['type' => 'string'],
                'ipRangeFilter' => ['type' => 'string'],
                'enableAutomaticFailover' => ['type' => 'boolean']
            ]],
            'DatabaseAccountCreateUpdateParameters' => ['properties' => [
                'kind' => [
                    'type' => 'string',
                    'enum' => [
                        'GlobalDocumentDB',
                        'MongoDB',
                        'Parse'
                    ]
                ],
                'properties' => ['$ref' => '#/definitions/DatabaseAccountCreateUpdateProperties']
            ]],
            'DatabaseAccountPatchParameters' => ['properties' => ['tags' => [
                'type' => 'object',
                'additionalProperties' => ['type' => 'string']
            ]]],
            'DatabaseAccountListReadOnlyKeysResult' => ['properties' => [
                'primaryReadonlyMasterKey' => ['type' => 'string'],
                'secondaryReadonlyMasterKey' => ['type' => 'string']
            ]],
            'DatabaseAccountListKeysResult' => ['properties' => [
                'primaryMasterKey' => ['type' => 'string'],
                'secondaryMasterKey' => ['type' => 'string'],
                'properties' => ['$ref' => '#/definitions/DatabaseAccountListReadOnlyKeysResult']
            ]],
            'DatabaseAccountConnectionString' => ['properties' => [
                'connectionString' => ['type' => 'string'],
                'description' => ['type' => 'string']
            ]],
            'DatabaseAccountListConnectionStringsResult' => ['properties' => ['connectionStrings' => [
                'type' => 'array',
                'items' => ['$ref' => '#/definitions/DatabaseAccountConnectionString']
            ]]],
            'DatabaseAccountRegenerateKeyParameters' => ['properties' => ['keyKind' => [
                'type' => 'string',
                'enum' => [
                    'primary',
                    'secondary',
                    'primaryReadonly',
                    'secondaryReadonly'
                ]
            ]]]
        ]
    ];
}
