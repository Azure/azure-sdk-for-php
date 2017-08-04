<?php
namespace Microsoft\Azure\Management\NotificationHubs\_2017_04_01;
final class NotificationHubsManagementClient
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
        $this->_Namespaces_group = new \Microsoft\Azure\Management\NotificationHubs\_2017_04_01\Namespaces($_client);
        $this->_Name_group = new \Microsoft\Azure\Management\NotificationHubs\_2017_04_01\Name($_client);
        $this->_NotificationHubs_group = new \Microsoft\Azure\Management\NotificationHubs\_2017_04_01\NotificationHubs($_client);
        $this->_Hubs_group = new \Microsoft\Azure\Management\NotificationHubs\_2017_04_01\Hubs($_client);
    }
    /**
     * @return \Microsoft\Azure\Management\NotificationHubs\_2017_04_01\Namespaces
     */
    public function getNamespaces()
    {
        return $this->_Namespaces_group;
    }
    /**
     * @return \Microsoft\Azure\Management\NotificationHubs\_2017_04_01\Name
     */
    public function getName()
    {
        return $this->_Name_group;
    }
    /**
     * @return \Microsoft\Azure\Management\NotificationHubs\_2017_04_01\NotificationHubs
     */
    public function getNotificationHubs()
    {
        return $this->_NotificationHubs_group;
    }
    /**
     * @return \Microsoft\Azure\Management\NotificationHubs\_2017_04_01\Hubs
     */
    public function getHubs()
    {
        return $this->_Hubs_group;
    }
    /**
     * @var \Microsoft\Azure\Management\NotificationHubs\_2017_04_01\Namespaces
     */
    private $_Namespaces_group;
    /**
     * @var \Microsoft\Azure\Management\NotificationHubs\_2017_04_01\Name
     */
    private $_Name_group;
    /**
     * @var \Microsoft\Azure\Management\NotificationHubs\_2017_04_01\NotificationHubs
     */
    private $_NotificationHubs_group;
    /**
     * @var \Microsoft\Azure\Management\NotificationHubs\_2017_04_01\Hubs
     */
    private $_Hubs_group;
    const _SWAGGER_OBJECT_DATA = [
        'host' => 'management.azure.com',
        'paths' => [
            '/subscriptions/{subscriptionId}/providers/Microsoft.NotificationHubs/checkNamespaceAvailability' => ['post' => [
                'operationId' => 'Namespaces_CheckAvailability',
                'parameters' => [
                    [
                        'name' => 'parameters',
                        'in' => 'body',
                        'required' => TRUE,
                        '$ref' => '#/definitions/CheckAvailabilityParameters'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-04-01']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/CheckAvailabilityResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.NotificationHubs/namespaces/{namespaceName}' => [
                'put' => [
                    'operationId' => 'Namespaces_CreateOrUpdate',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'namespaceName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'parameters',
                            'in' => 'body',
                            'required' => TRUE,
                            '$ref' => '#/definitions/NamespaceCreateOrUpdateParameters'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-04-01']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => [
                        '201' => ['schema' => ['$ref' => '#/definitions/NamespaceResource']],
                        '200' => ['schema' => ['$ref' => '#/definitions/NamespaceResource']]
                    ]
                ],
                'patch' => [
                    'operationId' => 'Namespaces_Patch',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'namespaceName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'parameters',
                            'in' => 'body',
                            'required' => TRUE,
                            '$ref' => '#/definitions/NamespacePatchParameters'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-04-01']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/NamespaceResource']]]
                ],
                'delete' => [
                    'operationId' => 'Namespaces_Delete',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'namespaceName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-04-01']
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
                        '200' => [],
                        '202' => []
                    ]
                ],
                'get' => [
                    'operationId' => 'Namespaces_Get',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'namespaceName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-04-01']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/NamespaceResource']]]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.NotificationHubs/namespaces/{namespaceName}/AuthorizationRules/{authorizationRuleName}' => [
                'put' => [
                    'operationId' => 'Namespaces_CreateOrUpdateAuthorizationRule',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'namespaceName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'authorizationRuleName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'parameters',
                            'in' => 'body',
                            'required' => TRUE,
                            '$ref' => '#/definitions/SharedAccessAuthorizationRuleCreateOrUpdateParameters'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-04-01']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/SharedAccessAuthorizationRuleResource']]]
                ],
                'delete' => [
                    'operationId' => 'Namespaces_DeleteAuthorizationRule',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'namespaceName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'authorizationRuleName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-04-01']
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
                        '200' => []
                    ]
                ],
                'get' => [
                    'operationId' => 'Namespaces_GetAuthorizationRule',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'namespaceName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'authorizationRuleName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-04-01']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/SharedAccessAuthorizationRuleResource']]]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.NotificationHubs/namespaces' => ['get' => [
                'operationId' => 'Namespaces_List',
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
                        'enum' => ['2017-04-01']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/NamespaceListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/providers/Microsoft.NotificationHubs/namespaces' => ['get' => [
                'operationId' => 'Namespaces_ListAll',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-04-01']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/NamespaceListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.NotificationHubs/namespaces/{namespaceName}/AuthorizationRules' => ['get' => [
                'operationId' => 'Namespaces_ListAuthorizationRules',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'namespaceName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-04-01']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/SharedAccessAuthorizationRuleListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.NotificationHubs/namespaces/{namespaceName}/AuthorizationRules/{authorizationRuleName}/listKeys' => ['post' => [
                'operationId' => 'Namespaces_ListKeys',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'namespaceName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'authorizationRuleName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-04-01']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/ResourceListKeys']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.NotificationHubs/namespaces/{namespaceName}/AuthorizationRules/{authorizationRuleName}/regenerateKeys' => ['post' => [
                'operationId' => 'Namespaces_RegenerateKeys',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'namespaceName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'authorizationRuleName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'parameters',
                        'in' => 'body',
                        'required' => TRUE,
                        '$ref' => '#/definitions/PolicykeyResource'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-04-01']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/ResourceListKeys']]]
            ]],
            '/subscriptions/{subscriptionId}/providers/Microsoft.NotificationHubs/checkNameAvailability' => ['post' => [
                'operationId' => 'Name_CheckAvailability',
                'parameters' => [
                    [
                        'name' => 'parameters',
                        'in' => 'body',
                        'required' => TRUE,
                        '$ref' => '#/definitions/CheckNameAvailabilityRequestParameters'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-04-01']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/CheckNameAvailabilityResponse']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.NotificationHubs/namespaces/{namespaceName}/checkNotificationHubAvailability' => ['post' => [
                'operationId' => 'NotificationHubs_CheckAvailability',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'namespaceName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'parameters',
                        'in' => 'body',
                        'required' => TRUE,
                        '$ref' => '#/definitions/CheckAvailabilityParameters'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-04-01']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/CheckAvailabilityResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.NotificationHubs/namespaces/{namespaceName}/notificationHubs/{notificationHubName}' => [
                'put' => [
                    'operationId' => 'NotificationHubs_CreateOrUpdate',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'namespaceName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'notificationHubName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'parameters',
                            'in' => 'body',
                            'required' => TRUE,
                            '$ref' => '#/definitions/NotificationHubCreateOrUpdateParameters'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-04-01']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => [
                        '200' => ['schema' => ['$ref' => '#/definitions/NotificationHubResource']],
                        '201' => ['schema' => ['$ref' => '#/definitions/NotificationHubResource']]
                    ]
                ],
                'delete' => [
                    'operationId' => 'NotificationHubs_Delete',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'namespaceName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'notificationHubName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-04-01']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => ['200' => []]
                ],
                'get' => [
                    'operationId' => 'NotificationHubs_Get',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'namespaceName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'notificationHubName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-04-01']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/NotificationHubResource']]]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.NotificationHubs/namespaces/{namespaceName}/notificationHubs/{notificationHubName}/AuthorizationRules/{authorizationRuleName}' => [
                'put' => [
                    'operationId' => 'NotificationHubs_CreateOrUpdateAuthorizationRule',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'namespaceName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'notificationHubName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'authorizationRuleName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'parameters',
                            'in' => 'body',
                            'required' => TRUE,
                            '$ref' => '#/definitions/SharedAccessAuthorizationRuleCreateOrUpdateParameters'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-04-01']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/SharedAccessAuthorizationRuleResource']]]
                ],
                'delete' => [
                    'operationId' => 'NotificationHubs_DeleteAuthorizationRule',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'namespaceName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'notificationHubName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'authorizationRuleName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-04-01']
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
                        '200' => []
                    ]
                ],
                'get' => [
                    'operationId' => 'NotificationHubs_GetAuthorizationRule',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'namespaceName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'notificationHubName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'authorizationRuleName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-04-01']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/SharedAccessAuthorizationRuleResource']]]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.NotificationHubs/namespaces/{namespaceName}/notificationHubs' => ['get' => [
                'operationId' => 'NotificationHubs_List',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'namespaceName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-04-01']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/NotificationHubListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.NotificationHubs/namespaces/{namespaceName}/notificationHubs/{notificationHubName}/AuthorizationRules' => ['get' => [
                'operationId' => 'NotificationHubs_ListAuthorizationRules',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'namespaceName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'notificationHubName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-04-01']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/SharedAccessAuthorizationRuleListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.NotificationHubs/namespaces/{namespaceName}/notificationHubs/{notificationHubName}/AuthorizationRules/{authorizationRuleName}/listKeys' => ['post' => [
                'operationId' => 'NotificationHubs_ListKeys',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'namespaceName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'notificationHubName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'authorizationRuleName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-04-01']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/ResourceListKeys']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.NotificationHubs/namespaces/{namespaceName}/notificationHubs/{notificationHubName}/AuthorizationRules/{authorizationRuleName}/regenerateKeys' => ['post' => [
                'operationId' => 'NotificationHubs_RegenerateKeys',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'namespaceName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'notificationHubName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'authorizationRuleName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'parameters',
                        'in' => 'body',
                        'required' => TRUE,
                        '$ref' => '#/definitions/PolicykeyResource'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-04-01']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/ResourceListKeys']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.NotificationHubs/namespaces/{namespaceName}/notificationHubs/{notificationHubName}/pnsCredentials' => ['post' => [
                'operationId' => 'NotificationHubs_GetPnsCredentials',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'namespaceName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'notificationHubName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-04-01']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/PnsCredentialsResource']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.NotificationHubs/namespaces/{namespaceName}/checkHubAvailability' => ['post' => [
                'operationId' => 'Hubs_CheckAvailability',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'namespaceName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'parameters',
                        'in' => 'body',
                        'required' => TRUE,
                        '$ref' => '#/definitions/CheckNameAvailabilityRequestParameters'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-04-01']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/CheckNameAvailabilityResponse']]]
            ]]
        ],
        'definitions' => [
            'CheckNameAvailabilityRequestParameters' => ['properties' => [
                'Name' => ['type' => 'string'],
                'Type' => ['type' => 'string']
            ]],
            'CheckNameAvailabilityResponse' => ['properties' => [
                'NameAvailable' => ['type' => 'boolean'],
                'Reason' => ['type' => 'string'],
                'Message' => ['type' => 'string']
            ]],
            'Sku' => ['properties' => [
                'name' => [
                    'type' => 'string',
                    'enum' => [
                        'Free',
                        'Basic',
                        'Standard'
                    ]
                ],
                'tier' => ['type' => 'string'],
                'size' => ['type' => 'string'],
                'family' => ['type' => 'string'],
                'capacity' => [
                    'type' => 'integer',
                    'format' => 'int32'
                ]
            ]],
            'CheckAvailabilityParameters' => ['properties' => [
                'id' => ['type' => 'string'],
                'name' => ['type' => 'string'],
                'type' => ['type' => 'string'],
                'location' => ['type' => 'string'],
                'tags' => [
                    'type' => 'object',
                    'additionalProperties' => ['type' => 'string']
                ],
                'sku' => ['$ref' => '#/definitions/Sku'],
                'isAvailiable' => ['type' => 'boolean']
            ]],
            'CheckAvailabilityResult' => ['properties' => ['isAvailiable' => ['type' => 'boolean']]],
            'NamespaceProperties' => ['properties' => [
                'name' => ['type' => 'string'],
                'provisioningState' => ['type' => 'string'],
                'region' => ['type' => 'string'],
                'status' => ['type' => 'string'],
                'createdAt' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ],
                'serviceBusEndpoint' => ['type' => 'string'],
                'subscriptionId' => ['type' => 'string'],
                'scaleUnit' => ['type' => 'string'],
                'enabled' => ['type' => 'boolean'],
                'critical' => ['type' => 'boolean'],
                'namespaceType' => [
                    'type' => 'string',
                    'enum' => [
                        'Messaging',
                        'NotificationHub'
                    ]
                ]
            ]],
            'NamespaceCreateOrUpdateParameters' => ['properties' => ['properties' => ['$ref' => '#/definitions/NamespaceProperties']]],
            'NamespacePatchParameters' => ['properties' => [
                'tags' => [
                    'type' => 'object',
                    'additionalProperties' => ['type' => 'string']
                ],
                'sku' => ['$ref' => '#/definitions/Sku']
            ]],
            'NamespaceResource' => ['properties' => ['properties' => ['$ref' => '#/definitions/NamespaceProperties']]],
            'SharedAccessAuthorizationRuleProperties' => ['properties' => ['rights' => [
                'type' => 'array',
                'items' => [
                    'type' => 'string',
                    'enum' => [
                        'Manage',
                        'Send',
                        'Listen'
                    ]
                ]
            ]]],
            'SharedAccessAuthorizationRuleCreateOrUpdateParameters' => ['properties' => ['properties' => ['$ref' => '#/definitions/SharedAccessAuthorizationRuleProperties']]],
            'SharedAccessAuthorizationRuleResource' => ['properties' => ['properties' => ['$ref' => '#/definitions/SharedAccessAuthorizationRuleProperties']]],
            'NamespaceListResult' => ['properties' => [
                'value' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/NamespaceResource']
                ],
                'nextLink' => ['type' => 'string']
            ]],
            'SharedAccessAuthorizationRuleListResult' => ['properties' => [
                'value' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/SharedAccessAuthorizationRuleResource']
                ],
                'nextLink' => ['type' => 'string']
            ]],
            'ResourceListKeys' => ['properties' => [
                'primaryConnectionString' => ['type' => 'string'],
                'secondaryConnectionString' => ['type' => 'string'],
                'primaryKey' => ['type' => 'string'],
                'secondaryKey' => ['type' => 'string'],
                'keyName' => ['type' => 'string']
            ]],
            'PolicykeyResource' => ['properties' => ['policyKey' => ['type' => 'string']]],
            'ApnsCredentialProperties' => ['properties' => [
                'apnsCertificate' => ['type' => 'string'],
                'certificateKey' => ['type' => 'string'],
                'endpoint' => ['type' => 'string'],
                'thumbprint' => ['type' => 'string'],
                'keyId' => ['type' => 'string'],
                'appName' => ['type' => 'string'],
                'appId' => ['type' => 'string'],
                'token' => ['type' => 'string']
            ]],
            'ApnsCredential' => ['properties' => ['properties' => ['$ref' => '#/definitions/ApnsCredentialProperties']]],
            'WnsCredentialProperties' => ['properties' => [
                'packageSid' => ['type' => 'string'],
                'secretKey' => ['type' => 'string'],
                'windowsLiveEndpoint' => ['type' => 'string']
            ]],
            'WnsCredential' => ['properties' => ['properties' => ['$ref' => '#/definitions/WnsCredentialProperties']]],
            'GcmCredentialProperties' => ['properties' => [
                'gcmEndpoint' => ['type' => 'string'],
                'googleApiKey' => ['type' => 'string']
            ]],
            'GcmCredential' => ['properties' => ['properties' => ['$ref' => '#/definitions/GcmCredentialProperties']]],
            'MpnsCredentialProperties' => ['properties' => [
                'mpnsCertificate' => ['type' => 'string'],
                'certificateKey' => ['type' => 'string'],
                'thumbprint' => ['type' => 'string']
            ]],
            'MpnsCredential' => ['properties' => ['properties' => ['$ref' => '#/definitions/MpnsCredentialProperties']]],
            'AdmCredentialProperties' => ['properties' => [
                'clientId' => ['type' => 'string'],
                'clientSecret' => ['type' => 'string'],
                'authTokenUrl' => ['type' => 'string']
            ]],
            'AdmCredential' => ['properties' => ['properties' => ['$ref' => '#/definitions/AdmCredentialProperties']]],
            'BaiduCredentialProperties' => ['properties' => [
                'baiduApiKey' => ['type' => 'string'],
                'baiduEndPoint' => ['type' => 'string'],
                'baiduSecretKey' => ['type' => 'string']
            ]],
            'BaiduCredential' => ['properties' => ['properties' => ['$ref' => '#/definitions/BaiduCredentialProperties']]],
            'NotificationHubProperties' => ['properties' => [
                'name' => ['type' => 'string'],
                'registrationTtl' => ['type' => 'string'],
                'authorizationRules' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/SharedAccessAuthorizationRuleProperties']
                ],
                'apnsCredential' => ['$ref' => '#/definitions/ApnsCredential'],
                'wnsCredential' => ['$ref' => '#/definitions/WnsCredential'],
                'gcmCredential' => ['$ref' => '#/definitions/GcmCredential'],
                'mpnsCredential' => ['$ref' => '#/definitions/MpnsCredential'],
                'admCredential' => ['$ref' => '#/definitions/AdmCredential'],
                'baiduCredential' => ['$ref' => '#/definitions/BaiduCredential']
            ]],
            'NotificationHubCreateOrUpdateParameters' => ['properties' => ['properties' => ['$ref' => '#/definitions/NotificationHubProperties']]],
            'NotificationHubResource' => ['properties' => ['properties' => ['$ref' => '#/definitions/NotificationHubProperties']]],
            'PnsCredentialsProperties' => ['properties' => [
                'apnsCredential' => ['$ref' => '#/definitions/ApnsCredential'],
                'wnsCredential' => ['$ref' => '#/definitions/WnsCredential'],
                'gcmCredential' => ['$ref' => '#/definitions/GcmCredential'],
                'mpnsCredential' => ['$ref' => '#/definitions/MpnsCredential'],
                'admCredential' => ['$ref' => '#/definitions/AdmCredential'],
                'baiduCredential' => ['$ref' => '#/definitions/BaiduCredential']
            ]],
            'PnsCredentialsResource' => ['properties' => ['properties' => ['$ref' => '#/definitions/PnsCredentialsProperties']]],
            'NotificationHubListResult' => ['properties' => [
                'value' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/NotificationHubResource']
                ],
                'nextLink' => ['type' => 'string']
            ]],
            'Resource' => ['properties' => [
                'id' => ['type' => 'string'],
                'name' => ['type' => 'string'],
                'type' => ['type' => 'string'],
                'location' => ['type' => 'string'],
                'tags' => [
                    'type' => 'object',
                    'additionalProperties' => ['type' => 'string']
                ],
                'sku' => ['$ref' => '#/definitions/Sku']
            ]],
            'SubResource' => ['properties' => ['id' => ['type' => 'string']]]
        ]
    ];
}
