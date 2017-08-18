<?php
namespace Microsoft\Azure\Management\Cdn;
final class CdnManagementClient
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
        $this->_Profiles_group = new \Microsoft\Azure\Management\Cdn\Profiles($_client);
        $this->_Endpoints_group = new \Microsoft\Azure\Management\Cdn\Endpoints($_client);
        $this->_Origins_group = new \Microsoft\Azure\Management\Cdn\Origins($_client);
        $this->_CustomDomains_group = new \Microsoft\Azure\Management\Cdn\CustomDomains($_client);
        $this->_EdgeNodes_group = new \Microsoft\Azure\Management\Cdn\EdgeNodes($_client);
        $this->_CheckNameAvailability_operation = $_client->createOperation('CheckNameAvailability');
        $this->_ListResourceUsage_operation = $_client->createOperation('ListResourceUsage');
        $this->_ListOperations_operation = $_client->createOperation('ListOperations');
    }
    /**
     * @return \Microsoft\Azure\Management\Cdn\Profiles
     */
    public function getProfiles()
    {
        return $this->_Profiles_group;
    }
    /**
     * @return \Microsoft\Azure\Management\Cdn\Endpoints
     */
    public function getEndpoints()
    {
        return $this->_Endpoints_group;
    }
    /**
     * @return \Microsoft\Azure\Management\Cdn\Origins
     */
    public function getOrigins()
    {
        return $this->_Origins_group;
    }
    /**
     * @return \Microsoft\Azure\Management\Cdn\CustomDomains
     */
    public function getCustomDomains()
    {
        return $this->_CustomDomains_group;
    }
    /**
     * @return \Microsoft\Azure\Management\Cdn\EdgeNodes
     */
    public function getEdgeNodes()
    {
        return $this->_EdgeNodes_group;
    }
    /**
     * Check the availability of a resource name. This is needed for resources where name is globally unique, such as a CDN endpoint.
     * @param array $checkNameAvailabilityInput
     * @return array
     */
    public function checkNameAvailability(array $checkNameAvailabilityInput)
    {
        return $this->_CheckNameAvailability_operation->call(['checkNameAvailabilityInput' => $checkNameAvailabilityInput]);
    }
    /**
     * Check the quota and actual usage of the CDN profiles under the given subscription.
     * @return array
     */
    public function listResourceUsage()
    {
        return $this->_ListResourceUsage_operation->call([]);
    }
    /**
     * Lists all of the available CDN REST API operations.
     * @return array
     */
    public function listOperations()
    {
        return $this->_ListOperations_operation->call([]);
    }
    /**
     * @var \Microsoft\Azure\Management\Cdn\Profiles
     */
    private $_Profiles_group;
    /**
     * @var \Microsoft\Azure\Management\Cdn\Endpoints
     */
    private $_Endpoints_group;
    /**
     * @var \Microsoft\Azure\Management\Cdn\Origins
     */
    private $_Origins_group;
    /**
     * @var \Microsoft\Azure\Management\Cdn\CustomDomains
     */
    private $_CustomDomains_group;
    /**
     * @var \Microsoft\Azure\Management\Cdn\EdgeNodes
     */
    private $_EdgeNodes_group;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_CheckNameAvailability_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListResourceUsage_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListOperations_operation;
    const _SWAGGER_OBJECT_DATA = [
        'host' => 'management.azure.com',
        'paths' => [
            '/subscriptions/{subscriptionId}/providers/Microsoft.Cdn/profiles' => ['get' => [
                'operationId' => 'Profiles_List',
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
                        'enum' => ['2016-10-02']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/ProfileListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Cdn/profiles' => ['get' => [
                'operationId' => 'Profiles_ListByResourceGroup',
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
                        'enum' => ['2016-10-02']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/ProfileListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Cdn/profiles/{profileName}' => [
                'get' => [
                    'operationId' => 'Profiles_Get',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'profileName',
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
                            'enum' => ['2016-10-02']
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/Profile']]]
                ],
                'put' => [
                    'operationId' => 'Profiles_Create',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'profileName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'profile',
                            'in' => 'body',
                            'required' => TRUE,
                            'schema' => ['$ref' => '#/definitions/Profile']
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
                            'enum' => ['2016-10-02']
                        ]
                    ],
                    'responses' => [
                        '200' => ['schema' => ['$ref' => '#/definitions/Profile']],
                        '201' => ['schema' => ['$ref' => '#/definitions/Profile']],
                        '202' => ['schema' => ['$ref' => '#/definitions/Profile']]
                    ]
                ],
                'patch' => [
                    'operationId' => 'Profiles_Update',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'profileName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'profileUpdateParameters',
                            'in' => 'body',
                            'required' => TRUE,
                            'schema' => ['$ref' => '#/definitions/ProfileUpdateParameters']
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
                            'enum' => ['2016-10-02']
                        ]
                    ],
                    'responses' => [
                        '200' => ['schema' => ['$ref' => '#/definitions/Profile']],
                        '202' => ['schema' => ['$ref' => '#/definitions/Profile']]
                    ]
                ],
                'delete' => [
                    'operationId' => 'Profiles_Delete',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'profileName',
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
                            'enum' => ['2016-10-02']
                        ]
                    ],
                    'responses' => [
                        '202' => [],
                        '204' => []
                    ]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Cdn/profiles/{profileName}/generateSsoUri' => ['post' => [
                'operationId' => 'Profiles_GenerateSsoUri',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'profileName',
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
                        'enum' => ['2016-10-02']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/SsoUri']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Cdn/profiles/{profileName}/checkResourceUsage' => ['post' => [
                'operationId' => 'Profiles_ListResourceUsage',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'profileName',
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
                        'enum' => ['2016-10-02']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/ResourceUsageListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Cdn/profiles/{profileName}/endpoints' => ['get' => [
                'operationId' => 'Endpoints_ListByProfile',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'profileName',
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
                        'enum' => ['2016-10-02']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/EndpointListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Cdn/profiles/{profileName}/endpoints/{endpointName}' => [
                'get' => [
                    'operationId' => 'Endpoints_Get',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'profileName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'endpointName',
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
                            'enum' => ['2016-10-02']
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/Endpoint']]]
                ],
                'put' => [
                    'operationId' => 'Endpoints_Create',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'profileName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'endpointName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'endpoint',
                            'in' => 'body',
                            'required' => TRUE,
                            'schema' => ['$ref' => '#/definitions/Endpoint']
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
                            'enum' => ['2016-10-02']
                        ]
                    ],
                    'responses' => [
                        '200' => ['schema' => ['$ref' => '#/definitions/Endpoint']],
                        '201' => ['schema' => ['$ref' => '#/definitions/Endpoint']],
                        '202' => ['schema' => ['$ref' => '#/definitions/Endpoint']]
                    ]
                ],
                'patch' => [
                    'operationId' => 'Endpoints_Update',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'profileName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'endpointName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'endpointUpdateProperties',
                            'in' => 'body',
                            'required' => TRUE,
                            'schema' => ['$ref' => '#/definitions/EndpointUpdateParameters']
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
                            'enum' => ['2016-10-02']
                        ]
                    ],
                    'responses' => [
                        '200' => ['schema' => ['$ref' => '#/definitions/Endpoint']],
                        '202' => ['schema' => ['$ref' => '#/definitions/Endpoint']]
                    ]
                ],
                'delete' => [
                    'operationId' => 'Endpoints_Delete',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'profileName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'endpointName',
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
                            'enum' => ['2016-10-02']
                        ]
                    ],
                    'responses' => [
                        '202' => [],
                        '204' => []
                    ]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Cdn/profiles/{profileName}/endpoints/{endpointName}/start' => ['post' => [
                'operationId' => 'Endpoints_Start',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'profileName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'endpointName',
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
                        'enum' => ['2016-10-02']
                    ]
                ],
                'responses' => ['202' => ['schema' => ['$ref' => '#/definitions/Endpoint']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Cdn/profiles/{profileName}/endpoints/{endpointName}/stop' => ['post' => [
                'operationId' => 'Endpoints_Stop',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'profileName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'endpointName',
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
                        'enum' => ['2016-10-02']
                    ]
                ],
                'responses' => ['202' => ['schema' => ['$ref' => '#/definitions/Endpoint']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Cdn/profiles/{profileName}/endpoints/{endpointName}/purge' => ['post' => [
                'operationId' => 'Endpoints_PurgeContent',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'profileName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'endpointName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'contentFilePaths',
                        'in' => 'body',
                        'required' => TRUE,
                        'schema' => ['$ref' => '#/definitions/PurgeParameters']
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
                        'enum' => ['2016-10-02']
                    ]
                ],
                'responses' => ['202' => []]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Cdn/profiles/{profileName}/endpoints/{endpointName}/load' => ['post' => [
                'operationId' => 'Endpoints_LoadContent',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'profileName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'endpointName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'contentFilePaths',
                        'in' => 'body',
                        'required' => TRUE,
                        'schema' => ['$ref' => '#/definitions/LoadParameters']
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
                        'enum' => ['2016-10-02']
                    ]
                ],
                'responses' => ['202' => []]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Cdn/profiles/{profileName}/endpoints/{endpointName}/validateCustomDomain' => ['post' => [
                'operationId' => 'Endpoints_ValidateCustomDomain',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'profileName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'endpointName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'customDomainProperties',
                        'in' => 'body',
                        'required' => TRUE,
                        'schema' => ['$ref' => '#/definitions/ValidateCustomDomainInput']
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
                        'enum' => ['2016-10-02']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/ValidateCustomDomainOutput']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Cdn/profiles/{profileName}/endpoints/{endpointName}/checkResourceUsage' => ['post' => [
                'operationId' => 'Endpoints_ListResourceUsage',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'profileName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'endpointName',
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
                        'enum' => ['2016-10-02']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/ResourceUsageListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Cdn/profiles/{profileName}/endpoints/{endpointName}/origins' => ['get' => [
                'operationId' => 'Origins_ListByEndpoint',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'profileName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'endpointName',
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
                        'enum' => ['2016-10-02']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/OriginListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Cdn/profiles/{profileName}/endpoints/{endpointName}/origins/{originName}' => [
                'get' => [
                    'operationId' => 'Origins_Get',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'profileName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'endpointName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'originName',
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
                            'enum' => ['2016-10-02']
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/Origin']]]
                ],
                'patch' => [
                    'operationId' => 'Origins_Update',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'profileName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'endpointName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'originName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'originUpdateProperties',
                            'in' => 'body',
                            'required' => TRUE,
                            'schema' => ['$ref' => '#/definitions/OriginUpdateParameters']
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
                            'enum' => ['2016-10-02']
                        ]
                    ],
                    'responses' => [
                        '200' => ['schema' => ['$ref' => '#/definitions/Origin']],
                        '202' => ['schema' => ['$ref' => '#/definitions/Origin']]
                    ]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Cdn/profiles/{profileName}/endpoints/{endpointName}/customDomains' => ['get' => [
                'operationId' => 'CustomDomains_ListByEndpoint',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'profileName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'endpointName',
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
                        'enum' => ['2016-10-02']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/CustomDomainListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Cdn/profiles/{profileName}/endpoints/{endpointName}/customDomains/{customDomainName}' => [
                'get' => [
                    'operationId' => 'CustomDomains_Get',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'profileName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'endpointName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'customDomainName',
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
                            'enum' => ['2016-10-02']
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/CustomDomain']]]
                ],
                'put' => [
                    'operationId' => 'CustomDomains_Create',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'profileName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'endpointName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'customDomainName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'customDomainProperties',
                            'in' => 'body',
                            'required' => TRUE,
                            'schema' => ['$ref' => '#/definitions/CustomDomainParameters']
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
                            'enum' => ['2016-10-02']
                        ]
                    ],
                    'responses' => [
                        '200' => ['schema' => ['$ref' => '#/definitions/CustomDomain']],
                        '201' => ['schema' => ['$ref' => '#/definitions/CustomDomain']],
                        '202' => ['schema' => ['$ref' => '#/definitions/CustomDomain']]
                    ]
                ],
                'delete' => [
                    'operationId' => 'CustomDomains_Delete',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'profileName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'endpointName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'customDomainName',
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
                            'enum' => ['2016-10-02']
                        ]
                    ],
                    'responses' => [
                        '200' => [],
                        '202' => ['schema' => ['$ref' => '#/definitions/CustomDomain']],
                        '204' => []
                    ]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Cdn/profiles/{profileName}/endpoints/{endpointName}/customDomains/{customDomainName}/disableCustomHttps' => ['post' => [
                'operationId' => 'CustomDomains_DisableCustomHttps',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'profileName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'endpointName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'customDomainName',
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
                        'enum' => ['2016-10-02']
                    ]
                ],
                'responses' => [
                    '202' => ['schema' => ['$ref' => '#/definitions/CustomDomain']],
                    '200' => []
                ]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Cdn/profiles/{profileName}/endpoints/{endpointName}/customDomains/{customDomainName}/enableCustomHttps' => ['post' => [
                'operationId' => 'CustomDomains_EnableCustomHttps',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'profileName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'endpointName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'customDomainName',
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
                        'enum' => ['2016-10-02']
                    ]
                ],
                'responses' => [
                    '202' => ['schema' => ['$ref' => '#/definitions/CustomDomain']],
                    '200' => []
                ]
            ]],
            '/providers/Microsoft.Cdn/checkNameAvailability' => ['post' => [
                'operationId' => 'CheckNameAvailability',
                'parameters' => [
                    [
                        'name' => 'checkNameAvailabilityInput',
                        'in' => 'body',
                        'required' => TRUE,
                        'schema' => ['$ref' => '#/definitions/CheckNameAvailabilityInput']
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-10-02']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/CheckNameAvailabilityOutput']]]
            ]],
            '/subscriptions/{subscriptionId}/providers/Microsoft.Cdn/checkResourceUsage' => ['post' => [
                'operationId' => 'ListResourceUsage',
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
                        'enum' => ['2016-10-02']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/ResourceUsageListResult']]]
            ]],
            '/providers/Microsoft.Cdn/operations' => ['get' => [
                'operationId' => 'ListOperations',
                'parameters' => [[
                    'name' => 'api-version',
                    'in' => 'query',
                    'required' => TRUE,
                    'type' => 'string',
                    'enum' => ['2016-10-02']
                ]],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/OperationListResult']]]
            ]],
            '/providers/Microsoft.Cdn/edgenodes' => ['get' => [
                'operationId' => 'EdgeNodes_List',
                'parameters' => [[
                    'name' => 'api-version',
                    'in' => 'query',
                    'required' => TRUE,
                    'type' => 'string',
                    'enum' => ['2016-10-02']
                ]],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/EdgenodeResult']]]
            ]]
        ],
        'definitions' => [
            'Sku' => [
                'properties' => ['name' => [
                    'type' => 'string',
                    'enum' => [
                        'Standard_Verizon',
                        'Premium_Verizon',
                        'Custom_Verizon',
                        'Standard_Akamai',
                        'Standard_ChinaCdn'
                    ]
                ]],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'ProfileProperties' => [
                'properties' => [
                    'resourceState' => [
                        'type' => 'string',
                        'enum' => [
                            'Creating',
                            'Active',
                            'Deleting',
                            'Disabled'
                        ],
                        'readOnly' => TRUE
                    ],
                    'provisioningState' => [
                        'type' => 'string',
                        'readOnly' => TRUE
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'Profile' => [
                'properties' => [
                    'sku' => ['$ref' => '#/definitions/Sku'],
                    'properties' => ['$ref' => '#/definitions/ProfileProperties']
                ],
                'additionalProperties' => FALSE,
                'required' => ['sku']
            ],
            'ProfileListResult' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/Profile']
                    ],
                    'nextLink' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'ProfileUpdateParameters' => [
                'properties' => ['tags' => [
                    'type' => 'object',
                    'additionalProperties' => ['type' => 'string']
                ]],
                'additionalProperties' => FALSE,
                'required' => ['tags']
            ],
            'SsoUri' => [
                'properties' => ['ssoUriValue' => ['type' => 'string']],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'DeepCreatedOriginProperties' => [
                'properties' => [
                    'hostName' => ['type' => 'string'],
                    'httpPort' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'httpsPort' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => ['hostName']
            ],
            'DeepCreatedOrigin' => [
                'properties' => [
                    'name' => ['type' => 'string'],
                    'properties' => ['$ref' => '#/definitions/DeepCreatedOriginProperties']
                ],
                'additionalProperties' => FALSE,
                'required' => ['name']
            ],
            'EndpointProperties' => [
                'properties' => [
                    'hostName' => [
                        'type' => 'string',
                        'readOnly' => TRUE
                    ],
                    'origins' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/DeepCreatedOrigin']
                    ],
                    'resourceState' => [
                        'type' => 'string',
                        'enum' => [
                            'Creating',
                            'Deleting',
                            'Running',
                            'Starting',
                            'Stopped',
                            'Stopping'
                        ],
                        'readOnly' => TRUE
                    ],
                    'provisioningState' => [
                        'type' => 'string',
                        'readOnly' => TRUE
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => ['origins']
            ],
            'Endpoint' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/EndpointProperties']],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'EndpointListResult' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/Endpoint']
                    ],
                    'nextLink' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'GeoFilter' => [
                'properties' => [
                    'relativePath' => ['type' => 'string'],
                    'action' => [
                        'type' => 'string',
                        'enum' => [
                            'Block',
                            'Allow'
                        ]
                    ],
                    'countryCodes' => [
                        'type' => 'array',
                        'items' => ['type' => 'string']
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => [
                    'relativePath',
                    'action',
                    'countryCodes'
                ]
            ],
            'EndpointPropertiesUpdateParameters' => [
                'properties' => [
                    'originHostHeader' => ['type' => 'string'],
                    'originPath' => ['type' => 'string'],
                    'contentTypesToCompress' => [
                        'type' => 'array',
                        'items' => ['type' => 'string']
                    ],
                    'isCompressionEnabled' => ['type' => 'boolean'],
                    'isHttpAllowed' => ['type' => 'boolean'],
                    'isHttpsAllowed' => ['type' => 'boolean'],
                    'queryStringCachingBehavior' => [
                        'type' => 'string',
                        'enum' => [
                            'IgnoreQueryString',
                            'BypassCaching',
                            'UseQueryString',
                            'NotSet'
                        ]
                    ],
                    'optimizationType' => ['type' => 'string'],
                    'geoFilters' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/GeoFilter']
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'EndpointUpdateParameters' => [
                'properties' => [
                    'tags' => [
                        'type' => 'object',
                        'additionalProperties' => ['type' => 'string']
                    ],
                    'properties' => ['$ref' => '#/definitions/EndpointPropertiesUpdateParameters']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'PurgeParameters' => [
                'properties' => ['contentPaths' => [
                    'type' => 'array',
                    'items' => ['type' => 'string']
                ]],
                'additionalProperties' => FALSE,
                'required' => ['contentPaths']
            ],
            'LoadParameters' => [
                'properties' => ['contentPaths' => [
                    'type' => 'array',
                    'items' => ['type' => 'string']
                ]],
                'additionalProperties' => FALSE,
                'required' => ['contentPaths']
            ],
            'OriginProperties' => [
                'properties' => [
                    'hostName' => ['type' => 'string'],
                    'httpPort' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'httpsPort' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'resourceState' => [
                        'type' => 'string',
                        'enum' => [
                            'Creating',
                            'Active',
                            'Deleting'
                        ],
                        'readOnly' => TRUE
                    ],
                    'provisioningState' => [
                        'type' => 'string',
                        'readOnly' => TRUE
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => ['hostName']
            ],
            'Origin' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/OriginProperties']],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'OriginPropertiesParameters' => [
                'properties' => [
                    'hostName' => ['type' => 'string'],
                    'httpPort' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'httpsPort' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'OriginUpdateParameters' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/OriginPropertiesParameters']],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'OriginListResult' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/Origin']
                    ],
                    'nextLink' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'CustomDomainProperties' => [
                'properties' => [
                    'hostName' => ['type' => 'string'],
                    'resourceState' => [
                        'type' => 'string',
                        'enum' => [
                            'Creating',
                            'Active',
                            'Deleting'
                        ],
                        'readOnly' => TRUE
                    ],
                    'customHttpsProvisioningState' => [
                        'type' => 'string',
                        'enum' => [
                            'Enabling',
                            'Enabled',
                            'Disabling',
                            'Disabled',
                            'Failed'
                        ],
                        'readOnly' => TRUE
                    ],
                    'validationData' => ['type' => 'string'],
                    'provisioningState' => [
                        'type' => 'string',
                        'readOnly' => TRUE
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => ['hostName']
            ],
            'CustomDomain' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/CustomDomainProperties']],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'CustomDomainPropertiesParameters' => [
                'properties' => ['hostName' => ['type' => 'string']],
                'additionalProperties' => FALSE,
                'required' => ['hostName']
            ],
            'CustomDomainParameters' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/CustomDomainPropertiesParameters']],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'CustomDomainListResult' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/CustomDomain']
                    ],
                    'nextLink' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'ValidateCustomDomainInput' => [
                'properties' => ['hostName' => ['type' => 'string']],
                'additionalProperties' => FALSE,
                'required' => ['hostName']
            ],
            'ValidateCustomDomainOutput' => [
                'properties' => [
                    'customDomainValidated' => ['type' => 'boolean'],
                    'reason' => ['type' => 'string'],
                    'message' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
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
                    'nameAvailable' => ['type' => 'boolean'],
                    'reason' => ['type' => 'string'],
                    'message' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'ResourceUsage' => [
                'properties' => [
                    'resourceType' => ['type' => 'string'],
                    'unit' => ['type' => 'string'],
                    'currentValue' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'limit' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'ResourceUsageListResult' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/ResourceUsage']
                    ],
                    'nextLink' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'Operation_display' => [
                'properties' => [
                    'provider' => ['type' => 'string'],
                    'resource' => ['type' => 'string'],
                    'operation' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'Operation' => [
                'properties' => [
                    'name' => ['type' => 'string'],
                    'display' => ['$ref' => '#/definitions/Operation_display']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'OperationListResult' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/Operation']
                    ],
                    'nextLink' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'cidrIpAddress' => [
                'properties' => [
                    'baseIpAddress' => ['type' => 'string'],
                    'prefixLength' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'IpAddressGroup' => [
                'properties' => [
                    'deliveryRegion' => ['type' => 'string'],
                    'ipv4Addresses' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/cidrIpAddress']
                    ],
                    'ipv6Addresses' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/cidrIpAddress']
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'EdgeNodeProperties' => [
                'properties' => ['ipAddressGroups' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/IpAddressGroup']
                ]],
                'additionalProperties' => FALSE,
                'required' => ['ipAddressGroups']
            ],
            'EdgeNode' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/EdgeNodeProperties']],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'EdgenodeResult' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/EdgeNode']
                    ],
                    'nextLink' => ['type' => 'string']
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
                'required' => ['location']
            ],
            'ErrorResponse' => [
                'properties' => [
                    'code' => ['type' => 'string'],
                    'message' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ]
        ]
    ];
}
