<?php
namespace Microsoft\Azure\Management\OperationalInsights\_2015_03_20;
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
        $this->_StorageInsights_group = new \Microsoft\Azure\Management\OperationalInsights\_2015_03_20\StorageInsights($_client);
        $this->_Workspaces_group = new \Microsoft\Azure\Management\OperationalInsights\_2015_03_20\Workspaces($_client);
        $this->_SavedSearches_group = new \Microsoft\Azure\Management\OperationalInsights\_2015_03_20\SavedSearches($_client);
    }
    /**
     * @return \Microsoft\Azure\Management\OperationalInsights\_2015_03_20\StorageInsights
     */
    public function getStorageInsights()
    {
        return $this->_StorageInsights_group;
    }
    /**
     * @return \Microsoft\Azure\Management\OperationalInsights\_2015_03_20\Workspaces
     */
    public function getWorkspaces()
    {
        return $this->_Workspaces_group;
    }
    /**
     * @return \Microsoft\Azure\Management\OperationalInsights\_2015_03_20\SavedSearches
     */
    public function getSavedSearches()
    {
        return $this->_SavedSearches_group;
    }
    /**
     * @var \Microsoft\Azure\Management\OperationalInsights\_2015_03_20\StorageInsights
     */
    private $_StorageInsights_group;
    /**
     * @var \Microsoft\Azure\Management\OperationalInsights\_2015_03_20\Workspaces
     */
    private $_Workspaces_group;
    /**
     * @var \Microsoft\Azure\Management\OperationalInsights\_2015_03_20\SavedSearches
     */
    private $_SavedSearches_group;
    const _SWAGGER_OBJECT_DATA = [
        'host' => 'management.azure.com',
        'paths' => [
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
                            '$ref' => '#/definitions/StorageInsight'
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
                        '$ref' => '#/definitions/SearchParameters'
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
                            '$ref' => '#/definitions/SavedSearch'
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
            'LinkTarget' => ['properties' => [
                'customerId' => ['type' => 'string'],
                'accountName' => ['type' => 'string'],
                'workspaceName' => ['type' => 'string'],
                'location' => ['type' => 'string']
            ]],
            'Tag' => ['properties' => [
                'Name' => ['type' => 'string'],
                'Value' => ['type' => 'string']
            ]],
            'SavedSearchProperties' => ['properties' => [
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
            ]],
            'CoreSummary' => ['properties' => [
                'Status' => ['type' => 'string'],
                'NumberOfDocuments' => [
                    'type' => 'integer',
                    'format' => 'int64'
                ]
            ]],
            'SearchSort' => ['properties' => [
                'name' => ['type' => 'string'],
                'order' => [
                    'type' => 'string',
                    'enum' => [
                        'asc',
                        'desc'
                    ]
                ]
            ]],
            'SearchMetadataSchema' => ['properties' => [
                'name' => ['type' => 'string'],
                'version' => [
                    'type' => 'integer',
                    'format' => 'int32'
                ]
            ]],
            'SearchMetadata' => ['properties' => [
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
            ]],
            'SavedSearch' => ['properties' => [
                'id' => ['type' => 'string'],
                'etag' => ['type' => 'string'],
                'properties' => ['$ref' => '#/definitions/SavedSearchProperties']
            ]],
            'SavedSearchesListResult' => ['properties' => [
                '__metadata' => ['$ref' => '#/definitions/SearchMetadata'],
                'value' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/SavedSearch']
                ]
            ]],
            'SearchError' => ['properties' => [
                'type' => ['type' => 'string'],
                'message' => ['type' => 'string']
            ]],
            'SearchResultsResponse' => ['properties' => [
                'id' => ['type' => 'string'],
                '__metadata' => ['$ref' => '#/definitions/SearchMetadata'],
                'value' => [
                    'type' => 'array',
                    'items' => ['type' => 'object']
                ],
                'error' => ['$ref' => '#/definitions/SearchError']
            ]],
            'SearchSchemaValue' => ['properties' => [
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
            ]],
            'SearchGetSchemaResponse' => ['properties' => [
                '__metadata' => ['$ref' => '#/definitions/SearchMetadata'],
                'value' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/SearchSchemaValue']
                ]
            ]],
            'SearchHighlight' => ['properties' => [
                'pre' => ['type' => 'string'],
                'post' => ['type' => 'string']
            ]],
            'SearchParameters' => ['properties' => [
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
            ]],
            'StorageAccount' => ['properties' => [
                'id' => ['type' => 'string'],
                'key' => ['type' => 'string']
            ]],
            'StorageInsightStatus' => ['properties' => [
                'state' => [
                    'type' => 'string',
                    'enum' => [
                        'OK',
                        'ERROR'
                    ]
                ],
                'description' => ['type' => 'string']
            ]],
            'StorageInsightProperties' => ['properties' => [
                'containers' => [
                    'type' => 'array',
                    'items' => ['type' => 'string']
                ],
                'tables' => [
                    'type' => 'array',
                    'items' => ['type' => 'string']
                ],
                'storageAccount' => ['$ref' => '#/definitions/StorageAccount'],
                'status' => ['$ref' => '#/definitions/StorageInsightStatus']
            ]],
            'StorageInsight' => ['properties' => [
                'properties' => ['$ref' => '#/definitions/StorageInsightProperties'],
                'eTag' => ['type' => 'string']
            ]],
            'StorageInsightListResult' => ['properties' => [
                'value' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/StorageInsight']
                ],
                '@odata.nextLink' => ['type' => 'string']
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
            'ProxyResource' => ['properties' => [
                'id' => ['type' => 'string'],
                'name' => ['type' => 'string'],
                'type' => ['type' => 'string'],
                'tags' => [
                    'type' => 'object',
                    'additionalProperties' => ['type' => 'string']
                ]
            ]]
        ]
    ];
}
