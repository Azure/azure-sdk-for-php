<?php
namespace Microsoft\Azure\Management\Analysis\_2016_05_16;
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
        $this->_Servers_group = new \Microsoft\Azure\Management\Analysis\_2016_05_16\Servers($_client);
    }
    /**
     * @return \Microsoft\Azure\Management\Analysis\_2016_05_16\Servers
     */
    public function getServers()
    {
        return $this->_Servers_group;
    }
    /**
     * @var \Microsoft\Azure\Management\Analysis\_2016_05_16\Servers
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
                            'enum' => ['2016-05-16']
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
                            '$ref' => '#/definitions/AnalysisServicesServer'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-05-16']
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
                            'enum' => ['2016-05-16']
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
                            '$ref' => '#/definitions/AnalysisServicesServerUpdateParameters'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-05-16']
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
                        'enum' => ['2016-05-16']
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
                        'enum' => ['2016-05-16']
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
                        'enum' => ['2016-05-16']
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
                        'enum' => ['2016-05-16']
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
                        'enum' => ['2016-05-16']
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
                        'enum' => ['2016-05-16']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/SkuEnumerationForExistingResourceResult']]]
            ]]
        ],
        'definitions' => [
            'ResourceSku' => ['properties' => [
                'name' => ['type' => 'string'],
                'tier' => [
                    'type' => 'string',
                    'enum' => [
                        'Development',
                        'Basic',
                        'Standard'
                    ]
                ]
            ]],
            'Resource' => ['properties' => [
                'id' => ['type' => 'string'],
                'name' => ['type' => 'string'],
                'type' => ['type' => 'string'],
                'location' => ['type' => 'string'],
                'sku' => ['$ref' => '#/definitions/ResourceSku'],
                'tags' => [
                    'type' => 'object',
                    'additionalProperties' => ['type' => 'string']
                ]
            ]],
            'AnalysisServicesServerProperties' => ['properties' => [
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
                    ]
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
                    ]
                ],
                'serverFullName' => ['type' => 'string']
            ]],
            'AnalysisServicesServer' => ['properties' => ['properties' => ['$ref' => '#/definitions/AnalysisServicesServerProperties']]],
            'AnalysisServicesServers' => ['properties' => ['value' => [
                'type' => 'array',
                'items' => ['$ref' => '#/definitions/AnalysisServicesServer']
            ]]],
            'ServerAdministrators' => ['properties' => ['members' => [
                'type' => 'array',
                'items' => ['type' => 'string']
            ]]],
            'AnalysisServicesServerMutableProperties' => ['properties' => [
                'asAdministrators' => ['$ref' => '#/definitions/ServerAdministrators'],
                'backupBlobContainerUri' => ['type' => 'string']
            ]],
            'AnalysisServicesServerUpdateParameters' => ['properties' => [
                'sku' => ['$ref' => '#/definitions/ResourceSku'],
                'tags' => [
                    'type' => 'object',
                    'additionalProperties' => ['type' => 'string']
                ],
                'properties' => ['$ref' => '#/definitions/AnalysisServicesServerMutableProperties']
            ]],
            'SkuEnumerationForNewResourceResult' => ['properties' => ['value' => [
                'type' => 'array',
                'items' => ['$ref' => '#/definitions/ResourceSku']
            ]]],
            'SkuDetailsForExistingResource' => ['properties' => ['sku' => ['$ref' => '#/definitions/ResourceSku']]],
            'SkuEnumerationForExistingResourceResult' => ['properties' => ['value' => [
                'type' => 'array',
                'items' => ['$ref' => '#/definitions/SkuDetailsForExistingResource']
            ]]]
        ]
    ];
}
