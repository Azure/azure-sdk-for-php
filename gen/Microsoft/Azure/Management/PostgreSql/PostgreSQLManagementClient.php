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
                            'schema' => ['$ref' => '#/definitions/ServerForCreate']
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
                            'schema' => ['$ref' => '#/definitions/ServerUpdateParameters']
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
                            'schema' => ['$ref' => '#/definitions/FirewallRule']
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
                            'schema' => ['$ref' => '#/definitions/Database']
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
                            'schema' => ['$ref' => '#/definitions/Configuration']
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
            'ProxyResource' => [
                'properties' => [
                    'id' => ['type' => 'string'],
                    'name' => ['type' => 'string'],
                    'type' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'TrackedResource' => [
                'properties' => [
                    'location' => ['type' => 'string'],
                    'tags' => [
                        'type' => 'object',
                        'additionalProperties' => ['type' => 'string']
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => ['location']
            ],
            'ServerProperties' => [
                'properties' => [
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
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'ServerPropertiesForCreate' => [
                'properties' => [
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
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'Default' => [
                'properties' => [
                    'administratorLogin' => ['type' => 'string'],
                    'administratorLoginPassword' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => [
                    'administratorLogin',
                    'administratorLoginPassword'
                ]
            ],
            'PointInTimeRestore' => [
                'properties' => [
                    'sourceServerId' => ['type' => 'string'],
                    'restorePointInTime' => [
                        'type' => 'string',
                        'format' => 'date-time'
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => [
                    'sourceServerId',
                    'restorePointInTime'
                ]
            ],
            'Sku' => [
                'properties' => [
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
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'Server' => [
                'properties' => [
                    'sku' => ['$ref' => '#/definitions/Sku'],
                    'properties' => ['$ref' => '#/definitions/ServerProperties']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'ServerForCreate' => [
                'properties' => [
                    'sku' => ['$ref' => '#/definitions/Sku'],
                    'properties' => ['$ref' => '#/definitions/ServerPropertiesForCreate'],
                    'location' => ['type' => 'string'],
                    'tags' => [
                        'type' => 'object',
                        'additionalProperties' => ['type' => 'string']
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => [
                    'properties',
                    'location'
                ]
            ],
            'ServerUpdateParameters_properties' => [
                'properties' => [
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
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'ServerUpdateParameters' => [
                'properties' => [
                    'sku' => ['$ref' => '#/definitions/Sku'],
                    'properties' => ['$ref' => '#/definitions/ServerUpdateParameters_properties'],
                    'tags' => [
                        'type' => 'object',
                        'additionalProperties' => ['type' => 'string']
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'ServerListResult' => [
                'properties' => ['value' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/Server']
                ]],
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
            'FirewallRuleListResult' => [
                'properties' => ['value' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/FirewallRule']
                ]],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'DatabaseProperties' => [
                'properties' => [
                    'charset' => ['type' => 'string'],
                    'collation' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'Database' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/DatabaseProperties']],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'DatabaseListResult' => [
                'properties' => ['value' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/Database']
                ]],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'ConfigurationProperties' => [
                'properties' => [
                    'value' => ['type' => 'string'],
                    'description' => ['type' => 'string'],
                    'defaultValue' => ['type' => 'string'],
                    'dataType' => ['type' => 'string'],
                    'allowedValues' => ['type' => 'string'],
                    'source' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'Configuration' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/ConfigurationProperties']],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'ConfigurationListResult' => [
                'properties' => ['value' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/Configuration']
                ]],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'OperationDisplay' => [
                'properties' => [
                    'provider' => ['type' => 'string'],
                    'resource' => ['type' => 'string'],
                    'operation' => ['type' => 'string'],
                    'description' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'Operation' => [
                'properties' => [
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
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'OperationListResult' => [
                'properties' => ['value' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/Operation']
                ]],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'LogFileProperties' => [
                'properties' => [
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
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'LogFile' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/LogFileProperties']],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'LogFileListResult' => [
                'properties' => ['value' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/LogFile']
                ]],
                'additionalProperties' => FALSE,
                'required' => []
            ]
        ]
    ];
}
