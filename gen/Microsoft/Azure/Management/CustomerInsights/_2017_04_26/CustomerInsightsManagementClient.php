<?php
namespace Microsoft\Azure\Management\CustomerInsights\_2017_04_26;
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
        $this->_Hubs_group = new \Microsoft\Azure\Management\CustomerInsights\_2017_04_26\Hubs($_client);
        $this->_Profiles_group = new \Microsoft\Azure\Management\CustomerInsights\_2017_04_26\Profiles($_client);
        $this->_Interactions_group = new \Microsoft\Azure\Management\CustomerInsights\_2017_04_26\Interactions($_client);
        $this->_Relationships_group = new \Microsoft\Azure\Management\CustomerInsights\_2017_04_26\Relationships($_client);
        $this->_RelationshipLinks_group = new \Microsoft\Azure\Management\CustomerInsights\_2017_04_26\RelationshipLinks($_client);
        $this->_AuthorizationPolicies_group = new \Microsoft\Azure\Management\CustomerInsights\_2017_04_26\AuthorizationPolicies($_client);
        $this->_Connectors_group = new \Microsoft\Azure\Management\CustomerInsights\_2017_04_26\Connectors($_client);
        $this->_ConnectorMappings_group = new \Microsoft\Azure\Management\CustomerInsights\_2017_04_26\ConnectorMappings($_client);
        $this->_Kpi_group = new \Microsoft\Azure\Management\CustomerInsights\_2017_04_26\Kpi($_client);
        $this->_WidgetTypes_group = new \Microsoft\Azure\Management\CustomerInsights\_2017_04_26\WidgetTypes($_client);
        $this->_Views_group = new \Microsoft\Azure\Management\CustomerInsights\_2017_04_26\Views($_client);
        $this->_Links_group = new \Microsoft\Azure\Management\CustomerInsights\_2017_04_26\Links($_client);
        $this->_Roles_group = new \Microsoft\Azure\Management\CustomerInsights\_2017_04_26\Roles($_client);
        $this->_RoleAssignments_group = new \Microsoft\Azure\Management\CustomerInsights\_2017_04_26\RoleAssignments($_client);
        $this->_Images_group = new \Microsoft\Azure\Management\CustomerInsights\_2017_04_26\Images($_client);
        $this->_Predictions_group = new \Microsoft\Azure\Management\CustomerInsights\_2017_04_26\Predictions($_client);
    }
    /**
     * @return \Microsoft\Azure\Management\CustomerInsights\_2017_04_26\Hubs
     */
    public function getHubs()
    {
        return $this->_Hubs_group;
    }
    /**
     * @return \Microsoft\Azure\Management\CustomerInsights\_2017_04_26\Profiles
     */
    public function getProfiles()
    {
        return $this->_Profiles_group;
    }
    /**
     * @return \Microsoft\Azure\Management\CustomerInsights\_2017_04_26\Interactions
     */
    public function getInteractions()
    {
        return $this->_Interactions_group;
    }
    /**
     * @return \Microsoft\Azure\Management\CustomerInsights\_2017_04_26\Relationships
     */
    public function getRelationships()
    {
        return $this->_Relationships_group;
    }
    /**
     * @return \Microsoft\Azure\Management\CustomerInsights\_2017_04_26\RelationshipLinks
     */
    public function getRelationshipLinks()
    {
        return $this->_RelationshipLinks_group;
    }
    /**
     * @return \Microsoft\Azure\Management\CustomerInsights\_2017_04_26\AuthorizationPolicies
     */
    public function getAuthorizationPolicies()
    {
        return $this->_AuthorizationPolicies_group;
    }
    /**
     * @return \Microsoft\Azure\Management\CustomerInsights\_2017_04_26\Connectors
     */
    public function getConnectors()
    {
        return $this->_Connectors_group;
    }
    /**
     * @return \Microsoft\Azure\Management\CustomerInsights\_2017_04_26\ConnectorMappings
     */
    public function getConnectorMappings()
    {
        return $this->_ConnectorMappings_group;
    }
    /**
     * @return \Microsoft\Azure\Management\CustomerInsights\_2017_04_26\Kpi
     */
    public function getKpi()
    {
        return $this->_Kpi_group;
    }
    /**
     * @return \Microsoft\Azure\Management\CustomerInsights\_2017_04_26\WidgetTypes
     */
    public function getWidgetTypes()
    {
        return $this->_WidgetTypes_group;
    }
    /**
     * @return \Microsoft\Azure\Management\CustomerInsights\_2017_04_26\Views
     */
    public function getViews()
    {
        return $this->_Views_group;
    }
    /**
     * @return \Microsoft\Azure\Management\CustomerInsights\_2017_04_26\Links
     */
    public function getLinks()
    {
        return $this->_Links_group;
    }
    /**
     * @return \Microsoft\Azure\Management\CustomerInsights\_2017_04_26\Roles
     */
    public function getRoles()
    {
        return $this->_Roles_group;
    }
    /**
     * @return \Microsoft\Azure\Management\CustomerInsights\_2017_04_26\RoleAssignments
     */
    public function getRoleAssignments()
    {
        return $this->_RoleAssignments_group;
    }
    /**
     * @return \Microsoft\Azure\Management\CustomerInsights\_2017_04_26\Images
     */
    public function getImages()
    {
        return $this->_Images_group;
    }
    /**
     * @return \Microsoft\Azure\Management\CustomerInsights\_2017_04_26\Predictions
     */
    public function getPredictions()
    {
        return $this->_Predictions_group;
    }
    /**
     * @var \Microsoft\Azure\Management\CustomerInsights\_2017_04_26\Hubs
     */
    private $_Hubs_group;
    /**
     * @var \Microsoft\Azure\Management\CustomerInsights\_2017_04_26\Profiles
     */
    private $_Profiles_group;
    /**
     * @var \Microsoft\Azure\Management\CustomerInsights\_2017_04_26\Interactions
     */
    private $_Interactions_group;
    /**
     * @var \Microsoft\Azure\Management\CustomerInsights\_2017_04_26\Relationships
     */
    private $_Relationships_group;
    /**
     * @var \Microsoft\Azure\Management\CustomerInsights\_2017_04_26\RelationshipLinks
     */
    private $_RelationshipLinks_group;
    /**
     * @var \Microsoft\Azure\Management\CustomerInsights\_2017_04_26\AuthorizationPolicies
     */
    private $_AuthorizationPolicies_group;
    /**
     * @var \Microsoft\Azure\Management\CustomerInsights\_2017_04_26\Connectors
     */
    private $_Connectors_group;
    /**
     * @var \Microsoft\Azure\Management\CustomerInsights\_2017_04_26\ConnectorMappings
     */
    private $_ConnectorMappings_group;
    /**
     * @var \Microsoft\Azure\Management\CustomerInsights\_2017_04_26\Kpi
     */
    private $_Kpi_group;
    /**
     * @var \Microsoft\Azure\Management\CustomerInsights\_2017_04_26\WidgetTypes
     */
    private $_WidgetTypes_group;
    /**
     * @var \Microsoft\Azure\Management\CustomerInsights\_2017_04_26\Views
     */
    private $_Views_group;
    /**
     * @var \Microsoft\Azure\Management\CustomerInsights\_2017_04_26\Links
     */
    private $_Links_group;
    /**
     * @var \Microsoft\Azure\Management\CustomerInsights\_2017_04_26\Roles
     */
    private $_Roles_group;
    /**
     * @var \Microsoft\Azure\Management\CustomerInsights\_2017_04_26\RoleAssignments
     */
    private $_RoleAssignments_group;
    /**
     * @var \Microsoft\Azure\Management\CustomerInsights\_2017_04_26\Images
     */
    private $_Images_group;
    /**
     * @var \Microsoft\Azure\Management\CustomerInsights\_2017_04_26\Predictions
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
                            '$ref' => '#/definitions/Hub'
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
                            '$ref' => '#/definitions/Hub'
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
                            '$ref' => '#/definitions/ProfileResourceFormat'
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
                            '$ref' => '#/definitions/InteractionResourceFormat'
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
                            '$ref' => '#/definitions/RelationshipResourceFormat'
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
                            '$ref' => '#/definitions/RelationshipLinkResourceFormat'
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
                            '$ref' => '#/definitions/AuthorizationPolicyResourceFormat'
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
                            '$ref' => '#/definitions/ConnectorResourceFormat'
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
                            '$ref' => '#/definitions/ConnectorMappingResourceFormat'
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
                            '$ref' => '#/definitions/KpiResourceFormat'
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
                            '$ref' => '#/definitions/ViewResourceFormat'
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
                            '$ref' => '#/definitions/LinkResourceFormat'
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
                            '$ref' => '#/definitions/RoleAssignmentResourceFormat'
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
                        '$ref' => '#/definitions/GetImageUploadUrlInput'
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
                        '$ref' => '#/definitions/GetImageUploadUrlInput'
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
                            '$ref' => '#/definitions/PredictionResourceFormat'
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
                        '$ref' => '#/definitions/PredictionModelStatus'
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
            'HubBillingInfoFormat' => ['properties' => [
                'skuName' => ['type' => 'string'],
                'minUnits' => [
                    'type' => 'integer',
                    'format' => 'int32'
                ],
                'maxUnits' => [
                    'type' => 'integer',
                    'format' => 'int32'
                ]
            ]],
            'HubPropertiesFormat' => ['properties' => [
                'apiEndpoint' => ['type' => 'string'],
                'webEndpoint' => ['type' => 'string'],
                'provisioningState' => ['type' => 'string'],
                'tenantFeatures' => [
                    'type' => 'integer',
                    'format' => 'int32'
                ],
                'hubBillingInfo' => ['$ref' => '#/definitions/HubBillingInfoFormat']
            ]],
            'Hub' => ['properties' => ['properties' => ['$ref' => '#/definitions/HubPropertiesFormat']]],
            'HubListResult' => ['properties' => [
                'value' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/Hub']
                ],
                'nextLink' => ['type' => 'string']
            ]],
            'MetadataDefinitionBase' => ['properties' => [
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
            ]],
            'ProfileEnumValidValuesFormat' => ['properties' => [
                'value' => [
                    'type' => 'integer',
                    'format' => 'int32'
                ],
                'localizedValueNames' => [
                    'type' => 'object',
                    'additionalProperties' => ['type' => 'string']
                ]
            ]],
            'DataSource' => ['properties' => [
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
            ]],
            'DataSourcePrecedence' => ['properties' => [
                'dataSource' => ['$ref' => '#/definitions/DataSource'],
                'precedence' => [
                    'type' => 'integer',
                    'format' => 'int32'
                ]
            ]],
            'PropertyDefinition' => ['properties' => [
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
            ]],
            'EntityTypeDefinition' => ['properties' => [
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
            ]],
            'AuthorizationPolicy' => ['properties' => [
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
            ]],
            'SalesforceDiscoverSetting' => ['properties' => ['salesforceConnectionStringSecretUrl' => ['type' => 'string']]],
            'SalesforceTable' => ['properties' => [
                'isProfile' => ['type' => 'string'],
                'tableCategory' => ['type' => 'string'],
                'tableName' => ['type' => 'string'],
                'tableRemarks' => ['type' => 'string'],
                'tableSchema' => ['type' => 'string']
            ]],
            'SalesforceConnectorProperties' => ['properties' => [
                'usersetting' => ['$ref' => '#/definitions/SalesforceDiscoverSetting'],
                'salesforcetables' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/SalesforceTable']
                ]
            ]],
            'AzureBlobConnectorProperties' => ['properties' => ['connectionKeyVaultUrl' => ['type' => 'string']]],
            'CrmConnectorEntities' => ['properties' => [
                'logicalName' => ['type' => 'string'],
                'displayName' => ['type' => 'string'],
                'isProfile' => ['type' => 'boolean']
            ]],
            'CrmConnectorProperties' => ['properties' => [
                'connectionString' => ['type' => 'string'],
                'organizationId' => ['type' => 'string'],
                'organizationUrl' => ['type' => 'string'],
                'entities' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/CrmConnectorEntities']
                ],
                'accessToken' => ['type' => 'string']
            ]],
            'Connector' => ['properties' => [
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
            ]],
            'ConnectorMappingErrorManagement' => ['properties' => [
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
            ]],
            'ConnectorMappingFormat' => ['properties' => [
                'formatType' => ['type' => 'string'],
                'columnDelimiter' => ['type' => 'string'],
                'acceptLanguage' => ['type' => 'string'],
                'quoteCharacter' => ['type' => 'string'],
                'quoteEscapeCharacter' => ['type' => 'string'],
                'arraySeparator' => ['type' => 'string']
            ]],
            'ConnectorMappingAvailability' => ['properties' => [
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
            ]],
            'ConnectorMappingStructure' => ['properties' => [
                'propertyName' => ['type' => 'string'],
                'columnName' => ['type' => 'string'],
                'customFormatSpecifier' => ['type' => 'string'],
                'isEncrypted' => ['type' => 'boolean']
            ]],
            'ConnectorMappingCompleteOperation' => ['properties' => [
                'completionOperationType' => [
                    'type' => 'string',
                    'enum' => [
                        'DoNothing',
                        'DeleteFile',
                        'MoveFile'
                    ]
                ],
                'destinationFolder' => ['type' => 'string']
            ]],
            'ConnectorMappingProperties' => ['properties' => [
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
            ]],
            'ConnectorMapping' => ['properties' => [
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
            ]],
            'KpiThresholds' => ['properties' => [
                'lowerLimit' => [
                    'type' => 'number',
                    'format' => 'decimal'
                ],
                'upperLimit' => [
                    'type' => 'number',
                    'format' => 'decimal'
                ],
                'increasingKpi' => ['type' => 'boolean']
            ]],
            'KpiGroupByMetadata' => ['properties' => [
                'displayName' => [
                    'type' => 'object',
                    'additionalProperties' => ['type' => 'string']
                ],
                'fieldName' => ['type' => 'string'],
                'fieldType' => ['type' => 'string']
            ]],
            'KpiParticipantProfilesMetadata' => ['properties' => ['typeName' => ['type' => 'string']]],
            'KpiAlias' => ['properties' => [
                'aliasName' => ['type' => 'string'],
                'expression' => ['type' => 'string']
            ]],
            'KpiExtract' => ['properties' => [
                'extractName' => ['type' => 'string'],
                'expression' => ['type' => 'string']
            ]],
            'KpiDefinition' => ['properties' => [
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
                'type' => ['type' => 'string']
            ]],
            'WidgetType' => ['properties' => [
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
            ]],
            'View' => ['properties' => [
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
            ]],
            'TypePropertiesMapping' => ['properties' => [
                'sourcePropertyName' => ['type' => 'string'],
                'targetPropertyName' => ['type' => 'string'],
                'linkType' => [
                    'type' => 'string',
                    'enum' => [
                        'UpdateAlways',
                        'CopyIfNull'
                    ]
                ]
            ]],
            'ParticipantPropertyReference' => ['properties' => [
                'sourcePropertyName' => ['type' => 'string'],
                'targetPropertyName' => ['type' => 'string']
            ]],
            'LinkDefinition' => ['properties' => [
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
            ]],
            'RelationshipTypeFieldMapping' => ['properties' => [
                'profileFieldName' => ['type' => 'string'],
                'relatedProfileKeyProperty' => ['type' => 'string']
            ]],
            'RelationshipTypeMapping' => ['properties' => ['fieldMappings' => [
                'type' => 'array',
                'items' => ['$ref' => '#/definitions/RelationshipTypeFieldMapping']
            ]]],
            'RelationshipDefinition' => ['properties' => [
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
            ]],
            'RelationshipLinkFieldMapping' => ['properties' => [
                'interactionFieldName' => ['type' => 'string'],
                'linkType' => [
                    'type' => 'string',
                    'enum' => [
                        'UpdateAlways',
                        'CopyIfNull'
                    ]
                ],
                'relationshipFieldName' => ['type' => 'string']
            ]],
            'ParticipantProfilePropertyReference' => ['properties' => [
                'interactionPropertyName' => ['type' => 'string'],
                'profilePropertyName' => ['type' => 'string']
            ]],
            'RelationshipLinkDefinition' => ['properties' => [
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
            ]],
            'Participant' => ['properties' => [
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
            ]],
            'InteractionTypeDefinition' => ['properties' => [
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
            ]],
            'StrongId' => ['properties' => [
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
            ]],
            'ProfileTypeDefinition' => ['properties' => ['strongIds' => [
                'type' => 'array',
                'items' => ['$ref' => '#/definitions/StrongId']
            ]]],
            'ProfileResourceFormat' => ['properties' => ['properties' => ['$ref' => '#/definitions/ProfileTypeDefinition']]],
            'ProfileListResult' => ['properties' => [
                'value' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/ProfileResourceFormat']
                ],
                'nextLink' => ['type' => 'string']
            ]],
            'InteractionResourceFormat' => ['properties' => ['properties' => ['$ref' => '#/definitions/InteractionTypeDefinition']]],
            'InteractionListResult' => ['properties' => [
                'value' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/InteractionResourceFormat']
                ],
                'nextLink' => ['type' => 'string']
            ]],
            'KpiResourceFormat' => ['properties' => ['properties' => ['$ref' => '#/definitions/KpiDefinition']]],
            'KpiListResult' => ['properties' => [
                'value' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/KpiResourceFormat']
                ],
                'nextLink' => ['type' => 'string']
            ]],
            'EnrichingKpi' => ['properties' => []],
            'ConnectorResourceFormat' => ['properties' => ['properties' => ['$ref' => '#/definitions/Connector']]],
            'ConnectorListResult' => ['properties' => [
                'value' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/ConnectorResourceFormat']
                ],
                'nextLink' => ['type' => 'string']
            ]],
            'ConnectorMappingResourceFormat' => ['properties' => ['properties' => ['$ref' => '#/definitions/ConnectorMapping']]],
            'ConnectorMappingListResult' => ['properties' => [
                'value' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/ConnectorMappingResourceFormat']
                ],
                'nextLink' => ['type' => 'string']
            ]],
            'AuthorizationPolicyResourceFormat' => ['properties' => ['properties' => ['$ref' => '#/definitions/AuthorizationPolicy']]],
            'AuthorizationPolicyListResult' => ['properties' => [
                'value' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/AuthorizationPolicyResourceFormat']
                ],
                'nextLink' => ['type' => 'string']
            ]],
            'LinkResourceFormat' => ['properties' => ['properties' => ['$ref' => '#/definitions/LinkDefinition']]],
            'LinkListResult' => ['properties' => [
                'value' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/LinkResourceFormat']
                ],
                'nextLink' => ['type' => 'string']
            ]],
            'RelationshipResourceFormat' => ['properties' => ['properties' => ['$ref' => '#/definitions/RelationshipDefinition']]],
            'RelationshipListResult' => ['properties' => [
                'value' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/RelationshipResourceFormat']
                ],
                'nextLink' => ['type' => 'string']
            ]],
            'RelationshipLinkResourceFormat' => ['properties' => ['properties' => ['$ref' => '#/definitions/RelationshipLinkDefinition']]],
            'RelationshipLinkListResult' => ['properties' => [
                'value' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/RelationshipLinkResourceFormat']
                ],
                'nextLink' => ['type' => 'string']
            ]],
            'ViewResourceFormat' => ['properties' => ['properties' => ['$ref' => '#/definitions/View']]],
            'ViewListResult' => ['properties' => [
                'value' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/ViewResourceFormat']
                ],
                'nextLink' => ['type' => 'string']
            ]],
            'WidgetTypeResourceFormat' => ['properties' => ['properties' => ['$ref' => '#/definitions/WidgetType']]],
            'WidgetTypeListResult' => ['properties' => [
                'value' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/WidgetTypeResourceFormat']
                ],
                'nextLink' => ['type' => 'string']
            ]],
            'AssignmentPrincipal' => ['properties' => [
                'principalId' => ['type' => 'string'],
                'principalType' => ['type' => 'string'],
                'principalMetadata' => [
                    'type' => 'object',
                    'additionalProperties' => ['type' => 'string']
                ]
            ]],
            'ResourceSetDescription' => ['properties' => [
                'elements' => [
                    'type' => 'array',
                    'items' => ['type' => 'string']
                ],
                'exceptions' => [
                    'type' => 'array',
                    'items' => ['type' => 'string']
                ]
            ]],
            'RoleAssignment' => ['properties' => [
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
            ]],
            'RoleAssignmentResourceFormat' => ['properties' => ['properties' => ['$ref' => '#/definitions/RoleAssignment']]],
            'RoleAssignmentListResult' => ['properties' => [
                'value' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/RoleAssignmentResourceFormat']
                ],
                'nextLink' => ['type' => 'string']
            ]],
            'Role' => ['properties' => [
                'roleName' => ['type' => 'string'],
                'description' => ['type' => 'string']
            ]],
            'RoleResourceFormat' => ['properties' => ['properties' => ['$ref' => '#/definitions/Role']]],
            'RoleListResult' => ['properties' => [
                'value' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/RoleResourceFormat']
                ],
                'nextLink' => ['type' => 'string']
            ]],
            'GetImageUploadUrlInput' => ['properties' => [
                'entityType' => ['type' => 'string'],
                'entityTypeName' => ['type' => 'string'],
                'relativePath' => ['type' => 'string']
            ]],
            'ImageDefinition' => ['properties' => [
                'imageExists' => ['type' => 'boolean'],
                'contentUrl' => ['type' => 'string'],
                'relativePath' => ['type' => 'string']
            ]],
            'RelationshipsLookup' => ['properties' => [
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
            ]],
            'SuggestRelationshipLinksResponse' => ['properties' => [
                'interactionName' => ['type' => 'string'],
                'suggestedRelationships' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/RelationshipsLookup']
                ]
            ]],
            'Prediction_mappings' => ['properties' => [
                'score' => ['type' => 'string'],
                'grade' => ['type' => 'string'],
                'reason' => ['type' => 'string']
            ]],
            'Prediction_gradesItem' => ['properties' => [
                'gradeName' => ['type' => 'string'],
                'minScoreThreshold' => [
                    'type' => 'integer',
                    'format' => 'int32'
                ],
                'maxScoreThreshold' => [
                    'type' => 'integer',
                    'format' => 'int32'
                ]
            ]],
            'Prediction_systemGeneratedEntities' => ['properties' => [
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
            ]],
            'Prediction' => ['properties' => [
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
            ]],
            'PredictionDistributionDefinition_distributionsItem' => ['properties' => [
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
            ]],
            'PredictionDistributionDefinition' => ['properties' => [
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
            ]],
            'CanonicalProfileDefinition_propertiesItem' => ['properties' => [
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
            ]],
            'CanonicalProfileDefinition' => ['properties' => [
                'canonicalProfileId' => [
                    'type' => 'integer',
                    'format' => 'int32'
                ],
                'properties' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/CanonicalProfileDefinition_propertiesItem']
                ]
            ]],
            'PredictionTrainingResults' => ['properties' => [
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
            ]],
            'PredictionModelStatus' => ['properties' => [
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
            ]],
            'PredictionResourceFormat' => ['properties' => ['properties' => ['$ref' => '#/definitions/Prediction']]],
            'PredictionListResult' => ['properties' => [
                'value' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/PredictionResourceFormat']
                ],
                'nextLink' => ['type' => 'string']
            ]]
        ]
    ];
}
