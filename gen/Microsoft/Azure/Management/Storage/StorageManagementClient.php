<?php
namespace Microsoft\Azure\Management\Storage;
final class StorageManagementClient
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
        $this->_Operations_group = new \Microsoft\Azure\Management\Storage\Operations($_client);
        $this->_StorageAccounts_group = new \Microsoft\Azure\Management\Storage\StorageAccounts($_client);
        $this->_Usage_group = new \Microsoft\Azure\Management\Storage\Usage($_client);
    }
    /**
     * @return \Microsoft\Azure\Management\Storage\Operations
     */
    public function getOperations()
    {
        return $this->_Operations_group;
    }
    /**
     * @return \Microsoft\Azure\Management\Storage\StorageAccounts
     */
    public function getStorageAccounts()
    {
        return $this->_StorageAccounts_group;
    }
    /**
     * @return \Microsoft\Azure\Management\Storage\Usage
     */
    public function getUsage()
    {
        return $this->_Usage_group;
    }
    /**
     * @var \Microsoft\Azure\Management\Storage\Operations
     */
    private $_Operations_group;
    /**
     * @var \Microsoft\Azure\Management\Storage\StorageAccounts
     */
    private $_StorageAccounts_group;
    /**
     * @var \Microsoft\Azure\Management\Storage\Usage
     */
    private $_Usage_group;
    const _SWAGGER_OBJECT_DATA = [
        'host' => 'management.azure.com',
        'paths' => [
            '/providers/Microsoft.Storage/operations' => ['get' => [
                'operationId' => 'Operations_List',
                'parameters' => [[
                    'name' => 'api-version',
                    'in' => 'query',
                    'required' => TRUE,
                    'type' => 'string',
                    'enum' => ['2017-06-01']
                ]],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/OperationListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/providers/Microsoft.Storage/checkNameAvailability' => ['post' => [
                'operationId' => 'StorageAccounts_CheckNameAvailability',
                'parameters' => [
                    [
                        'name' => 'accountName',
                        'in' => 'body',
                        'required' => TRUE,
                        '$ref' => '#/definitions/StorageAccountCheckNameAvailabilityParameters'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-06-01']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/CheckNameAvailabilityResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Storage/storageAccounts/{accountName}' => [
                'put' => [
                    'operationId' => 'StorageAccounts_Create',
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
                            '$ref' => '#/definitions/StorageAccountCreateParameters'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-06-01']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => [
                        '200' => ['schema' => ['$ref' => '#/definitions/StorageAccount']],
                        '202' => []
                    ]
                ],
                'delete' => [
                    'operationId' => 'StorageAccounts_Delete',
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
                            'enum' => ['2017-06-01']
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
                        '204' => []
                    ]
                ],
                'get' => [
                    'operationId' => 'StorageAccounts_GetProperties',
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
                            'enum' => ['2017-06-01']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/StorageAccount']]]
                ],
                'patch' => [
                    'operationId' => 'StorageAccounts_Update',
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
                            '$ref' => '#/definitions/StorageAccountUpdateParameters'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-06-01']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/StorageAccount']]]
                ]
            ],
            '/subscriptions/{subscriptionId}/providers/Microsoft.Storage/storageAccounts' => ['get' => [
                'operationId' => 'StorageAccounts_List',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-06-01']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/StorageAccountListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Storage/storageAccounts' => ['get' => [
                'operationId' => 'StorageAccounts_ListByResourceGroup',
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
                        'enum' => ['2017-06-01']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/StorageAccountListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Storage/storageAccounts/{accountName}/listKeys' => ['post' => [
                'operationId' => 'StorageAccounts_ListKeys',
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
                        'enum' => ['2017-06-01']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/StorageAccountListKeysResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Storage/storageAccounts/{accountName}/regenerateKey' => ['post' => [
                'operationId' => 'StorageAccounts_RegenerateKey',
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
                        'name' => 'regenerateKey',
                        'in' => 'body',
                        'required' => TRUE,
                        '$ref' => '#/definitions/StorageAccountRegenerateKeyParameters'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-06-01']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/StorageAccountListKeysResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Storage/storageAccounts/{accountName}/ListAccountSas' => ['post' => [
                'operationId' => 'StorageAccounts_ListAccountSAS',
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
                        '$ref' => '#/definitions/AccountSasParameters'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-06-01']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/ListAccountSasResponse']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Storage/storageAccounts/{accountName}/ListServiceSas' => ['post' => [
                'operationId' => 'StorageAccounts_ListServiceSAS',
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
                        '$ref' => '#/definitions/ServiceSasParameters'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-06-01']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/ListServiceSasResponse']]]
            ]],
            '/subscriptions/{subscriptionId}/providers/Microsoft.Storage/usages' => ['get' => [
                'operationId' => 'Usage_List',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-06-01']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/UsageListResult']]]
            ]]
        ],
        'definitions' => [
            'Operation_display' => [
                'properties' => [
                    'provider' => ['type' => 'string'],
                    'resource' => ['type' => 'string'],
                    'operation' => ['type' => 'string']
                ],
                'required' => []
            ],
            'Dimension' => [
                'properties' => [
                    'name' => ['type' => 'string'],
                    'displayName' => ['type' => 'string']
                ],
                'required' => []
            ],
            'MetricSpecification' => [
                'properties' => [
                    'name' => ['type' => 'string'],
                    'displayName' => ['type' => 'string'],
                    'displayDescription' => ['type' => 'string'],
                    'unit' => ['type' => 'string'],
                    'dimensions' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/Dimension']
                    ],
                    'aggregationType' => ['type' => 'string'],
                    'fillGapWithZero' => ['type' => 'boolean'],
                    'category' => ['type' => 'string'],
                    'resourceIdDimensionNameOverride' => ['type' => 'string']
                ],
                'required' => []
            ],
            'ServiceSpecification' => [
                'properties' => ['metricSpecifications' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/MetricSpecification']
                ]],
                'required' => []
            ],
            'OperationProperties' => [
                'properties' => ['serviceSpecification' => ['$ref' => '#/definitions/ServiceSpecification']],
                'required' => []
            ],
            'Operation' => [
                'properties' => [
                    'name' => ['type' => 'string'],
                    'display' => ['$ref' => '#/definitions/Operation_display'],
                    'origin' => ['type' => 'string'],
                    'properties' => ['$ref' => '#/definitions/OperationProperties']
                ],
                'required' => []
            ],
            'OperationListResult' => [
                'properties' => ['value' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/Operation']
                ]],
                'required' => []
            ],
            'StorageAccountCheckNameAvailabilityParameters' => [
                'properties' => [
                    'name' => ['type' => 'string'],
                    'type' => ['type' => 'string']
                ],
                'required' => [
                    'name',
                    'type'
                ]
            ],
            'CheckNameAvailabilityResult' => [
                'properties' => [
                    'nameAvailable' => ['type' => 'boolean'],
                    'reason' => [
                        'type' => 'string',
                        'enum' => [
                            'AccountNameInvalid',
                            'AlreadyExists'
                        ]
                    ],
                    'message' => ['type' => 'string']
                ],
                'required' => []
            ],
            'Sku' => [
                'properties' => [
                    'name' => [
                        'type' => 'string',
                        'enum' => [
                            'Standard_LRS',
                            'Standard_GRS',
                            'Standard_RAGRS',
                            'Standard_ZRS',
                            'Premium_LRS'
                        ]
                    ],
                    'tier' => [
                        'type' => 'string',
                        'enum' => [
                            'Standard',
                            'Premium'
                        ]
                    ]
                ],
                'required' => ['name']
            ],
            'CustomDomain' => [
                'properties' => [
                    'name' => ['type' => 'string'],
                    'useSubDomain' => ['type' => 'boolean']
                ],
                'required' => ['name']
            ],
            'EncryptionService' => [
                'properties' => [
                    'enabled' => ['type' => 'boolean'],
                    'lastEnabledTime' => [
                        'type' => 'string',
                        'format' => 'date-time'
                    ]
                ],
                'required' => []
            ],
            'EncryptionServices' => [
                'properties' => [
                    'blob' => ['$ref' => '#/definitions/EncryptionService'],
                    'file' => ['$ref' => '#/definitions/EncryptionService'],
                    'table' => ['$ref' => '#/definitions/EncryptionService'],
                    'queue' => ['$ref' => '#/definitions/EncryptionService']
                ],
                'required' => []
            ],
            'KeyVaultProperties' => [
                'properties' => [
                    'keyname' => ['type' => 'string'],
                    'keyversion' => ['type' => 'string'],
                    'keyvaulturi' => ['type' => 'string']
                ],
                'required' => []
            ],
            'Encryption' => [
                'properties' => [
                    'services' => ['$ref' => '#/definitions/EncryptionServices'],
                    'keySource' => [
                        'type' => 'string',
                        'enum' => [
                            'Microsoft.Storage',
                            'Microsoft.Keyvault'
                        ]
                    ],
                    'keyvaultproperties' => ['$ref' => '#/definitions/KeyVaultProperties']
                ],
                'required' => ['keySource']
            ],
            'VirtualNetworkRule' => [
                'properties' => [
                    'id' => ['type' => 'string'],
                    'action' => [
                        'type' => 'string',
                        'enum' => ['Allow']
                    ],
                    'state' => [
                        'type' => 'string',
                        'enum' => [
                            'provisioning',
                            'deprovisioning',
                            'succeeded',
                            'failed',
                            'networkSourceDeleted'
                        ]
                    ]
                ],
                'required' => ['id']
            ],
            'IPRule' => [
                'properties' => [
                    'value' => ['type' => 'string'],
                    'action' => [
                        'type' => 'string',
                        'enum' => ['Allow']
                    ]
                ],
                'required' => ['value']
            ],
            'StorageNetworkAcls' => [
                'properties' => [
                    'bypass' => [
                        'type' => 'string',
                        'enum' => [
                            'None',
                            'Logging',
                            'Metrics',
                            'AzureServices'
                        ]
                    ],
                    'virtualNetworkRules' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/VirtualNetworkRule']
                    ],
                    'ipRules' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/IPRule']
                    ],
                    'defaultAction' => [
                        'type' => 'string',
                        'enum' => [
                            'Allow',
                            'Deny'
                        ]
                    ]
                ],
                'required' => ['defaultAction']
            ],
            'StorageAccountPropertiesCreateParameters' => [
                'properties' => [
                    'customDomain' => ['$ref' => '#/definitions/CustomDomain'],
                    'encryption' => ['$ref' => '#/definitions/Encryption'],
                    'networkAcls' => ['$ref' => '#/definitions/StorageNetworkAcls'],
                    'accessTier' => [
                        'type' => 'string',
                        'enum' => [
                            'Hot',
                            'Cool'
                        ]
                    ],
                    'supportsHttpsTrafficOnly' => ['type' => 'boolean']
                ],
                'required' => []
            ],
            'Identity' => [
                'properties' => [
                    'principalId' => ['type' => 'string'],
                    'tenantId' => ['type' => 'string'],
                    'type' => ['type' => 'string']
                ],
                'required' => ['type']
            ],
            'StorageAccountCreateParameters' => [
                'properties' => [
                    'sku' => ['$ref' => '#/definitions/Sku'],
                    'kind' => [
                        'type' => 'string',
                        'enum' => [
                            'Storage',
                            'BlobStorage'
                        ]
                    ],
                    'location' => ['type' => 'string'],
                    'tags' => [
                        'type' => 'object',
                        'additionalProperties' => ['type' => 'string']
                    ],
                    'identity' => ['$ref' => '#/definitions/Identity'],
                    'properties' => ['$ref' => '#/definitions/StorageAccountPropertiesCreateParameters']
                ],
                'required' => [
                    'sku',
                    'kind',
                    'location'
                ]
            ],
            'Endpoints' => [
                'properties' => [
                    'blob' => ['type' => 'string'],
                    'queue' => ['type' => 'string'],
                    'table' => ['type' => 'string'],
                    'file' => ['type' => 'string']
                ],
                'required' => []
            ],
            'StorageAccountProperties' => [
                'properties' => [
                    'provisioningState' => [
                        'type' => 'string',
                        'enum' => [
                            'Creating',
                            'ResolvingDNS',
                            'Succeeded'
                        ]
                    ],
                    'primaryEndpoints' => ['$ref' => '#/definitions/Endpoints'],
                    'primaryLocation' => ['type' => 'string'],
                    'statusOfPrimary' => [
                        'type' => 'string',
                        'enum' => [
                            'available',
                            'unavailable'
                        ]
                    ],
                    'lastGeoFailoverTime' => [
                        'type' => 'string',
                        'format' => 'date-time'
                    ],
                    'secondaryLocation' => ['type' => 'string'],
                    'statusOfSecondary' => [
                        'type' => 'string',
                        'enum' => [
                            'available',
                            'unavailable'
                        ]
                    ],
                    'creationTime' => [
                        'type' => 'string',
                        'format' => 'date-time'
                    ],
                    'customDomain' => ['$ref' => '#/definitions/CustomDomain'],
                    'secondaryEndpoints' => ['$ref' => '#/definitions/Endpoints'],
                    'encryption' => ['$ref' => '#/definitions/Encryption'],
                    'accessTier' => [
                        'type' => 'string',
                        'enum' => [
                            'Hot',
                            'Cool'
                        ]
                    ],
                    'supportsHttpsTrafficOnly' => ['type' => 'boolean'],
                    'networkAcls' => ['$ref' => '#/definitions/StorageNetworkAcls']
                ],
                'required' => []
            ],
            'StorageAccount' => [
                'properties' => [
                    'sku' => ['$ref' => '#/definitions/Sku'],
                    'kind' => [
                        'type' => 'string',
                        'enum' => [
                            'Storage',
                            'BlobStorage'
                        ]
                    ],
                    'identity' => ['$ref' => '#/definitions/Identity'],
                    'properties' => ['$ref' => '#/definitions/StorageAccountProperties']
                ],
                'required' => []
            ],
            'StorageAccountKey' => [
                'properties' => [
                    'keyName' => ['type' => 'string'],
                    'value' => ['type' => 'string'],
                    'permissions' => [
                        'type' => 'string',
                        'enum' => [
                            'Read',
                            'Full'
                        ]
                    ]
                ],
                'required' => []
            ],
            'StorageAccountListResult' => [
                'properties' => ['value' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/StorageAccount']
                ]],
                'required' => []
            ],
            'StorageAccountListKeysResult' => [
                'properties' => ['keys' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/StorageAccountKey']
                ]],
                'required' => []
            ],
            'StorageAccountRegenerateKeyParameters' => [
                'properties' => ['keyName' => ['type' => 'string']],
                'required' => ['keyName']
            ],
            'StorageAccountPropertiesUpdateParameters' => [
                'properties' => [
                    'customDomain' => ['$ref' => '#/definitions/CustomDomain'],
                    'encryption' => ['$ref' => '#/definitions/Encryption'],
                    'accessTier' => [
                        'type' => 'string',
                        'enum' => [
                            'Hot',
                            'Cool'
                        ]
                    ],
                    'supportsHttpsTrafficOnly' => ['type' => 'boolean'],
                    'networkAcls' => ['$ref' => '#/definitions/StorageNetworkAcls']
                ],
                'required' => []
            ],
            'StorageAccountUpdateParameters' => [
                'properties' => [
                    'sku' => ['$ref' => '#/definitions/Sku'],
                    'tags' => [
                        'type' => 'object',
                        'additionalProperties' => ['type' => 'string']
                    ],
                    'identity' => ['$ref' => '#/definitions/Identity'],
                    'properties' => ['$ref' => '#/definitions/StorageAccountPropertiesUpdateParameters']
                ],
                'required' => []
            ],
            'UsageName' => [
                'properties' => [
                    'value' => ['type' => 'string'],
                    'localizedValue' => ['type' => 'string']
                ],
                'required' => []
            ],
            'Usage' => [
                'properties' => [
                    'unit' => [
                        'type' => 'string',
                        'enum' => [
                            'Count',
                            'Bytes',
                            'Seconds',
                            'Percent',
                            'CountsPerSecond',
                            'BytesPerSecond'
                        ]
                    ],
                    'currentValue' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'limit' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'name' => ['$ref' => '#/definitions/UsageName']
                ],
                'required' => []
            ],
            'UsageListResult' => [
                'properties' => ['value' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/Usage']
                ]],
                'required' => []
            ],
            'Resource' => [
                'properties' => [
                    'id' => ['type' => 'string'],
                    'name' => ['type' => 'string'],
                    'type' => ['type' => 'string'],
                    'location' => ['type' => 'string'],
                    'tags' => [
                        'type' => 'object',
                        'additionalProperties' => ['type' => 'string']
                    ]
                ],
                'required' => []
            ],
            'AccountSasParameters' => [
                'properties' => [
                    'signedServices' => [
                        'type' => 'string',
                        'enum' => [
                            'b',
                            'q',
                            't',
                            'f'
                        ]
                    ],
                    'signedResourceTypes' => [
                        'type' => 'string',
                        'enum' => [
                            's',
                            'c',
                            'o'
                        ]
                    ],
                    'signedPermission' => [
                        'type' => 'string',
                        'enum' => [
                            'r',
                            'd',
                            'w',
                            'l',
                            'a',
                            'c',
                            'u',
                            'p'
                        ]
                    ],
                    'signedIp' => ['type' => 'string'],
                    'signedProtocol' => [
                        'type' => 'string',
                        'enum' => [
                            'https,http',
                            'https'
                        ]
                    ],
                    'signedStart' => [
                        'type' => 'string',
                        'format' => 'date-time'
                    ],
                    'signedExpiry' => [
                        'type' => 'string',
                        'format' => 'date-time'
                    ],
                    'keyToSign' => ['type' => 'string']
                ],
                'required' => [
                    'signedServices',
                    'signedResourceTypes',
                    'signedPermission',
                    'signedExpiry'
                ]
            ],
            'ListAccountSasResponse' => [
                'properties' => ['accountSasToken' => ['type' => 'string']],
                'required' => []
            ],
            'ServiceSasParameters' => [
                'properties' => [
                    'canonicalizedResource' => ['type' => 'string'],
                    'signedResource' => [
                        'type' => 'string',
                        'enum' => [
                            'b',
                            'c',
                            'f',
                            's'
                        ]
                    ],
                    'signedPermission' => [
                        'type' => 'string',
                        'enum' => [
                            'r',
                            'd',
                            'w',
                            'l',
                            'a',
                            'c',
                            'u',
                            'p'
                        ]
                    ],
                    'signedIp' => ['type' => 'string'],
                    'signedProtocol' => [
                        'type' => 'string',
                        'enum' => [
                            'https,http',
                            'https'
                        ]
                    ],
                    'signedStart' => [
                        'type' => 'string',
                        'format' => 'date-time'
                    ],
                    'signedExpiry' => [
                        'type' => 'string',
                        'format' => 'date-time'
                    ],
                    'signedIdentifier' => ['type' => 'string'],
                    'startPk' => ['type' => 'string'],
                    'endPk' => ['type' => 'string'],
                    'startRk' => ['type' => 'string'],
                    'endRk' => ['type' => 'string'],
                    'keyToSign' => ['type' => 'string'],
                    'rscc' => ['type' => 'string'],
                    'rscd' => ['type' => 'string'],
                    'rsce' => ['type' => 'string'],
                    'rscl' => ['type' => 'string'],
                    'rsct' => ['type' => 'string']
                ],
                'required' => [
                    'canonicalizedResource',
                    'signedResource'
                ]
            ],
            'ListServiceSasResponse' => [
                'properties' => ['serviceSasToken' => ['type' => 'string']],
                'required' => []
            ]
        ]
    ];
}
