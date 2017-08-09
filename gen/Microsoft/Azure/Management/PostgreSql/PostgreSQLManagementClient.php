<?php
namespace Microsoft\Azure\Management\PostgreSql;
final class PostgreSQLManagementClient
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
        $this->_Servers_group = new \Microsoft\Azure\Management\PostgreSql\Servers($_client);
        $this->_FirewallRules_group = new \Microsoft\Azure\Management\PostgreSql\FirewallRules($_client);
        $this->_Databases_group = new \Microsoft\Azure\Management\PostgreSql\Databases($_client);
        $this->_Configurations_group = new \Microsoft\Azure\Management\PostgreSql\Configurations($_client);
        $this->_LogFiles_group = new \Microsoft\Azure\Management\PostgreSql\LogFiles($_client);
        $this->_Operations_group = new \Microsoft\Azure\Management\PostgreSql\Operations($_client);
    }
    /**
     * @return \Microsoft\Azure\Management\PostgreSql\Servers
     */
    public function getServers()
    {
        return $this->_Servers_group;
    }
    /**
     * @return \Microsoft\Azure\Management\PostgreSql\FirewallRules
     */
    public function getFirewallRules()
    {
        return $this->_FirewallRules_group;
    }
    /**
     * @return \Microsoft\Azure\Management\PostgreSql\Databases
     */
    public function getDatabases()
    {
        return $this->_Databases_group;
    }
    /**
     * @return \Microsoft\Azure\Management\PostgreSql\Configurations
     */
    public function getConfigurations()
    {
        return $this->_Configurations_group;
    }
    /**
     * @return \Microsoft\Azure\Management\PostgreSql\LogFiles
     */
    public function getLogFiles()
    {
        return $this->_LogFiles_group;
    }
    /**
     * @return \Microsoft\Azure\Management\PostgreSql\Operations
     */
    public function getOperations()
    {
        return $this->_Operations_group;
    }
    /**
     * @var \Microsoft\Azure\Management\PostgreSql\Servers
     */
    private $_Servers_group;
    /**
     * @var \Microsoft\Azure\Management\PostgreSql\FirewallRules
     */
    private $_FirewallRules_group;
    /**
     * @var \Microsoft\Azure\Management\PostgreSql\Databases
     */
    private $_Databases_group;
    /**
     * @var \Microsoft\Azure\Management\PostgreSql\Configurations
     */
    private $_Configurations_group;
    /**
     * @var \Microsoft\Azure\Management\PostgreSql\LogFiles
     */
    private $_LogFiles_group;
    /**
     * @var \Microsoft\Azure\Management\PostgreSql\Operations
     */
    private $_Operations_group;
    const _SWAGGER_OBJECT_DATA = [
        'host' => 'management.azure.com',
        'paths' => [
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.DBforPostgreSQL/servers/{serverName}' => [
                'put' => [
                    'operationId' => 'Servers_Create',
                    'parameters' => [
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-04-30-preview']
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
                            'name' => 'serverName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'parameters',
                            'in' => 'body',
                            'required' => TRUE,
                            '$ref' => '#/definitions/ServerForCreate'
                        ]
                    ],
                    'responses' => [
                        '200' => ['schema' => ['$ref' => '#/definitions/Server']],
                        '201' => ['schema' => ['$ref' => '#/definitions/Server']],
                        '202' => []
                    ]
                ],
                'patch' => [
                    'operationId' => 'Servers_Update',
                    'parameters' => [
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-04-30-preview']
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
                            'name' => 'serverName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'parameters',
                            'in' => 'body',
                            'required' => TRUE,
                            '$ref' => '#/definitions/ServerUpdateParameters'
                        ]
                    ],
                    'responses' => [
                        '200' => ['schema' => ['$ref' => '#/definitions/Server']],
                        '202' => []
                    ]
                ],
                'delete' => [
                    'operationId' => 'Servers_Delete',
                    'parameters' => [
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-04-30-preview']
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
                            'name' => 'serverName',
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
                    'operationId' => 'Servers_Get',
                    'parameters' => [
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-04-30-preview']
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
                            'name' => 'serverName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/Server']]]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.DBforPostgreSQL/servers' => ['get' => [
                'operationId' => 'Servers_ListByResourceGroup',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-04-30-preview']
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
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/ServerListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/providers/Microsoft.DBforPostgreSQL/servers' => ['get' => [
                'operationId' => 'Servers_List',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-04-30-preview']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/ServerListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.DBforPostgreSQL/servers/{serverName}/firewallRules/{firewallRuleName}' => [
                'put' => [
                    'operationId' => 'FirewallRules_CreateOrUpdate',
                    'parameters' => [
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-04-30-preview']
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
                            'name' => 'serverName',
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
                            '$ref' => '#/definitions/FirewallRule'
                        ]
                    ],
                    'responses' => [
                        '200' => ['schema' => ['$ref' => '#/definitions/FirewallRule']],
                        '201' => ['schema' => ['$ref' => '#/definitions/FirewallRule']],
                        '202' => []
                    ]
                ],
                'delete' => [
                    'operationId' => 'FirewallRules_Delete',
                    'parameters' => [
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-04-30-preview']
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
                            'name' => 'serverName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'firewallRuleName',
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
                    'operationId' => 'FirewallRules_Get',
                    'parameters' => [
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-04-30-preview']
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
                            'name' => 'serverName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'firewallRuleName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/FirewallRule']]]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.DBforPostgreSQL/servers/{serverName}/firewallRules' => ['get' => [
                'operationId' => 'FirewallRules_ListByServer',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-04-30-preview']
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
                        'name' => 'serverName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/FirewallRuleListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.DBforPostgreSQL/servers/{serverName}/databases/{databaseName}' => [
                'put' => [
                    'operationId' => 'Databases_CreateOrUpdate',
                    'parameters' => [
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-04-30-preview']
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
                            'name' => 'serverName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'databaseName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'parameters',
                            'in' => 'body',
                            'required' => TRUE,
                            '$ref' => '#/definitions/Database'
                        ]
                    ],
                    'responses' => [
                        '200' => ['schema' => ['$ref' => '#/definitions/Database']],
                        '201' => ['schema' => ['$ref' => '#/definitions/Database']],
                        '202' => []
                    ]
                ],
                'delete' => [
                    'operationId' => 'Databases_Delete',
                    'parameters' => [
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-04-30-preview']
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
                            'name' => 'serverName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'databaseName',
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
                    'operationId' => 'Databases_Get',
                    'parameters' => [
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-04-30-preview']
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
                            'name' => 'serverName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'databaseName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/Database']]]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.DBforPostgreSQL/servers/{serverName}/databases' => ['get' => [
                'operationId' => 'Databases_ListByServer',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-04-30-preview']
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
                        'name' => 'serverName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/DatabaseListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.DBforPostgreSQL/servers/{serverName}/configurations/{configurationName}' => [
                'put' => [
                    'operationId' => 'Configurations_CreateOrUpdate',
                    'parameters' => [
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-04-30-preview']
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
                            'name' => 'serverName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'configurationName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'parameters',
                            'in' => 'body',
                            'required' => TRUE,
                            '$ref' => '#/definitions/Configuration'
                        ]
                    ],
                    'responses' => [
                        '200' => ['schema' => ['$ref' => '#/definitions/Configuration']],
                        '202' => []
                    ]
                ],
                'get' => [
                    'operationId' => 'Configurations_Get',
                    'parameters' => [
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-04-30-preview']
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
                            'name' => 'serverName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'configurationName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/Configuration']]]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.DBforPostgreSQL/servers/{serverName}/configurations' => ['get' => [
                'operationId' => 'Configurations_ListByServer',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-04-30-preview']
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
                        'name' => 'serverName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/ConfigurationListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.DBforPostgreSQL/servers/{serverName}/logFiles' => ['get' => [
                'operationId' => 'LogFiles_ListByServer',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-04-30-preview']
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
                        'name' => 'serverName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/LogFileListResult']]]
            ]],
            '/providers/Microsoft.DBforPostgreSQL/operations' => ['get' => [
                'operationId' => 'Operations_List',
                'parameters' => [[
                    'name' => 'api-version',
                    'in' => 'query',
                    'required' => TRUE,
                    'type' => 'string',
                    'enum' => ['2017-04-30-preview']
                ]],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/OperationListResult']]]
            ]]
        ],
        'definitions' => [
            'ProxyResource' => ['properties' => [
                'id' => ['type' => 'string'],
                'name' => ['type' => 'string'],
                'type' => ['type' => 'string']
            ]],
            'TrackedResource' => ['properties' => [
                'location' => ['type' => 'string'],
                'tags' => [
                    'type' => 'object',
                    'additionalProperties' => ['type' => 'string']
                ]
            ]],
            'ServerProperties' => ['properties' => [
                'administratorLogin' => ['type' => 'string'],
                'storageMB' => [
                    'type' => 'integer',
                    'format' => 'int64'
                ],
                'version' => [
                    'type' => 'string',
                    'enum' => [
                        '9.5',
                        '9.6'
                    ]
                ],
                'sslEnforcement' => [
                    'type' => 'string',
                    'enum' => [
                        'Enabled',
                        'Disabled'
                    ]
                ],
                'userVisibleState' => [
                    'type' => 'string',
                    'enum' => [
                        'Ready',
                        'Dropping',
                        'Disabled'
                    ]
                ],
                'fullyQualifiedDomainName' => ['type' => 'string']
            ]],
            'ServerPropertiesForCreate' => ['properties' => [
                'storageMB' => [
                    'type' => 'integer',
                    'format' => 'int64'
                ],
                'version' => [
                    'type' => 'string',
                    'enum' => [
                        '9.5',
                        '9.6'
                    ]
                ],
                'sslEnforcement' => [
                    'type' => 'string',
                    'enum' => [
                        'Enabled',
                        'Disabled'
                    ]
                ]
            ]],
            'Default' => ['properties' => [
                'administratorLogin' => ['type' => 'string'],
                'administratorLoginPassword' => ['type' => 'string']
            ]],
            'PointInTimeRestore' => ['properties' => [
                'sourceServerId' => ['type' => 'string'],
                'restorePointInTime' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ]
            ]],
            'Sku' => ['properties' => [
                'name' => ['type' => 'string'],
                'tier' => [
                    'type' => 'string',
                    'enum' => [
                        'Basic',
                        'Standard'
                    ]
                ],
                'capacity' => [
                    'type' => 'integer',
                    'format' => 'int32'
                ],
                'size' => ['type' => 'string'],
                'family' => ['type' => 'string']
            ]],
            'Server' => ['properties' => [
                'sku' => ['$ref' => '#/definitions/Sku'],
                'properties' => ['$ref' => '#/definitions/ServerProperties']
            ]],
            'ServerForCreate' => ['properties' => [
                'sku' => ['$ref' => '#/definitions/Sku'],
                'properties' => ['$ref' => '#/definitions/ServerPropertiesForCreate'],
                'location' => ['type' => 'string'],
                'tags' => [
                    'type' => 'object',
                    'additionalProperties' => ['type' => 'string']
                ]
            ]],
            'ServerUpdateParameters_properties' => ['properties' => [
                'storageMB' => [
                    'type' => 'integer',
                    'format' => 'int64'
                ],
                'administratorLoginPassword' => ['type' => 'string'],
                'version' => [
                    'type' => 'string',
                    'enum' => [
                        '9.5',
                        '9.6'
                    ]
                ],
                'sslEnforcement' => [
                    'type' => 'string',
                    'enum' => [
                        'Enabled',
                        'Disabled'
                    ]
                ]
            ]],
            'ServerUpdateParameters' => ['properties' => [
                'sku' => ['$ref' => '#/definitions/Sku'],
                'properties' => ['$ref' => '#/definitions/ServerUpdateParameters_properties'],
                'tags' => [
                    'type' => 'object',
                    'additionalProperties' => ['type' => 'string']
                ]
            ]],
            'ServerListResult' => ['properties' => ['value' => [
                'type' => 'array',
                'items' => ['$ref' => '#/definitions/Server']
            ]]],
            'FirewallRuleProperties' => ['properties' => [
                'startIpAddress' => ['type' => 'string'],
                'endIpAddress' => ['type' => 'string']
            ]],
            'FirewallRule' => ['properties' => ['properties' => ['$ref' => '#/definitions/FirewallRuleProperties']]],
            'FirewallRuleListResult' => ['properties' => ['value' => [
                'type' => 'array',
                'items' => ['$ref' => '#/definitions/FirewallRule']
            ]]],
            'DatabaseProperties' => ['properties' => [
                'charset' => ['type' => 'string'],
                'collation' => ['type' => 'string']
            ]],
            'Database' => ['properties' => ['properties' => ['$ref' => '#/definitions/DatabaseProperties']]],
            'DatabaseListResult' => ['properties' => ['value' => [
                'type' => 'array',
                'items' => ['$ref' => '#/definitions/Database']
            ]]],
            'ConfigurationProperties' => ['properties' => [
                'value' => ['type' => 'string'],
                'description' => ['type' => 'string'],
                'defaultValue' => ['type' => 'string'],
                'dataType' => ['type' => 'string'],
                'allowedValues' => ['type' => 'string'],
                'source' => ['type' => 'string']
            ]],
            'Configuration' => ['properties' => ['properties' => ['$ref' => '#/definitions/ConfigurationProperties']]],
            'ConfigurationListResult' => ['properties' => ['value' => [
                'type' => 'array',
                'items' => ['$ref' => '#/definitions/Configuration']
            ]]],
            'OperationDisplay' => ['properties' => [
                'provider' => ['type' => 'string'],
                'resource' => ['type' => 'string'],
                'operation' => ['type' => 'string'],
                'description' => ['type' => 'string']
            ]],
            'Operation' => ['properties' => [
                'name' => ['type' => 'string'],
                'display' => ['$ref' => '#/definitions/OperationDisplay'],
                'origin' => [
                    'type' => 'string',
                    'enum' => [
                        'NotSpecified',
                        'user',
                        'system'
                    ]
                ],
                'properties' => [
                    'type' => 'object',
                    'additionalProperties' => ['type' => 'object']
                ]
            ]],
            'OperationListResult' => ['properties' => ['value' => [
                'type' => 'array',
                'items' => ['$ref' => '#/definitions/Operation']
            ]]],
            'LogFileProperties' => ['properties' => [
                'name' => ['type' => 'string'],
                'sizeInKB' => [
                    'type' => 'integer',
                    'format' => 'int64'
                ],
                'createdTime' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ],
                'lastModifiedTime' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ],
                'type' => ['type' => 'string'],
                'url' => ['type' => 'string']
            ]],
            'LogFile' => ['properties' => ['properties' => ['$ref' => '#/definitions/LogFileProperties']]],
            'LogFileListResult' => ['properties' => ['value' => [
                'type' => 'array',
                'items' => ['$ref' => '#/definitions/LogFile']
            ]]]
        ]
    ];
}
