<?php
namespace Microsoft\Azure\Management\Analysis;
final class AnalysisServicesManagementClient
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
        $this->_Servers_group = new \Microsoft\Azure\Management\Analysis\Servers($_client);
    }
    /**
     * @return \Microsoft\Azure\Management\Analysis\Servers
     */
    public function getServers()
    {
        return $this->_Servers_group;
    }
    /**
     * @var \Microsoft\Azure\Management\Analysis\Servers
     */
    private $_Servers_group;
    const _SWAGGER_OBJECT_DATA = [
        'host' => 'management.azure.com',
        'paths' => [
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.AnalysisServices/servers/{serverName}' => [
                'get' => [
                    'operationId' => 'Servers_GetDetails',
                    'parameters' => [
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
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-08-01-beta']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/AnalysisServicesServer']]]
                ],
                'put' => [
                    'operationId' => 'Servers_Create',
                    'parameters' => [
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
                            'name' => 'serverParameters',
                            'in' => 'body',
                            'required' => TRUE,
                            'schema' => ['$ref' => '#/definitions/AnalysisServicesServer']
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-08-01-beta']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => [
                        '200' => ['schema' => ['$ref' => '#/definitions/AnalysisServicesServer']],
                        '201' => ['schema' => ['$ref' => '#/definitions/AnalysisServicesServer']]
                    ]
                ],
                'delete' => [
                    'operationId' => 'Servers_Delete',
                    'parameters' => [
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
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-08-01-beta']
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
                'patch' => [
                    'operationId' => 'Servers_Update',
                    'parameters' => [
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
                            'name' => 'serverUpdateParameters',
                            'in' => 'body',
                            'required' => TRUE,
                            'schema' => ['$ref' => '#/definitions/AnalysisServicesServerUpdateParameters']
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-08-01-beta']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => [
                        '200' => ['schema' => ['$ref' => '#/definitions/AnalysisServicesServer']],
                        '202' => ['schema' => ['$ref' => '#/definitions/AnalysisServicesServer']]
                    ]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.AnalysisServices/servers/{serverName}/suspend' => ['post' => [
                'operationId' => 'Servers_Suspend',
                'parameters' => [
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
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-08-01-beta']
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
                    '202' => []
                ]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.AnalysisServices/servers/{serverName}/resume' => ['post' => [
                'operationId' => 'Servers_Resume',
                'parameters' => [
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
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-08-01-beta']
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
                    '202' => []
                ]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.AnalysisServices/servers' => ['get' => [
                'operationId' => 'Servers_ListByResourceGroup',
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
                        'enum' => ['2017-08-01-beta']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/AnalysisServicesServers']]]
            ]],
            '/subscriptions/{subscriptionId}/providers/Microsoft.AnalysisServices/servers' => ['get' => [
                'operationId' => 'Servers_List',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-08-01-beta']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/AnalysisServicesServers']]]
            ]],
            '/subscriptions/{subscriptionId}/providers/Microsoft.AnalysisServices/skus' => ['get' => [
                'operationId' => 'Servers_ListSkusForNew',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-08-01-beta']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/SkuEnumerationForNewResourceResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.AnalysisServices/servers/{serverName}/skus' => ['get' => [
                'operationId' => 'Servers_ListSkusForExisting',
                'parameters' => [
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
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-08-01-beta']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/SkuEnumerationForExistingResourceResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.AnalysisServices/servers/{serverName}/listGatewayStatus' => ['post' => [
                'operationId' => 'Servers_ListGatewayStatus',
                'parameters' => [
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
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-08-01-beta']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/GatewayListStatusLive']]]
            ]]
        ],
        'definitions' => [
            'ResourceSku' => [
                'properties' => [
                    'name' => ['type' => 'string'],
                    'tier' => [
                        'type' => 'string',
                        'enum' => [
                            'Development',
                            'Basic',
                            'Standard'
                        ]
                    ],
                    'capacity' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => ['name']
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
                    'sku' => ['$ref' => '#/definitions/ResourceSku'],
                    'tags' => [
                        'type' => 'object',
                        'additionalProperties' => ['type' => 'string']
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => [
                    'location',
                    'sku'
                ]
            ],
            'AnalysisServicesServerProperties' => [
                'properties' => [
                    'state' => [
                        'type' => 'string',
                        'enum' => [
                            'Deleting',
                            'Succeeded',
                            'Failed',
                            'Paused',
                            'Suspended',
                            'Provisioning',
                            'Updating',
                            'Suspending',
                            'Pausing',
                            'Resuming',
                            'Preparing',
                            'Scaling'
                        ],
                        'readOnly' => TRUE
                    ],
                    'provisioningState' => [
                        'type' => 'string',
                        'enum' => [
                            'Deleting',
                            'Succeeded',
                            'Failed',
                            'Paused',
                            'Suspended',
                            'Provisioning',
                            'Updating',
                            'Suspending',
                            'Pausing',
                            'Resuming',
                            'Preparing',
                            'Scaling'
                        ],
                        'readOnly' => TRUE
                    ],
                    'serverFullName' => [
                        'type' => 'string',
                        'readOnly' => TRUE
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'AnalysisServicesServer' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/AnalysisServicesServerProperties']],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'AnalysisServicesServers' => [
                'properties' => ['value' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/AnalysisServicesServer']
                ]],
                'additionalProperties' => FALSE,
                'required' => ['value']
            ],
            'ServerAdministrators' => [
                'properties' => ['members' => [
                    'type' => 'array',
                    'items' => ['type' => 'string']
                ]],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'GatewayDetails' => [
                'properties' => [
                    'gatewayResourceId' => ['type' => 'string'],
                    'gatewayObjectId' => [
                        'type' => 'string',
                        'readOnly' => TRUE
                    ],
                    'dmtsClusterUri' => [
                        'type' => 'string',
                        'readOnly' => TRUE
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'AnalysisServicesServerMutableProperties' => [
                'properties' => [
                    'asAdministrators' => ['$ref' => '#/definitions/ServerAdministrators'],
                    'backupBlobContainerUri' => ['type' => 'string'],
                    'gatewayDetails' => ['$ref' => '#/definitions/GatewayDetails'],
                    'querypoolConnectionMode' => [
                        'type' => 'string',
                        'enum' => [
                            'All',
                            'ReadOnly'
                        ]
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'AnalysisServicesServerUpdateParameters' => [
                'properties' => [
                    'sku' => ['$ref' => '#/definitions/ResourceSku'],
                    'tags' => [
                        'type' => 'object',
                        'additionalProperties' => ['type' => 'string']
                    ],
                    'properties' => ['$ref' => '#/definitions/AnalysisServicesServerMutableProperties']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'GatewayListStatusLive' => [
                'properties' => ['status' => [
                    'type' => 'string',
                    'enum' => ['Live']
                ]],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'GatewayError' => [
                'properties' => [
                    'code' => ['type' => 'string'],
                    'message' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'GatewayListStatusError' => [
                'properties' => ['error' => ['$ref' => '#/definitions/GatewayError']],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'SkuEnumerationForNewResourceResult' => [
                'properties' => ['value' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/ResourceSku']
                ]],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'SkuDetailsForExistingResource' => [
                'properties' => ['sku' => ['$ref' => '#/definitions/ResourceSku']],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'SkuEnumerationForExistingResourceResult' => [
                'properties' => ['value' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/SkuDetailsForExistingResource']
                ]],
                'additionalProperties' => FALSE,
                'required' => []
            ]
        ]
    ];
}
