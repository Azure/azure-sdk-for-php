<?php
namespace Microsoft\Azure\Management\CustomerInsights;
final class CustomerInsightsManagementClient
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
        $this->_Hubs_group = new \Microsoft\Azure\Management\CustomerInsights\Hubs($_client);
        $this->_Profiles_group = new \Microsoft\Azure\Management\CustomerInsights\Profiles($_client);
        $this->_Interactions_group = new \Microsoft\Azure\Management\CustomerInsights\Interactions($_client);
        $this->_Relationships_group = new \Microsoft\Azure\Management\CustomerInsights\Relationships($_client);
        $this->_RelationshipLinks_group = new \Microsoft\Azure\Management\CustomerInsights\RelationshipLinks($_client);
        $this->_AuthorizationPolicies_group = new \Microsoft\Azure\Management\CustomerInsights\AuthorizationPolicies($_client);
        $this->_Connectors_group = new \Microsoft\Azure\Management\CustomerInsights\Connectors($_client);
        $this->_ConnectorMappings_group = new \Microsoft\Azure\Management\CustomerInsights\ConnectorMappings($_client);
        $this->_Kpi_group = new \Microsoft\Azure\Management\CustomerInsights\Kpi($_client);
        $this->_WidgetTypes_group = new \Microsoft\Azure\Management\CustomerInsights\WidgetTypes($_client);
        $this->_Views_group = new \Microsoft\Azure\Management\CustomerInsights\Views($_client);
        $this->_Links_group = new \Microsoft\Azure\Management\CustomerInsights\Links($_client);
        $this->_Roles_group = new \Microsoft\Azure\Management\CustomerInsights\Roles($_client);
        $this->_RoleAssignments_group = new \Microsoft\Azure\Management\CustomerInsights\RoleAssignments($_client);
        $this->_Images_group = new \Microsoft\Azure\Management\CustomerInsights\Images($_client);
        $this->_Predictions_group = new \Microsoft\Azure\Management\CustomerInsights\Predictions($_client);
    }
    /**
     * @return \Microsoft\Azure\Management\CustomerInsights\Hubs
     */
    public function getHubs()
    {
        return $this->_Hubs_group;
    }
    /**
     * @return \Microsoft\Azure\Management\CustomerInsights\Profiles
     */
    public function getProfiles()
    {
        return $this->_Profiles_group;
    }
    /**
     * @return \Microsoft\Azure\Management\CustomerInsights\Interactions
     */
    public function getInteractions()
    {
        return $this->_Interactions_group;
    }
    /**
     * @return \Microsoft\Azure\Management\CustomerInsights\Relationships
     */
    public function getRelationships()
    {
        return $this->_Relationships_group;
    }
    /**
     * @return \Microsoft\Azure\Management\CustomerInsights\RelationshipLinks
     */
    public function getRelationshipLinks()
    {
        return $this->_RelationshipLinks_group;
    }
    /**
     * @return \Microsoft\Azure\Management\CustomerInsights\AuthorizationPolicies
     */
    public function getAuthorizationPolicies()
    {
        return $this->_AuthorizationPolicies_group;
    }
    /**
     * @return \Microsoft\Azure\Management\CustomerInsights\Connectors
     */
    public function getConnectors()
    {
        return $this->_Connectors_group;
    }
    /**
     * @return \Microsoft\Azure\Management\CustomerInsights\ConnectorMappings
     */
    public function getConnectorMappings()
    {
        return $this->_ConnectorMappings_group;
    }
    /**
     * @return \Microsoft\Azure\Management\CustomerInsights\Kpi
     */
    public function getKpi()
    {
        return $this->_Kpi_group;
    }
    /**
     * @return \Microsoft\Azure\Management\CustomerInsights\WidgetTypes
     */
    public function getWidgetTypes()
    {
        return $this->_WidgetTypes_group;
    }
    /**
     * @return \Microsoft\Azure\Management\CustomerInsights\Views
     */
    public function getViews()
    {
        return $this->_Views_group;
    }
    /**
     * @return \Microsoft\Azure\Management\CustomerInsights\Links
     */
    public function getLinks()
    {
        return $this->_Links_group;
    }
    /**
     * @return \Microsoft\Azure\Management\CustomerInsights\Roles
     */
    public function getRoles()
    {
        return $this->_Roles_group;
    }
    /**
     * @return \Microsoft\Azure\Management\CustomerInsights\RoleAssignments
     */
    public function getRoleAssignments()
    {
        return $this->_RoleAssignments_group;
    }
    /**
     * @return \Microsoft\Azure\Management\CustomerInsights\Images
     */
    public function getImages()
    {
        return $this->_Images_group;
    }
    /**
     * @return \Microsoft\Azure\Management\CustomerInsights\Predictions
     */
    public function getPredictions()
    {
        return $this->_Predictions_group;
    }
    /**
     * @var \Microsoft\Azure\Management\CustomerInsights\Hubs
     */
    private $_Hubs_group;
    /**
     * @var \Microsoft\Azure\Management\CustomerInsights\Profiles
     */
    private $_Profiles_group;
    /**
     * @var \Microsoft\Azure\Management\CustomerInsights\Interactions
     */
    private $_Interactions_group;
    /**
     * @var \Microsoft\Azure\Management\CustomerInsights\Relationships
     */
    private $_Relationships_group;
    /**
     * @var \Microsoft\Azure\Management\CustomerInsights\RelationshipLinks
     */
    private $_RelationshipLinks_group;
    /**
     * @var \Microsoft\Azure\Management\CustomerInsights\AuthorizationPolicies
     */
    private $_AuthorizationPolicies_group;
    /**
     * @var \Microsoft\Azure\Management\CustomerInsights\Connectors
     */
    private $_Connectors_group;
    /**
     * @var \Microsoft\Azure\Management\CustomerInsights\ConnectorMappings
     */
    private $_ConnectorMappings_group;
    /**
     * @var \Microsoft\Azure\Management\CustomerInsights\Kpi
     */
    private $_Kpi_group;
    /**
     * @var \Microsoft\Azure\Management\CustomerInsights\WidgetTypes
     */
    private $_WidgetTypes_group;
    /**
     * @var \Microsoft\Azure\Management\CustomerInsights\Views
     */
    private $_Views_group;
    /**
     * @var \Microsoft\Azure\Management\CustomerInsights\Links
     */
    private $_Links_group;
    /**
     * @var \Microsoft\Azure\Management\CustomerInsights\Roles
     */
    private $_Roles_group;
    /**
     * @var \Microsoft\Azure\Management\CustomerInsights\RoleAssignments
     */
    private $_RoleAssignments_group;
    /**
     * @var \Microsoft\Azure\Management\CustomerInsights\Images
     */
    private $_Images_group;
    /**
     * @var \Microsoft\Azure\Management\CustomerInsights\Predictions
     */
    private $_Predictions_group;
    const _SWAGGER_OBJECT_DATA = [
        'host' => 'management.azure.com',
        'paths' => [
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.CustomerInsights/hubs/{hubName}' => [
                'put' => [
                    'operationId' => 'Hubs_CreateOrUpdate',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'hubName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'parameters',
                            'in' => 'body',
                            'required' => TRUE,
                            'schema' => ['$ref' => '#/definitions/Hub']
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-04-26']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => [
                        '201' => ['schema' => ['$ref' => '#/definitions/Hub']],
                        '200' => ['schema' => ['$ref' => '#/definitions/Hub']]
                    ]
                ],
                'patch' => [
                    'operationId' => 'Hubs_Update',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'hubName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'parameters',
                            'in' => 'body',
                            'required' => TRUE,
                            'schema' => ['$ref' => '#/definitions/Hub']
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-04-26']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/Hub']]]
                ],
                'delete' => [
                    'operationId' => 'Hubs_Delete',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'hubName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-04-26']
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
                        '202' => [],
                        '204' => []
                    ]
                ],
                'get' => [
                    'operationId' => 'Hubs_Get',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'hubName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-04-26']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/Hub']]]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.CustomerInsights/hubs' => ['get' => [
                'operationId' => 'Hubs_ListByResourceGroup',
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
                        'enum' => ['2017-04-26']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/HubListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/providers/Microsoft.CustomerInsights/hubs' => ['get' => [
                'operationId' => 'Hubs_List',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-04-26']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/HubListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.CustomerInsights/hubs/{hubName}/profiles/{profileName}' => [
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
                            'name' => 'hubName',
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
                            'schema' => ['$ref' => '#/definitions/ProfileResourceFormat']
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-04-26']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => [
                        '200' => ['schema' => ['$ref' => '#/definitions/ProfileResourceFormat']],
                        '202' => []
                    ]
                ],
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
                            'name' => 'hubName',
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
                            'name' => 'locale-code',
                            'in' => 'query',
                            'required' => FALSE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-04-26']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/ProfileResourceFormat']]]
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
                            'name' => 'hubName',
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
                            'name' => 'locale-code',
                            'in' => 'query',
                            'required' => FALSE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-04-26']
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
                        '202' => [],
                        '204' => []
                    ]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.CustomerInsights/hubs/{hubName}/profiles' => ['get' => [
                'operationId' => 'Profiles_ListByHub',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'hubName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'locale-code',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-04-26']
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
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.CustomerInsights/hubs/{hubName}/profiles/{profileName}/getEnrichingKpis' => ['post' => [
                'operationId' => 'Profiles_GetEnrichingKpis',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'hubName',
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
                        'enum' => ['2017-04-26']
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
                    'items' => ['$ref' => '#/definitions/KpiDefinition']
                ]]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.CustomerInsights/hubs/{hubName}/interactions/{interactionName}' => [
                'put' => [
                    'operationId' => 'Interactions_CreateOrUpdate',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'hubName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'interactionName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'parameters',
                            'in' => 'body',
                            'required' => TRUE,
                            'schema' => ['$ref' => '#/definitions/InteractionResourceFormat']
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-04-26']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => [
                        '200' => ['schema' => ['$ref' => '#/definitions/InteractionResourceFormat']],
                        '202' => []
                    ]
                ],
                'get' => [
                    'operationId' => 'Interactions_Get',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'hubName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'interactionName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'locale-code',
                            'in' => 'query',
                            'required' => FALSE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-04-26']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/InteractionResourceFormat']]]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.CustomerInsights/hubs/{hubName}/interactions' => ['get' => [
                'operationId' => 'Interactions_ListByHub',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'hubName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'locale-code',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-04-26']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/InteractionListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.CustomerInsights/hubs/{hubName}/interactions/{interactionName}/suggestRelationshipLinks' => ['post' => [
                'operationId' => 'Interactions_SuggestRelationshipLinks',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'hubName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'interactionName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-04-26']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/SuggestRelationshipLinksResponse']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.CustomerInsights/hubs/{hubName}/relationships/{relationshipName}' => [
                'put' => [
                    'operationId' => 'Relationships_CreateOrUpdate',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'hubName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'relationshipName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'parameters',
                            'in' => 'body',
                            'required' => TRUE,
                            'schema' => ['$ref' => '#/definitions/RelationshipResourceFormat']
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-04-26']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => [
                        '200' => ['schema' => ['$ref' => '#/definitions/RelationshipResourceFormat']],
                        '202' => []
                    ]
                ],
                'get' => [
                    'operationId' => 'Relationships_Get',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'hubName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'relationshipName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-04-26']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/RelationshipResourceFormat']]]
                ],
                'delete' => [
                    'operationId' => 'Relationships_Delete',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'hubName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'relationshipName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-04-26']
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
                ]
            ],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.CustomerInsights/hubs/{hubName}/relationships' => ['get' => [
                'operationId' => 'Relationships_ListByHub',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'hubName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-04-26']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/RelationshipListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.CustomerInsights/hubs/{hubName}/relationshipLinks/{relationshipLinkName}' => [
                'put' => [
                    'operationId' => 'RelationshipLinks_CreateOrUpdate',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'hubName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'relationshipLinkName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'parameters',
                            'in' => 'body',
                            'required' => TRUE,
                            'schema' => ['$ref' => '#/definitions/RelationshipLinkResourceFormat']
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-04-26']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => [
                        '200' => ['schema' => ['$ref' => '#/definitions/RelationshipLinkResourceFormat']],
                        '202' => []
                    ]
                ],
                'get' => [
                    'operationId' => 'RelationshipLinks_Get',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'hubName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'relationshipLinkName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-04-26']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/RelationshipLinkResourceFormat']]]
                ],
                'delete' => [
                    'operationId' => 'RelationshipLinks_Delete',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'hubName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'relationshipLinkName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-04-26']
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
                ]
            ],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.CustomerInsights/hubs/{hubName}/relationshipLinks' => ['get' => [
                'operationId' => 'RelationshipLinks_ListByHub',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'hubName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-04-26']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/RelationshipLinkListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.CustomerInsights/hubs/{hubName}/authorizationPolicies/{authorizationPolicyName}' => [
                'put' => [
                    'operationId' => 'AuthorizationPolicies_CreateOrUpdate',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'hubName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'authorizationPolicyName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'parameters',
                            'in' => 'body',
                            'required' => TRUE,
                            'schema' => ['$ref' => '#/definitions/AuthorizationPolicyResourceFormat']
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-04-26']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => [
                        '200' => ['schema' => ['$ref' => '#/definitions/AuthorizationPolicyResourceFormat']],
                        '201' => ['schema' => ['$ref' => '#/definitions/AuthorizationPolicyResourceFormat']]
                    ]
                ],
                'get' => [
                    'operationId' => 'AuthorizationPolicies_Get',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'hubName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'authorizationPolicyName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-04-26']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/AuthorizationPolicyResourceFormat']]]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.CustomerInsights/hubs/{hubName}/authorizationPolicies' => ['get' => [
                'operationId' => 'AuthorizationPolicies_ListByHub',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'hubName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-04-26']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/AuthorizationPolicyListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.CustomerInsights/hubs/{hubName}/authorizationPolicies/{authorizationPolicyName}/regeneratePrimaryKey' => ['post' => [
                'operationId' => 'AuthorizationPolicies_RegeneratePrimaryKey',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'hubName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'authorizationPolicyName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-04-26']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/AuthorizationPolicy']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.CustomerInsights/hubs/{hubName}/authorizationPolicies/{authorizationPolicyName}/regenerateSecondaryKey' => ['post' => [
                'operationId' => 'AuthorizationPolicies_RegenerateSecondaryKey',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'hubName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'authorizationPolicyName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-04-26']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/AuthorizationPolicy']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.CustomerInsights/hubs/{hubName}/connectors/{connectorName}' => [
                'put' => [
                    'operationId' => 'Connectors_CreateOrUpdate',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'hubName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'connectorName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'parameters',
                            'in' => 'body',
                            'required' => TRUE,
                            'schema' => ['$ref' => '#/definitions/ConnectorResourceFormat']
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-04-26']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => [
                        '200' => ['schema' => ['$ref' => '#/definitions/ConnectorResourceFormat']],
                        '202' => []
                    ]
                ],
                'get' => [
                    'operationId' => 'Connectors_Get',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'hubName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'connectorName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-04-26']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/ConnectorResourceFormat']]]
                ],
                'delete' => [
                    'operationId' => 'Connectors_Delete',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'hubName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'connectorName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-04-26']
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
                        '202' => [],
                        '204' => []
                    ]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.CustomerInsights/hubs/{hubName}/connectors' => ['get' => [
                'operationId' => 'Connectors_ListByHub',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'hubName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-04-26']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/ConnectorListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.CustomerInsights/hubs/{hubName}/connectors/{connectorName}/mappings/{mappingName}' => [
                'put' => [
                    'operationId' => 'ConnectorMappings_CreateOrUpdate',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'hubName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'connectorName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'mappingName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'parameters',
                            'in' => 'body',
                            'required' => TRUE,
                            'schema' => ['$ref' => '#/definitions/ConnectorMappingResourceFormat']
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-04-26']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => [
                        '200' => ['schema' => ['$ref' => '#/definitions/ConnectorMappingResourceFormat']],
                        '201' => ['schema' => ['$ref' => '#/definitions/ConnectorMappingResourceFormat']]
                    ]
                ],
                'get' => [
                    'operationId' => 'ConnectorMappings_Get',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'hubName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'connectorName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'mappingName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-04-26']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/ConnectorMappingResourceFormat']]]
                ],
                'delete' => [
                    'operationId' => 'ConnectorMappings_Delete',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'hubName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'connectorName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'mappingName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-04-26']
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
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.CustomerInsights/hubs/{hubName}/connectors/{connectorName}/mappings' => ['get' => [
                'operationId' => 'ConnectorMappings_ListByConnector',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'hubName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'connectorName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-04-26']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/ConnectorMappingListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.CustomerInsights/hubs/{hubName}/kpi/{kpiName}' => [
                'put' => [
                    'operationId' => 'Kpi_CreateOrUpdate',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'hubName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'kpiName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'parameters',
                            'in' => 'body',
                            'required' => TRUE,
                            'schema' => ['$ref' => '#/definitions/KpiResourceFormat']
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-04-26']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => [
                        '200' => ['schema' => ['$ref' => '#/definitions/KpiResourceFormat']],
                        '202' => []
                    ]
                ],
                'get' => [
                    'operationId' => 'Kpi_Get',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'hubName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'kpiName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-04-26']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/KpiResourceFormat']]]
                ],
                'delete' => [
                    'operationId' => 'Kpi_Delete',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'hubName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'kpiName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-04-26']
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
                        '202' => []
                    ]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.CustomerInsights/hubs/{hubName}/kpi/{kpiName}/reprocess' => ['post' => [
                'operationId' => 'Kpi_Reprocess',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'hubName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'kpiName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-04-26']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['202' => []]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.CustomerInsights/hubs/{hubName}/kpi' => ['get' => [
                'operationId' => 'Kpi_ListByHub',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'hubName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-04-26']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/KpiListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.CustomerInsights/hubs/{hubName}/widgetTypes' => ['get' => [
                'operationId' => 'WidgetTypes_ListByHub',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'hubName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-04-26']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/WidgetTypeListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.CustomerInsights/hubs/{hubName}/widgetTypes/{widgetTypeName}' => ['get' => [
                'operationId' => 'WidgetTypes_Get',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'hubName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'widgetTypeName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-04-26']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/WidgetTypeResourceFormat']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.CustomerInsights/hubs/{hubName}/views' => ['get' => [
                'operationId' => 'Views_ListByHub',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'hubName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-04-26']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'userId',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/ViewListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.CustomerInsights/hubs/{hubName}/views/{viewName}' => [
                'put' => [
                    'operationId' => 'Views_CreateOrUpdate',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'hubName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'viewName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'parameters',
                            'in' => 'body',
                            'required' => TRUE,
                            'schema' => ['$ref' => '#/definitions/ViewResourceFormat']
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-04-26']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/ViewResourceFormat']]]
                ],
                'get' => [
                    'operationId' => 'Views_Get',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'hubName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'viewName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-04-26']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'userId',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/ViewResourceFormat']]]
                ],
                'delete' => [
                    'operationId' => 'Views_Delete',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'hubName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'viewName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-04-26']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'userId',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => ['200' => []]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.CustomerInsights/hubs/{hubName}/links/{linkName}' => [
                'put' => [
                    'operationId' => 'Links_CreateOrUpdate',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'hubName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'linkName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'parameters',
                            'in' => 'body',
                            'required' => TRUE,
                            'schema' => ['$ref' => '#/definitions/LinkResourceFormat']
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-04-26']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => [
                        '200' => ['schema' => ['$ref' => '#/definitions/LinkResourceFormat']],
                        '202' => []
                    ]
                ],
                'get' => [
                    'operationId' => 'Links_Get',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'hubName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'linkName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-04-26']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/LinkResourceFormat']]]
                ],
                'delete' => [
                    'operationId' => 'Links_Delete',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'hubName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'linkName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-04-26']
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
                        '202' => []
                    ]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.CustomerInsights/hubs/{hubName}/links' => ['get' => [
                'operationId' => 'Links_ListByHub',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'hubName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-04-26']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/LinkListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.CustomerInsights/hubs/{hubName}/roles' => ['get' => [
                'operationId' => 'Roles_ListByHub',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'hubName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-04-26']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/RoleListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.CustomerInsights/hubs/{hubName}/roleAssignments' => ['get' => [
                'operationId' => 'RoleAssignments_ListByHub',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'hubName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-04-26']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/RoleAssignmentListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.CustomerInsights/hubs/{hubName}/roleAssignments/{assignmentName}' => [
                'put' => [
                    'operationId' => 'RoleAssignments_CreateOrUpdate',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'hubName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'assignmentName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'parameters',
                            'in' => 'body',
                            'required' => TRUE,
                            'schema' => ['$ref' => '#/definitions/RoleAssignmentResourceFormat']
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-04-26']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => [
                        '200' => ['schema' => ['$ref' => '#/definitions/RoleAssignmentResourceFormat']],
                        '202' => []
                    ]
                ],
                'get' => [
                    'operationId' => 'RoleAssignments_Get',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'hubName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'assignmentName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-04-26']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/RoleAssignmentResourceFormat']]]
                ],
                'delete' => [
                    'operationId' => 'RoleAssignments_Delete',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'hubName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'assignmentName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-04-26']
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
                        '202' => [],
                        '204' => []
                    ]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.CustomerInsights/hubs/{hubName}/images/getEntityTypeImageUploadUrl' => ['post' => [
                'operationId' => 'Images_GetUploadUrlForEntityType',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'hubName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'parameters',
                        'in' => 'body',
                        'required' => TRUE,
                        'schema' => ['$ref' => '#/definitions/GetImageUploadUrlInput']
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-04-26']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/ImageDefinition']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.CustomerInsights/hubs/{hubName}/images/getDataImageUploadUrl' => ['post' => [
                'operationId' => 'Images_GetUploadUrlForData',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'hubName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'parameters',
                        'in' => 'body',
                        'required' => TRUE,
                        'schema' => ['$ref' => '#/definitions/GetImageUploadUrlInput']
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-04-26']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/ImageDefinition']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.CustomerInsights/hubs/{hubName}/predictions/{predictionName}' => [
                'put' => [
                    'operationId' => 'Predictions_CreateOrUpdate',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'hubName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'predictionName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'parameters',
                            'in' => 'body',
                            'required' => TRUE,
                            'schema' => ['$ref' => '#/definitions/PredictionResourceFormat']
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-04-26']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => [
                        '200' => ['schema' => ['$ref' => '#/definitions/PredictionResourceFormat']],
                        '202' => []
                    ]
                ],
                'get' => [
                    'operationId' => 'Predictions_Get',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'hubName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'predictionName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-04-26']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/PredictionResourceFormat']]]
                ],
                'delete' => [
                    'operationId' => 'Predictions_Delete',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'hubName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'predictionName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-04-26']
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
                        '202' => []
                    ]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.CustomerInsights/hubs/{hubName}/predictions/{predictionName}/getTrainingResults' => ['post' => [
                'operationId' => 'Predictions_GetTrainingResults',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'hubName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'predictionName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-04-26']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/PredictionTrainingResults']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.CustomerInsights/hubs/{hubName}/predictions/{predictionName}/getModelStatus' => ['post' => [
                'operationId' => 'Predictions_GetModelStatus',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'hubName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'predictionName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-04-26']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/PredictionModelStatus']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.CustomerInsights/hubs/{hubName}/predictions/{predictionName}/modelStatus' => ['post' => [
                'operationId' => 'Predictions_ModelStatus',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'hubName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'predictionName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'parameters',
                        'in' => 'body',
                        'required' => TRUE,
                        'schema' => ['$ref' => '#/definitions/PredictionModelStatus']
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-04-26']
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
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.CustomerInsights/hubs/{hubName}/predictions' => ['get' => [
                'operationId' => 'Predictions_ListByHub',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'hubName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-04-26']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/PredictionListResult']]]
            ]]
        ],
        'definitions' => [
            'HubBillingInfoFormat' => [
                'properties' => [
                    'skuName' => ['type' => 'string'],
                    'minUnits' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'maxUnits' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ]
                ],
                'required' => []
            ],
            'HubPropertiesFormat' => [
                'properties' => [
                    'apiEndpoint' => ['type' => 'string'],
                    'webEndpoint' => ['type' => 'string'],
                    'provisioningState' => ['type' => 'string'],
                    'tenantFeatures' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'hubBillingInfo' => ['$ref' => '#/definitions/HubBillingInfoFormat']
                ],
                'required' => []
            ],
            'Hub' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/HubPropertiesFormat']],
                'required' => []
            ],
            'HubListResult' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/Hub']
                    ],
                    'nextLink' => ['type' => 'string']
                ],
                'required' => []
            ],
            'MetadataDefinitionBase' => [
                'properties' => [
                    'attributes' => [
                        'type' => 'object',
                        'additionalProperties' => [
                            'type' => 'array',
                            'items' => ['type' => 'string']
                        ]
                    ],
                    'description' => [
                        'type' => 'object',
                        'additionalProperties' => ['type' => 'string']
                    ],
                    'displayName' => [
                        'type' => 'object',
                        'additionalProperties' => ['type' => 'string']
                    ],
                    'localizedAttributes' => [
                        'type' => 'object',
                        'additionalProperties' => [
                            'type' => 'object',
                            'additionalProperties' => ['type' => 'string']
                        ]
                    ],
                    'smallImage' => ['type' => 'string'],
                    'mediumImage' => ['type' => 'string'],
                    'largeImage' => ['type' => 'string']
                ],
                'required' => []
            ],
            'ProfileEnumValidValuesFormat' => [
                'properties' => [
                    'value' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'localizedValueNames' => [
                        'type' => 'object',
                        'additionalProperties' => ['type' => 'string']
                    ]
                ],
                'required' => []
            ],
            'DataSource' => [
                'properties' => [
                    'name' => ['type' => 'string'],
                    'dataSourceType' => [
                        'type' => 'string',
                        'enum' => [
                            'Connector',
                            'LinkInteraction',
                            'SystemDefault'
                        ]
                    ],
                    'status' => [
                        'type' => 'string',
                        'enum' => [
                            'None',
                            'Active',
                            'Deleted'
                        ]
                    ],
                    'id' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'dataSourceReferenceId' => ['type' => 'string']
                ],
                'required' => []
            ],
            'DataSourcePrecedence' => [
                'properties' => [
                    'dataSource' => ['$ref' => '#/definitions/DataSource'],
                    'precedence' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ]
                ],
                'required' => []
            ],
            'PropertyDefinition' => [
                'properties' => [
                    'arrayValueSeparator' => ['type' => 'string'],
                    'enumValidValues' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/ProfileEnumValidValuesFormat']
                    ],
                    'fieldName' => ['type' => 'string'],
                    'fieldType' => ['type' => 'string'],
                    'isArray' => ['type' => 'boolean'],
                    'isEnum' => ['type' => 'boolean'],
                    'isFlagEnum' => ['type' => 'boolean'],
                    'isImage' => ['type' => 'boolean'],
                    'isLocalizedString' => ['type' => 'boolean'],
                    'isName' => ['type' => 'boolean'],
                    'isRequired' => ['type' => 'boolean'],
                    'propertyId' => ['type' => 'string'],
                    'schemaItemPropLink' => ['type' => 'string'],
                    'maxLength' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'isAvailableInGraph' => ['type' => 'boolean'],
                    'dataSourcePrecedenceRules' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/DataSourcePrecedence']
                    ]
                ],
                'required' => [
                    'fieldName',
                    'fieldType'
                ]
            ],
            'EntityTypeDefinition' => [
                'properties' => [
                    'apiEntitySetName' => ['type' => 'string'],
                    'entityType' => [
                        'type' => 'string',
                        'enum' => [
                            'None',
                            'Profile',
                            'Interaction',
                            'Relationship'
                        ]
                    ],
                    'fields' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/PropertyDefinition']
                    ],
                    'instancesCount' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'lastChangedUtc' => [
                        'type' => 'string',
                        'format' => 'date-time'
                    ],
                    'provisioningState' => [
                        'type' => 'string',
                        'enum' => [
                            'Provisioning',
                            'Succeeded',
                            'Expiring',
                            'Deleting',
                            'HumanIntervention',
                            'Failed'
                        ]
                    ],
                    'schemaItemTypeLink' => ['type' => 'string'],
                    'tenantId' => ['type' => 'string'],
                    'timestampFieldName' => ['type' => 'string'],
                    'typeName' => ['type' => 'string']
                ],
                'required' => []
            ],
            'AuthorizationPolicy' => [
                'properties' => [
                    'policyName' => ['type' => 'string'],
                    'permissions' => [
                        'type' => 'array',
                        'items' => [
                            'type' => 'string',
                            'enum' => [
                                'Read',
                                'Write',
                                'Manage'
                            ]
                        ]
                    ],
                    'primaryKey' => ['type' => 'string'],
                    'secondaryKey' => ['type' => 'string']
                ],
                'required' => ['permissions']
            ],
            'SalesforceDiscoverSetting' => [
                'properties' => ['salesforceConnectionStringSecretUrl' => ['type' => 'string']],
                'required' => ['salesforceConnectionStringSecretUrl']
            ],
            'SalesforceTable' => [
                'properties' => [
                    'isProfile' => ['type' => 'string'],
                    'tableCategory' => ['type' => 'string'],
                    'tableName' => ['type' => 'string'],
                    'tableRemarks' => ['type' => 'string'],
                    'tableSchema' => ['type' => 'string']
                ],
                'required' => [
                    'tableCategory',
                    'tableName',
                    'tableSchema'
                ]
            ],
            'SalesforceConnectorProperties' => [
                'properties' => [
                    'usersetting' => ['$ref' => '#/definitions/SalesforceDiscoverSetting'],
                    'salesforcetables' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/SalesforceTable']
                    ]
                ],
                'required' => [
                    'usersetting',
                    'salesforcetables'
                ]
            ],
            'AzureBlobConnectorProperties' => [
                'properties' => ['connectionKeyVaultUrl' => ['type' => 'string']],
                'required' => ['connectionKeyVaultUrl']
            ],
            'CrmConnectorEntities' => [
                'properties' => [
                    'logicalName' => ['type' => 'string'],
                    'displayName' => ['type' => 'string'],
                    'isProfile' => ['type' => 'boolean']
                ],
                'required' => ['logicalName']
            ],
            'CrmConnectorProperties' => [
                'properties' => [
                    'connectionString' => ['type' => 'string'],
                    'organizationId' => ['type' => 'string'],
                    'organizationUrl' => ['type' => 'string'],
                    'entities' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/CrmConnectorEntities']
                    ],
                    'accessToken' => ['type' => 'string']
                ],
                'required' => [
                    'organizationId',
                    'organizationUrl',
                    'entities'
                ]
            ],
            'Connector' => [
                'properties' => [
                    'connectorId' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'connectorName' => ['type' => 'string'],
                    'connectorType' => [
                        'type' => 'string',
                        'enum' => [
                            'None',
                            'CRM',
                            'AzureBlob',
                            'Salesforce',
                            'ExchangeOnline',
                            'Outbound'
                        ]
                    ],
                    'displayName' => ['type' => 'string'],
                    'description' => ['type' => 'string'],
                    'connectorProperties' => [
                        'type' => 'object',
                        'additionalProperties' => ['type' => 'object']
                    ],
                    'created' => [
                        'type' => 'string',
                        'format' => 'date-time'
                    ],
                    'lastModified' => [
                        'type' => 'string',
                        'format' => 'date-time'
                    ],
                    'state' => [
                        'type' => 'string',
                        'enum' => [
                            'Creating',
                            'Created',
                            'Ready',
                            'Expiring',
                            'Deleting',
                            'Failed'
                        ]
                    ],
                    'tenantId' => ['type' => 'string'],
                    'isInternal' => ['type' => 'boolean']
                ],
                'required' => [
                    'connectorType',
                    'connectorProperties'
                ]
            ],
            'ConnectorMappingErrorManagement' => [
                'properties' => [
                    'errorManagementType' => [
                        'type' => 'string',
                        'enum' => [
                            'RejectAndContinue',
                            'StopImport',
                            'RejectUntilLimit'
                        ]
                    ],
                    'errorLimit' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ]
                ],
                'required' => ['errorManagementType']
            ],
            'ConnectorMappingFormat' => [
                'properties' => [
                    'formatType' => ['type' => 'string'],
                    'columnDelimiter' => ['type' => 'string'],
                    'acceptLanguage' => ['type' => 'string'],
                    'quoteCharacter' => ['type' => 'string'],
                    'quoteEscapeCharacter' => ['type' => 'string'],
                    'arraySeparator' => ['type' => 'string']
                ],
                'required' => ['formatType']
            ],
            'ConnectorMappingAvailability' => [
                'properties' => [
                    'frequency' => [
                        'type' => 'string',
                        'enum' => [
                            'Minute',
                            'Hour',
                            'Day',
                            'Week',
                            'Month'
                        ]
                    ],
                    'interval' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ]
                ],
                'required' => ['interval']
            ],
            'ConnectorMappingStructure' => [
                'properties' => [
                    'propertyName' => ['type' => 'string'],
                    'columnName' => ['type' => 'string'],
                    'customFormatSpecifier' => ['type' => 'string'],
                    'isEncrypted' => ['type' => 'boolean']
                ],
                'required' => [
                    'propertyName',
                    'columnName'
                ]
            ],
            'ConnectorMappingCompleteOperation' => [
                'properties' => [
                    'completionOperationType' => [
                        'type' => 'string',
                        'enum' => [
                            'DoNothing',
                            'DeleteFile',
                            'MoveFile'
                        ]
                    ],
                    'destinationFolder' => ['type' => 'string']
                ],
                'required' => []
            ],
            'ConnectorMappingProperties' => [
                'properties' => [
                    'folderPath' => ['type' => 'string'],
                    'fileFilter' => ['type' => 'string'],
                    'hasHeader' => ['type' => 'boolean'],
                    'errorManagement' => ['$ref' => '#/definitions/ConnectorMappingErrorManagement'],
                    'format' => ['$ref' => '#/definitions/ConnectorMappingFormat'],
                    'availability' => ['$ref' => '#/definitions/ConnectorMappingAvailability'],
                    'structure' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/ConnectorMappingStructure']
                    ],
                    'completeOperation' => ['$ref' => '#/definitions/ConnectorMappingCompleteOperation']
                ],
                'required' => [
                    'errorManagement',
                    'format',
                    'availability',
                    'structure',
                    'completeOperation'
                ]
            ],
            'ConnectorMapping' => [
                'properties' => [
                    'connectorName' => ['type' => 'string'],
                    'connectorType' => [
                        'type' => 'string',
                        'enum' => [
                            'None',
                            'CRM',
                            'AzureBlob',
                            'Salesforce',
                            'ExchangeOnline',
                            'Outbound'
                        ]
                    ],
                    'created' => [
                        'type' => 'string',
                        'format' => 'date-time'
                    ],
                    'lastModified' => [
                        'type' => 'string',
                        'format' => 'date-time'
                    ],
                    'entityType' => [
                        'type' => 'string',
                        'enum' => [
                            'None',
                            'Profile',
                            'Interaction',
                            'Relationship'
                        ]
                    ],
                    'entityTypeName' => ['type' => 'string'],
                    'connectorMappingName' => ['type' => 'string'],
                    'displayName' => ['type' => 'string'],
                    'description' => ['type' => 'string'],
                    'dataFormatId' => ['type' => 'string'],
                    'mappingProperties' => ['$ref' => '#/definitions/ConnectorMappingProperties'],
                    'nextRunTime' => [
                        'type' => 'string',
                        'format' => 'date-time'
                    ],
                    'runId' => ['type' => 'string'],
                    'state' => [
                        'type' => 'string',
                        'enum' => [
                            'Creating',
                            'Created',
                            'Failed',
                            'Ready',
                            'Running',
                            'Stopped',
                            'Expiring'
                        ]
                    ],
                    'tenantId' => ['type' => 'string']
                ],
                'required' => [
                    'entityType',
                    'entityTypeName',
                    'mappingProperties'
                ]
            ],
            'KpiThresholds' => [
                'properties' => [
                    'lowerLimit' => [
                        'type' => 'number',
                        'format' => 'decimal'
                    ],
                    'upperLimit' => [
                        'type' => 'number',
                        'format' => 'decimal'
                    ],
                    'increasingKpi' => ['type' => 'boolean']
                ],
                'required' => [
                    'lowerLimit',
                    'upperLimit',
                    'increasingKpi'
                ]
            ],
            'KpiGroupByMetadata' => [
                'properties' => [
                    'displayName' => [
                        'type' => 'object',
                        'additionalProperties' => ['type' => 'string']
                    ],
                    'fieldName' => ['type' => 'string'],
                    'fieldType' => ['type' => 'string']
                ],
                'required' => []
            ],
            'KpiParticipantProfilesMetadata' => [
                'properties' => ['typeName' => ['type' => 'string']],
                'required' => ['typeName']
            ],
            'KpiAlias' => [
                'properties' => [
                    'aliasName' => ['type' => 'string'],
                    'expression' => ['type' => 'string']
                ],
                'required' => [
                    'aliasName',
                    'expression'
                ]
            ],
            'KpiExtract' => [
                'properties' => [
                    'extractName' => ['type' => 'string'],
                    'expression' => ['type' => 'string']
                ],
                'required' => [
                    'extractName',
                    'expression'
                ]
            ],
            'KpiDefinition' => [
                'properties' => [
                    'entityType' => [
                        'type' => 'string',
                        'enum' => [
                            'None',
                            'Profile',
                            'Interaction',
                            'Relationship'
                        ]
                    ],
                    'entityTypeName' => ['type' => 'string'],
                    'tenantId' => ['type' => 'string'],
                    'kpiName' => ['type' => 'string'],
                    'displayName' => [
                        'type' => 'object',
                        'additionalProperties' => ['type' => 'string']
                    ],
                    'description' => [
                        'type' => 'object',
                        'additionalProperties' => ['type' => 'string']
                    ],
                    'calculationWindow' => [
                        'type' => 'string',
                        'enum' => [
                            'Lifetime',
                            'Hour',
                            'Day',
                            'Week',
                            'Month'
                        ]
                    ],
                    'calculationWindowFieldName' => ['type' => 'string'],
                    'function' => [
                        'type' => 'string',
                        'enum' => [
                            'Sum',
                            'Avg',
                            'Min',
                            'Max',
                            'Last',
                            'Count',
                            'None',
                            'CountDistinct'
                        ]
                    ],
                    'expression' => ['type' => 'string'],
                    'unit' => ['type' => 'string'],
                    'filter' => ['type' => 'string'],
                    'groupBy' => [
                        'type' => 'array',
                        'items' => ['type' => 'string']
                    ],
                    'groupByMetadata' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/KpiGroupByMetadata']
                    ],
                    'participantProfilesMetadata' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/KpiParticipantProfilesMetadata']
                    ],
                    'provisioningState' => [
                        'type' => 'string',
                        'enum' => [
                            'Provisioning',
                            'Succeeded',
                            'Expiring',
                            'Deleting',
                            'HumanIntervention',
                            'Failed'
                        ]
                    ],
                    'thresHolds' => ['$ref' => '#/definitions/KpiThresholds'],
                    'aliases' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/KpiAlias']
                    ],
                    'extracts' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/KpiExtract']
                    ]
                ],
                'required' => [
                    'entityType',
                    'entityTypeName',
                    'calculationWindow',
                    'function',
                    'expression'
                ]
            ],
            'Resource' => [
                'properties' => [
                    'id' => ['type' => 'string'],
                    'name' => ['type' => 'string'],
                    'type' => ['type' => 'string'],
                    'location' => ['type' => 'string'],
                    'tags' => [
                        'type' => 'object',
                        'additionalProperties' => ['type' => 'string']
                    ]
                ],
                'required' => []
            ],
            'ProxyResource' => [
                'properties' => [
                    'id' => ['type' => 'string'],
                    'name' => ['type' => 'string'],
                    'type' => ['type' => 'string']
                ],
                'required' => []
            ],
            'WidgetType' => [
                'properties' => [
                    'widgetTypeName' => ['type' => 'string'],
                    'definition' => ['type' => 'string'],
                    'description' => ['type' => 'string'],
                    'displayName' => [
                        'type' => 'object',
                        'additionalProperties' => ['type' => 'string']
                    ],
                    'imageUrl' => ['type' => 'string'],
                    'tenantId' => ['type' => 'string'],
                    'widgetVersion' => ['type' => 'string'],
                    'changed' => [
                        'type' => 'string',
                        'format' => 'date-time'
                    ],
                    'created' => [
                        'type' => 'string',
                        'format' => 'date-time'
                    ]
                ],
                'required' => ['definition']
            ],
            'View' => [
                'properties' => [
                    'viewName' => ['type' => 'string'],
                    'userId' => ['type' => 'string'],
                    'tenantId' => ['type' => 'string'],
                    'displayName' => [
                        'type' => 'object',
                        'additionalProperties' => ['type' => 'string']
                    ],
                    'definition' => ['type' => 'string'],
                    'changed' => [
                        'type' => 'string',
                        'format' => 'date-time'
                    ],
                    'created' => [
                        'type' => 'string',
                        'format' => 'date-time'
                    ]
                ],
                'required' => ['definition']
            ],
            'TypePropertiesMapping' => [
                'properties' => [
                    'sourcePropertyName' => ['type' => 'string'],
                    'targetPropertyName' => ['type' => 'string'],
                    'linkType' => [
                        'type' => 'string',
                        'enum' => [
                            'UpdateAlways',
                            'CopyIfNull'
                        ]
                    ]
                ],
                'required' => [
                    'sourcePropertyName',
                    'targetPropertyName'
                ]
            ],
            'ParticipantPropertyReference' => [
                'properties' => [
                    'sourcePropertyName' => ['type' => 'string'],
                    'targetPropertyName' => ['type' => 'string']
                ],
                'required' => [
                    'sourcePropertyName',
                    'targetPropertyName'
                ]
            ],
            'LinkDefinition' => [
                'properties' => [
                    'tenantId' => ['type' => 'string'],
                    'linkName' => ['type' => 'string'],
                    'sourceEntityType' => [
                        'type' => 'string',
                        'enum' => [
                            'None',
                            'Profile',
                            'Interaction',
                            'Relationship'
                        ]
                    ],
                    'targetEntityType' => [
                        'type' => 'string',
                        'enum' => [
                            'None',
                            'Profile',
                            'Interaction',
                            'Relationship'
                        ]
                    ],
                    'sourceEntityTypeName' => ['type' => 'string'],
                    'targetEntityTypeName' => ['type' => 'string'],
                    'displayName' => [
                        'type' => 'object',
                        'additionalProperties' => ['type' => 'string']
                    ],
                    'description' => [
                        'type' => 'object',
                        'additionalProperties' => ['type' => 'string']
                    ],
                    'mappings' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/TypePropertiesMapping']
                    ],
                    'participantPropertyReferences' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/ParticipantPropertyReference']
                    ],
                    'provisioningState' => [
                        'type' => 'string',
                        'enum' => [
                            'Provisioning',
                            'Succeeded',
                            'Expiring',
                            'Deleting',
                            'HumanIntervention',
                            'Failed'
                        ]
                    ],
                    'referenceOnly' => ['type' => 'boolean'],
                    'operationType' => [
                        'type' => 'string',
                        'enum' => [
                            'Upsert',
                            'Delete'
                        ]
                    ]
                ],
                'required' => [
                    'sourceEntityType',
                    'targetEntityType',
                    'sourceEntityTypeName',
                    'targetEntityTypeName',
                    'participantPropertyReferences'
                ]
            ],
            'RelationshipTypeFieldMapping' => [
                'properties' => [
                    'profileFieldName' => ['type' => 'string'],
                    'relatedProfileKeyProperty' => ['type' => 'string']
                ],
                'required' => [
                    'profileFieldName',
                    'relatedProfileKeyProperty'
                ]
            ],
            'RelationshipTypeMapping' => [
                'properties' => ['fieldMappings' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/RelationshipTypeFieldMapping']
                ]],
                'required' => ['fieldMappings']
            ],
            'RelationshipDefinition' => [
                'properties' => [
                    'cardinality' => [
                        'type' => 'string',
                        'enum' => [
                            'OneToOne',
                            'OneToMany',
                            'ManyToMany'
                        ]
                    ],
                    'displayName' => [
                        'type' => 'object',
                        'additionalProperties' => ['type' => 'string']
                    ],
                    'description' => [
                        'type' => 'object',
                        'additionalProperties' => ['type' => 'string']
                    ],
                    'expiryDateTimeUtc' => [
                        'type' => 'string',
                        'format' => 'date-time'
                    ],
                    'fields' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/PropertyDefinition']
                    ],
                    'lookupMappings' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/RelationshipTypeMapping']
                    ],
                    'profileType' => ['type' => 'string'],
                    'provisioningState' => [
                        'type' => 'string',
                        'enum' => [
                            'Provisioning',
                            'Succeeded',
                            'Expiring',
                            'Deleting',
                            'HumanIntervention',
                            'Failed'
                        ]
                    ],
                    'relationshipName' => ['type' => 'string'],
                    'relatedProfileType' => ['type' => 'string'],
                    'relationshipGuidId' => ['type' => 'string'],
                    'tenantId' => ['type' => 'string']
                ],
                'required' => [
                    'profileType',
                    'relatedProfileType'
                ]
            ],
            'RelationshipLinkFieldMapping' => [
                'properties' => [
                    'interactionFieldName' => ['type' => 'string'],
                    'linkType' => [
                        'type' => 'string',
                        'enum' => [
                            'UpdateAlways',
                            'CopyIfNull'
                        ]
                    ],
                    'relationshipFieldName' => ['type' => 'string']
                ],
                'required' => [
                    'interactionFieldName',
                    'relationshipFieldName'
                ]
            ],
            'ParticipantProfilePropertyReference' => [
                'properties' => [
                    'interactionPropertyName' => ['type' => 'string'],
                    'profilePropertyName' => ['type' => 'string']
                ],
                'required' => [
                    'interactionPropertyName',
                    'profilePropertyName'
                ]
            ],
            'RelationshipLinkDefinition' => [
                'properties' => [
                    'displayName' => [
                        'type' => 'object',
                        'additionalProperties' => ['type' => 'string']
                    ],
                    'description' => [
                        'type' => 'object',
                        'additionalProperties' => ['type' => 'string']
                    ],
                    'interactionType' => ['type' => 'string'],
                    'linkName' => ['type' => 'string'],
                    'mappings' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/RelationshipLinkFieldMapping']
                    ],
                    'profilePropertyReferences' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/ParticipantProfilePropertyReference']
                    ],
                    'provisioningState' => [
                        'type' => 'string',
                        'enum' => [
                            'Provisioning',
                            'Succeeded',
                            'Expiring',
                            'Deleting',
                            'HumanIntervention',
                            'Failed'
                        ]
                    ],
                    'relatedProfilePropertyReferences' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/ParticipantProfilePropertyReference']
                    ],
                    'relationshipName' => ['type' => 'string'],
                    'relationshipGuidId' => ['type' => 'string'],
                    'tenantId' => ['type' => 'string']
                ],
                'required' => [
                    'interactionType',
                    'profilePropertyReferences',
                    'relatedProfilePropertyReferences',
                    'relationshipName'
                ]
            ],
            'Participant' => [
                'properties' => [
                    'profileTypeName' => ['type' => 'string'],
                    'participantPropertyReferences' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/ParticipantPropertyReference']
                    ],
                    'participantName' => ['type' => 'string'],
                    'displayName' => [
                        'type' => 'object',
                        'additionalProperties' => ['type' => 'string']
                    ],
                    'description' => [
                        'type' => 'object',
                        'additionalProperties' => ['type' => 'string']
                    ],
                    'role' => ['type' => 'string']
                ],
                'required' => [
                    'profileTypeName',
                    'participantPropertyReferences',
                    'participantName'
                ]
            ],
            'InteractionTypeDefinition' => [
                'properties' => [
                    'idPropertyNames' => [
                        'type' => 'array',
                        'items' => ['type' => 'string']
                    ],
                    'participantProfiles' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/Participant']
                    ],
                    'primaryParticipantProfilePropertyName' => ['type' => 'string'],
                    'dataSourcePrecedenceRules' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/DataSourcePrecedence']
                    ],
                    'defaultDataSource' => ['$ref' => '#/definitions/DataSource'],
                    'isActivity' => ['type' => 'boolean']
                ],
                'required' => []
            ],
            'StrongId' => [
                'properties' => [
                    'keyPropertyNames' => [
                        'type' => 'array',
                        'items' => ['type' => 'string']
                    ],
                    'strongIdName' => ['type' => 'string'],
                    'displayName' => [
                        'type' => 'object',
                        'additionalProperties' => ['type' => 'string']
                    ],
                    'description' => [
                        'type' => 'object',
                        'additionalProperties' => ['type' => 'string']
                    ]
                ],
                'required' => [
                    'keyPropertyNames',
                    'strongIdName'
                ]
            ],
            'ProfileTypeDefinition' => [
                'properties' => ['strongIds' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/StrongId']
                ]],
                'required' => []
            ],
            'ProfileResourceFormat' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/ProfileTypeDefinition']],
                'required' => []
            ],
            'ProfileListResult' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/ProfileResourceFormat']
                    ],
                    'nextLink' => ['type' => 'string']
                ],
                'required' => []
            ],
            'InteractionResourceFormat' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/InteractionTypeDefinition']],
                'required' => []
            ],
            'InteractionListResult' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/InteractionResourceFormat']
                    ],
                    'nextLink' => ['type' => 'string']
                ],
                'required' => []
            ],
            'KpiResourceFormat' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/KpiDefinition']],
                'required' => []
            ],
            'KpiListResult' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/KpiResourceFormat']
                    ],
                    'nextLink' => ['type' => 'string']
                ],
                'required' => []
            ],
            'EnrichingKpi' => [
                'properties' => [],
                'required' => []
            ],
            'ConnectorResourceFormat' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/Connector']],
                'required' => []
            ],
            'ConnectorListResult' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/ConnectorResourceFormat']
                    ],
                    'nextLink' => ['type' => 'string']
                ],
                'required' => []
            ],
            'ConnectorMappingResourceFormat' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/ConnectorMapping']],
                'required' => []
            ],
            'ConnectorMappingListResult' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/ConnectorMappingResourceFormat']
                    ],
                    'nextLink' => ['type' => 'string']
                ],
                'required' => []
            ],
            'AuthorizationPolicyResourceFormat' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/AuthorizationPolicy']],
                'required' => []
            ],
            'AuthorizationPolicyListResult' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/AuthorizationPolicyResourceFormat']
                    ],
                    'nextLink' => ['type' => 'string']
                ],
                'required' => []
            ],
            'LinkResourceFormat' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/LinkDefinition']],
                'required' => []
            ],
            'LinkListResult' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/LinkResourceFormat']
                    ],
                    'nextLink' => ['type' => 'string']
                ],
                'required' => []
            ],
            'RelationshipResourceFormat' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/RelationshipDefinition']],
                'required' => []
            ],
            'RelationshipListResult' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/RelationshipResourceFormat']
                    ],
                    'nextLink' => ['type' => 'string']
                ],
                'required' => []
            ],
            'RelationshipLinkResourceFormat' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/RelationshipLinkDefinition']],
                'required' => []
            ],
            'RelationshipLinkListResult' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/RelationshipLinkResourceFormat']
                    ],
                    'nextLink' => ['type' => 'string']
                ],
                'required' => []
            ],
            'ViewResourceFormat' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/View']],
                'required' => []
            ],
            'ViewListResult' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/ViewResourceFormat']
                    ],
                    'nextLink' => ['type' => 'string']
                ],
                'required' => []
            ],
            'WidgetTypeResourceFormat' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/WidgetType']],
                'required' => []
            ],
            'WidgetTypeListResult' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/WidgetTypeResourceFormat']
                    ],
                    'nextLink' => ['type' => 'string']
                ],
                'required' => []
            ],
            'AssignmentPrincipal' => [
                'properties' => [
                    'principalId' => ['type' => 'string'],
                    'principalType' => ['type' => 'string'],
                    'principalMetadata' => [
                        'type' => 'object',
                        'additionalProperties' => ['type' => 'string']
                    ]
                ],
                'required' => [
                    'principalId',
                    'principalType'
                ]
            ],
            'ResourceSetDescription' => [
                'properties' => [
                    'elements' => [
                        'type' => 'array',
                        'items' => ['type' => 'string']
                    ],
                    'exceptions' => [
                        'type' => 'array',
                        'items' => ['type' => 'string']
                    ]
                ],
                'required' => []
            ],
            'RoleAssignment' => [
                'properties' => [
                    'tenantId' => ['type' => 'string'],
                    'assignmentName' => ['type' => 'string'],
                    'displayName' => [
                        'type' => 'object',
                        'additionalProperties' => ['type' => 'string']
                    ],
                    'description' => [
                        'type' => 'object',
                        'additionalProperties' => ['type' => 'string']
                    ],
                    'provisioningState' => [
                        'type' => 'string',
                        'enum' => [
                            'Provisioning',
                            'Succeeded',
                            'Expiring',
                            'Deleting',
                            'HumanIntervention',
                            'Failed'
                        ]
                    ],
                    'role' => [
                        'type' => 'string',
                        'enum' => [
                            'Admin',
                            'Reader',
                            'ManageAdmin',
                            'ManageReader',
                            'DataAdmin',
                            'DataReader'
                        ]
                    ],
                    'principals' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/AssignmentPrincipal']
                    ],
                    'profiles' => ['$ref' => '#/definitions/ResourceSetDescription'],
                    'interactions' => ['$ref' => '#/definitions/ResourceSetDescription'],
                    'links' => ['$ref' => '#/definitions/ResourceSetDescription'],
                    'kpis' => ['$ref' => '#/definitions/ResourceSetDescription'],
                    'sasPolicies' => ['$ref' => '#/definitions/ResourceSetDescription'],
                    'connectors' => ['$ref' => '#/definitions/ResourceSetDescription'],
                    'views' => ['$ref' => '#/definitions/ResourceSetDescription'],
                    'relationshipLinks' => ['$ref' => '#/definitions/ResourceSetDescription'],
                    'relationships' => ['$ref' => '#/definitions/ResourceSetDescription'],
                    'widgetTypes' => ['$ref' => '#/definitions/ResourceSetDescription'],
                    'roleAssignments' => ['$ref' => '#/definitions/ResourceSetDescription'],
                    'conflationPolicies' => ['$ref' => '#/definitions/ResourceSetDescription'],
                    'segments' => ['$ref' => '#/definitions/ResourceSetDescription']
                ],
                'required' => [
                    'role',
                    'principals'
                ]
            ],
            'RoleAssignmentResourceFormat' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/RoleAssignment']],
                'required' => []
            ],
            'RoleAssignmentListResult' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/RoleAssignmentResourceFormat']
                    ],
                    'nextLink' => ['type' => 'string']
                ],
                'required' => []
            ],
            'Role' => [
                'properties' => [
                    'roleName' => ['type' => 'string'],
                    'description' => ['type' => 'string']
                ],
                'required' => []
            ],
            'RoleResourceFormat' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/Role']],
                'required' => []
            ],
            'RoleListResult' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/RoleResourceFormat']
                    ],
                    'nextLink' => ['type' => 'string']
                ],
                'required' => []
            ],
            'GetImageUploadUrlInput' => [
                'properties' => [
                    'entityType' => ['type' => 'string'],
                    'entityTypeName' => ['type' => 'string'],
                    'relativePath' => ['type' => 'string']
                ],
                'required' => []
            ],
            'ImageDefinition' => [
                'properties' => [
                    'imageExists' => ['type' => 'boolean'],
                    'contentUrl' => ['type' => 'string'],
                    'relativePath' => ['type' => 'string']
                ],
                'required' => []
            ],
            'RelationshipsLookup' => [
                'properties' => [
                    'profileName' => ['type' => 'string'],
                    'profilePropertyReferences' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/ParticipantProfilePropertyReference']
                    ],
                    'relatedProfileName' => ['type' => 'string'],
                    'relatedProfilePropertyReferences' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/ParticipantProfilePropertyReference']
                    ],
                    'existingRelationshipName' => ['type' => 'string']
                ],
                'required' => []
            ],
            'SuggestRelationshipLinksResponse' => [
                'properties' => [
                    'interactionName' => ['type' => 'string'],
                    'suggestedRelationships' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/RelationshipsLookup']
                    ]
                ],
                'required' => []
            ],
            'Prediction_mappings' => [
                'properties' => [
                    'score' => ['type' => 'string'],
                    'grade' => ['type' => 'string'],
                    'reason' => ['type' => 'string']
                ],
                'required' => []
            ],
            'Prediction_gradesItem' => [
                'properties' => [
                    'gradeName' => ['type' => 'string'],
                    'minScoreThreshold' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'maxScoreThreshold' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ]
                ],
                'required' => []
            ],
            'Prediction_systemGeneratedEntities' => [
                'properties' => [
                    'generatedInteractionTypes' => [
                        'type' => 'array',
                        'items' => ['type' => 'string']
                    ],
                    'generatedLinks' => [
                        'type' => 'array',
                        'items' => ['type' => 'string']
                    ],
                    'generatedKpis' => [
                        'type' => 'object',
                        'additionalProperties' => ['type' => 'string']
                    ]
                ],
                'required' => []
            ],
            'Prediction' => [
                'properties' => [
                    'description' => [
                        'type' => 'object',
                        'additionalProperties' => ['type' => 'string']
                    ],
                    'displayName' => [
                        'type' => 'object',
                        'additionalProperties' => ['type' => 'string']
                    ],
                    'involvedInteractionTypes' => [
                        'type' => 'array',
                        'items' => ['type' => 'string']
                    ],
                    'involvedKpiTypes' => [
                        'type' => 'array',
                        'items' => ['type' => 'string']
                    ],
                    'involvedRelationships' => [
                        'type' => 'array',
                        'items' => ['type' => 'string']
                    ],
                    'negativeOutcomeExpression' => ['type' => 'string'],
                    'positiveOutcomeExpression' => ['type' => 'string'],
                    'primaryProfileType' => ['type' => 'string'],
                    'provisioningState' => [
                        'type' => 'string',
                        'enum' => [
                            'Provisioning',
                            'Succeeded',
                            'Expiring',
                            'Deleting',
                            'HumanIntervention',
                            'Failed'
                        ]
                    ],
                    'predictionName' => ['type' => 'string'],
                    'scopeExpression' => ['type' => 'string'],
                    'tenantId' => ['type' => 'string'],
                    'autoAnalyze' => ['type' => 'boolean'],
                    'mappings' => ['$ref' => '#/definitions/Prediction_mappings'],
                    'scoreLabel' => ['type' => 'string'],
                    'grades' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/Prediction_gradesItem']
                    ],
                    'systemGeneratedEntities' => ['$ref' => '#/definitions/Prediction_systemGeneratedEntities']
                ],
                'required' => [
                    'negativeOutcomeExpression',
                    'positiveOutcomeExpression',
                    'primaryProfileType',
                    'scopeExpression',
                    'autoAnalyze',
                    'mappings',
                    'scoreLabel'
                ]
            ],
            'PredictionDistributionDefinition_distributionsItem' => [
                'properties' => [
                    'scoreThreshold' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'positives' => [
                        'type' => 'integer',
                        'format' => 'int64'
                    ],
                    'negatives' => [
                        'type' => 'integer',
                        'format' => 'int64'
                    ],
                    'positivesAboveThreshold' => [
                        'type' => 'integer',
                        'format' => 'int64'
                    ],
                    'negativesAboveThreshold' => [
                        'type' => 'integer',
                        'format' => 'int64'
                    ]
                ],
                'required' => []
            ],
            'PredictionDistributionDefinition' => [
                'properties' => [
                    'totalPositives' => [
                        'type' => 'integer',
                        'format' => 'int64'
                    ],
                    'totalNegatives' => [
                        'type' => 'integer',
                        'format' => 'int64'
                    ],
                    'distributions' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/PredictionDistributionDefinition_distributionsItem']
                    ]
                ],
                'required' => []
            ],
            'CanonicalProfileDefinition_propertiesItem' => [
                'properties' => [
                    'profileName' => ['type' => 'string'],
                    'profilePropertyName' => ['type' => 'string'],
                    'rank' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'type' => [
                        'type' => 'string',
                        'enum' => [
                            'Numeric',
                            'Categorical',
                            'DerivedCategorical',
                            'DerivedNumeric'
                        ]
                    ],
                    'value' => ['type' => 'string']
                ],
                'required' => []
            ],
            'CanonicalProfileDefinition' => [
                'properties' => [
                    'canonicalProfileId' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'properties' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/CanonicalProfileDefinition_propertiesItem']
                    ]
                ],
                'required' => []
            ],
            'PredictionTrainingResults' => [
                'properties' => [
                    'tenantId' => ['type' => 'string'],
                    'scoreName' => ['type' => 'string'],
                    'predictionDistribution' => ['$ref' => '#/definitions/PredictionDistributionDefinition'],
                    'canonicalProfiles' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/CanonicalProfileDefinition']
                    ],
                    'primaryProfileInstanceCount' => [
                        'type' => 'integer',
                        'format' => 'int64'
                    ]
                ],
                'required' => []
            ],
            'PredictionModelStatus' => [
                'properties' => [
                    'tenantId' => ['type' => 'string'],
                    'predictionName' => ['type' => 'string'],
                    'predictionGuidId' => ['type' => 'string'],
                    'status' => [
                        'type' => 'string',
                        'enum' => [
                            'New',
                            'Provisioning',
                            'ProvisioningFailed',
                            'PendingDiscovering',
                            'Discovering',
                            'PendingFeaturing',
                            'Featuring',
                            'FeaturingFailed',
                            'PendingTraining',
                            'Training',
                            'TrainingFailed',
                            'Evaluating',
                            'EvaluatingFailed',
                            'PendingModelConfirmation',
                            'Active',
                            'Deleted',
                            'HumanIntervention',
                            'Failed'
                        ]
                    ],
                    'message' => ['type' => 'string'],
                    'trainingSetCount' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'testSetCount' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'validationSetCount' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'trainingAccuracy' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'signalsUsed' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'modelVersion' => ['type' => 'string']
                ],
                'required' => ['status']
            ],
            'PredictionResourceFormat' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/Prediction']],
                'required' => []
            ],
            'PredictionListResult' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/PredictionResourceFormat']
                    ],
                    'nextLink' => ['type' => 'string']
                ],
                'required' => []
            ]
        ]
    ];
}
