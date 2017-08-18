<?php
namespace Microsoft\Azure\Management\TrafficManager;
final class TrafficManagerManagementClient
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
        $this->_Endpoints_group = new \Microsoft\Azure\Management\TrafficManager\Endpoints($_client);
        $this->_Profiles_group = new \Microsoft\Azure\Management\TrafficManager\Profiles($_client);
        $this->_GeographicHierarchies_group = new \Microsoft\Azure\Management\TrafficManager\GeographicHierarchies($_client);
    }
    /**
     * @return \Microsoft\Azure\Management\TrafficManager\Endpoints
     */
    public function getEndpoints()
    {
        return $this->_Endpoints_group;
    }
    /**
     * @return \Microsoft\Azure\Management\TrafficManager\Profiles
     */
    public function getProfiles()
    {
        return $this->_Profiles_group;
    }
    /**
     * @return \Microsoft\Azure\Management\TrafficManager\GeographicHierarchies
     */
    public function getGeographicHierarchies()
    {
        return $this->_GeographicHierarchies_group;
    }
    /**
     * @var \Microsoft\Azure\Management\TrafficManager\Endpoints
     */
    private $_Endpoints_group;
    /**
     * @var \Microsoft\Azure\Management\TrafficManager\Profiles
     */
    private $_Profiles_group;
    /**
     * @var \Microsoft\Azure\Management\TrafficManager\GeographicHierarchies
     */
    private $_GeographicHierarchies_group;
    const _SWAGGER_OBJECT_DATA = [
        'host' => 'management.azure.com',
        'paths' => [
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Network/trafficmanagerprofiles/{profileName}/{endpointType}/{endpointName}' => [
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
                            'name' => 'endpointType',
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
                            'name' => 'parameters',
                            'in' => 'body',
                            'required' => TRUE,
                            'schema' => ['$ref' => '#/definitions/Endpoint']
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-05-01']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/Endpoint']]]
                ],
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
                            'name' => 'endpointType',
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
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-05-01']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/Endpoint']]]
                ],
                'put' => [
                    'operationId' => 'Endpoints_CreateOrUpdate',
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
                            'name' => 'endpointType',
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
                            'name' => 'parameters',
                            'in' => 'body',
                            'required' => TRUE,
                            'schema' => ['$ref' => '#/definitions/Endpoint']
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-05-01']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => [
                        '200' => ['schema' => ['$ref' => '#/definitions/Endpoint']],
                        '201' => ['schema' => ['$ref' => '#/definitions/Endpoint']]
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
                            'name' => 'endpointType',
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
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-05-01']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => [
                        '200' => ['schema' => ['$ref' => '#/definitions/DeleteOperationResult']],
                        '204' => []
                    ]
                ]
            ],
            '/providers/Microsoft.Network/checkTrafficManagerNameAvailability' => ['post' => [
                'operationId' => 'Profiles_CheckTrafficManagerRelativeDnsNameAvailability',
                'parameters' => [
                    [
                        'name' => 'parameters',
                        'in' => 'body',
                        'required' => TRUE,
                        'schema' => ['$ref' => '#/definitions/CheckTrafficManagerRelativeDnsNameAvailabilityParameters']
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-05-01']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/TrafficManagerNameAvailability']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Network/trafficmanagerprofiles' => ['get' => [
                'operationId' => 'Profiles_ListByResourceGroup',
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
                        'enum' => ['2017-05-01']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/ProfileListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/providers/Microsoft.Network/trafficmanagerprofiles' => ['get' => [
                'operationId' => 'Profiles_ListBySubscription',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-05-01']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/ProfileListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Network/trafficmanagerprofiles/{profileName}' => [
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
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-05-01']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/Profile']]]
                ],
                'put' => [
                    'operationId' => 'Profiles_CreateOrUpdate',
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
                            'name' => 'parameters',
                            'in' => 'body',
                            'required' => TRUE,
                            'schema' => ['$ref' => '#/definitions/Profile']
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-05-01']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => [
                        '200' => ['schema' => ['$ref' => '#/definitions/Profile']],
                        '201' => ['schema' => ['$ref' => '#/definitions/Profile']]
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
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-05-01']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => [
                        '200' => ['schema' => ['$ref' => '#/definitions/DeleteOperationResult']],
                        '204' => []
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
                            'name' => 'parameters',
                            'in' => 'body',
                            'required' => TRUE,
                            'schema' => ['$ref' => '#/definitions/Profile']
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-05-01']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/Profile']]]
                ]
            ],
            '/providers/Microsoft.Network/trafficManagerGeographicHierarchies/default' => ['get' => [
                'operationId' => 'GeographicHierarchies_GetDefault',
                'parameters' => [[
                    'name' => 'api-version',
                    'in' => 'query',
                    'required' => TRUE,
                    'type' => 'string',
                    'enum' => ['2017-05-01']
                ]],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/TrafficManagerGeographicHierarchy']]]
            ]]
        ],
        'definitions' => [
            'DeleteOperationResult' => [
                'properties' => ['boolean' => [
                    'type' => 'boolean',
                    'readOnly' => TRUE
                ]],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'EndpointProperties' => [
                'properties' => [
                    'targetResourceId' => ['type' => 'string'],
                    'target' => ['type' => 'string'],
                    'endpointStatus' => [
                        'type' => 'string',
                        'enum' => [
                            'Enabled',
                            'Disabled'
                        ]
                    ],
                    'weight' => [
                        'type' => 'integer',
                        'format' => 'int64'
                    ],
                    'priority' => [
                        'type' => 'integer',
                        'format' => 'int64'
                    ],
                    'endpointLocation' => ['type' => 'string'],
                    'endpointMonitorStatus' => [
                        'type' => 'string',
                        'enum' => [
                            'CheckingEndpoint',
                            'Online',
                            'Degraded',
                            'Disabled',
                            'Inactive',
                            'Stopped'
                        ]
                    ],
                    'minChildEndpoints' => [
                        'type' => 'integer',
                        'format' => 'int64'
                    ],
                    'geoMapping' => [
                        'type' => 'array',
                        'items' => ['type' => 'string']
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'Endpoint' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/EndpointProperties']],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'CheckTrafficManagerRelativeDnsNameAvailabilityParameters' => [
                'properties' => [
                    'name' => ['type' => 'string'],
                    'type' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'DnsConfig' => [
                'properties' => [
                    'relativeName' => ['type' => 'string'],
                    'fqdn' => [
                        'type' => 'string',
                        'readOnly' => TRUE
                    ],
                    'ttl' => [
                        'type' => 'integer',
                        'format' => 'int64'
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'MonitorConfig' => [
                'properties' => [
                    'profileMonitorStatus' => [
                        'type' => 'string',
                        'enum' => [
                            'CheckingEndpoints',
                            'Online',
                            'Degraded',
                            'Disabled',
                            'Inactive'
                        ]
                    ],
                    'protocol' => [
                        'type' => 'string',
                        'enum' => [
                            'HTTP',
                            'HTTPS',
                            'TCP'
                        ]
                    ],
                    'port' => [
                        'type' => 'integer',
                        'format' => 'int64'
                    ],
                    'path' => ['type' => 'string'],
                    'intervalInSeconds' => [
                        'type' => 'integer',
                        'format' => 'int64'
                    ],
                    'timeoutInSeconds' => [
                        'type' => 'integer',
                        'format' => 'int64'
                    ],
                    'toleratedNumberOfFailures' => [
                        'type' => 'integer',
                        'format' => 'int64'
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'ProfileProperties' => [
                'properties' => [
                    'profileStatus' => [
                        'type' => 'string',
                        'enum' => [
                            'Enabled',
                            'Disabled'
                        ]
                    ],
                    'trafficRoutingMethod' => [
                        'type' => 'string',
                        'enum' => [
                            'Performance',
                            'Priority',
                            'Weighted',
                            'Geographic'
                        ]
                    ],
                    'dnsConfig' => ['$ref' => '#/definitions/DnsConfig'],
                    'monitorConfig' => ['$ref' => '#/definitions/MonitorConfig'],
                    'endpoints' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/Endpoint']
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'Profile' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/ProfileProperties']],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'ProfileListResult' => [
                'properties' => ['value' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/Profile']
                ]],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'TrafficManagerNameAvailability' => [
                'properties' => [
                    'name' => ['type' => 'string'],
                    'type' => ['type' => 'string'],
                    'nameAvailable' => ['type' => 'boolean'],
                    'reason' => ['type' => 'string'],
                    'message' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'Region' => [
                'properties' => [
                    'code' => ['type' => 'string'],
                    'name' => ['type' => 'string'],
                    'regions' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/Region']
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'GeographicHierarchyProperties' => [
                'properties' => ['geographicHierarchy' => ['$ref' => '#/definitions/Region']],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'TrafficManagerGeographicHierarchy' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/GeographicHierarchyProperties']],
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
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'TrackedResource' => [
                'properties' => [
                    'tags' => [
                        'type' => 'object',
                        'additionalProperties' => ['type' => 'string']
                    ],
                    'location' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'ProxyResource' => [
                'properties' => [],
                'additionalProperties' => FALSE,
                'required' => []
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
