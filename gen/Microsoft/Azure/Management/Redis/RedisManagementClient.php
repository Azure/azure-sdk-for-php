<?php
namespace Microsoft\Azure\Management\Redis;
final class RedisManagementClient
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
        $this->_Redis_group = new \Microsoft\Azure\Management\Redis\Redis($_client);
        $this->_PatchSchedules_group = new \Microsoft\Azure\Management\Redis\PatchSchedules($_client);
        $this->_RedisLinkedServer_group = new \Microsoft\Azure\Management\Redis\RedisLinkedServer($_client);
    }
    /**
     * @return \Microsoft\Azure\Management\Redis\Redis
     */
    public function getRedis()
    {
        return $this->_Redis_group;
    }
    /**
     * @return \Microsoft\Azure\Management\Redis\PatchSchedules
     */
    public function getPatchSchedules()
    {
        return $this->_PatchSchedules_group;
    }
    /**
     * @return \Microsoft\Azure\Management\Redis\RedisLinkedServer
     */
    public function getRedisLinkedServer()
    {
        return $this->_RedisLinkedServer_group;
    }
    /**
     * @var \Microsoft\Azure\Management\Redis\Redis
     */
    private $_Redis_group;
    /**
     * @var \Microsoft\Azure\Management\Redis\PatchSchedules
     */
    private $_PatchSchedules_group;
    /**
     * @var \Microsoft\Azure\Management\Redis\RedisLinkedServer
     */
    private $_RedisLinkedServer_group;
    const _SWAGGER_OBJECT_DATA = [
        'host' => 'management.azure.com',
        'paths' => [
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Cache/Redis/{name}' => [
                'put' => [
                    'operationId' => 'Redis_Create',
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
                            '$ref' => '#/definitions/RedisCreateParameters'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-02-01']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => [
                        '201' => ['schema' => ['$ref' => '#/definitions/RedisResource']],
                        '200' => ['schema' => ['$ref' => '#/definitions/RedisResource']]
                    ]
                ],
                'patch' => [
                    'operationId' => 'Redis_Update',
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
                            '$ref' => '#/definitions/RedisUpdateParameters'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-02-01']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/RedisResource']]]
                ],
                'delete' => [
                    'operationId' => 'Redis_Delete',
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
                            'enum' => ['2017-02-01']
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
                    'operationId' => 'Redis_Get',
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
                            'enum' => ['2017-02-01']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/RedisResource']]]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Cache/Redis/' => ['get' => [
                'operationId' => 'Redis_ListByResourceGroup',
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
                        'enum' => ['2017-02-01']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/RedisListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/providers/Microsoft.Cache/Redis/' => ['get' => [
                'operationId' => 'Redis_List',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-02-01']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/RedisListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Cache/Redis/{name}/listKeys' => ['post' => [
                'operationId' => 'Redis_ListKeys',
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
                        'enum' => ['2017-02-01']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/RedisAccessKeys']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Cache/Redis/{name}/regenerateKey' => ['post' => [
                'operationId' => 'Redis_RegenerateKey',
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
                        '$ref' => '#/definitions/RedisRegenerateKeyParameters'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-02-01']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/RedisAccessKeys']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Cache/Redis/{name}/forceReboot' => ['post' => [
                'operationId' => 'Redis_ForceReboot',
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
                        '$ref' => '#/definitions/RedisRebootParameters'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-02-01']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/RedisForceRebootResponse']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Cache/Redis/{name}/import' => ['post' => [
                'operationId' => 'Redis_ImportData',
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
                        '$ref' => '#/definitions/ImportRDBParameters'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-02-01']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => [
                    '202' => [],
                    '200' => [],
                    '204' => []
                ]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Cache/Redis/{name}/export' => ['post' => [
                'operationId' => 'Redis_ExportData',
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
                        '$ref' => '#/definitions/ExportRDBParameters'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-02-01']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => [
                    '202' => [],
                    '200' => [],
                    '204' => []
                ]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Cache/Redis/{name}/patchSchedules/default' => [
                'put' => [
                    'operationId' => 'PatchSchedules_CreateOrUpdate',
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
                            '$ref' => '#/definitions/RedisPatchSchedule'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-02-01']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => [
                        '200' => ['schema' => ['$ref' => '#/definitions/RedisPatchSchedule']],
                        '201' => ['schema' => ['$ref' => '#/definitions/RedisPatchSchedule']]
                    ]
                ],
                'delete' => [
                    'operationId' => 'PatchSchedules_Delete',
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
                            'enum' => ['2017-02-01']
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
                    'operationId' => 'PatchSchedules_Get',
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
                            'enum' => ['2017-02-01']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/RedisPatchSchedule']]]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Cache/Redis/{name}/linkedServers/{linkedServerName}' => [
                'put' => [
                    'operationId' => 'RedisLinkedServer_Create',
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
                            'name' => 'linkedServerName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'parameters',
                            'in' => 'body',
                            'required' => TRUE,
                            '$ref' => '#/definitions/RedisLinkedServerCreateParameters'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-02-01']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => [
                        '200' => ['schema' => ['$ref' => '#/definitions/RedisLinkedServerWithProperties']],
                        '201' => ['schema' => ['$ref' => '#/definitions/RedisLinkedServerWithProperties']]
                    ]
                ],
                'delete' => [
                    'operationId' => 'RedisLinkedServer_Delete',
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
                            'name' => 'linkedServerName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-02-01']
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
                    'operationId' => 'RedisLinkedServer_Get',
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
                            'name' => 'linkedServerName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-02-01']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/RedisLinkedServerWithProperties']]]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Cache/Redis/{name}/linkedServers' => ['get' => [
                'operationId' => 'RedisLinkedServer_List',
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
                        'enum' => ['2017-02-01']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/RedisLinkedServerWithPropertiesList']]]
            ]]
        ],
        'definitions' => [
            'Sku' => ['properties' => [
                'name' => [
                    'type' => 'string',
                    'enum' => [
                        'Basic',
                        'Standard',
                        'Premium'
                    ]
                ],
                'family' => [
                    'type' => 'string',
                    'enum' => [
                        'C',
                        'P'
                    ]
                ],
                'capacity' => [
                    'type' => 'integer',
                    'format' => 'int32'
                ]
            ]],
            'RedisProperties' => ['properties' => [
                'redisConfiguration' => [
                    'type' => 'object',
                    'additionalProperties' => ['type' => 'string']
                ],
                'enableNonSslPort' => ['type' => 'boolean'],
                'tenantSettings' => [
                    'type' => 'object',
                    'additionalProperties' => ['type' => 'string']
                ],
                'shardCount' => [
                    'type' => 'integer',
                    'format' => 'int32'
                ],
                'subnetId' => ['type' => 'string'],
                'staticIP' => ['type' => 'string']
            ]],
            'RedisCreateProperties' => ['properties' => ['sku' => ['$ref' => '#/definitions/Sku']]],
            'RedisUpdateProperties' => ['properties' => [
                'sku' => ['$ref' => '#/definitions/Sku'],
                'tags' => [
                    'type' => 'object',
                    'additionalProperties' => ['type' => 'string']
                ]
            ]],
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
            'RedisCreateParameters' => ['properties' => ['properties' => ['$ref' => '#/definitions/RedisCreateProperties']]],
            'RedisUpdateParameters' => ['properties' => ['properties' => ['$ref' => '#/definitions/RedisUpdateProperties']]],
            'RedisAccessKeys' => ['properties' => [
                'primaryKey' => ['type' => 'string'],
                'secondaryKey' => ['type' => 'string']
            ]],
            'RedisLinkedServer' => ['properties' => ['id' => ['type' => 'string']]],
            'RedisLinkedServerList' => ['properties' => ['value' => [
                'type' => 'array',
                'items' => ['$ref' => '#/definitions/RedisLinkedServer']
            ]]],
            'RedisResourceProperties' => ['properties' => [
                'sku' => ['$ref' => '#/definitions/Sku'],
                'redisVersion' => ['type' => 'string'],
                'provisioningState' => ['type' => 'string'],
                'hostName' => ['type' => 'string'],
                'port' => [
                    'type' => 'integer',
                    'format' => 'int32'
                ],
                'sslPort' => [
                    'type' => 'integer',
                    'format' => 'int32'
                ],
                'accessKeys' => ['$ref' => '#/definitions/RedisAccessKeys'],
                'linkedServers' => ['$ref' => '#/definitions/RedisLinkedServerList']
            ]],
            'RedisResource' => ['properties' => ['properties' => ['$ref' => '#/definitions/RedisResourceProperties']]],
            'RedisListResult' => ['properties' => [
                'value' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/RedisResource']
                ],
                'nextLink' => ['type' => 'string']
            ]],
            'RedisRegenerateKeyParameters' => ['properties' => ['keyType' => [
                'type' => 'string',
                'enum' => [
                    'Primary',
                    'Secondary'
                ]
            ]]],
            'RedisRebootParameters' => ['properties' => [
                'rebootType' => [
                    'type' => 'string',
                    'enum' => [
                        'PrimaryNode',
                        'SecondaryNode',
                        'AllNodes'
                    ]
                ],
                'shardId' => [
                    'type' => 'integer',
                    'format' => 'int32'
                ]
            ]],
            'ExportRDBParameters' => ['properties' => [
                'format' => ['type' => 'string'],
                'prefix' => ['type' => 'string'],
                'container' => ['type' => 'string']
            ]],
            'ImportRDBParameters' => ['properties' => [
                'format' => ['type' => 'string'],
                'files' => [
                    'type' => 'array',
                    'items' => ['type' => 'string']
                ]
            ]],
            'ScheduleEntry' => ['properties' => [
                'dayOfWeek' => [
                    'type' => 'string',
                    'enum' => [
                        'Monday',
                        'Tuesday',
                        'Wednesday',
                        'Thursday',
                        'Friday',
                        'Saturday',
                        'Sunday',
                        'Everyday',
                        'Weekend'
                    ]
                ],
                'startHourUtc' => [
                    'type' => 'integer',
                    'format' => 'int32'
                ],
                'maintenanceWindow' => [
                    'type' => 'string',
                    'format' => 'duration'
                ]
            ]],
            'ScheduleEntries' => ['properties' => ['scheduleEntries' => [
                'type' => 'array',
                'items' => ['$ref' => '#/definitions/ScheduleEntry']
            ]]],
            'RedisPatchSchedule' => ['properties' => [
                'id' => ['type' => 'string'],
                'name' => ['type' => 'string'],
                'type' => ['type' => 'string'],
                'location' => ['type' => 'string'],
                'properties' => ['$ref' => '#/definitions/ScheduleEntries']
            ]],
            'RedisForceRebootResponse' => ['properties' => ['Message' => ['type' => 'string']]],
            'RedisLinkedServerProperties' => ['properties' => ['provisioningState' => ['type' => 'string']]],
            'RedisLinkedServerWithProperties' => ['properties' => [
                'id' => ['type' => 'string'],
                'name' => ['type' => 'string'],
                'type' => ['type' => 'string'],
                'properties' => ['$ref' => '#/definitions/RedisLinkedServerProperties']
            ]],
            'RedisLinkedServerWithPropertiesList' => ['properties' => ['value' => [
                'type' => 'array',
                'items' => ['$ref' => '#/definitions/RedisLinkedServerWithProperties']
            ]]],
            'RedisLinkedServerCreateProperties' => ['properties' => [
                'linkedRedisCacheId' => ['type' => 'string'],
                'linkedRedisCacheLocation' => ['type' => 'string'],
                'serverRole' => [
                    'type' => 'string',
                    'enum' => [
                        'Primary',
                        'Secondary'
                    ]
                ]
            ]],
            'RedisLinkedServerCreateParameters' => ['properties' => ['properties' => ['$ref' => '#/definitions/RedisLinkedServerCreateProperties']]]
        ]
    ];
}
