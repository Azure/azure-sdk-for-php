<?php
namespace Microsoft\Azure\Management\Batch\_2017_05_01;
final class BatchManagementClient
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
        $this->_BatchAccount_group = new \Microsoft\Azure\Management\Batch\_2017_05_01\BatchAccount($_client);
        $this->_ApplicationPackage_group = new \Microsoft\Azure\Management\Batch\_2017_05_01\ApplicationPackage($_client);
        $this->_Application_group = new \Microsoft\Azure\Management\Batch\_2017_05_01\Application($_client);
        $this->_Location_group = new \Microsoft\Azure\Management\Batch\_2017_05_01\Location($_client);
        $this->_Operations_group = new \Microsoft\Azure\Management\Batch\_2017_05_01\Operations($_client);
    }
    /**
     * @return \Microsoft\Azure\Management\Batch\_2017_05_01\BatchAccount
     */
    public function getBatchAccount()
    {
        return $this->_BatchAccount_group;
    }
    /**
     * @return \Microsoft\Azure\Management\Batch\_2017_05_01\ApplicationPackage
     */
    public function getApplicationPackage()
    {
        return $this->_ApplicationPackage_group;
    }
    /**
     * @return \Microsoft\Azure\Management\Batch\_2017_05_01\Application
     */
    public function getApplication()
    {
        return $this->_Application_group;
    }
    /**
     * @return \Microsoft\Azure\Management\Batch\_2017_05_01\Location
     */
    public function getLocation()
    {
        return $this->_Location_group;
    }
    /**
     * @return \Microsoft\Azure\Management\Batch\_2017_05_01\Operations
     */
    public function getOperations()
    {
        return $this->_Operations_group;
    }
    /**
     * @var \Microsoft\Azure\Management\Batch\_2017_05_01\BatchAccount
     */
    private $_BatchAccount_group;
    /**
     * @var \Microsoft\Azure\Management\Batch\_2017_05_01\ApplicationPackage
     */
    private $_ApplicationPackage_group;
    /**
     * @var \Microsoft\Azure\Management\Batch\_2017_05_01\Application
     */
    private $_Application_group;
    /**
     * @var \Microsoft\Azure\Management\Batch\_2017_05_01\Location
     */
    private $_Location_group;
    /**
     * @var \Microsoft\Azure\Management\Batch\_2017_05_01\Operations
     */
    private $_Operations_group;
    const _SWAGGER_OBJECT_DATA = [
        'host' => 'management.azure.com',
        'paths' => [
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Batch/batchAccounts/{accountName}' => [
                'put' => [
                    'operationId' => 'BatchAccount_Create',
                    'parameters' => [
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
                            'name' => 'parameters',
                            'in' => 'body',
                            'required' => TRUE,
                            '$ref' => '#/definitions/BatchAccountCreateParameters'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-05-01']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => [
                        '200' => ['schema' => ['$ref' => '#/definitions/BatchAccount']],
                        '202' => []
                    ]
                ],
                'patch' => [
                    'operationId' => 'BatchAccount_Update',
                    'parameters' => [
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
                            'name' => 'parameters',
                            'in' => 'body',
                            'required' => TRUE,
                            '$ref' => '#/definitions/BatchAccountUpdateParameters'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-05-01']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/BatchAccount']]]
                ],
                'delete' => [
                    'operationId' => 'BatchAccount_Delete',
                    'parameters' => [
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
                            'enum' => ['2017-05-01']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => [
                        '200' => [],
                        '202' => [],
                        '204' => []
                    ]
                ],
                'get' => [
                    'operationId' => 'BatchAccount_Get',
                    'parameters' => [
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
                            'enum' => ['2017-05-01']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/BatchAccount']]]
                ]
            ],
            '/subscriptions/{subscriptionId}/providers/Microsoft.Batch/batchAccounts' => ['get' => [
                'operationId' => 'BatchAccount_List',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-05-01']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/BatchAccountListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Batch/batchAccounts' => ['get' => [
                'operationId' => 'BatchAccount_ListByResourceGroup',
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
                        'enum' => ['2017-05-01']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/BatchAccountListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Batch/batchAccounts/{accountName}/syncAutoStorageKeys' => ['post' => [
                'operationId' => 'BatchAccount_SynchronizeAutoStorageKeys',
                'parameters' => [
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
                        'enum' => ['2017-05-01']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['204' => []]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Batch/batchAccounts/{accountName}/regenerateKeys' => ['post' => [
                'operationId' => 'BatchAccount_RegenerateKey',
                'parameters' => [
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
                        'name' => 'parameters',
                        'in' => 'body',
                        'required' => TRUE,
                        '$ref' => '#/definitions/BatchAccountRegenerateKeyParameters'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-05-01']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/BatchAccountKeys']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Batch/batchAccounts/{accountName}/listKeys' => ['post' => [
                'operationId' => 'BatchAccount_GetKeys',
                'parameters' => [
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
                        'enum' => ['2017-05-01']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/BatchAccountKeys']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Batch/batchAccounts/{accountName}/applications/{applicationId}/versions/{version}/activate' => ['post' => [
                'operationId' => 'ApplicationPackage_Activate',
                'parameters' => [
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
                        'name' => 'applicationId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'version',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'parameters',
                        'in' => 'body',
                        'required' => TRUE,
                        '$ref' => '#/definitions/ActivateApplicationPackageParameters'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-05-01']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['204' => []]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Batch/batchAccounts/{accountName}/applications/{applicationId}/versions/{version}' => [
                'put' => [
                    'operationId' => 'ApplicationPackage_Create',
                    'parameters' => [
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
                            'name' => 'applicationId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'version',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-05-01']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => ['201' => ['schema' => ['$ref' => '#/definitions/ApplicationPackage']]]
                ],
                'delete' => [
                    'operationId' => 'ApplicationPackage_Delete',
                    'parameters' => [
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
                            'name' => 'applicationId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'version',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-05-01']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => ['204' => []]
                ],
                'get' => [
                    'operationId' => 'ApplicationPackage_Get',
                    'parameters' => [
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
                            'name' => 'applicationId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'version',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-05-01']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/ApplicationPackage']]]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Batch/batchAccounts/{accountName}/applications/{applicationId}' => [
                'put' => [
                    'operationId' => 'Application_Create',
                    'parameters' => [
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
                            'name' => 'applicationId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'parameters',
                            'in' => 'body',
                            'required' => FALSE,
                            '$ref' => '#/definitions/ApplicationCreateParameters'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-05-01']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => ['201' => ['schema' => ['$ref' => '#/definitions/Application']]]
                ],
                'delete' => [
                    'operationId' => 'Application_Delete',
                    'parameters' => [
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
                            'name' => 'applicationId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-05-01']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => ['204' => []]
                ],
                'get' => [
                    'operationId' => 'Application_Get',
                    'parameters' => [
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
                            'name' => 'applicationId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-05-01']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/Application']]]
                ],
                'patch' => [
                    'operationId' => 'Application_Update',
                    'parameters' => [
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
                            'name' => 'applicationId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'parameters',
                            'in' => 'body',
                            'required' => TRUE,
                            '$ref' => '#/definitions/ApplicationUpdateParameters'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-05-01']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => ['204' => []]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Batch/batchAccounts/{accountName}/applications' => ['get' => [
                'operationId' => 'Application_List',
                'parameters' => [
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
                        'name' => 'maxresults',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-05-01']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/ListApplicationsResult']]]
            ]],
            '/subscriptions/{subscriptionId}/providers/Microsoft.Batch/locations/{locationName}/quotas' => ['get' => [
                'operationId' => 'Location_GetQuotas',
                'parameters' => [
                    [
                        'name' => 'locationName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-05-01']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/BatchLocationQuota']]]
            ]],
            '/subscriptions/{subscriptionId}/providers/Microsoft.Batch/locations/{locationName}/checkNameAvailability' => ['post' => [
                'operationId' => 'Location_CheckNameAvailability',
                'parameters' => [
                    [
                        'name' => 'locationName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-05-01']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'parameters',
                        'in' => 'body',
                        'required' => TRUE,
                        '$ref' => '#/definitions/CheckNameAvailabilityParameters'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/CheckNameAvailabilityResult']]]
            ]],
            '/providers/Microsoft.Batch/operations' => ['get' => [
                'operationId' => 'Operations_List',
                'parameters' => [[
                    'name' => 'api-version',
                    'in' => 'query',
                    'required' => TRUE,
                    'type' => 'string',
                    'enum' => ['2017-05-01']
                ]],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/OperationListResult']]]
            ]]
        ],
        'definitions' => [
            'AutoStorageBaseProperties' => ['properties' => ['storageAccountId' => ['type' => 'string']]],
            'BatchAccountUpdateProperties' => ['properties' => ['autoStorage' => ['$ref' => '#/definitions/AutoStorageBaseProperties']]],
            'KeyVaultReference' => ['properties' => [
                'id' => ['type' => 'string'],
                'url' => ['type' => 'string']
            ]],
            'BatchAccountCreateProperties' => ['properties' => [
                'autoStorage' => ['$ref' => '#/definitions/AutoStorageBaseProperties'],
                'poolAllocationMode' => [
                    'type' => 'string',
                    'enum' => [
                        'BatchService',
                        'UserSubscription'
                    ]
                ],
                'keyVaultReference' => ['$ref' => '#/definitions/KeyVaultReference']
            ]],
            'BatchAccountCreateParameters' => ['properties' => [
                'location' => ['type' => 'string'],
                'tags' => [
                    'type' => 'object',
                    'additionalProperties' => ['type' => 'string']
                ],
                'properties' => ['$ref' => '#/definitions/BatchAccountCreateProperties']
            ]],
            'AutoStorageProperties' => ['properties' => ['lastKeySync' => [
                'type' => 'string',
                'format' => 'date-time'
            ]]],
            'BatchAccountProperties' => ['properties' => [
                'accountEndpoint' => ['type' => 'string'],
                'provisioningState' => [
                    'type' => 'string',
                    'enum' => [
                        'Invalid',
                        'Creating',
                        'Deleting',
                        'Succeeded',
                        'Failed',
                        'Cancelled'
                    ]
                ],
                'poolAllocationMode' => [
                    'type' => 'string',
                    'enum' => [
                        'BatchService',
                        'UserSubscription'
                    ]
                ],
                'keyVaultReference' => ['$ref' => '#/definitions/KeyVaultReference'],
                'autoStorage' => ['$ref' => '#/definitions/AutoStorageProperties'],
                'dedicatedCoreQuota' => [
                    'type' => 'integer',
                    'format' => 'int32'
                ],
                'lowPriorityCoreQuota' => [
                    'type' => 'integer',
                    'format' => 'int32'
                ],
                'poolQuota' => [
                    'type' => 'integer',
                    'format' => 'int32'
                ],
                'activeJobAndJobScheduleQuota' => [
                    'type' => 'integer',
                    'format' => 'int32'
                ]
            ]],
            'BatchAccount' => ['properties' => ['properties' => ['$ref' => '#/definitions/BatchAccountProperties']]],
            'BatchAccountUpdateParameters' => ['properties' => [
                'tags' => [
                    'type' => 'object',
                    'additionalProperties' => ['type' => 'string']
                ],
                'properties' => ['$ref' => '#/definitions/BatchAccountUpdateProperties']
            ]],
            'BatchAccountListResult' => ['properties' => [
                'value' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/BatchAccount']
                ],
                'nextLink' => ['type' => 'string']
            ]],
            'BatchAccountRegenerateKeyParameters' => ['properties' => ['keyName' => [
                'type' => 'string',
                'enum' => [
                    'Primary',
                    'Secondary'
                ]
            ]]],
            'BatchAccountKeys' => ['properties' => [
                'accountName' => ['type' => 'string'],
                'primary' => ['type' => 'string'],
                'secondary' => ['type' => 'string']
            ]],
            'ActivateApplicationPackageParameters' => ['properties' => ['format' => ['type' => 'string']]],
            'ApplicationCreateParameters' => ['properties' => [
                'allowUpdates' => ['type' => 'boolean'],
                'displayName' => ['type' => 'string']
            ]],
            'ApplicationPackage' => ['properties' => [
                'id' => ['type' => 'string'],
                'version' => ['type' => 'string'],
                'state' => [
                    'type' => 'string',
                    'enum' => [
                        'pending',
                        'active',
                        'unmapped'
                    ]
                ],
                'format' => ['type' => 'string'],
                'storageUrl' => ['type' => 'string'],
                'storageUrlExpiry' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ],
                'lastActivationTime' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ]
            ]],
            'Application' => ['properties' => [
                'id' => ['type' => 'string'],
                'displayName' => ['type' => 'string'],
                'packages' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/ApplicationPackage']
                ],
                'allowUpdates' => ['type' => 'boolean'],
                'defaultVersion' => ['type' => 'string']
            ]],
            'ListApplicationsResult' => ['properties' => [
                'value' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/Application']
                ],
                'nextLink' => ['type' => 'string']
            ]],
            'ApplicationUpdateParameters' => ['properties' => [
                'allowUpdates' => ['type' => 'boolean'],
                'defaultVersion' => ['type' => 'string'],
                'displayName' => ['type' => 'string']
            ]],
            'BatchLocationQuota' => ['properties' => ['accountQuota' => [
                'type' => 'integer',
                'format' => 'int32'
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
            'CloudErrorBody' => ['properties' => [
                'code' => ['type' => 'string'],
                'message' => ['type' => 'string'],
                'target' => ['type' => 'string'],
                'details' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/CloudErrorBody']
                ]
            ]],
            'CloudError' => ['properties' => ['error' => ['$ref' => '#/definitions/CloudErrorBody']]],
            'Operation_display' => ['properties' => [
                'provider' => ['type' => 'string'],
                'operation' => ['type' => 'string'],
                'resource' => ['type' => 'string'],
                'description' => ['type' => 'string']
            ]],
            'Operation' => ['properties' => [
                'name' => ['type' => 'string'],
                'display' => ['$ref' => '#/definitions/Operation_display'],
                'origin' => ['type' => 'string'],
                'properties' => ['type' => 'object']
            ]],
            'OperationListResult' => ['properties' => [
                'value' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/Operation']
                ],
                'nextLink' => ['type' => 'string']
            ]],
            'CheckNameAvailabilityParameters' => ['properties' => [
                'name' => ['type' => 'string'],
                'type' => ['type' => 'string']
            ]],
            'CheckNameAvailabilityResult' => ['properties' => [
                'nameAvailable' => ['type' => 'boolean'],
                'reason' => [
                    'type' => 'string',
                    'enum' => [
                        'Invalid',
                        'AlreadyExists'
                    ]
                ],
                'message' => ['type' => 'string']
            ]]
        ]
    ];
}
