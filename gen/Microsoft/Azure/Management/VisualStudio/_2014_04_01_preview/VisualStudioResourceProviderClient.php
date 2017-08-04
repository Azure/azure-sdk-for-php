<?php
namespace Microsoft\Azure\Management\VisualStudio\_2014_04_01_preview;
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
        $this->_Operations_group = new \Microsoft\Azure\Management\VisualStudio\_2014_04_01_preview\Operations($_client);
        $this->_Accounts_group = new \Microsoft\Azure\Management\VisualStudio\_2014_04_01_preview\Accounts($_client);
        $this->_Extensions_group = new \Microsoft\Azure\Management\VisualStudio\_2014_04_01_preview\Extensions($_client);
    }
    /**
     * @return \Microsoft\Azure\Management\VisualStudio\_2014_04_01_preview\Operations
     */
    public function getOperations()
    {
        return $this->_Operations_group;
    }
    /**
     * @return \Microsoft\Azure\Management\VisualStudio\_2014_04_01_preview\Accounts
     */
    public function getAccounts()
    {
        return $this->_Accounts_group;
    }
    /**
     * @return \Microsoft\Azure\Management\VisualStudio\_2014_04_01_preview\Extensions
     */
    public function getExtensions()
    {
        return $this->_Extensions_group;
    }
    /**
     * @var \Microsoft\Azure\Management\VisualStudio\_2014_04_01_preview\Operations
     */
    private $_Operations_group;
    /**
     * @var \Microsoft\Azure\Management\VisualStudio\_2014_04_01_preview\Accounts
     */
    private $_Accounts_group;
    /**
     * @var \Microsoft\Azure\Management\VisualStudio\_2014_04_01_preview\Extensions
     */
    private $_Extensions_group;
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
                        '$ref' => '#/definitions/CheckNameAvailabilityParameter'
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
                            '$ref' => '#/definitions/AccountResourceRequest'
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
                            '$ref' => '#/definitions/ExtensionResourceRequest'
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
                            '$ref' => '#/definitions/ExtensionResourceRequest'
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
            ]
        ],
        'definitions' => [
            'AccountResource' => ['properties' => ['properties' => [
                'type' => 'object',
                'additionalProperties' => ['type' => 'string']
            ]]],
            'AccountResourceListResult' => ['properties' => ['value' => [
                'type' => 'array',
                'items' => ['$ref' => '#/definitions/AccountResource']
            ]]],
            'AccountResourceRequest' => ['properties' => [
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
            ]],
            'CheckNameAvailabilityParameter' => ['properties' => [
                'resourceName' => ['type' => 'string'],
                'resourceType' => ['type' => 'string']
            ]],
            'CheckNameAvailabilityResult' => ['properties' => [
                'message' => ['type' => 'string'],
                'nameAvailable' => ['type' => 'boolean']
            ]],
            'ExtensionResourcePlan' => ['properties' => [
                'name' => ['type' => 'string'],
                'product' => ['type' => 'string'],
                'promotionCode' => ['type' => 'string'],
                'publisher' => ['type' => 'string'],
                'version' => ['type' => 'string']
            ]],
            'ExtensionResource' => ['properties' => ['plan' => ['$ref' => '#/definitions/ExtensionResourcePlan']]],
            'ExtensionResourceListResult' => ['properties' => ['value' => [
                'type' => 'array',
                'items' => ['$ref' => '#/definitions/ExtensionResource']
            ]]],
            'ExtensionResourceRequest' => ['properties' => [
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
            ]],
            'OperationProperties' => ['properties' => [
                'description' => ['type' => 'string'],
                'operation' => ['type' => 'string'],
                'provider' => ['type' => 'string'],
                'resource' => ['type' => 'string']
            ]],
            'Operation' => ['properties' => [
                'display' => ['$ref' => '#/definitions/OperationProperties'],
                'name' => ['type' => 'string']
            ]],
            'OperationListResult' => ['properties' => ['value' => [
                'type' => 'array',
                'items' => ['$ref' => '#/definitions/Operation']
            ]]],
            'Resource' => ['properties' => [
                'id' => ['type' => 'string'],
                'location' => ['type' => 'string'],
                'name' => ['type' => 'string'],
                'tags' => [
                    'type' => 'object',
                    'additionalProperties' => ['type' => 'string']
                ],
                'type' => ['type' => 'string']
            ]]
        ]
    ];
}
