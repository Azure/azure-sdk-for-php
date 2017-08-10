<?php
namespace Microsoft\Azure\Management\MachineLearning;
final class AzureMLWebServicesManagementClient
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
        $this->_WebServices_group = new \Microsoft\Azure\Management\MachineLearning\WebServices($_client);
    }
    /**
     * @return \Microsoft\Azure\Management\MachineLearning\WebServices
     */
    public function getWebServices()
    {
        return $this->_WebServices_group;
    }
    /**
     * @var \Microsoft\Azure\Management\MachineLearning\WebServices
     */
    private $_WebServices_group;
    const _SWAGGER_OBJECT_DATA = [
        'host' => 'management.azure.com',
        'paths' => [
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.MachineLearning/webServices/{webServiceName}' => [
                'put' => [
                    'operationId' => 'WebServices_CreateOrUpdate',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'webServiceName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'createOrUpdatePayload',
                            'in' => 'body',
                            'required' => TRUE,
                            'schema' => ['$ref' => '#/definitions/WebService']
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-01-01']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => [
                        '200' => ['schema' => ['$ref' => '#/definitions/WebService']],
                        '201' => ['schema' => ['$ref' => '#/definitions/WebService']]
                    ]
                ],
                'get' => [
                    'operationId' => 'WebServices_Get',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'webServiceName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'region',
                            'in' => 'query',
                            'required' => FALSE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-01-01']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/WebService']]]
                ],
                'patch' => [
                    'operationId' => 'WebServices_Patch',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'webServiceName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'patchPayload',
                            'in' => 'body',
                            'required' => TRUE,
                            'schema' => ['$ref' => '#/definitions/WebService']
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-01-01']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/WebService']]]
                ],
                'delete' => [
                    'operationId' => 'WebServices_Remove',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'webServiceName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-01-01']
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
                        '204' => []
                    ]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.MachineLearning/webServices/{webServiceName}/CreateRegionalBlob' => ['post' => [
                'operationId' => 'WebServices_CreateRegionalProperties',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'webServiceName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'region',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-01-01']
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
                    '200' => ['schema' => ['$ref' => '#/definitions/AsyncOperationStatus']]
                ]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.MachineLearning/webServices/{webServiceName}/listKeys' => ['get' => [
                'operationId' => 'WebServices_ListKeys',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'webServiceName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-01-01']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/WebServiceKeys']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.MachineLearning/webServices' => ['get' => [
                'operationId' => 'WebServices_ListByResourceGroup',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
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
                        'enum' => ['2017-01-01']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/PaginatedWebServicesList']]]
            ]],
            '/subscriptions/{subscriptionId}/providers/Microsoft.MachineLearning/webServices' => ['get' => [
                'operationId' => 'WebServices_ListBySubscriptionId',
                'parameters' => [
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
                        'enum' => ['2017-01-01']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/PaginatedWebServicesList']]]
            ]]
        ],
        'definitions' => [
            'Resource' => [
                'properties' => [
                    'id' => ['type' => 'string'],
                    'name' => ['type' => 'string'],
                    'location' => ['type' => 'string'],
                    'type' => ['type' => 'string'],
                    'tags' => [
                        'type' => 'object',
                        'additionalProperties' => ['type' => 'string']
                    ]
                ],
                'required' => ['location']
            ],
            'WebServiceKeys' => [
                'properties' => [
                    'primary' => ['type' => 'string'],
                    'secondary' => ['type' => 'string']
                ],
                'required' => []
            ],
            'RealtimeConfiguration' => [
                'properties' => ['maxConcurrentCalls' => [
                    'type' => 'integer',
                    'format' => 'int32'
                ]],
                'required' => []
            ],
            'DiagnosticsConfiguration' => [
                'properties' => [
                    'level' => [
                        'type' => 'string',
                        'enum' => [
                            'None',
                            'Error',
                            'All'
                        ]
                    ],
                    'expiry' => [
                        'type' => 'string',
                        'format' => 'date-time'
                    ]
                ],
                'required' => ['level']
            ],
            'StorageAccount' => [
                'properties' => [
                    'name' => ['type' => 'string'],
                    'key' => ['type' => 'string']
                ],
                'required' => []
            ],
            'MachineLearningWorkspace' => [
                'properties' => ['id' => ['type' => 'string']],
                'required' => ['id']
            ],
            'CommitmentPlan' => [
                'properties' => ['id' => ['type' => 'string']],
                'required' => ['id']
            ],
            'ColumnSpecification' => [
                'properties' => [
                    'type' => [
                        'type' => 'string',
                        'enum' => [
                            'Boolean',
                            'Integer',
                            'Number',
                            'String'
                        ]
                    ],
                    'format' => [
                        'type' => 'string',
                        'enum' => [
                            'Byte',
                            'Char',
                            'Complex64',
                            'Complex128',
                            'Date-time',
                            'Date-timeOffset',
                            'Double',
                            'Duration',
                            'Float',
                            'Int8',
                            'Int16',
                            'Int32',
                            'Int64',
                            'Uint8',
                            'Uint16',
                            'Uint32',
                            'Uint64'
                        ]
                    ],
                    'enum' => [
                        'type' => 'array',
                        'items' => ['type' => 'object']
                    ],
                    'x-ms-isnullable' => ['type' => 'boolean'],
                    'x-ms-isordered' => ['type' => 'boolean']
                ],
                'required' => ['type']
            ],
            'TableSpecification' => [
                'properties' => [
                    'title' => ['type' => 'string'],
                    'description' => ['type' => 'string'],
                    'type' => ['type' => 'string'],
                    'format' => ['type' => 'string'],
                    'properties' => [
                        'type' => 'object',
                        'additionalProperties' => ['$ref' => '#/definitions/ColumnSpecification']
                    ]
                ],
                'required' => ['type']
            ],
            'ServiceInputOutputSpecification' => [
                'properties' => [
                    'title' => ['type' => 'string'],
                    'description' => ['type' => 'string'],
                    'type' => ['type' => 'string'],
                    'properties' => [
                        'type' => 'object',
                        'additionalProperties' => ['$ref' => '#/definitions/TableSpecification']
                    ]
                ],
                'required' => [
                    'type',
                    'properties'
                ]
            ],
            'ExampleRequest' => [
                'properties' => [
                    'inputs' => [
                        'type' => 'object',
                        'additionalProperties' => [
                            'type' => 'array',
                            'items' => [
                                'type' => 'array',
                                'items' => ['type' => 'object']
                            ]
                        ]
                    ],
                    'globalParameters' => [
                        'type' => 'object',
                        'additionalProperties' => ['type' => 'object']
                    ]
                ],
                'required' => []
            ],
            'BlobLocation' => [
                'properties' => [
                    'uri' => ['type' => 'string'],
                    'credentials' => ['type' => 'string']
                ],
                'required' => ['uri']
            ],
            'InputPort' => [
                'properties' => ['type' => [
                    'type' => 'string',
                    'enum' => ['Dataset']
                ]],
                'required' => []
            ],
            'OutputPort' => [
                'properties' => ['type' => [
                    'type' => 'string',
                    'enum' => ['Dataset']
                ]],
                'required' => []
            ],
            'ModeValueInfo' => [
                'properties' => [
                    'interfaceString' => ['type' => 'string'],
                    'parameters' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/ModuleAssetParameter']
                    ]
                ],
                'required' => []
            ],
            'ModuleAssetParameter' => [
                'properties' => [
                    'name' => ['type' => 'string'],
                    'parameterType' => ['type' => 'string'],
                    'modeValuesInfo' => [
                        'type' => 'object',
                        'additionalProperties' => ['$ref' => '#/definitions/ModeValueInfo']
                    ]
                ],
                'required' => []
            ],
            'AssetItem' => [
                'properties' => [
                    'name' => ['type' => 'string'],
                    'id' => ['type' => 'string'],
                    'type' => [
                        'type' => 'string',
                        'enum' => [
                            'Module',
                            'Resource'
                        ]
                    ],
                    'locationInfo' => ['$ref' => '#/definitions/BlobLocation'],
                    'inputPorts' => [
                        'type' => 'object',
                        'additionalProperties' => ['$ref' => '#/definitions/InputPort']
                    ],
                    'outputPorts' => [
                        'type' => 'object',
                        'additionalProperties' => ['$ref' => '#/definitions/OutputPort']
                    ],
                    'metadata' => [
                        'type' => 'object',
                        'additionalProperties' => ['type' => 'string']
                    ],
                    'parameters' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/ModuleAssetParameter']
                    ]
                ],
                'required' => [
                    'name',
                    'type',
                    'locationInfo'
                ]
            ],
            'WebServiceParameter' => [
                'properties' => [
                    'value' => ['type' => 'object'],
                    'certificateThumbprint' => ['type' => 'string']
                ],
                'required' => []
            ],
            'WebServiceProperties' => [
                'properties' => [
                    'title' => ['type' => 'string'],
                    'description' => ['type' => 'string'],
                    'createdOn' => [
                        'type' => 'string',
                        'format' => 'date-time'
                    ],
                    'modifiedOn' => [
                        'type' => 'string',
                        'format' => 'date-time'
                    ],
                    'provisioningState' => [
                        'type' => 'string',
                        'enum' => [
                            'Unknown',
                            'Provisioning',
                            'Succeeded',
                            'Failed'
                        ]
                    ],
                    'keys' => ['$ref' => '#/definitions/WebServiceKeys'],
                    'readOnly' => ['type' => 'boolean'],
                    'swaggerLocation' => ['type' => 'string'],
                    'exposeSampleData' => ['type' => 'boolean'],
                    'realtimeConfiguration' => ['$ref' => '#/definitions/RealtimeConfiguration'],
                    'diagnostics' => ['$ref' => '#/definitions/DiagnosticsConfiguration'],
                    'storageAccount' => ['$ref' => '#/definitions/StorageAccount'],
                    'machineLearningWorkspace' => ['$ref' => '#/definitions/MachineLearningWorkspace'],
                    'commitmentPlan' => ['$ref' => '#/definitions/CommitmentPlan'],
                    'input' => ['$ref' => '#/definitions/ServiceInputOutputSpecification'],
                    'output' => ['$ref' => '#/definitions/ServiceInputOutputSpecification'],
                    'exampleRequest' => ['$ref' => '#/definitions/ExampleRequest'],
                    'assets' => [
                        'type' => 'object',
                        'additionalProperties' => ['$ref' => '#/definitions/AssetItem']
                    ],
                    'parameters' => [
                        'type' => 'object',
                        'additionalProperties' => ['$ref' => '#/definitions/WebServiceParameter']
                    ],
                    'payloadsInBlobStorage' => ['type' => 'boolean'],
                    'payloadsLocation' => ['$ref' => '#/definitions/BlobLocation']
                ],
                'required' => []
            ],
            'WebService' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/WebServiceProperties']],
                'required' => ['properties']
            ],
            'GraphNode' => [
                'properties' => [
                    'assetId' => ['type' => 'string'],
                    'inputId' => ['type' => 'string'],
                    'outputId' => ['type' => 'string'],
                    'parameters' => [
                        'type' => 'object',
                        'additionalProperties' => ['$ref' => '#/definitions/WebServiceParameter']
                    ]
                ],
                'required' => []
            ],
            'GraphEdge' => [
                'properties' => [
                    'sourceNodeId' => ['type' => 'string'],
                    'sourcePortId' => ['type' => 'string'],
                    'targetNodeId' => ['type' => 'string'],
                    'targetPortId' => ['type' => 'string']
                ],
                'required' => []
            ],
            'GraphParameterLink' => [
                'properties' => [
                    'nodeId' => ['type' => 'string'],
                    'parameterKey' => ['type' => 'string']
                ],
                'required' => [
                    'nodeId',
                    'parameterKey'
                ]
            ],
            'GraphParameter' => [
                'properties' => [
                    'description' => ['type' => 'string'],
                    'type' => [
                        'type' => 'string',
                        'enum' => [
                            'String',
                            'Int',
                            'Float',
                            'Enumerated',
                            'Script',
                            'Mode',
                            'Credential',
                            'Boolean',
                            'Double',
                            'ColumnPicker',
                            'ParameterRange',
                            'DataGatewayName'
                        ]
                    ],
                    'links' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/GraphParameterLink']
                    ]
                ],
                'required' => [
                    'type',
                    'links'
                ]
            ],
            'GraphPackage' => [
                'properties' => [
                    'nodes' => [
                        'type' => 'object',
                        'additionalProperties' => ['$ref' => '#/definitions/GraphNode']
                    ],
                    'edges' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/GraphEdge']
                    ],
                    'graphParameters' => [
                        'type' => 'object',
                        'additionalProperties' => ['$ref' => '#/definitions/GraphParameter']
                    ]
                ],
                'required' => []
            ],
            'Graph' => [
                'properties' => ['package' => ['$ref' => '#/definitions/GraphPackage']],
                'required' => []
            ],
            'PaginatedWebServicesList' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/WebService']
                    ],
                    'nextLink' => ['type' => 'string']
                ],
                'required' => []
            ],
            'AsyncOperationErrorInfo' => [
                'properties' => [
                    'code' => ['type' => 'string'],
                    'target' => ['type' => 'string'],
                    'message' => ['type' => 'string'],
                    'details' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/AsyncOperationErrorInfo']
                    ]
                ],
                'required' => []
            ],
            'AsyncOperationStatus' => [
                'properties' => [
                    'id' => ['type' => 'string'],
                    'name' => ['type' => 'string'],
                    'provisioningState' => [
                        'type' => 'string',
                        'enum' => [
                            'Unknown',
                            'Provisioning',
                            'Succeeded',
                            'Failed'
                        ]
                    ],
                    'startTime' => [
                        'type' => 'string',
                        'format' => 'date-time'
                    ],
                    'endTime' => [
                        'type' => 'string',
                        'format' => 'date-time'
                    ],
                    'percentComplete' => [
                        'type' => 'number',
                        'format' => 'double'
                    ],
                    'errorInfo' => ['$ref' => '#/definitions/AsyncOperationErrorInfo']
                ],
                'required' => []
            ]
        ]
    ];
}
