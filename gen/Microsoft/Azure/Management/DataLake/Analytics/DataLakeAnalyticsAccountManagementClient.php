<?php
namespace Microsoft\Azure\Management\DataLake\Analytics;
final class DataLakeAnalyticsAccountManagementClient
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
        $this->_ComputePolicies_group = new \Microsoft\Azure\Management\DataLake\Analytics\ComputePolicies($_client);
        $this->_FirewallRules_group = new \Microsoft\Azure\Management\DataLake\Analytics\FirewallRules($_client);
        $this->_StorageAccounts_group = new \Microsoft\Azure\Management\DataLake\Analytics\StorageAccounts($_client);
        $this->_DataLakeStoreAccounts_group = new \Microsoft\Azure\Management\DataLake\Analytics\DataLakeStoreAccounts($_client);
        $this->_Account_group = new \Microsoft\Azure\Management\DataLake\Analytics\Account($_client);
    }
    /**
     * @return \Microsoft\Azure\Management\DataLake\Analytics\ComputePolicies
     */
    public function getComputePolicies()
    {
        return $this->_ComputePolicies_group;
    }
    /**
     * @return \Microsoft\Azure\Management\DataLake\Analytics\FirewallRules
     */
    public function getFirewallRules()
    {
        return $this->_FirewallRules_group;
    }
    /**
     * @return \Microsoft\Azure\Management\DataLake\Analytics\StorageAccounts
     */
    public function getStorageAccounts()
    {
        return $this->_StorageAccounts_group;
    }
    /**
     * @return \Microsoft\Azure\Management\DataLake\Analytics\DataLakeStoreAccounts
     */
    public function getDataLakeStoreAccounts()
    {
        return $this->_DataLakeStoreAccounts_group;
    }
    /**
     * @return \Microsoft\Azure\Management\DataLake\Analytics\Account
     */
    public function getAccount()
    {
        return $this->_Account_group;
    }
    /**
     * @var \Microsoft\Azure\Management\DataLake\Analytics\ComputePolicies
     */
    private $_ComputePolicies_group;
    /**
     * @var \Microsoft\Azure\Management\DataLake\Analytics\FirewallRules
     */
    private $_FirewallRules_group;
    /**
     * @var \Microsoft\Azure\Management\DataLake\Analytics\StorageAccounts
     */
    private $_StorageAccounts_group;
    /**
     * @var \Microsoft\Azure\Management\DataLake\Analytics\DataLakeStoreAccounts
     */
    private $_DataLakeStoreAccounts_group;
    /**
     * @var \Microsoft\Azure\Management\DataLake\Analytics\Account
     */
    private $_Account_group;
    const _SWAGGER_OBJECT_DATA = [
        'host' => 'management.azure.com',
        'paths' => [
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.DataLakeAnalytics/accounts/{accountName}/computePolicies/{computePolicyName}' => [
                'put' => [
                    'operationId' => 'ComputePolicies_CreateOrUpdate',
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
                            'name' => 'computePolicyName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'parameters',
                            'in' => 'body',
                            'required' => TRUE,
                            'schema' => ['$ref' => '#/definitions/ComputePolicyCreateOrUpdateParameters']
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
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/ComputePolicy']]]
                ],
                'patch' => [
                    'operationId' => 'ComputePolicies_Update',
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
                            'name' => 'computePolicyName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'parameters',
                            'in' => 'body',
                            'required' => FALSE,
                            'schema' => ['$ref' => '#/definitions/ComputePolicy']
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
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/ComputePolicy']]]
                ],
                'delete' => [
                    'operationId' => 'ComputePolicies_Delete',
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
                            'name' => 'computePolicyName',
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
                    'operationId' => 'ComputePolicies_Get',
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
                            'name' => 'computePolicyName',
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
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/ComputePolicy']]]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.DataLakeAnalytics/accounts/{accountName}/computePolicies' => ['get' => [
                'operationId' => 'ComputePolicies_ListByAccount',
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
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/ComputePolicyListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.DataLakeAnalytics/accounts/{accountName}/firewallRules/{firewallRuleName}' => [
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
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.DataLakeAnalytics/accounts/{accountName}/firewallRules' => ['get' => [
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
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/DataLakeAnalyticsFirewallRuleListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.DataLakeAnalytics/accounts/{accountName}/StorageAccounts/{storageAccountName}' => [
                'put' => [
                    'operationId' => 'StorageAccounts_Add',
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
                            'name' => 'storageAccountName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'parameters',
                            'in' => 'body',
                            'required' => TRUE,
                            'schema' => ['$ref' => '#/definitions/AddStorageAccountParameters']
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
                            'name' => 'storageAccountName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'parameters',
                            'in' => 'body',
                            'required' => FALSE,
                            'schema' => ['$ref' => '#/definitions/UpdateStorageAccountParameters']
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
                            'name' => 'storageAccountName',
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
                ],
                'get' => [
                    'operationId' => 'StorageAccounts_Get',
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
                            'name' => 'storageAccountName',
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
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/StorageAccountInfo']]]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.DataLakeAnalytics/accounts/{accountName}/StorageAccounts/{storageAccountName}/Containers/{containerName}' => ['get' => [
                'operationId' => 'StorageAccounts_GetStorageContainer',
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
                        'name' => 'storageAccountName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'containerName',
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
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/StorageContainer']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.DataLakeAnalytics/accounts/{accountName}/StorageAccounts/{storageAccountName}/Containers' => ['get' => [
                'operationId' => 'StorageAccounts_ListStorageContainers',
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
                        'name' => 'storageAccountName',
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
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/ListStorageContainersResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.DataLakeAnalytics/accounts/{accountName}/StorageAccounts/{storageAccountName}/Containers/{containerName}/listSasTokens' => ['post' => [
                'operationId' => 'StorageAccounts_ListSasTokens',
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
                        'name' => 'storageAccountName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'containerName',
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
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/ListSasTokensResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.DataLakeAnalytics/accounts/{accountName}/StorageAccounts/' => ['get' => [
                'operationId' => 'StorageAccounts_ListByAccount',
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
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/DataLakeAnalyticsAccountListStorageAccountsResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.DataLakeAnalytics/accounts/{accountName}/DataLakeStoreAccounts/{dataLakeStoreAccountName}' => [
                'put' => [
                    'operationId' => 'DataLakeStoreAccounts_Add',
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
                            'name' => 'dataLakeStoreAccountName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'parameters',
                            'in' => 'body',
                            'required' => FALSE,
                            'schema' => ['$ref' => '#/definitions/AddDataLakeStoreParameters']
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
                ],
                'delete' => [
                    'operationId' => 'DataLakeStoreAccounts_Delete',
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
                            'name' => 'dataLakeStoreAccountName',
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
                ],
                'get' => [
                    'operationId' => 'DataLakeStoreAccounts_Get',
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
                            'name' => 'dataLakeStoreAccountName',
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
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/DataLakeStoreAccountInfo']]]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.DataLakeAnalytics/accounts/{accountName}/DataLakeStoreAccounts/' => ['get' => [
                'operationId' => 'DataLakeStoreAccounts_ListByAccount',
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
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/DataLakeAnalyticsAccountListDataLakeStoreResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.DataLakeAnalytics/accounts' => ['get' => [
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
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/DataLakeAnalyticsAccountListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/providers/Microsoft.DataLakeAnalytics/accounts' => ['get' => [
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
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/DataLakeAnalyticsAccountListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.DataLakeAnalytics/accounts/{accountName}' => [
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
                            'name' => 'accountName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'parameters',
                            'in' => 'body',
                            'required' => TRUE,
                            'schema' => ['$ref' => '#/definitions/DataLakeAnalyticsAccount']
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
                        '200' => ['schema' => ['$ref' => '#/definitions/DataLakeAnalyticsAccount']],
                        '201' => ['schema' => ['$ref' => '#/definitions/DataLakeAnalyticsAccount']]
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
                            'name' => 'accountName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'parameters',
                            'in' => 'body',
                            'required' => FALSE,
                            'schema' => ['$ref' => '#/definitions/DataLakeAnalyticsAccountUpdateParameters']
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
                        '200' => ['schema' => ['$ref' => '#/definitions/DataLakeAnalyticsAccount']],
                        '201' => ['schema' => ['$ref' => '#/definitions/DataLakeAnalyticsAccount']]
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
                    'responses' => [
                        '200' => [],
                        '202' => [],
                        '204' => []
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
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/DataLakeAnalyticsAccount']]]
                ]
            ]
        ],
        'definitions' => [
            'StorageAccountProperties' => [
                'properties' => [
                    'accessKey' => ['type' => 'string'],
                    'suffix' => ['type' => 'string']
                ],
                'required' => ['accessKey']
            ],
            'UpdateStorageAccountProperties' => [
                'properties' => [
                    'accessKey' => ['type' => 'string'],
                    'suffix' => ['type' => 'string']
                ],
                'required' => []
            ],
            'StorageAccountInfo' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/StorageAccountProperties']],
                'required' => ['properties']
            ],
            'StorageContainerProperties' => [
                'properties' => ['lastModifiedTime' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ]],
                'required' => []
            ],
            'StorageContainer' => [
                'properties' => [
                    'id' => ['type' => 'string'],
                    'name' => ['type' => 'string'],
                    'type' => ['type' => 'string'],
                    'properties' => ['$ref' => '#/definitions/StorageContainerProperties']
                ],
                'required' => []
            ],
            'ListStorageContainersResult' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/StorageContainer']
                    ],
                    'nextLink' => ['type' => 'string']
                ],
                'required' => []
            ],
            'SasTokenInfo' => [
                'properties' => ['accessToken' => ['type' => 'string']],
                'required' => []
            ],
            'ListSasTokensResult' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/SasTokenInfo']
                    ],
                    'nextLink' => ['type' => 'string']
                ],
                'required' => []
            ],
            'DataLakeStoreAccountInfoProperties' => [
                'properties' => ['suffix' => ['type' => 'string']],
                'required' => []
            ],
            'DataLakeStoreAccountInfo' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/DataLakeStoreAccountInfoProperties']],
                'required' => []
            ],
            'DataLakeAnalyticsAccountListStorageAccountsResult' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/StorageAccountInfo']
                    ],
                    'nextLink' => ['type' => 'string']
                ],
                'required' => []
            ],
            'DataLakeAnalyticsAccountListDataLakeStoreResult' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/DataLakeStoreAccountInfo']
                    ],
                    'nextLink' => ['type' => 'string']
                ],
                'required' => []
            ],
            'FirewallRuleProperties' => [
                'properties' => [
                    'startIpAddress' => ['type' => 'string'],
                    'endIpAddress' => ['type' => 'string']
                ],
                'required' => [
                    'startIpAddress',
                    'endIpAddress'
                ]
            ],
            'FirewallRule' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/FirewallRuleProperties']],
                'required' => ['properties']
            ],
            'ComputePolicyPropertiesCreateParameters' => [
                'properties' => [
                    'objectId' => [
                        'type' => 'string',
                        'format' => 'uuid'
                    ],
                    'objectType' => [
                        'type' => 'string',
                        'enum' => [
                            'User',
                            'Group',
                            'ServicePrincipal'
                        ]
                    ],
                    'maxDegreeOfParallelismPerJob' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'minPriorityPerJob' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ]
                ],
                'required' => [
                    'objectId',
                    'objectType'
                ]
            ],
            'ComputePolicyAccountCreateParameters' => [
                'properties' => [
                    'name' => ['type' => 'string'],
                    'properties' => ['$ref' => '#/definitions/ComputePolicyPropertiesCreateParameters']
                ],
                'required' => [
                    'name',
                    'properties'
                ]
            ],
            'DataLakeAnalyticsAccountProperties' => [
                'properties' => [
                    'defaultDataLakeStoreAccount' => ['type' => 'string'],
                    'maxDegreeOfParallelism' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'queryStoreRetention' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'maxJobCount' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'systemMaxDegreeOfParallelism' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'systemMaxJobCount' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'dataLakeStoreAccounts' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/DataLakeStoreAccountInfo']
                    ],
                    'storageAccounts' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/StorageAccountInfo']
                    ],
                    'newTier' => [
                        'type' => 'string',
                        'enum' => [
                            'Consumption',
                            'Commitment_100AUHours',
                            'Commitment_500AUHours',
                            'Commitment_1000AUHours',
                            'Commitment_5000AUHours',
                            'Commitment_10000AUHours',
                            'Commitment_50000AUHours',
                            'Commitment_100000AUHours',
                            'Commitment_500000AUHours'
                        ]
                    ],
                    'currentTier' => [
                        'type' => 'string',
                        'enum' => [
                            'Consumption',
                            'Commitment_100AUHours',
                            'Commitment_500AUHours',
                            'Commitment_1000AUHours',
                            'Commitment_5000AUHours',
                            'Commitment_10000AUHours',
                            'Commitment_50000AUHours',
                            'Commitment_100000AUHours',
                            'Commitment_500000AUHours'
                        ]
                    ],
                    'firewallState' => [
                        'type' => 'string',
                        'enum' => [
                            'Enabled',
                            'Disabled'
                        ]
                    ],
                    'firewallAllowAzureIps' => [
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
                    'maxDegreeOfParallelismPerJob' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'minPriorityPerJob' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'computePolicies' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/ComputePolicyAccountCreateParameters']
                    ]
                ],
                'required' => [
                    'defaultDataLakeStoreAccount',
                    'dataLakeStoreAccounts'
                ]
            ],
            'ComputePolicyProperties' => [
                'properties' => [
                    'objectId' => [
                        'type' => 'string',
                        'format' => 'uuid'
                    ],
                    'objectType' => [
                        'type' => 'string',
                        'enum' => [
                            'User',
                            'Group',
                            'ServicePrincipal'
                        ]
                    ],
                    'maxDegreeOfParallelismPerJob' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'minPriorityPerJob' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ]
                ],
                'required' => []
            ],
            'ComputePolicy' => [
                'properties' => [
                    'name' => ['type' => 'string'],
                    'properties' => ['$ref' => '#/definitions/ComputePolicyProperties']
                ],
                'required' => []
            ],
            'UpdateDataLakeAnalyticsAccountProperties' => [
                'properties' => [
                    'maxDegreeOfParallelism' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'queryStoreRetention' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'maxJobCount' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'newTier' => [
                        'type' => 'string',
                        'enum' => [
                            'Consumption',
                            'Commitment_100AUHours',
                            'Commitment_500AUHours',
                            'Commitment_1000AUHours',
                            'Commitment_5000AUHours',
                            'Commitment_10000AUHours',
                            'Commitment_50000AUHours',
                            'Commitment_100000AUHours',
                            'Commitment_500000AUHours'
                        ]
                    ],
                    'firewallState' => [
                        'type' => 'string',
                        'enum' => [
                            'Enabled',
                            'Disabled'
                        ]
                    ],
                    'firewallAllowAzureIps' => [
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
                    'maxDegreeOfParallelismPerJob' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'minPriorityPerJob' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'computePolicies' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/ComputePolicy']
                    ]
                ],
                'required' => []
            ],
            'AddDataLakeStoreParameters' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/DataLakeStoreAccountInfoProperties']],
                'required' => []
            ],
            'AddStorageAccountParameters' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/StorageAccountProperties']],
                'required' => ['properties']
            ],
            'UpdateStorageAccountParameters' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/UpdateStorageAccountProperties']],
                'required' => []
            ],
            'ComputePolicyCreateOrUpdateParameters' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/ComputePolicyPropertiesCreateParameters']],
                'required' => ['properties']
            ],
            'ComputePolicyListResult' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/ComputePolicy']
                    ],
                    'nextLink' => ['type' => 'string']
                ],
                'required' => []
            ],
            'DataLakeAnalyticsAccountUpdateParameters' => [
                'properties' => [
                    'tags' => [
                        'type' => 'object',
                        'additionalProperties' => ['type' => 'string']
                    ],
                    'properties' => ['$ref' => '#/definitions/UpdateDataLakeAnalyticsAccountProperties']
                ],
                'required' => []
            ],
            'DataLakeAnalyticsAccountPropertiesBasic' => [
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
                        ]
                    ],
                    'state' => [
                        'type' => 'string',
                        'enum' => [
                            'Active',
                            'Suspended'
                        ]
                    ],
                    'creationTime' => [
                        'type' => 'string',
                        'format' => 'date-time'
                    ],
                    'lastModifiedTime' => [
                        'type' => 'string',
                        'format' => 'date-time'
                    ],
                    'endpoint' => ['type' => 'string'],
                    'accountId' => [
                        'type' => 'string',
                        'format' => 'uuid'
                    ]
                ],
                'required' => []
            ],
            'DataLakeAnalyticsAccountBasic' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/DataLakeAnalyticsAccountPropertiesBasic']],
                'required' => ['properties']
            ],
            'DataLakeAnalyticsAccount' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/DataLakeAnalyticsAccountProperties']],
                'required' => ['properties']
            ],
            'DataLakeAnalyticsAccountListResult' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/DataLakeAnalyticsAccountBasic']
                    ],
                    'nextLink' => ['type' => 'string']
                ],
                'required' => []
            ],
            'DataLakeAnalyticsFirewallRuleListResult' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/FirewallRule']
                    ],
                    'nextLink' => ['type' => 'string']
                ],
                'required' => []
            ],
            'UpdateFirewallRuleProperties' => [
                'properties' => [
                    'startIpAddress' => ['type' => 'string'],
                    'endIpAddress' => ['type' => 'string']
                ],
                'required' => []
            ],
            'UpdateFirewallRuleParameters' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/UpdateFirewallRuleProperties']],
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
                'required' => ['location']
            ],
            'OptionalSubResource' => [
                'properties' => [
                    'id' => ['type' => 'string'],
                    'name' => ['type' => 'string'],
                    'type' => ['type' => 'string']
                ],
                'required' => []
            ],
            'SubResource' => [
                'properties' => [
                    'id' => ['type' => 'string'],
                    'name' => ['type' => 'string'],
                    'type' => ['type' => 'string']
                ],
                'required' => ['name']
            ]
        ]
    ];
}
