<?php
namespace Microsoft\Azure\Management\DataLake\Store;
final class DataLakeStoreAccountManagementClient
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
        $this->_FirewallRules_group = new \Microsoft\Azure\Management\DataLake\Store\FirewallRules($_client);
        $this->_TrustedIdProviders_group = new \Microsoft\Azure\Management\DataLake\Store\TrustedIdProviders($_client);
        $this->_Account_group = new \Microsoft\Azure\Management\DataLake\Store\Account($_client);
    }
    /**
     * @return \Microsoft\Azure\Management\DataLake\Store\FirewallRules
     */
    public function getFirewallRules()
    {
        return $this->_FirewallRules_group;
    }
    /**
     * @return \Microsoft\Azure\Management\DataLake\Store\TrustedIdProviders
     */
    public function getTrustedIdProviders()
    {
        return $this->_TrustedIdProviders_group;
    }
    /**
     * @return \Microsoft\Azure\Management\DataLake\Store\Account
     */
    public function getAccount()
    {
        return $this->_Account_group;
    }
    /**
     * @var \Microsoft\Azure\Management\DataLake\Store\FirewallRules
     */
    private $_FirewallRules_group;
    /**
     * @var \Microsoft\Azure\Management\DataLake\Store\TrustedIdProviders
     */
    private $_TrustedIdProviders_group;
    /**
     * @var \Microsoft\Azure\Management\DataLake\Store\Account
     */
    private $_Account_group;
    const _SWAGGER_OBJECT_DATA = [
        'host' => 'management.azure.com',
        'paths' => [
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.DataLakeStore/accounts/{accountName}/firewallRules/{firewallRuleName}' => [
                'put' => [
                    'operationId' => 'FirewallRules_CreateOrUpdate',
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
                            'name' => 'firewallRuleName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'parameters',
                            'in' => 'body',
                            'required' => TRUE,
                            'schema' => ['$ref' => '#/definitions/FirewallRule']
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-11-01']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/FirewallRule']]]
                ],
                'patch' => [
                    'operationId' => 'FirewallRules_Update',
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
                            'name' => 'firewallRuleName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'parameters',
                            'in' => 'body',
                            'required' => FALSE,
                            'schema' => ['$ref' => '#/definitions/UpdateFirewallRuleParameters']
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-11-01']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/FirewallRule']]]
                ],
                'delete' => [
                    'operationId' => 'FirewallRules_Delete',
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
                            'name' => 'firewallRuleName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-11-01']
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
                    'operationId' => 'FirewallRules_Get',
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
                            'name' => 'firewallRuleName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-11-01']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/FirewallRule']]]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.DataLakeStore/accounts/{accountName}/firewallRules' => ['get' => [
                'operationId' => 'FirewallRules_ListByAccount',
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
                        'enum' => ['2016-11-01']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/DataLakeStoreFirewallRuleListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.DataLakeStore/accounts/{accountName}/trustedIdProviders/{trustedIdProviderName}' => [
                'put' => [
                    'operationId' => 'TrustedIdProviders_CreateOrUpdate',
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
                            'name' => 'trustedIdProviderName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'parameters',
                            'in' => 'body',
                            'required' => TRUE,
                            'schema' => ['$ref' => '#/definitions/TrustedIdProvider']
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-11-01']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/TrustedIdProvider']]]
                ],
                'patch' => [
                    'operationId' => 'TrustedIdProviders_Update',
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
                            'name' => 'trustedIdProviderName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'parameters',
                            'in' => 'body',
                            'required' => FALSE,
                            'schema' => ['$ref' => '#/definitions/UpdateTrustedIdProviderParameters']
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-11-01']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/TrustedIdProvider']]]
                ],
                'delete' => [
                    'operationId' => 'TrustedIdProviders_Delete',
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
                            'name' => 'trustedIdProviderName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-11-01']
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
                    'operationId' => 'TrustedIdProviders_Get',
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
                            'name' => 'trustedIdProviderName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-11-01']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/TrustedIdProvider']]]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.DataLakeStore/accounts/{accountName}/trustedIdProviders' => ['get' => [
                'operationId' => 'TrustedIdProviders_ListByAccount',
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
                        'enum' => ['2016-11-01']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/DataLakeStoreTrustedIdProviderListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.DataLakeStore/accounts/{name}' => [
                'put' => [
                    'operationId' => 'Account_Create',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'name',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'parameters',
                            'in' => 'body',
                            'required' => TRUE,
                            'schema' => ['$ref' => '#/definitions/DataLakeStoreAccount']
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-11-01']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => [
                        '200' => ['schema' => ['$ref' => '#/definitions/DataLakeStoreAccount']],
                        '201' => ['schema' => ['$ref' => '#/definitions/DataLakeStoreAccount']]
                    ]
                ],
                'patch' => [
                    'operationId' => 'Account_Update',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'name',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'parameters',
                            'in' => 'body',
                            'required' => TRUE,
                            'schema' => ['$ref' => '#/definitions/DataLakeStoreAccountUpdateParameters']
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-11-01']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => [
                        '200' => ['schema' => ['$ref' => '#/definitions/DataLakeStoreAccount']],
                        '201' => ['schema' => ['$ref' => '#/definitions/DataLakeStoreAccount']]
                    ]
                ],
                'delete' => [
                    'operationId' => 'Account_Delete',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'name',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-11-01']
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
                        '204' => [],
                        '202' => []
                    ]
                ],
                'get' => [
                    'operationId' => 'Account_Get',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'name',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-11-01']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/DataLakeStoreAccount']]]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.DataLakeStore/accounts/{accountName}/enableKeyVault' => ['post' => [
                'operationId' => 'Account_EnableKeyVault',
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
                        'enum' => ['2016-11-01']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => []]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.DataLakeStore/accounts' => ['get' => [
                'operationId' => 'Account_ListByResourceGroup',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => '$filter',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'string'
                    ],
                    [
                        'name' => '$top',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    [
                        'name' => '$skip',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    [
                        'name' => '$select',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'string'
                    ],
                    [
                        'name' => '$orderby',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'string'
                    ],
                    [
                        'name' => '$count',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'boolean'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-11-01']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/DataLakeStoreAccountListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/providers/Microsoft.DataLakeStore/accounts' => ['get' => [
                'operationId' => 'Account_List',
                'parameters' => [
                    [
                        'name' => '$filter',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'string'
                    ],
                    [
                        'name' => '$top',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    [
                        'name' => '$skip',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    [
                        'name' => '$select',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'string'
                    ],
                    [
                        'name' => '$orderby',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'string'
                    ],
                    [
                        'name' => '$count',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'boolean'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-11-01']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/DataLakeStoreAccountListResult']]]
            ]]
        ],
        'definitions' => [
            'UpdateFirewallRuleProperties' => [
                'properties' => [
                    'startIpAddress' => ['type' => 'string'],
                    'endIpAddress' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'UpdateFirewallRuleParameters' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/UpdateFirewallRuleProperties']],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'FirewallRuleProperties' => [
                'properties' => [
                    'startIpAddress' => ['type' => 'string'],
                    'endIpAddress' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => [
                    'startIpAddress',
                    'endIpAddress'
                ]
            ],
            'FirewallRule' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/FirewallRuleProperties']],
                'additionalProperties' => FALSE,
                'required' => ['properties']
            ],
            'UpdateTrustedIdProviderProperties' => [
                'properties' => ['idProvider' => ['type' => 'string']],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'UpdateTrustedIdProviderParameters' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/UpdateTrustedIdProviderProperties']],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'TrustedIdProviderProperties' => [
                'properties' => ['idProvider' => ['type' => 'string']],
                'additionalProperties' => FALSE,
                'required' => ['idProvider']
            ],
            'TrustedIdProvider' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/TrustedIdProviderProperties']],
                'additionalProperties' => FALSE,
                'required' => ['properties']
            ],
            'DataLakeStoreTrustedIdProviderListResult' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/TrustedIdProvider'],
                        'readOnly' => TRUE
                    ],
                    'nextLink' => [
                        'type' => 'string',
                        'readOnly' => TRUE
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'DataLakeStoreFirewallRuleListResult' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/FirewallRule'],
                        'readOnly' => TRUE
                    ],
                    'nextLink' => [
                        'type' => 'string',
                        'readOnly' => TRUE
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'EncryptionIdentity' => [
                'properties' => [
                    'type' => ['type' => 'string'],
                    'principalId' => [
                        'type' => 'string',
                        'format' => 'uuid',
                        'readOnly' => TRUE
                    ],
                    'tenantId' => [
                        'type' => 'string',
                        'format' => 'uuid',
                        'readOnly' => TRUE
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => ['type']
            ],
            'KeyVaultMetaInfo' => [
                'properties' => [
                    'keyVaultResourceId' => ['type' => 'string'],
                    'encryptionKeyName' => ['type' => 'string'],
                    'encryptionKeyVersion' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => [
                    'keyVaultResourceId',
                    'encryptionKeyName',
                    'encryptionKeyVersion'
                ]
            ],
            'EncryptionConfig' => [
                'properties' => [
                    'type' => [
                        'type' => 'string',
                        'enum' => [
                            'UserManaged',
                            'ServiceManaged'
                        ]
                    ],
                    'keyVaultMetaInfo' => ['$ref' => '#/definitions/KeyVaultMetaInfo']
                ],
                'additionalProperties' => FALSE,
                'required' => ['type']
            ],
            'UpdateKeyVaultMetaInfo' => [
                'properties' => ['encryptionKeyVersion' => ['type' => 'string']],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'UpdateEncryptionConfig' => [
                'properties' => ['keyVaultMetaInfo' => ['$ref' => '#/definitions/UpdateKeyVaultMetaInfo']],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'DataLakeStoreAccountProperties' => [
                'properties' => [
                    'encryptionState' => [
                        'type' => 'string',
                        'enum' => [
                            'Enabled',
                            'Disabled'
                        ]
                    ],
                    'encryptionProvisioningState' => [
                        'type' => 'string',
                        'enum' => [
                            'Creating',
                            'Succeeded'
                        ],
                        'readOnly' => TRUE
                    ],
                    'encryptionConfig' => ['$ref' => '#/definitions/EncryptionConfig'],
                    'firewallState' => [
                        'type' => 'string',
                        'enum' => [
                            'Enabled',
                            'Disabled'
                        ]
                    ],
                    'firewallRules' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/FirewallRule']
                    ],
                    'trustedIdProviderState' => [
                        'type' => 'string',
                        'enum' => [
                            'Enabled',
                            'Disabled'
                        ]
                    ],
                    'trustedIdProviders' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/TrustedIdProvider']
                    ],
                    'defaultGroup' => ['type' => 'string'],
                    'newTier' => [
                        'type' => 'string',
                        'enum' => [
                            'Consumption',
                            'Commitment_1TB',
                            'Commitment_10TB',
                            'Commitment_100TB',
                            'Commitment_500TB',
                            'Commitment_1PB',
                            'Commitment_5PB'
                        ]
                    ],
                    'currentTier' => [
                        'type' => 'string',
                        'enum' => [
                            'Consumption',
                            'Commitment_1TB',
                            'Commitment_10TB',
                            'Commitment_100TB',
                            'Commitment_500TB',
                            'Commitment_1PB',
                            'Commitment_5PB'
                        ],
                        'readOnly' => TRUE
                    ],
                    'firewallAllowAzureIps' => [
                        'type' => 'string',
                        'enum' => [
                            'Enabled',
                            'Disabled'
                        ]
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'UpdateDataLakeStoreAccountProperties' => [
                'properties' => [
                    'firewallState' => [
                        'type' => 'string',
                        'enum' => [
                            'Enabled',
                            'Disabled'
                        ]
                    ],
                    'trustedIdProviderState' => [
                        'type' => 'string',
                        'enum' => [
                            'Enabled',
                            'Disabled'
                        ]
                    ],
                    'defaultGroup' => ['type' => 'string'],
                    'newTier' => [
                        'type' => 'string',
                        'enum' => [
                            'Consumption',
                            'Commitment_1TB',
                            'Commitment_10TB',
                            'Commitment_100TB',
                            'Commitment_500TB',
                            'Commitment_1PB',
                            'Commitment_5PB'
                        ]
                    ],
                    'firewallAllowAzureIps' => [
                        'type' => 'string',
                        'enum' => [
                            'Enabled',
                            'Disabled'
                        ]
                    ],
                    'encryptionConfig' => ['$ref' => '#/definitions/UpdateEncryptionConfig']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'DataLakeStoreAccountUpdateParameters' => [
                'properties' => [
                    'tags' => [
                        'type' => 'object',
                        'additionalProperties' => ['type' => 'string']
                    ],
                    'properties' => ['$ref' => '#/definitions/UpdateDataLakeStoreAccountProperties']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'DataLakeStoreAccount' => [
                'properties' => [
                    'identity' => ['$ref' => '#/definitions/EncryptionIdentity'],
                    'properties' => ['$ref' => '#/definitions/DataLakeStoreAccountProperties']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'DataLakeStoreAccountPropertiesBasic' => [
                'properties' => [
                    'provisioningState' => [
                        'type' => 'string',
                        'enum' => [
                            'Failed',
                            'Creating',
                            'Running',
                            'Succeeded',
                            'Patching',
                            'Suspending',
                            'Resuming',
                            'Deleting',
                            'Deleted'
                        ],
                        'readOnly' => TRUE
                    ],
                    'state' => [
                        'type' => 'string',
                        'enum' => [
                            'Active',
                            'Suspended'
                        ],
                        'readOnly' => TRUE
                    ],
                    'creationTime' => [
                        'type' => 'string',
                        'format' => 'date-time',
                        'readOnly' => TRUE
                    ],
                    'lastModifiedTime' => [
                        'type' => 'string',
                        'format' => 'date-time',
                        'readOnly' => TRUE
                    ],
                    'endpoint' => [
                        'type' => 'string',
                        'readOnly' => TRUE
                    ],
                    'accountId' => [
                        'type' => 'string',
                        'format' => 'uuid',
                        'readOnly' => TRUE
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'DataLakeStoreAccountBasic' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/DataLakeStoreAccountPropertiesBasic']],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'DataLakeStoreAccountListResult' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/DataLakeStoreAccountBasic'],
                        'readOnly' => TRUE
                    ],
                    'nextLink' => [
                        'type' => 'string',
                        'readOnly' => TRUE
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'ErrorDetails' => [
                'properties' => [
                    'code' => [
                        'type' => 'string',
                        'readOnly' => TRUE
                    ],
                    'message' => [
                        'type' => 'string',
                        'readOnly' => TRUE
                    ],
                    'target' => [
                        'type' => 'string',
                        'readOnly' => TRUE
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'Resource' => [
                'properties' => [
                    'id' => [
                        'type' => 'string',
                        'readOnly' => TRUE
                    ],
                    'name' => [
                        'type' => 'string',
                        'readOnly' => TRUE
                    ],
                    'type' => [
                        'type' => 'string',
                        'readOnly' => TRUE
                    ],
                    'location' => ['type' => 'string'],
                    'tags' => [
                        'type' => 'object',
                        'additionalProperties' => ['type' => 'string']
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => ['location']
            ],
            'SubResource' => [
                'properties' => [
                    'id' => [
                        'type' => 'string',
                        'readOnly' => TRUE
                    ],
                    'name' => ['type' => 'string'],
                    'type' => [
                        'type' => 'string',
                        'readOnly' => TRUE
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ]
        ]
    ];
}
