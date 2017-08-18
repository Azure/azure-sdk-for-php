<?php
namespace Microsoft\Azure\Management\OperationalInsights;
final class OperationalInsightsManagementClient
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
        $this->_LinkedServices_group = new \Microsoft\Azure\Management\OperationalInsights\LinkedServices($_client);
        $this->_DataSources_group = new \Microsoft\Azure\Management\OperationalInsights\DataSources($_client);
        $this->_Workspaces_group = new \Microsoft\Azure\Management\OperationalInsights\Workspaces($_client);
        $this->_StorageInsights_group = new \Microsoft\Azure\Management\OperationalInsights\StorageInsights($_client);
        $this->_SavedSearches_group = new \Microsoft\Azure\Management\OperationalInsights\SavedSearches($_client);
    }
    /**
     * @return \Microsoft\Azure\Management\OperationalInsights\LinkedServices
     */
    public function getLinkedServices()
    {
        return $this->_LinkedServices_group;
    }
    /**
     * @return \Microsoft\Azure\Management\OperationalInsights\DataSources
     */
    public function getDataSources()
    {
        return $this->_DataSources_group;
    }
    /**
     * @return \Microsoft\Azure\Management\OperationalInsights\Workspaces
     */
    public function getWorkspaces()
    {
        return $this->_Workspaces_group;
    }
    /**
     * @return \Microsoft\Azure\Management\OperationalInsights\StorageInsights
     */
    public function getStorageInsights()
    {
        return $this->_StorageInsights_group;
    }
    /**
     * @return \Microsoft\Azure\Management\OperationalInsights\SavedSearches
     */
    public function getSavedSearches()
    {
        return $this->_SavedSearches_group;
    }
    /**
     * @var \Microsoft\Azure\Management\OperationalInsights\LinkedServices
     */
    private $_LinkedServices_group;
    /**
     * @var \Microsoft\Azure\Management\OperationalInsights\DataSources
     */
    private $_DataSources_group;
    /**
     * @var \Microsoft\Azure\Management\OperationalInsights\Workspaces
     */
    private $_Workspaces_group;
    /**
     * @var \Microsoft\Azure\Management\OperationalInsights\StorageInsights
     */
    private $_StorageInsights_group;
    /**
     * @var \Microsoft\Azure\Management\OperationalInsights\SavedSearches
     */
    private $_SavedSearches_group;
    const _SWAGGER_OBJECT_DATA = [
        'host' => 'management.azure.com',
        'paths' => [
            '/subscriptions/{subscriptionId}/resourcegroups/{resourceGroupName}/providers/Microsoft.OperationalInsights/workspaces/{workspaceName}/linkedServices/{linkedServiceName}' => [
                'put' => [
                    'operationId' => 'LinkedServices_CreateOrUpdate',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'workspaceName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'linkedServiceName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'parameters',
                            'in' => 'body',
                            'required' => TRUE,
                            'schema' => ['$ref' => '#/definitions/LinkedService']
                        ],
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
                            'enum' => ['2015-11-01-preview']
                        ]
                    ],
                    'responses' => [
                        '200' => ['schema' => ['$ref' => '#/definitions/LinkedService']],
                        '201' => ['schema' => ['$ref' => '#/definitions/LinkedService']]
                    ]
                ],
                'delete' => [
                    'operationId' => 'LinkedServices_Delete',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'workspaceName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'linkedServiceName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2015-11-01-preview']
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
                    'operationId' => 'LinkedServices_Get',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'workspaceName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'linkedServiceName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2015-11-01-preview']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/LinkedService']]]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourcegroups/{resourceGroupName}/providers/Microsoft.OperationalInsights/workspaces/{workspaceName}/linkedServices' => ['get' => [
                'operationId' => 'LinkedServices_ListByWorkspace',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'workspaceName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2015-11-01-preview']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/LinkedServiceListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourcegroups/{resourceGroupName}/providers/Microsoft.OperationalInsights/workspaces/{workspaceName}/dataSources/{dataSourceName}' => [
                'put' => [
                    'operationId' => 'DataSources_CreateOrUpdate',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'workspaceName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'dataSourceName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'parameters',
                            'in' => 'body',
                            'required' => TRUE,
                            'schema' => ['$ref' => '#/definitions/DataSource']
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2015-11-01-preview']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => [
                        '200' => ['schema' => ['$ref' => '#/definitions/DataSource']],
                        '201' => ['schema' => ['$ref' => '#/definitions/DataSource']]
                    ]
                ],
                'delete' => [
                    'operationId' => 'DataSources_Delete',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'workspaceName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'dataSourceName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2015-11-01-preview']
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
                    'operationId' => 'DataSources_Get',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'workspaceName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'dataSourceName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2015-11-01-preview']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/DataSource']]]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourcegroups/{resourceGroupName}/providers/Microsoft.OperationalInsights/workspaces/{workspaceName}/dataSources' => ['get' => [
                'operationId' => 'DataSources_ListByWorkspace',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'workspaceName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => '$filter',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => '$skiptoken',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2015-11-01-preview']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/DataSourceListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourcegroups/{resourceGroupName}/providers/Microsoft.OperationalInsights/workspaces/{workspaceName}/intelligencePacks/{intelligencePackName}/Disable' => ['post' => [
                'operationId' => 'Workspaces_DisableIntelligencePack',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'workspaceName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'intelligencePackName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2015-11-01-preview']
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
            '/subscriptions/{subscriptionId}/resourcegroups/{resourceGroupName}/providers/Microsoft.OperationalInsights/workspaces/{workspaceName}/intelligencePacks/{intelligencePackName}/Enable' => ['post' => [
                'operationId' => 'Workspaces_EnableIntelligencePack',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'workspaceName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'intelligencePackName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2015-11-01-preview']
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
            '/subscriptions/{subscriptionId}/resourcegroups/{resourceGroupName}/providers/Microsoft.OperationalInsights/workspaces/{workspaceName}/intelligencePacks' => ['get' => [
                'operationId' => 'Workspaces_ListIntelligencePacks',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'workspaceName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2015-11-01-preview']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/IntelligencePack']
                ]]]
            ]],
            '/subscriptions/{subscriptionId}/resourcegroups/{resourceGroupName}/providers/Microsoft.OperationalInsights/workspaces/{workspaceName}/sharedKeys' => ['post' => [
                'operationId' => 'Workspaces_GetSharedKeys',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'workspaceName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2015-11-01-preview']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/SharedKeys']]]
            ]],
            '/subscriptions/{subscriptionId}/resourcegroups/{resourceGroupName}/providers/Microsoft.OperationalInsights/workspaces/{workspaceName}/usages' => ['get' => [
                'operationId' => 'Workspaces_ListUsages',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'workspaceName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2015-11-01-preview']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/WorkspaceListUsagesResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourcegroups/{resourceGroupName}/providers/Microsoft.OperationalInsights/workspaces/{workspaceName}/managementGroups' => ['get' => [
                'operationId' => 'Workspaces_ListManagementGroups',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'workspaceName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2015-11-01-preview']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/WorkspaceListManagementGroupsResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourcegroups/{resourceGroupName}/providers/Microsoft.OperationalInsights/workspaces' => ['get' => [
                'operationId' => 'Workspaces_ListByResourceGroup',
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
                        'enum' => ['2015-11-01-preview']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/WorkspaceListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/providers/Microsoft.OperationalInsights/workspaces' => ['get' => [
                'operationId' => 'Workspaces_List',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2015-11-01-preview']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/WorkspaceListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourcegroups/{resourceGroupName}/providers/Microsoft.OperationalInsights/workspaces/{workspaceName}' => [
                'put' => [
                    'operationId' => 'Workspaces_CreateOrUpdate',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'workspaceName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'parameters',
                            'in' => 'body',
                            'required' => TRUE,
                            'schema' => ['$ref' => '#/definitions/Workspace']
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2015-11-01-preview']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => [
                        '200' => ['schema' => ['$ref' => '#/definitions/Workspace']],
                        '201' => ['schema' => ['$ref' => '#/definitions/Workspace']]
                    ]
                ],
                'delete' => [
                    'operationId' => 'Workspaces_Delete',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'workspaceName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2015-11-01-preview']
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
                    'operationId' => 'Workspaces_Get',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'workspaceName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2015-11-01-preview']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/Workspace']]]
                ]
            ],
            '/subscriptions/{subscriptionId}/providers/Microsoft.OperationalInsights/linkTargets' => ['get' => [
                'operationId' => 'Workspaces_ListLinkTargets',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2015-03-20']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/LinkTarget']
                ]]]
            ]],
            '/subscriptions/{subscriptionId}/resourcegroups/{resourceGroupName}/providers/Microsoft.OperationalInsights/workspaces/{workspaceName}/schema' => ['post' => [
                'operationId' => 'Workspaces_GetSchema',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'workspaceName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2015-03-20']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/SearchGetSchemaResponse']]]
            ]],
            '/subscriptions/{subscriptionId}/resourcegroups/{resourceGroupName}/providers/Microsoft.OperationalInsights/workspaces/{workspaceName}/search' => ['post' => [
                'operationId' => 'Workspaces_GetSearchResults',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'workspaceName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'parameters',
                        'in' => 'body',
                        'required' => TRUE,
                        'schema' => ['$ref' => '#/definitions/SearchParameters']
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2015-03-20']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => [
                    '200' => ['schema' => ['$ref' => '#/definitions/SearchResultsResponse']],
                    '202' => []
                ]
            ]],
            '/subscriptions/{subscriptionId}/resourcegroups/{resourceGroupName}/providers/Microsoft.OperationalInsights/workspaces/{workspaceName}/search/{id}' => ['post' => [
                'operationId' => 'Workspaces_UpdateSearchResults',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'workspaceName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'id',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2015-03-20']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/SearchResultsResponse']]]
            ]],
            '/subscriptions/{subscriptionId}/resourcegroups/{resourceGroupName}/providers/Microsoft.OperationalInsights/workspaces/{workspaceName}/storageInsightConfigs/{storageInsightName}' => [
                'put' => [
                    'operationId' => 'StorageInsights_CreateOrUpdate',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'workspaceName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'storageInsightName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'parameters',
                            'in' => 'body',
                            'required' => TRUE,
                            'schema' => ['$ref' => '#/definitions/StorageInsight']
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2015-03-20']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => [
                        '201' => ['schema' => ['$ref' => '#/definitions/StorageInsight']],
                        '200' => ['schema' => ['$ref' => '#/definitions/StorageInsight']]
                    ]
                ],
                'get' => [
                    'operationId' => 'StorageInsights_Get',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'workspaceName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'storageInsightName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2015-03-20']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/StorageInsight']]]
                ],
                'delete' => [
                    'operationId' => 'StorageInsights_Delete',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'workspaceName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'storageInsightName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2015-03-20']
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
                ]
            ],
            '/subscriptions/{subscriptionId}/resourcegroups/{resourceGroupName}/providers/Microsoft.OperationalInsights/workspaces/{workspaceName}/storageInsightConfigs' => ['get' => [
                'operationId' => 'StorageInsights_ListByWorkspace',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'workspaceName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2015-03-20']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/StorageInsightListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourcegroups/{resourceGroupName}/providers/Microsoft.OperationalInsights/workspaces/{workspaceName}/savedSearches/{savedSearchName}' => [
                'delete' => [
                    'operationId' => 'SavedSearches_Delete',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'workspaceName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'savedSearchName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2015-03-20']
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
                'put' => [
                    'operationId' => 'SavedSearches_CreateOrUpdate',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'workspaceName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'savedSearchName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'parameters',
                            'in' => 'body',
                            'required' => TRUE,
                            'schema' => ['$ref' => '#/definitions/SavedSearch']
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2015-03-20']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/SavedSearch']]]
                ],
                'get' => [
                    'operationId' => 'SavedSearches_Get',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'workspaceName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'savedSearchName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2015-03-20']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/SavedSearch']]]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourcegroups/{resourceGroupName}/providers/Microsoft.OperationalInsights/workspaces/{workspaceName}/savedSearches' => ['get' => [
                'operationId' => 'SavedSearches_ListByWorkspace',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'workspaceName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2015-03-20']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/SavedSearchesListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourcegroups/{resourceGroupName}/providers/Microsoft.OperationalInsights/workspaces/{workspaceName}/savedSearches/{savedSearchName}/results' => ['get' => [
                'operationId' => 'SavedSearches_GetResults',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'workspaceName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'savedSearchName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2015-03-20']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/SearchResultsResponse']]]
            ]]
        ],
        'definitions' => [
            'LinkedServiceProperties' => [
                'properties' => ['resourceId' => ['type' => 'string']],
                'additionalProperties' => FALSE,
                'required' => ['resourceId']
            ],
            'LinkedService' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/LinkedServiceProperties']],
                'additionalProperties' => FALSE,
                'required' => ['properties']
            ],
            'LinkedServiceListResult' => [
                'properties' => ['value' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/LinkedService']
                ]],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'DataSource' => [
                'properties' => [
                    'properties' => ['type' => 'object'],
                    'eTag' => ['type' => 'string'],
                    'kind' => [
                        'type' => 'string',
                        'enum' => [
                            'AzureActivityLog',
                            'ChangeTrackingPath',
                            'ChangeTrackingDefaultPath',
                            'ChangeTrackingDefaultRegistry',
                            'ChangeTrackingCustomRegistry',
                            'CustomLog',
                            'CustomLogCollection',
                            'GenericDataSource',
                            'IISLogs',
                            'LinuxPerformanceObject',
                            'LinuxPerformanceCollection',
                            'LinuxSyslog',
                            'LinuxSyslogCollection',
                            'WindowsEvent',
                            'WindowsPerformanceCounter'
                        ]
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => [
                    'properties',
                    'kind'
                ]
            ],
            'DataSourceFilter' => [
                'properties' => ['kind' => [
                    'type' => 'string',
                    'enum' => [
                        'AzureActivityLog',
                        'ChangeTrackingPath',
                        'ChangeTrackingDefaultPath',
                        'ChangeTrackingDefaultRegistry',
                        'ChangeTrackingCustomRegistry',
                        'CustomLog',
                        'CustomLogCollection',
                        'GenericDataSource',
                        'IISLogs',
                        'LinuxPerformanceObject',
                        'LinuxPerformanceCollection',
                        'LinuxSyslog',
                        'LinuxSyslogCollection',
                        'WindowsEvent',
                        'WindowsPerformanceCounter'
                    ]
                ]],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'DataSourceListResult' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/DataSource']
                    ],
                    'nextLink' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'IntelligencePack' => [
                'properties' => [
                    'name' => ['type' => 'string'],
                    'enabled' => ['type' => 'boolean']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'SharedKeys' => [
                'properties' => [
                    'primarySharedKey' => ['type' => 'string'],
                    'secondarySharedKey' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'MetricName' => [
                'properties' => [
                    'value' => ['type' => 'string'],
                    'localizedValue' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'UsageMetric' => [
                'properties' => [
                    'name' => ['$ref' => '#/definitions/MetricName'],
                    'unit' => ['type' => 'string'],
                    'currentValue' => [
                        'type' => 'number',
                        'format' => 'double'
                    ],
                    'limit' => [
                        'type' => 'number',
                        'format' => 'double'
                    ],
                    'nextResetTime' => [
                        'type' => 'string',
                        'format' => 'date-time'
                    ],
                    'quotaPeriod' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'WorkspaceListUsagesResult' => [
                'properties' => ['value' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/UsageMetric']
                ]],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'ManagementGroupProperties' => [
                'properties' => [
                    'serverCount' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'isGateway' => ['type' => 'boolean'],
                    'name' => ['type' => 'string'],
                    'id' => ['type' => 'string'],
                    'created' => [
                        'type' => 'string',
                        'format' => 'date-time'
                    ],
                    'dataReceived' => [
                        'type' => 'string',
                        'format' => 'date-time'
                    ],
                    'version' => ['type' => 'string'],
                    'sku' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'ManagementGroup' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/ManagementGroupProperties']],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'WorkspaceListManagementGroupsResult' => [
                'properties' => ['value' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/ManagementGroup']
                ]],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'Sku' => [
                'properties' => ['name' => [
                    'type' => 'string',
                    'enum' => [
                        'Free',
                        'Standard',
                        'Premium',
                        'Unlimited',
                        'PerNode',
                        'Standalone'
                    ]
                ]],
                'additionalProperties' => FALSE,
                'required' => ['name']
            ],
            'WorkspaceProperties' => [
                'properties' => [
                    'provisioningState' => [
                        'type' => 'string',
                        'enum' => [
                            'Creating',
                            'Succeeded',
                            'Failed',
                            'Canceled',
                            'Deleting',
                            'ProvisioningAccount'
                        ]
                    ],
                    'source' => ['type' => 'string'],
                    'customerId' => ['type' => 'string'],
                    'portalUrl' => ['type' => 'string'],
                    'sku' => ['$ref' => '#/definitions/Sku'],
                    'retentionInDays' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'Workspace' => [
                'properties' => [
                    'properties' => ['$ref' => '#/definitions/WorkspaceProperties'],
                    'eTag' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'WorkspaceListResult' => [
                'properties' => ['value' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/Workspace']
                ]],
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
            'ProxyResource' => [
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
                    'tags' => [
                        'type' => 'object',
                        'additionalProperties' => ['type' => 'string']
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'LinkTarget' => [
                'properties' => [
                    'customerId' => ['type' => 'string'],
                    'accountName' => ['type' => 'string'],
                    'workspaceName' => ['type' => 'string'],
                    'location' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'Tag' => [
                'properties' => [
                    'Name' => ['type' => 'string'],
                    'Value' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => [
                    'Name',
                    'Value'
                ]
            ],
            'SavedSearchProperties' => [
                'properties' => [
                    'Category' => ['type' => 'string'],
                    'DisplayName' => ['type' => 'string'],
                    'Query' => ['type' => 'string'],
                    'Version' => [
                        'type' => 'integer',
                        'format' => 'int64'
                    ],
                    'Tags' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/Tag']
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => [
                    'Category',
                    'DisplayName',
                    'Query',
                    'Version'
                ]
            ],
            'CoreSummary' => [
                'properties' => [
                    'Status' => ['type' => 'string'],
                    'NumberOfDocuments' => [
                        'type' => 'integer',
                        'format' => 'int64'
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => ['NumberOfDocuments']
            ],
            'SearchSort' => [
                'properties' => [
                    'name' => ['type' => 'string'],
                    'order' => [
                        'type' => 'string',
                        'enum' => [
                            'asc',
                            'desc'
                        ]
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'SearchMetadataSchema' => [
                'properties' => [
                    'name' => ['type' => 'string'],
                    'version' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'SearchMetadata' => [
                'properties' => [
                    'RequestId' => ['type' => 'string'],
                    'resultType' => ['type' => 'string'],
                    'total' => [
                        'type' => 'integer',
                        'format' => 'int64'
                    ],
                    'top' => [
                        'type' => 'integer',
                        'format' => 'int64'
                    ],
                    'id' => ['type' => 'string'],
                    'CoreSummaries' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/CoreSummary']
                    ],
                    'Status' => ['type' => 'string'],
                    'StartTime' => [
                        'type' => 'string',
                        'format' => 'date-time'
                    ],
                    'LastUpdated' => [
                        'type' => 'string',
                        'format' => 'date-time'
                    ],
                    'ETag' => ['type' => 'string'],
                    'sort' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/SearchSort']
                    ],
                    'requestTime' => [
                        'type' => 'integer',
                        'format' => 'int64'
                    ],
                    'aggregatedValueField' => ['type' => 'string'],
                    'aggregatedGroupingFields' => ['type' => 'string'],
                    'sum' => [
                        'type' => 'integer',
                        'format' => 'int64'
                    ],
                    'max' => [
                        'type' => 'integer',
                        'format' => 'int64'
                    ],
                    'schema' => ['$ref' => '#/definitions/SearchMetadataSchema']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'SavedSearch' => [
                'properties' => [
                    'id' => [
                        'type' => 'string',
                        'readOnly' => TRUE
                    ],
                    'etag' => ['type' => 'string'],
                    'properties' => ['$ref' => '#/definitions/SavedSearchProperties']
                ],
                'additionalProperties' => FALSE,
                'required' => ['properties']
            ],
            'SavedSearchesListResult' => [
                'properties' => [
                    '__metadata' => ['$ref' => '#/definitions/SearchMetadata'],
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/SavedSearch']
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'SearchError' => [
                'properties' => [
                    'type' => ['type' => 'string'],
                    'message' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'SearchResultsResponse' => [
                'properties' => [
                    'id' => [
                        'type' => 'string',
                        'readOnly' => TRUE
                    ],
                    '__metadata' => ['$ref' => '#/definitions/SearchMetadata'],
                    'value' => [
                        'type' => 'array',
                        'items' => ['type' => 'object']
                    ],
                    'error' => ['$ref' => '#/definitions/SearchError']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'SearchSchemaValue' => [
                'properties' => [
                    'name' => ['type' => 'string'],
                    'displayName' => ['type' => 'string'],
                    'type' => ['type' => 'string'],
                    'indexed' => ['type' => 'boolean'],
                    'stored' => ['type' => 'boolean'],
                    'facet' => ['type' => 'boolean'],
                    'ownerType' => [
                        'type' => 'array',
                        'items' => ['type' => 'string']
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => [
                    'indexed',
                    'stored',
                    'facet'
                ]
            ],
            'SearchGetSchemaResponse' => [
                'properties' => [
                    '__metadata' => ['$ref' => '#/definitions/SearchMetadata'],
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/SearchSchemaValue']
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'SearchHighlight' => [
                'properties' => [
                    'pre' => ['type' => 'string'],
                    'post' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'SearchParameters' => [
                'properties' => [
                    'top' => [
                        'type' => 'integer',
                        'format' => 'int64'
                    ],
                    'highlight' => ['$ref' => '#/definitions/SearchHighlight'],
                    'query' => ['type' => 'string'],
                    'start' => [
                        'type' => 'string',
                        'format' => 'date-time'
                    ],
                    'end' => [
                        'type' => 'string',
                        'format' => 'date-time'
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => ['query']
            ],
            'StorageAccount' => [
                'properties' => [
                    'id' => ['type' => 'string'],
                    'key' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => [
                    'id',
                    'key'
                ]
            ],
            'StorageInsightStatus' => [
                'properties' => [
                    'state' => [
                        'type' => 'string',
                        'enum' => [
                            'OK',
                            'ERROR'
                        ]
                    ],
                    'description' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => ['state']
            ],
            'StorageInsightProperties' => [
                'properties' => [
                    'containers' => [
                        'type' => 'array',
                        'items' => ['type' => 'string']
                    ],
                    'tables' => [
                        'type' => 'array',
                        'items' => ['type' => 'string']
                    ],
                    'storageAccount' => ['$ref' => '#/definitions/StorageAccount'],
                    'status' => [
                        '$ref' => '#/definitions/StorageInsightStatus',
                        'readOnly' => TRUE
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => ['storageAccount']
            ],
            'StorageInsight' => [
                'properties' => [
                    'properties' => ['$ref' => '#/definitions/StorageInsightProperties'],
                    'eTag' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'StorageInsightListResult' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/StorageInsight']
                    ],
                    '@odata.nextLink' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ]
        ]
    ];
}
