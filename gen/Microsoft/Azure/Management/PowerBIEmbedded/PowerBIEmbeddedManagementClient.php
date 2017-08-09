<?php
namespace Microsoft\Azure\Management\PowerBIEmbedded;
final class PowerBIEmbeddedManagementClient
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
        $this->_WorkspaceCollections_group = new \Microsoft\Azure\Management\PowerBIEmbedded\WorkspaceCollections($_client);
        $this->_Workspaces_group = new \Microsoft\Azure\Management\PowerBIEmbedded\Workspaces($_client);
        $this->_GetAvailableOperations_operation = $_client->createOperation('getAvailableOperations');
    }
    /**
     * @return \Microsoft\Azure\Management\PowerBIEmbedded\WorkspaceCollections
     */
    public function getWorkspaceCollections()
    {
        return $this->_WorkspaceCollections_group;
    }
    /**
     * @return \Microsoft\Azure\Management\PowerBIEmbedded\Workspaces
     */
    public function getWorkspaces()
    {
        return $this->_Workspaces_group;
    }
    /**
     * Indicates which operations can be performed by the Power BI Resource Provider.
     * @return array
     */
    public function getAvailableOperations()
    {
        return $this->_GetAvailableOperations_operation->call([]);
    }
    /**
     * @var \Microsoft\Azure\Management\PowerBIEmbedded\WorkspaceCollections
     */
    private $_WorkspaceCollections_group;
    /**
     * @var \Microsoft\Azure\Management\PowerBIEmbedded\Workspaces
     */
    private $_Workspaces_group;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_GetAvailableOperations_operation;
    const _SWAGGER_OBJECT_DATA = [
        'host' => 'management.azure.com',
        'paths' => [
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.PowerBI/workspaceCollections/{workspaceCollectionName}' => [
                'get' => [
                    'operationId' => 'WorkspaceCollections_getByName',
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
                            'name' => 'workspaceCollectionName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-01-29']
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/WorkspaceCollection']]]
                ],
                'put' => [
                    'operationId' => 'WorkspaceCollections_create',
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
                            'name' => 'workspaceCollectionName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-01-29']
                        ],
                        [
                            'name' => 'body',
                            'in' => 'body',
                            'required' => TRUE,
                            '$ref' => '#/definitions/CreateWorkspaceCollectionRequest'
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/WorkspaceCollection']]]
                ],
                'patch' => [
                    'operationId' => 'WorkspaceCollections_update',
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
                            'name' => 'workspaceCollectionName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-01-29']
                        ],
                        [
                            'name' => 'body',
                            'in' => 'body',
                            'required' => TRUE,
                            '$ref' => '#/definitions/UpdateWorkspaceCollectionRequest'
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/WorkspaceCollection']]]
                ],
                'delete' => [
                    'operationId' => 'WorkspaceCollections_delete',
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
                            'name' => 'workspaceCollectionName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-01-29']
                        ]
                    ],
                    'responses' => ['202' => []]
                ]
            ],
            '/subscriptions/{subscriptionId}/providers/Microsoft.PowerBI/locations/{location}/checkNameAvailability' => ['post' => [
                'operationId' => 'WorkspaceCollections_checkNameAvailability',
                'parameters' => [
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'location',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-01-29']
                    ],
                    [
                        'name' => 'body',
                        'in' => 'body',
                        'required' => TRUE,
                        '$ref' => '#/definitions/CheckNameRequest'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/CheckNameResponse']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.PowerBI/workspaceCollections' => ['get' => [
                'operationId' => 'WorkspaceCollections_listByResourceGroup',
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
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-01-29']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/WorkspaceCollectionList']]]
            ]],
            '/subscriptions/{subscriptionId}/providers/Microsoft.PowerBI/workspaceCollections' => ['get' => [
                'operationId' => 'WorkspaceCollections_listBySubscription',
                'parameters' => [
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-01-29']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/WorkspaceCollectionList']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.PowerBI/workspaceCollections/{workspaceCollectionName}/listKeys' => ['post' => [
                'operationId' => 'WorkspaceCollections_getAccessKeys',
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
                        'name' => 'workspaceCollectionName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-01-29']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/WorkspaceCollectionAccessKeys']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.PowerBI/workspaceCollections/{workspaceCollectionName}/regenerateKey' => ['post' => [
                'operationId' => 'WorkspaceCollections_regenerateKey',
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
                        'name' => 'workspaceCollectionName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-01-29']
                    ],
                    [
                        'name' => 'body',
                        'in' => 'body',
                        'required' => TRUE,
                        '$ref' => '#/definitions/WorkspaceCollectionAccessKey'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/WorkspaceCollectionAccessKeys']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/moveResources' => ['post' => [
                'operationId' => 'WorkspaceCollections_migrate',
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
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-01-29']
                    ],
                    [
                        'name' => 'body',
                        'in' => 'body',
                        'required' => TRUE,
                        '$ref' => '#/definitions/MigrateWorkspaceCollectionRequest'
                    ]
                ],
                'responses' => ['200' => []]
            ]],
            '/providers/Microsoft.PowerBI/operations' => ['get' => [
                'operationId' => 'getAvailableOperations',
                'parameters' => [[
                    'name' => 'api-version',
                    'in' => 'query',
                    'required' => TRUE,
                    'type' => 'string',
                    'enum' => ['2016-01-29']
                ]],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/OperationList']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.PowerBI/workspaceCollections/{workspaceCollectionName}/workspaces' => ['get' => [
                'operationId' => 'Workspaces_List',
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
                        'name' => 'workspaceCollectionName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-01-29']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/WorkspaceList']]]
            ]]
        ],
        'definitions' => [
            'ErrorDetail' => ['properties' => [
                'code' => ['type' => 'string'],
                'message' => ['type' => 'string'],
                'target' => ['type' => 'string']
            ]],
            'Error' => ['properties' => [
                'code' => ['type' => 'string'],
                'message' => ['type' => 'string'],
                'target' => ['type' => 'string'],
                'details' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/ErrorDetail']
                ]
            ]],
            'AzureSku' => ['properties' => [
                'name' => ['type' => 'string'],
                'tier' => ['type' => 'string']
            ]],
            'WorkspaceCollection' => ['properties' => [
                'id' => ['type' => 'string'],
                'name' => ['type' => 'string'],
                'type' => ['type' => 'string'],
                'location' => ['type' => 'string'],
                'tags' => [
                    'type' => 'object',
                    'additionalProperties' => ['type' => 'string']
                ],
                'sku' => ['$ref' => '#/definitions/AzureSku'],
                'properties' => ['type' => 'object']
            ]],
            'WorkspaceCollectionList' => ['properties' => ['value' => [
                'type' => 'array',
                'items' => ['$ref' => '#/definitions/WorkspaceCollection']
            ]]],
            'Workspace' => ['properties' => [
                'id' => ['type' => 'string'],
                'name' => ['type' => 'string'],
                'type' => ['type' => 'string'],
                'properties' => ['type' => 'object']
            ]],
            'WorkspaceList' => ['properties' => ['value' => [
                'type' => 'array',
                'items' => ['$ref' => '#/definitions/Workspace']
            ]]],
            'Display' => ['properties' => [
                'provider' => ['type' => 'string'],
                'resource' => ['type' => 'string'],
                'operation' => ['type' => 'string'],
                'description' => ['type' => 'string'],
                'origin' => ['type' => 'string']
            ]],
            'Operation' => ['properties' => [
                'name' => ['type' => 'string'],
                'display' => ['$ref' => '#/definitions/Display']
            ]],
            'OperationList' => ['properties' => ['value' => [
                'type' => 'array',
                'items' => ['$ref' => '#/definitions/Operation']
            ]]],
            'WorkspaceCollectionAccessKeys' => ['properties' => [
                'key1' => ['type' => 'string'],
                'key2' => ['type' => 'string']
            ]],
            'WorkspaceCollectionAccessKey' => ['properties' => ['keyName' => [
                'type' => 'string',
                'enum' => [
                    'key1',
                    'key2'
                ]
            ]]],
            'CreateWorkspaceCollectionRequest' => ['properties' => [
                'location' => ['type' => 'string'],
                'tags' => [
                    'type' => 'object',
                    'additionalProperties' => ['type' => 'string']
                ],
                'sku' => ['$ref' => '#/definitions/AzureSku']
            ]],
            'UpdateWorkspaceCollectionRequest' => ['properties' => [
                'tags' => [
                    'type' => 'object',
                    'additionalProperties' => ['type' => 'string']
                ],
                'sku' => ['$ref' => '#/definitions/AzureSku']
            ]],
            'CheckNameRequest' => ['properties' => [
                'name' => ['type' => 'string'],
                'type' => ['type' => 'string']
            ]],
            'CheckNameResponse' => ['properties' => [
                'nameAvailable' => ['type' => 'boolean'],
                'reason' => [
                    'type' => 'string',
                    'enum' => [
                        'Unavailable',
                        'Invalid'
                    ]
                ],
                'message' => ['type' => 'string']
            ]],
            'MigrateWorkspaceCollectionRequest' => ['properties' => [
                'targetResourceGroup' => ['type' => 'string'],
                'resources' => [
                    'type' => 'array',
                    'items' => ['type' => 'string']
                ]
            ]]
        ]
    ];
}
