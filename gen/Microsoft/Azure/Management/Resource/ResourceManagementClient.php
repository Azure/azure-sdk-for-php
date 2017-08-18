<?php
namespace Microsoft\Azure\Management\Resource;
final class ResourceManagementClient
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
        $this->_Deployments_group = new \Microsoft\Azure\Management\Resource\Deployments($_client);
        $this->_Providers_group = new \Microsoft\Azure\Management\Resource\Providers($_client);
        $this->_Resources_group = new \Microsoft\Azure\Management\Resource\Resources($_client);
        $this->_ResourceGroups_group = new \Microsoft\Azure\Management\Resource\ResourceGroups($_client);
        $this->_Tags_group = new \Microsoft\Azure\Management\Resource\Tags($_client);
        $this->_DeploymentOperations_group = new \Microsoft\Azure\Management\Resource\DeploymentOperations($_client);
    }
    /**
     * @return \Microsoft\Azure\Management\Resource\Deployments
     */
    public function getDeployments()
    {
        return $this->_Deployments_group;
    }
    /**
     * @return \Microsoft\Azure\Management\Resource\Providers
     */
    public function getProviders()
    {
        return $this->_Providers_group;
    }
    /**
     * @return \Microsoft\Azure\Management\Resource\Resources
     */
    public function getResources()
    {
        return $this->_Resources_group;
    }
    /**
     * @return \Microsoft\Azure\Management\Resource\ResourceGroups
     */
    public function getResourceGroups()
    {
        return $this->_ResourceGroups_group;
    }
    /**
     * @return \Microsoft\Azure\Management\Resource\Tags
     */
    public function getTags()
    {
        return $this->_Tags_group;
    }
    /**
     * @return \Microsoft\Azure\Management\Resource\DeploymentOperations
     */
    public function getDeploymentOperations()
    {
        return $this->_DeploymentOperations_group;
    }
    /**
     * @var \Microsoft\Azure\Management\Resource\Deployments
     */
    private $_Deployments_group;
    /**
     * @var \Microsoft\Azure\Management\Resource\Providers
     */
    private $_Providers_group;
    /**
     * @var \Microsoft\Azure\Management\Resource\Resources
     */
    private $_Resources_group;
    /**
     * @var \Microsoft\Azure\Management\Resource\ResourceGroups
     */
    private $_ResourceGroups_group;
    /**
     * @var \Microsoft\Azure\Management\Resource\Tags
     */
    private $_Tags_group;
    /**
     * @var \Microsoft\Azure\Management\Resource\DeploymentOperations
     */
    private $_DeploymentOperations_group;
    const _SWAGGER_OBJECT_DATA = [
        'host' => 'management.azure.com',
        'paths' => [
            '/subscriptions/{subscriptionId}/resourcegroups/{resourceGroupName}/providers/Microsoft.Resources/deployments/{deploymentName}' => [
                'delete' => [
                    'operationId' => 'Deployments_Delete',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'deploymentName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-05-10']
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
                ],
                'head' => [
                    'operationId' => 'Deployments_CheckExistence',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'deploymentName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-05-10']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => [
                        '204' => [],
                        '404' => []
                    ]
                ],
                'put' => [
                    'operationId' => 'Deployments_CreateOrUpdate',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'deploymentName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'parameters',
                            'in' => 'body',
                            'required' => TRUE,
                            'schema' => ['$ref' => '#/definitions/Deployment']
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-05-10']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => [
                        '200' => ['schema' => ['$ref' => '#/definitions/DeploymentExtended']],
                        '201' => ['schema' => ['$ref' => '#/definitions/DeploymentExtended']]
                    ]
                ],
                'get' => [
                    'operationId' => 'Deployments_Get',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'deploymentName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-05-10']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/DeploymentExtended']]]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourcegroups/{resourceGroupName}/providers/Microsoft.Resources/deployments/{deploymentName}/cancel' => ['post' => [
                'operationId' => 'Deployments_Cancel',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'deploymentName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-05-10']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['204' => []]
            ]],
            '/subscriptions/{subscriptionId}/resourcegroups/{resourceGroupName}/providers/Microsoft.Resources/deployments/{deploymentName}/validate' => ['post' => [
                'operationId' => 'Deployments_Validate',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'deploymentName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'parameters',
                        'in' => 'body',
                        'required' => TRUE,
                        'schema' => ['$ref' => '#/definitions/Deployment']
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-05-10']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => [
                    '200' => ['schema' => ['$ref' => '#/definitions/DeploymentValidateResult']],
                    '400' => ['schema' => ['$ref' => '#/definitions/DeploymentValidateResult']]
                ]
            ]],
            '/subscriptions/{subscriptionId}/resourcegroups/{resourceGroupName}/providers/Microsoft.Resources/deployments/{deploymentName}/exportTemplate' => ['post' => [
                'operationId' => 'Deployments_ExportTemplate',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'deploymentName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-05-10']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/DeploymentExportResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourcegroups/{resourceGroupName}/providers/Microsoft.Resources/deployments/' => ['get' => [
                'operationId' => 'Deployments_ListByResourceGroup',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => '$filter',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'string'
                    ],
                    [
                        'name' => '$top',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-05-10']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/DeploymentListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/providers/{resourceProviderNamespace}/unregister' => ['post' => [
                'operationId' => 'Providers_Unregister',
                'parameters' => [
                    [
                        'name' => 'resourceProviderNamespace',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-05-10']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/Provider']]]
            ]],
            '/subscriptions/{subscriptionId}/providers/{resourceProviderNamespace}/register' => ['post' => [
                'operationId' => 'Providers_Register',
                'parameters' => [
                    [
                        'name' => 'resourceProviderNamespace',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-05-10']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/Provider']]]
            ]],
            '/subscriptions/{subscriptionId}/providers' => ['get' => [
                'operationId' => 'Providers_List',
                'parameters' => [
                    [
                        'name' => '$top',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    [
                        'name' => '$expand',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-05-10']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/ProviderListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/providers/{resourceProviderNamespace}' => ['get' => [
                'operationId' => 'Providers_Get',
                'parameters' => [
                    [
                        'name' => '$expand',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'resourceProviderNamespace',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-05-10']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/Provider']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/resources' => ['get' => [
                'operationId' => 'Resources_ListByResourceGroup',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => '$filter',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'string'
                    ],
                    [
                        'name' => '$expand',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'string'
                    ],
                    [
                        'name' => '$top',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-05-10']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/ResourceListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{sourceResourceGroupName}/moveResources' => ['post' => [
                'operationId' => 'Resources_MoveResources',
                'parameters' => [
                    [
                        'name' => 'sourceResourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'parameters',
                        'in' => 'body',
                        'required' => TRUE,
                        'schema' => ['$ref' => '#/definitions/ResourcesMoveInfo']
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-05-10']
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
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{sourceResourceGroupName}/validateMoveResources' => ['post' => [
                'operationId' => 'Resources_ValidateMoveResources',
                'parameters' => [
                    [
                        'name' => 'sourceResourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'parameters',
                        'in' => 'body',
                        'required' => TRUE,
                        'schema' => ['$ref' => '#/definitions/ResourcesMoveInfo']
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-05-10']
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
                    '204' => [],
                    '409' => []
                ]
            ]],
            '/subscriptions/{subscriptionId}/resources' => ['get' => [
                'operationId' => 'Resources_List',
                'parameters' => [
                    [
                        'name' => '$filter',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'string'
                    ],
                    [
                        'name' => '$expand',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'string'
                    ],
                    [
                        'name' => '$top',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-05-10']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/ResourceListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourcegroups/{resourceGroupName}/providers/{resourceProviderNamespace}/{parentResourcePath}/{resourceType}/{resourceName}' => [
                'head' => [
                    'operationId' => 'Resources_CheckExistence',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'resourceProviderNamespace',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'parentResourcePath',
                            'in' => 'path',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'resourceType',
                            'in' => 'path',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'resourceName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-05-10']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => [
                        '204' => [],
                        '404' => []
                    ]
                ],
                'delete' => [
                    'operationId' => 'Resources_Delete',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'resourceProviderNamespace',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'parentResourcePath',
                            'in' => 'path',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'resourceType',
                            'in' => 'path',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'resourceName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-05-10']
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
                'put' => [
                    'operationId' => 'Resources_CreateOrUpdate',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'resourceProviderNamespace',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'parentResourcePath',
                            'in' => 'path',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'resourceType',
                            'in' => 'path',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'resourceName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-05-10']
                        ],
                        [
                            'name' => 'parameters',
                            'in' => 'body',
                            'required' => TRUE,
                            'schema' => ['$ref' => '#/definitions/GenericResource']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => [
                        '201' => ['schema' => ['$ref' => '#/definitions/GenericResource']],
                        '200' => ['schema' => ['$ref' => '#/definitions/GenericResource']],
                        '202' => []
                    ]
                ],
                'get' => [
                    'operationId' => 'Resources_Get',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'resourceProviderNamespace',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'parentResourcePath',
                            'in' => 'path',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'resourceType',
                            'in' => 'path',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'resourceName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-05-10']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/GenericResource']]]
                ]
            ],
            '/{resourceId}' => [
                'head' => [
                    'operationId' => 'Resources_CheckExistenceById',
                    'parameters' => [
                        [
                            'name' => 'resourceId',
                            'in' => 'path',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-05-10']
                        ]
                    ],
                    'responses' => [
                        '204' => [],
                        '404' => []
                    ]
                ],
                'delete' => [
                    'operationId' => 'Resources_DeleteById',
                    'parameters' => [
                        [
                            'name' => 'resourceId',
                            'in' => 'path',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-05-10']
                        ]
                    ],
                    'responses' => [
                        '200' => [],
                        '204' => [],
                        '202' => []
                    ]
                ],
                'put' => [
                    'operationId' => 'Resources_CreateOrUpdateById',
                    'parameters' => [
                        [
                            'name' => 'resourceId',
                            'in' => 'path',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-05-10']
                        ],
                        [
                            'name' => 'parameters',
                            'in' => 'body',
                            'required' => TRUE,
                            'schema' => ['$ref' => '#/definitions/GenericResource']
                        ]
                    ],
                    'responses' => [
                        '201' => ['schema' => ['$ref' => '#/definitions/GenericResource']],
                        '200' => ['schema' => ['$ref' => '#/definitions/GenericResource']],
                        '202' => []
                    ]
                ],
                'get' => [
                    'operationId' => 'Resources_GetById',
                    'parameters' => [
                        [
                            'name' => 'resourceId',
                            'in' => 'path',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-05-10']
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/GenericResource']]]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourcegroups/{resourceGroupName}' => [
                'head' => [
                    'operationId' => 'ResourceGroups_CheckExistence',
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
                            'enum' => ['2017-05-10']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => [
                        '204' => [],
                        '404' => []
                    ]
                ],
                'put' => [
                    'operationId' => 'ResourceGroups_CreateOrUpdate',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'parameters',
                            'in' => 'body',
                            'required' => TRUE,
                            'schema' => ['$ref' => '#/definitions/ResourceGroup']
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-05-10']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => [
                        '201' => ['schema' => ['$ref' => '#/definitions/ResourceGroup']],
                        '200' => ['schema' => ['$ref' => '#/definitions/ResourceGroup']]
                    ]
                ],
                'delete' => [
                    'operationId' => 'ResourceGroups_Delete',
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
                            'enum' => ['2017-05-10']
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
                        '200' => []
                    ]
                ],
                'get' => [
                    'operationId' => 'ResourceGroups_Get',
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
                            'enum' => ['2017-05-10']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/ResourceGroup']]]
                ],
                'patch' => [
                    'operationId' => 'ResourceGroups_Update',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'parameters',
                            'in' => 'body',
                            'required' => TRUE,
                            'schema' => ['$ref' => '#/definitions/ResourceGroupPatchable']
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-05-10']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/ResourceGroup']]]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourcegroups/{resourceGroupName}/exportTemplate' => ['post' => [
                'operationId' => 'ResourceGroups_ExportTemplate',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'parameters',
                        'in' => 'body',
                        'required' => TRUE,
                        'schema' => ['$ref' => '#/definitions/ExportTemplateRequest']
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-05-10']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/ResourceGroupExportResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourcegroups' => ['get' => [
                'operationId' => 'ResourceGroups_List',
                'parameters' => [
                    [
                        'name' => '$filter',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'string'
                    ],
                    [
                        'name' => '$top',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-05-10']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/ResourceGroupListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/tagNames/{tagName}/tagValues/{tagValue}' => [
                'delete' => [
                    'operationId' => 'Tags_DeleteValue',
                    'parameters' => [
                        [
                            'name' => 'tagName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'tagValue',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-05-10']
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
                'put' => [
                    'operationId' => 'Tags_CreateOrUpdateValue',
                    'parameters' => [
                        [
                            'name' => 'tagName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'tagValue',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-05-10']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => [
                        '200' => ['schema' => ['$ref' => '#/definitions/TagValue']],
                        '201' => ['schema' => ['$ref' => '#/definitions/TagValue']]
                    ]
                ]
            ],
            '/subscriptions/{subscriptionId}/tagNames/{tagName}' => [
                'put' => [
                    'operationId' => 'Tags_CreateOrUpdate',
                    'parameters' => [
                        [
                            'name' => 'tagName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-05-10']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => [
                        '200' => ['schema' => ['$ref' => '#/definitions/TagDetails']],
                        '201' => ['schema' => ['$ref' => '#/definitions/TagDetails']]
                    ]
                ],
                'delete' => [
                    'operationId' => 'Tags_Delete',
                    'parameters' => [
                        [
                            'name' => 'tagName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-05-10']
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
            '/subscriptions/{subscriptionId}/tagNames' => ['get' => [
                'operationId' => 'Tags_List',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-05-10']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/TagsListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourcegroups/{resourceGroupName}/deployments/{deploymentName}/operations/{operationId}' => ['get' => [
                'operationId' => 'DeploymentOperations_Get',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'deploymentName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'operationId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-05-10']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/DeploymentOperation']]]
            ]],
            '/subscriptions/{subscriptionId}/resourcegroups/{resourceGroupName}/deployments/{deploymentName}/operations' => ['get' => [
                'operationId' => 'DeploymentOperations_List',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'deploymentName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => '$top',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-05-10']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/DeploymentOperationsListResult']]]
            ]]
        ],
        'definitions' => [
            'DeploymentExtendedFilter' => [
                'properties' => ['provisioningState' => ['type' => 'string']],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'GenericResourceFilter' => [
                'properties' => [
                    'resourceType' => ['type' => 'string'],
                    'tagname' => ['type' => 'string'],
                    'tagvalue' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'ResourceGroupFilter' => [
                'properties' => [
                    'tagName' => ['type' => 'string'],
                    'tagValue' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'TemplateLink' => [
                'properties' => [
                    'uri' => ['type' => 'string'],
                    'contentVersion' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => ['uri']
            ],
            'ParametersLink' => [
                'properties' => [
                    'uri' => ['type' => 'string'],
                    'contentVersion' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => ['uri']
            ],
            'DebugSetting' => [
                'properties' => ['detailLevel' => ['type' => 'string']],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'DeploymentProperties' => [
                'properties' => [
                    'template' => ['type' => 'object'],
                    'templateLink' => ['$ref' => '#/definitions/TemplateLink'],
                    'parameters' => ['type' => 'object'],
                    'parametersLink' => ['$ref' => '#/definitions/ParametersLink'],
                    'mode' => [
                        'type' => 'string',
                        'enum' => [
                            'Incremental',
                            'Complete'
                        ]
                    ],
                    'debugSetting' => ['$ref' => '#/definitions/DebugSetting']
                ],
                'additionalProperties' => FALSE,
                'required' => ['mode']
            ],
            'Deployment' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/DeploymentProperties']],
                'additionalProperties' => FALSE,
                'required' => ['properties']
            ],
            'DeploymentExportResult' => [
                'properties' => ['template' => ['type' => 'object']],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'ResourceManagementErrorWithDetails' => [
                'properties' => [
                    'code' => [
                        'type' => 'string',
                        'readOnly' => TRUE
                    ],
                    'message' => [
                        'type' => 'string',
                        'readOnly' => TRUE
                    ],
                    'target' => [
                        'type' => 'string',
                        'readOnly' => TRUE
                    ],
                    'details' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/ResourceManagementErrorWithDetails'],
                        'readOnly' => TRUE
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'AliasPathType' => [
                'properties' => [
                    'path' => ['type' => 'string'],
                    'apiVersions' => [
                        'type' => 'array',
                        'items' => ['type' => 'string']
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'AliasType' => [
                'properties' => [
                    'name' => ['type' => 'string'],
                    'paths' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/AliasPathType']
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'ProviderResourceType' => [
                'properties' => [
                    'resourceType' => ['type' => 'string'],
                    'locations' => [
                        'type' => 'array',
                        'items' => ['type' => 'string']
                    ],
                    'aliases' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/AliasType']
                    ],
                    'apiVersions' => [
                        'type' => 'array',
                        'items' => ['type' => 'string']
                    ],
                    'properties' => [
                        'type' => 'object',
                        'additionalProperties' => ['type' => 'string']
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'Provider' => [
                'properties' => [
                    'id' => [
                        'type' => 'string',
                        'readOnly' => TRUE
                    ],
                    'namespace' => ['type' => 'string'],
                    'registrationState' => [
                        'type' => 'string',
                        'readOnly' => TRUE
                    ],
                    'resourceTypes' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/ProviderResourceType'],
                        'readOnly' => TRUE
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'BasicDependency' => [
                'properties' => [
                    'id' => ['type' => 'string'],
                    'resourceType' => ['type' => 'string'],
                    'resourceName' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'Dependency' => [
                'properties' => [
                    'dependsOn' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/BasicDependency']
                    ],
                    'id' => ['type' => 'string'],
                    'resourceType' => ['type' => 'string'],
                    'resourceName' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'DeploymentPropertiesExtended' => [
                'properties' => [
                    'provisioningState' => [
                        'type' => 'string',
                        'readOnly' => TRUE
                    ],
                    'correlationId' => [
                        'type' => 'string',
                        'readOnly' => TRUE
                    ],
                    'timestamp' => [
                        'type' => 'string',
                        'format' => 'date-time',
                        'readOnly' => TRUE
                    ],
                    'outputs' => ['type' => 'object'],
                    'providers' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/Provider']
                    ],
                    'dependencies' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/Dependency']
                    ],
                    'template' => ['type' => 'object'],
                    'templateLink' => ['$ref' => '#/definitions/TemplateLink'],
                    'parameters' => ['type' => 'object'],
                    'parametersLink' => ['$ref' => '#/definitions/ParametersLink'],
                    'mode' => [
                        'type' => 'string',
                        'enum' => [
                            'Incremental',
                            'Complete'
                        ]
                    ],
                    'debugSetting' => ['$ref' => '#/definitions/DebugSetting']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'DeploymentValidateResult' => [
                'properties' => [
                    'error' => ['$ref' => '#/definitions/ResourceManagementErrorWithDetails'],
                    'properties' => ['$ref' => '#/definitions/DeploymentPropertiesExtended']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'DeploymentExtended' => [
                'properties' => [
                    'id' => ['type' => 'string'],
                    'name' => ['type' => 'string'],
                    'properties' => ['$ref' => '#/definitions/DeploymentPropertiesExtended']
                ],
                'additionalProperties' => FALSE,
                'required' => ['name']
            ],
            'DeploymentListResult' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/DeploymentExtended']
                    ],
                    'nextLink' => [
                        'type' => 'string',
                        'readOnly' => TRUE
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'ProviderListResult' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/Provider']
                    ],
                    'nextLink' => [
                        'type' => 'string',
                        'readOnly' => TRUE
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'Plan' => [
                'properties' => [
                    'name' => ['type' => 'string'],
                    'publisher' => ['type' => 'string'],
                    'product' => ['type' => 'string'],
                    'promotionCode' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'Sku' => [
                'properties' => [
                    'name' => ['type' => 'string'],
                    'tier' => ['type' => 'string'],
                    'size' => ['type' => 'string'],
                    'family' => ['type' => 'string'],
                    'model' => ['type' => 'string'],
                    'capacity' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'Identity' => [
                'properties' => [
                    'principalId' => [
                        'type' => 'string',
                        'readOnly' => TRUE
                    ],
                    'tenantId' => [
                        'type' => 'string',
                        'readOnly' => TRUE
                    ],
                    'type' => [
                        'type' => 'string',
                        'enum' => ['SystemAssigned']
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'GenericResource' => [
                'properties' => [
                    'plan' => ['$ref' => '#/definitions/Plan'],
                    'properties' => ['type' => 'object'],
                    'kind' => ['type' => 'string'],
                    'managedBy' => ['type' => 'string'],
                    'sku' => ['$ref' => '#/definitions/Sku'],
                    'identity' => ['$ref' => '#/definitions/Identity']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'ResourceListResult' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/GenericResource']
                    ],
                    'nextLink' => [
                        'type' => 'string',
                        'readOnly' => TRUE
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'ResourceGroupProperties' => [
                'properties' => ['provisioningState' => [
                    'type' => 'string',
                    'readOnly' => TRUE
                ]],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'ResourceGroup' => [
                'properties' => [
                    'id' => [
                        'type' => 'string',
                        'readOnly' => TRUE
                    ],
                    'name' => ['type' => 'string'],
                    'properties' => ['$ref' => '#/definitions/ResourceGroupProperties'],
                    'location' => ['type' => 'string'],
                    'managedBy' => ['type' => 'string'],
                    'tags' => [
                        'type' => 'object',
                        'additionalProperties' => ['type' => 'string']
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => ['location']
            ],
            'ResourceGroupPatchable' => [
                'properties' => [
                    'name' => ['type' => 'string'],
                    'properties' => ['$ref' => '#/definitions/ResourceGroupProperties'],
                    'managedBy' => ['type' => 'string'],
                    'tags' => [
                        'type' => 'object',
                        'additionalProperties' => ['type' => 'string']
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'ResourceGroupListResult' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/ResourceGroup']
                    ],
                    'nextLink' => [
                        'type' => 'string',
                        'readOnly' => TRUE
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'ResourcesMoveInfo' => [
                'properties' => [
                    'resources' => [
                        'type' => 'array',
                        'items' => ['type' => 'string']
                    ],
                    'targetResourceGroup' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'ExportTemplateRequest' => [
                'properties' => [
                    'resources' => [
                        'type' => 'array',
                        'items' => ['type' => 'string']
                    ],
                    'options' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'TagCount' => [
                'properties' => [
                    'type' => ['type' => 'string'],
                    'value' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'TagValue' => [
                'properties' => [
                    'id' => ['type' => 'string'],
                    'tagValue' => ['type' => 'string'],
                    'count' => ['$ref' => '#/definitions/TagCount']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'TagDetails' => [
                'properties' => [
                    'id' => ['type' => 'string'],
                    'tagName' => ['type' => 'string'],
                    'count' => ['$ref' => '#/definitions/TagCount'],
                    'values' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/TagValue']
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'TagsListResult' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/TagDetails']
                    ],
                    'nextLink' => [
                        'type' => 'string',
                        'readOnly' => TRUE
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'TargetResource' => [
                'properties' => [
                    'id' => ['type' => 'string'],
                    'resourceName' => ['type' => 'string'],
                    'resourceType' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'HttpMessage' => [
                'properties' => ['content' => ['type' => 'object']],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'DeploymentOperationProperties' => [
                'properties' => [
                    'provisioningState' => [
                        'type' => 'string',
                        'readOnly' => TRUE
                    ],
                    'timestamp' => [
                        'type' => 'string',
                        'format' => 'date-time',
                        'readOnly' => TRUE
                    ],
                    'serviceRequestId' => [
                        'type' => 'string',
                        'readOnly' => TRUE
                    ],
                    'statusCode' => [
                        'type' => 'string',
                        'readOnly' => TRUE
                    ],
                    'statusMessage' => [
                        'type' => 'object',
                        'readOnly' => TRUE
                    ],
                    'targetResource' => [
                        '$ref' => '#/definitions/TargetResource',
                        'readOnly' => TRUE
                    ],
                    'request' => [
                        '$ref' => '#/definitions/HttpMessage',
                        'readOnly' => TRUE
                    ],
                    'response' => [
                        '$ref' => '#/definitions/HttpMessage',
                        'readOnly' => TRUE
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'DeploymentOperation' => [
                'properties' => [
                    'id' => [
                        'type' => 'string',
                        'readOnly' => TRUE
                    ],
                    'operationId' => [
                        'type' => 'string',
                        'readOnly' => TRUE
                    ],
                    'properties' => ['$ref' => '#/definitions/DeploymentOperationProperties']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'DeploymentOperationsListResult' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/DeploymentOperation']
                    ],
                    'nextLink' => [
                        'type' => 'string',
                        'readOnly' => TRUE
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'ResourceProviderOperationDisplayProperties' => [
                'properties' => [
                    'publisher' => ['type' => 'string'],
                    'provider' => ['type' => 'string'],
                    'resource' => ['type' => 'string'],
                    'operation' => ['type' => 'string'],
                    'description' => ['type' => 'string']
                ],
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
                'required' => []
            ],
            'SubResource' => [
                'properties' => ['id' => ['type' => 'string']],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'ResourceGroupExportResult' => [
                'properties' => [
                    'template' => ['type' => 'object'],
                    'error' => ['$ref' => '#/definitions/ResourceManagementErrorWithDetails']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ]
        ]
    ];
}
