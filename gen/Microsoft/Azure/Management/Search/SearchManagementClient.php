<?php
namespace Microsoft\Azure\Management\Search;
final class SearchManagementClient
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
        $this->_AdminKeys_group = new \Microsoft\Azure\Management\Search\AdminKeys($_client);
        $this->_QueryKeys_group = new \Microsoft\Azure\Management\Search\QueryKeys($_client);
        $this->_Services_group = new \Microsoft\Azure\Management\Search\Services($_client);
    }
    /**
     * @return \Microsoft\Azure\Management\Search\AdminKeys
     */
    public function getAdminKeys()
    {
        return $this->_AdminKeys_group;
    }
    /**
     * @return \Microsoft\Azure\Management\Search\QueryKeys
     */
    public function getQueryKeys()
    {
        return $this->_QueryKeys_group;
    }
    /**
     * @return \Microsoft\Azure\Management\Search\Services
     */
    public function getServices()
    {
        return $this->_Services_group;
    }
    /**
     * @var \Microsoft\Azure\Management\Search\AdminKeys
     */
    private $_AdminKeys_group;
    /**
     * @var \Microsoft\Azure\Management\Search\QueryKeys
     */
    private $_QueryKeys_group;
    /**
     * @var \Microsoft\Azure\Management\Search\Services
     */
    private $_Services_group;
    const _SWAGGER_OBJECT_DATA = [
        'host' => 'management.azure.com',
        'paths' => [
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Search/searchServices/{searchServiceName}/listAdminKeys' => ['post' => [
                'operationId' => 'AdminKeys_Get',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'searchServiceName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'x-ms-client-request-id',
                        'in' => 'header',
                        'required' => FALSE,
                        'type' => 'string',
                        'format' => 'uuid'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2015-08-19']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/AdminKeyResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Search/searchServices/{searchServiceName}/regenerateAdminKey/{keyKind}' => ['post' => [
                'operationId' => 'AdminKeys_Regenerate',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'searchServiceName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'keyKind',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => [
                            'primary',
                            'secondary'
                        ]
                    ],
                    [
                        'name' => 'x-ms-client-request-id',
                        'in' => 'header',
                        'required' => FALSE,
                        'type' => 'string',
                        'format' => 'uuid'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2015-08-19']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/AdminKeyResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Search/searchServices/{searchServiceName}/createQueryKey/{name}' => ['post' => [
                'operationId' => 'QueryKeys_Create',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'searchServiceName',
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
                        'name' => 'x-ms-client-request-id',
                        'in' => 'header',
                        'required' => FALSE,
                        'type' => 'string',
                        'format' => 'uuid'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2015-08-19']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/QueryKey']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Search/searchServices/{searchServiceName}/listQueryKeys' => ['get' => [
                'operationId' => 'QueryKeys_ListBySearchService',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'searchServiceName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'x-ms-client-request-id',
                        'in' => 'header',
                        'required' => FALSE,
                        'type' => 'string',
                        'format' => 'uuid'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2015-08-19']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/ListQueryKeysResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Search/searchServices/{searchServiceName}/deleteQueryKey/{key}' => ['delete' => [
                'operationId' => 'QueryKeys_Delete',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'searchServiceName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'key',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'x-ms-client-request-id',
                        'in' => 'header',
                        'required' => FALSE,
                        'type' => 'string',
                        'format' => 'uuid'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2015-08-19']
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
                    '404' => []
                ]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Search/searchServices/{searchServiceName}' => [
                'put' => [
                    'operationId' => 'Services_CreateOrUpdate',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'searchServiceName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'service',
                            'in' => 'body',
                            'required' => TRUE,
                            '$ref' => '#/definitions/SearchService'
                        ],
                        [
                            'name' => 'x-ms-client-request-id',
                            'in' => 'header',
                            'required' => FALSE,
                            'type' => 'string',
                            'format' => 'uuid'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2015-08-19']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => [
                        '200' => ['schema' => ['$ref' => '#/definitions/SearchService']],
                        '201' => ['schema' => ['$ref' => '#/definitions/SearchService']]
                    ]
                ],
                'get' => [
                    'operationId' => 'Services_Get',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'searchServiceName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'x-ms-client-request-id',
                            'in' => 'header',
                            'required' => FALSE,
                            'type' => 'string',
                            'format' => 'uuid'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2015-08-19']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/SearchService']]]
                ],
                'delete' => [
                    'operationId' => 'Services_Delete',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'searchServiceName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'x-ms-client-request-id',
                            'in' => 'header',
                            'required' => FALSE,
                            'type' => 'string',
                            'format' => 'uuid'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2015-08-19']
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
                        '404' => []
                    ]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Search/searchServices' => ['get' => [
                'operationId' => 'Services_ListByResourceGroup',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'x-ms-client-request-id',
                        'in' => 'header',
                        'required' => FALSE,
                        'type' => 'string',
                        'format' => 'uuid'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2015-08-19']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/SearchServiceListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/providers/Microsoft.Search/checkNameAvailability' => ['post' => [
                'operationId' => 'Services_CheckNameAvailability',
                'parameters' => [
                    [
                        'name' => 'checkNameAvailabilityInput',
                        'in' => 'body',
                        'required' => TRUE,
                        '$ref' => '#/definitions/CheckNameAvailabilityInput'
                    ],
                    [
                        'name' => 'x-ms-client-request-id',
                        'in' => 'header',
                        'required' => FALSE,
                        'type' => 'string',
                        'format' => 'uuid'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2015-08-19']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/CheckNameAvailabilityOutput']]]
            ]]
        ],
        'definitions' => [
            'CheckNameAvailabilityInput' => ['properties' => [
                'name' => ['type' => 'string'],
                'type' => ['type' => 'string']
            ]],
            'CheckNameAvailabilityOutput' => ['properties' => [
                'nameAvailable' => ['type' => 'boolean'],
                'reason' => [
                    'type' => 'string',
                    'enum' => [
                        'Invalid',
                        'AlreadyExists'
                    ]
                ],
                'message' => ['type' => 'string']
            ]],
            'AdminKeyResult' => ['properties' => [
                'primaryKey' => ['type' => 'string'],
                'secondaryKey' => ['type' => 'string']
            ]],
            'QueryKey' => ['properties' => [
                'name' => ['type' => 'string'],
                'key' => ['type' => 'string']
            ]],
            'ListQueryKeysResult' => ['properties' => ['value' => [
                'type' => 'array',
                'items' => ['$ref' => '#/definitions/QueryKey']
            ]]],
            'Sku' => ['properties' => ['name' => [
                'type' => 'string',
                'enum' => [
                    'free',
                    'basic',
                    'standard',
                    'standard2',
                    'standard3'
                ]
            ]]],
            'SearchServiceProperties' => ['properties' => [
                'replicaCount' => [
                    'type' => 'integer',
                    'format' => 'int32'
                ],
                'partitionCount' => [
                    'type' => 'integer',
                    'format' => 'int32'
                ],
                'hostingMode' => [
                    'type' => 'string',
                    'enum' => [
                        'default',
                        'highDensity'
                    ]
                ],
                'status' => [
                    'type' => 'string',
                    'enum' => [
                        'running',
                        'provisioning',
                        'deleting',
                        'degraded',
                        'disabled',
                        'error'
                    ]
                ],
                'statusDetails' => ['type' => 'string'],
                'provisioningState' => [
                    'type' => 'string',
                    'enum' => [
                        'succeeded',
                        'provisioning',
                        'failed'
                    ]
                ]
            ]],
            'SearchService' => ['properties' => [
                'properties' => ['$ref' => '#/definitions/SearchServiceProperties'],
                'sku' => ['$ref' => '#/definitions/Sku']
            ]],
            'SearchServiceListResult' => ['properties' => ['value' => [
                'type' => 'array',
                'items' => ['$ref' => '#/definitions/SearchService']
            ]]],
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
            'CloudErrorBody' => ['properties' => [
                'code' => ['type' => 'string'],
                'message' => ['type' => 'string'],
                'target' => ['type' => 'string'],
                'details' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/CloudErrorBody']
                ]
            ]],
            'CloudError' => ['properties' => ['error' => ['$ref' => '#/definitions/CloudErrorBody']]]
        ]
    ];
}
