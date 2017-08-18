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
                            'schema' => ['$ref' => '#/definitions/SearchService']
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
                        'schema' => ['$ref' => '#/definitions/CheckNameAvailabilityInput']
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
            'CheckNameAvailabilityInput' => [
                'properties' => [
                    'name' => ['type' => 'string'],
                    'type' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => [
                    'name',
                    'type'
                ]
            ],
            'CheckNameAvailabilityOutput' => [
                'properties' => [
                    'nameAvailable' => [
                        'type' => 'boolean',
                        'readOnly' => TRUE
                    ],
                    'reason' => [
                        'type' => 'string',
                        'enum' => [
                            'Invalid',
                            'AlreadyExists'
                        ],
                        'readOnly' => TRUE
                    ],
                    'message' => [
                        'type' => 'string',
                        'readOnly' => TRUE
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'AdminKeyResult' => [
                'properties' => [
                    'primaryKey' => [
                        'type' => 'string',
                        'readOnly' => TRUE
                    ],
                    'secondaryKey' => [
                        'type' => 'string',
                        'readOnly' => TRUE
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'QueryKey' => [
                'properties' => [
                    'name' => [
                        'type' => 'string',
                        'readOnly' => TRUE
                    ],
                    'key' => [
                        'type' => 'string',
                        'readOnly' => TRUE
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'ListQueryKeysResult' => [
                'properties' => ['value' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/QueryKey'],
                    'readOnly' => TRUE
                ]],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'Sku' => [
                'properties' => ['name' => [
                    'type' => 'string',
                    'enum' => [
                        'free',
                        'basic',
                        'standard',
                        'standard2',
                        'standard3'
                    ]
                ]],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'SearchServiceProperties' => [
                'properties' => [
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
                        ],
                        'readOnly' => TRUE
                    ],
                    'statusDetails' => [
                        'type' => 'string',
                        'readOnly' => TRUE
                    ],
                    'provisioningState' => [
                        'type' => 'string',
                        'enum' => [
                            'succeeded',
                            'provisioning',
                            'failed'
                        ],
                        'readOnly' => TRUE
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'SearchService' => [
                'properties' => [
                    'properties' => ['$ref' => '#/definitions/SearchServiceProperties'],
                    'sku' => ['$ref' => '#/definitions/Sku']
                ],
                'additionalProperties' => FALSE,
                'required' => ['sku']
            ],
            'SearchServiceListResult' => [
                'properties' => ['value' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/SearchService'],
                    'readOnly' => TRUE
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
            'CloudErrorBody' => [
                'properties' => [
                    'code' => ['type' => 'string'],
                    'message' => ['type' => 'string'],
                    'target' => ['type' => 'string'],
                    'details' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/CloudErrorBody']
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'CloudError' => [
                'properties' => ['error' => ['$ref' => '#/definitions/CloudErrorBody']],
                'additionalProperties' => FALSE,
                'required' => []
            ]
        ]
    ];
}
