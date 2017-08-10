<?php
namespace Microsoft\Azure\Management\VisualStudio;
final class VisualStudioResourceProviderClient
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
        $this->_Operations_group = new \Microsoft\Azure\Management\VisualStudio\Operations($_client);
        $this->_Accounts_group = new \Microsoft\Azure\Management\VisualStudio\Accounts($_client);
        $this->_Extensions_group = new \Microsoft\Azure\Management\VisualStudio\Extensions($_client);
        $this->_Projects_group = new \Microsoft\Azure\Management\VisualStudio\Projects($_client);
    }
    /**
     * @return \Microsoft\Azure\Management\VisualStudio\Operations
     */
    public function getOperations()
    {
        return $this->_Operations_group;
    }
    /**
     * @return \Microsoft\Azure\Management\VisualStudio\Accounts
     */
    public function getAccounts()
    {
        return $this->_Accounts_group;
    }
    /**
     * @return \Microsoft\Azure\Management\VisualStudio\Extensions
     */
    public function getExtensions()
    {
        return $this->_Extensions_group;
    }
    /**
     * @return \Microsoft\Azure\Management\VisualStudio\Projects
     */
    public function getProjects()
    {
        return $this->_Projects_group;
    }
    /**
     * @var \Microsoft\Azure\Management\VisualStudio\Operations
     */
    private $_Operations_group;
    /**
     * @var \Microsoft\Azure\Management\VisualStudio\Accounts
     */
    private $_Accounts_group;
    /**
     * @var \Microsoft\Azure\Management\VisualStudio\Extensions
     */
    private $_Extensions_group;
    /**
     * @var \Microsoft\Azure\Management\VisualStudio\Projects
     */
    private $_Projects_group;
    const _SWAGGER_OBJECT_DATA = [
        'host' => 'management.azure.com',
        'paths' => [
            '/providers/microsoft.visualstudio/operations' => ['get' => [
                'operationId' => 'Operations_List',
                'parameters' => [],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/OperationListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/providers/microsoft.visualstudio/checkNameAvailability' => ['post' => [
                'operationId' => 'Accounts_CheckNameAvailability',
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
                        'enum' => ['2014-04-01-preview']
                    ],
                    [
                        'name' => 'body',
                        'in' => 'body',
                        'required' => TRUE,
                        'schema' => ['$ref' => '#/definitions/CheckNameAvailabilityParameter']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/CheckNameAvailabilityResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourcegroups/{resourceGroupName}/providers/microsoft.visualstudio/account' => ['get' => [
                'operationId' => 'Accounts_ListByResourceGroup',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
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
                        'enum' => ['2014-04-01-preview']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/AccountResourceListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourcegroups/{resourceGroupName}/providers/microsoft.visualstudio/account/{resourceName}' => [
                'put' => [
                    'operationId' => 'Accounts_CreateOrUpdate',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
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
                            'enum' => ['2014-04-01-preview']
                        ],
                        [
                            'name' => 'body',
                            'in' => 'body',
                            'required' => TRUE,
                            'schema' => ['$ref' => '#/definitions/AccountResourceRequest']
                        ],
                        [
                            'name' => 'resourceName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => [
                        '200' => ['schema' => ['$ref' => '#/definitions/AccountResource']],
                        '404' => []
                    ]
                ],
                'delete' => [
                    'operationId' => 'Accounts_Delete',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
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
                            'enum' => ['2014-04-01-preview']
                        ],
                        [
                            'name' => 'resourceName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => ['200' => []]
                ],
                'get' => [
                    'operationId' => 'Accounts_Get',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
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
                            'enum' => ['2014-04-01-preview']
                        ],
                        [
                            'name' => 'resourceName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => [
                        '200' => ['schema' => ['$ref' => '#/definitions/AccountResource']],
                        '404' => []
                    ]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourcegroups/{resourceGroupName}/providers/microsoft.visualstudio/account/{accountResourceName}/extension' => ['get' => [
                'operationId' => 'Extensions_ListByAccount',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
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
                        'enum' => ['2014-04-01-preview']
                    ],
                    [
                        'name' => 'accountResourceName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/ExtensionResourceListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourcegroups/{resourceGroupName}/providers/microsoft.visualstudio/account/{accountResourceName}/extension/{extensionResourceName}' => [
                'put' => [
                    'operationId' => 'Extensions_Create',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
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
                            'enum' => ['2014-04-01-preview']
                        ],
                        [
                            'name' => 'body',
                            'in' => 'body',
                            'required' => TRUE,
                            'schema' => ['$ref' => '#/definitions/ExtensionResourceRequest']
                        ],
                        [
                            'name' => 'accountResourceName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'extensionResourceName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/ExtensionResource']]]
                ],
                'delete' => [
                    'operationId' => 'Extensions_Delete',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
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
                            'enum' => ['2014-04-01-preview']
                        ],
                        [
                            'name' => 'accountResourceName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'extensionResourceName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => ['200' => []]
                ],
                'get' => [
                    'operationId' => 'Extensions_Get',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
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
                            'enum' => ['2014-04-01-preview']
                        ],
                        [
                            'name' => 'accountResourceName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'extensionResourceName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => [
                        '200' => ['schema' => ['$ref' => '#/definitions/ExtensionResource']],
                        '404' => []
                    ]
                ],
                'patch' => [
                    'operationId' => 'Extensions_Update',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
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
                            'enum' => ['2014-04-01-preview']
                        ],
                        [
                            'name' => 'body',
                            'in' => 'body',
                            'required' => TRUE,
                            'schema' => ['$ref' => '#/definitions/ExtensionResourceRequest']
                        ],
                        [
                            'name' => 'accountResourceName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'extensionResourceName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/ExtensionResource']]]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/microsoft.visualstudio/account/{rootResourceName}/project' => ['get' => [
                'operationId' => 'Projects_ListByResourceGroup',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
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
                        'enum' => ['2014-04-01-preview']
                    ],
                    [
                        'name' => 'rootResourceName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/ProjectResourceListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/microsoft.visualstudio/account/{rootResourceName}/project/{resourceName}' => [
                'put' => [
                    'operationId' => 'Projects_Create',
                    'parameters' => [
                        [
                            'name' => 'body',
                            'in' => 'body',
                            'required' => TRUE,
                            'schema' => ['$ref' => '#/definitions/ProjectResource']
                        ],
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
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
                            'enum' => ['2014-04-01-preview']
                        ],
                        [
                            'name' => 'rootResourceName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'resourceName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'validating',
                            'in' => 'query',
                            'required' => FALSE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => [
                        '200' => ['schema' => ['$ref' => '#/definitions/ProjectResource']],
                        '202' => []
                    ]
                ],
                'get' => [
                    'operationId' => 'Projects_Get',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
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
                            'enum' => ['2014-04-01-preview']
                        ],
                        [
                            'name' => 'rootResourceName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'resourceName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => [
                        '200' => ['schema' => ['$ref' => '#/definitions/ProjectResource']],
                        '404' => []
                    ]
                ],
                'patch' => [
                    'operationId' => 'Projects_Update',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
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
                            'enum' => ['2014-04-01-preview']
                        ],
                        [
                            'name' => 'body',
                            'in' => 'body',
                            'required' => TRUE,
                            'schema' => ['$ref' => '#/definitions/ProjectResource']
                        ],
                        [
                            'name' => 'rootResourceName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'resourceName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/ProjectResource']]]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/microsoft.visualstudio/account/{rootResourceName}/project/{resourceName}/subContainers/{subContainerName}/status' => ['get' => [
                'operationId' => 'Projects_GetJobStatus',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
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
                        'enum' => ['2014-04-01-preview']
                    ],
                    [
                        'name' => 'rootResourceName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'resourceName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'subContainerName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'operation',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'jobId',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'string',
                        'format' => 'uuid'
                    ]
                ],
                'responses' => [
                    '200' => ['schema' => ['$ref' => '#/definitions/ProjectResource']],
                    '202' => []
                ]
            ]]
        ],
        'definitions' => [
            'AccountResource' => [
                'properties' => ['properties' => [
                    'type' => 'object',
                    'additionalProperties' => ['type' => 'string']
                ]],
                'required' => []
            ],
            'AccountResourceListResult' => [
                'properties' => ['value' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/AccountResource']
                ]],
                'required' => []
            ],
            'AccountResourceRequest' => [
                'properties' => [
                    'accountName' => ['type' => 'string'],
                    'location' => ['type' => 'string'],
                    'operationType' => ['type' => 'object'],
                    'properties' => [
                        'type' => 'object',
                        'additionalProperties' => ['type' => 'string']
                    ],
                    'tags' => [
                        'type' => 'object',
                        'additionalProperties' => ['type' => 'string']
                    ]
                ],
                'required' => []
            ],
            'CheckNameAvailabilityParameter' => [
                'properties' => [
                    'resourceName' => ['type' => 'string'],
                    'resourceType' => ['type' => 'string']
                ],
                'required' => []
            ],
            'CheckNameAvailabilityResult' => [
                'properties' => [
                    'message' => ['type' => 'string'],
                    'nameAvailable' => ['type' => 'boolean']
                ],
                'required' => []
            ],
            'ExtensionResourcePlan' => [
                'properties' => [
                    'name' => ['type' => 'string'],
                    'product' => ['type' => 'string'],
                    'promotionCode' => ['type' => 'string'],
                    'publisher' => ['type' => 'string'],
                    'version' => ['type' => 'string']
                ],
                'required' => []
            ],
            'ExtensionResource' => [
                'properties' => [
                    'plan' => ['$ref' => '#/definitions/ExtensionResourcePlan'],
                    'properties' => [
                        'type' => 'object',
                        'additionalProperties' => ['type' => 'string']
                    ]
                ],
                'required' => []
            ],
            'ExtensionResourceListResult' => [
                'properties' => ['value' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/ExtensionResource']
                ]],
                'required' => []
            ],
            'ExtensionResourceRequest' => [
                'properties' => [
                    'location' => ['type' => 'string'],
                    'plan' => ['$ref' => '#/definitions/ExtensionResourcePlan'],
                    'properties' => [
                        'type' => 'object',
                        'additionalProperties' => ['type' => 'string']
                    ],
                    'tags' => [
                        'type' => 'object',
                        'additionalProperties' => ['type' => 'string']
                    ]
                ],
                'required' => []
            ],
            'OperationProperties' => [
                'properties' => [
                    'description' => ['type' => 'string'],
                    'operation' => ['type' => 'string'],
                    'provider' => ['type' => 'string'],
                    'resource' => ['type' => 'string']
                ],
                'required' => []
            ],
            'Operation' => [
                'properties' => [
                    'display' => ['$ref' => '#/definitions/OperationProperties'],
                    'name' => ['type' => 'string']
                ],
                'required' => []
            ],
            'OperationListResult' => [
                'properties' => ['value' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/Operation']
                ]],
                'required' => []
            ],
            'Resource' => [
                'properties' => [
                    'id' => ['type' => 'string'],
                    'location' => ['type' => 'string'],
                    'name' => ['type' => 'string'],
                    'tags' => [
                        'type' => 'object',
                        'additionalProperties' => ['type' => 'string']
                    ],
                    'type' => ['type' => 'string']
                ],
                'required' => []
            ],
            'ProjectResource' => [
                'properties' => ['properties' => [
                    'type' => 'object',
                    'additionalProperties' => ['type' => 'string']
                ]],
                'required' => []
            ],
            'ProjectResourceListResult' => [
                'properties' => ['value' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/ProjectResource']
                ]],
                'required' => []
            ]
        ]
    ];
}
