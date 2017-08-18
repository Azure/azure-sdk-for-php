<?php
namespace Microsoft\Azure\Management\ServiceBus;
final class ServiceBusManagementClient
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
        $this->_Operations_group = new \Microsoft\Azure\Management\ServiceBus\Operations($_client);
        $this->_Namespaces_group = new \Microsoft\Azure\Management\ServiceBus\Namespaces($_client);
        $this->_Queues_group = new \Microsoft\Azure\Management\ServiceBus\Queues($_client);
        $this->_Topics_group = new \Microsoft\Azure\Management\ServiceBus\Topics($_client);
        $this->_Subscriptions_group = new \Microsoft\Azure\Management\ServiceBus\Subscriptions($_client);
        $this->_Rules_group = new \Microsoft\Azure\Management\ServiceBus\Rules($_client);
        $this->_Regions_group = new \Microsoft\Azure\Management\ServiceBus\Regions($_client);
        $this->_PremiumMessagingRegions_group = new \Microsoft\Azure\Management\ServiceBus\PremiumMessagingRegions($_client);
        $this->_EventHubs_group = new \Microsoft\Azure\Management\ServiceBus\EventHubs($_client);
    }
    /**
     * @return \Microsoft\Azure\Management\ServiceBus\Operations
     */
    public function getOperations()
    {
        return $this->_Operations_group;
    }
    /**
     * @return \Microsoft\Azure\Management\ServiceBus\Namespaces
     */
    public function getNamespaces()
    {
        return $this->_Namespaces_group;
    }
    /**
     * @return \Microsoft\Azure\Management\ServiceBus\Queues
     */
    public function getQueues()
    {
        return $this->_Queues_group;
    }
    /**
     * @return \Microsoft\Azure\Management\ServiceBus\Topics
     */
    public function getTopics()
    {
        return $this->_Topics_group;
    }
    /**
     * @return \Microsoft\Azure\Management\ServiceBus\Subscriptions
     */
    public function getSubscriptions()
    {
        return $this->_Subscriptions_group;
    }
    /**
     * @return \Microsoft\Azure\Management\ServiceBus\Rules
     */
    public function getRules()
    {
        return $this->_Rules_group;
    }
    /**
     * @return \Microsoft\Azure\Management\ServiceBus\Regions
     */
    public function getRegions()
    {
        return $this->_Regions_group;
    }
    /**
     * @return \Microsoft\Azure\Management\ServiceBus\PremiumMessagingRegions
     */
    public function getPremiumMessagingRegions()
    {
        return $this->_PremiumMessagingRegions_group;
    }
    /**
     * @return \Microsoft\Azure\Management\ServiceBus\EventHubs
     */
    public function getEventHubs()
    {
        return $this->_EventHubs_group;
    }
    /**
     * @var \Microsoft\Azure\Management\ServiceBus\Operations
     */
    private $_Operations_group;
    /**
     * @var \Microsoft\Azure\Management\ServiceBus\Namespaces
     */
    private $_Namespaces_group;
    /**
     * @var \Microsoft\Azure\Management\ServiceBus\Queues
     */
    private $_Queues_group;
    /**
     * @var \Microsoft\Azure\Management\ServiceBus\Topics
     */
    private $_Topics_group;
    /**
     * @var \Microsoft\Azure\Management\ServiceBus\Subscriptions
     */
    private $_Subscriptions_group;
    /**
     * @var \Microsoft\Azure\Management\ServiceBus\Rules
     */
    private $_Rules_group;
    /**
     * @var \Microsoft\Azure\Management\ServiceBus\Regions
     */
    private $_Regions_group;
    /**
     * @var \Microsoft\Azure\Management\ServiceBus\PremiumMessagingRegions
     */
    private $_PremiumMessagingRegions_group;
    /**
     * @var \Microsoft\Azure\Management\ServiceBus\EventHubs
     */
    private $_EventHubs_group;
    const _SWAGGER_OBJECT_DATA = [
        'host' => 'management.azure.com',
        'paths' => [
            '/providers/Microsoft.ServiceBus/operations' => ['get' => [
                'operationId' => 'Operations_List',
                'parameters' => [[
                    'name' => 'api-version',
                    'in' => 'query',
                    'required' => TRUE,
                    'type' => 'string',
                    'enum' => ['2017-04-01']
                ]],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/OperationListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/providers/Microsoft.ServiceBus/CheckNameAvailability' => ['post' => [
                'operationId' => 'Namespaces_CheckNameAvailability',
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
                    ],
                    [
                        'name' => 'parameters',
                        'in' => 'body',
                        'required' => TRUE,
                        'schema' => ['$ref' => '#/definitions/CheckNameAvailability']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/CheckNameAvailabilityResult']]]
            ]],
            '/subscriptions/{subscriptionId}/providers/Microsoft.ServiceBus/namespaces' => ['get' => [
                'operationId' => 'Namespaces_List',
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
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/SBNamespaceListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.ServiceBus/namespaces' => ['get' => [
                'operationId' => 'Namespaces_ListByResourceGroup',
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
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/SBNamespaceListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.ServiceBus/namespaces/{namespaceName}' => [
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
                            'schema' => ['$ref' => '#/definitions/SBNamespace']
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
                        '201' => ['schema' => ['$ref' => '#/definitions/SBNamespace']],
                        '200' => ['schema' => ['$ref' => '#/definitions/SBNamespace']],
                        '202' => []
                    ]
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
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/SBNamespace']]]
                ],
                'patch' => [
                    'operationId' => 'Namespaces_Update',
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
                            'schema' => ['$ref' => '#/definitions/SBNamespaceUpdateParameters']
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
                        '201' => ['schema' => ['$ref' => '#/definitions/SBNamespace']],
                        '200' => ['schema' => ['$ref' => '#/definitions/SBNamespace']],
                        '202' => []
                    ]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.ServiceBus/namespaces/{namespaceName}/AuthorizationRules' => ['get' => [
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
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/SBAuthorizationRuleListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.ServiceBus/namespaces/{namespaceName}/AuthorizationRules/{authorizationRuleName}' => [
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
                            'schema' => ['$ref' => '#/definitions/SBAuthorizationRule']
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
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/SBAuthorizationRule']]]
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
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/SBAuthorizationRule']]]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.ServiceBus/namespaces/{namespaceName}/AuthorizationRules/{authorizationRuleName}/listKeys' => ['post' => [
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
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/AccessKeys']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.ServiceBus/namespaces/{namespaceName}/AuthorizationRules/{authorizationRuleName}/regenerateKeys' => ['post' => [
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
                        'schema' => ['$ref' => '#/definitions/RegenerateAccessKeyParameters']
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
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/AccessKeys']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.ServiceBus/namespaces/{namespaceName}/queues' => ['get' => [
                'operationId' => 'Queues_ListByNamespace',
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
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/SBQueueListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.ServiceBus/namespaces/{namespaceName}/queues/{queueName}' => [
                'put' => [
                    'operationId' => 'Queues_CreateOrUpdate',
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
                            'name' => 'queueName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'parameters',
                            'in' => 'body',
                            'required' => TRUE,
                            'schema' => ['$ref' => '#/definitions/SBQueue']
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
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/SBQueue']]]
                ],
                'delete' => [
                    'operationId' => 'Queues_Delete',
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
                            'name' => 'queueName',
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
                    'operationId' => 'Queues_Get',
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
                            'name' => 'queueName',
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
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/SBQueue']]]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.ServiceBus/namespaces/{namespaceName}/queues/{queueName}/authorizationRules' => ['get' => [
                'operationId' => 'Queues_ListAuthorizationRules',
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
                        'name' => 'queueName',
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
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/SBAuthorizationRuleListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.ServiceBus/namespaces/{namespaceName}/queues/{queueName}/authorizationRules/{authorizationRuleName}' => [
                'put' => [
                    'operationId' => 'Queues_CreateOrUpdateAuthorizationRule',
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
                            'name' => 'queueName',
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
                            'schema' => ['$ref' => '#/definitions/SBAuthorizationRule']
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
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/SBAuthorizationRule']]]
                ],
                'delete' => [
                    'operationId' => 'Queues_DeleteAuthorizationRule',
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
                            'name' => 'queueName',
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
                    'operationId' => 'Queues_GetAuthorizationRule',
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
                            'name' => 'queueName',
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
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/SBAuthorizationRule']]]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.ServiceBus/namespaces/{namespaceName}/queues/{queueName}/authorizationRules/{authorizationRuleName}/ListKeys' => ['post' => [
                'operationId' => 'Queues_ListKeys',
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
                        'name' => 'queueName',
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
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/AccessKeys']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.ServiceBus/namespaces/{namespaceName}/queues/{queueName}/authorizationRules/{authorizationRuleName}/regenerateKeys' => ['post' => [
                'operationId' => 'Queues_RegenerateKeys',
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
                        'name' => 'queueName',
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
                        'schema' => ['$ref' => '#/definitions/RegenerateAccessKeyParameters']
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
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/AccessKeys']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.ServiceBus/namespaces/{namespaceName}/topics' => ['get' => [
                'operationId' => 'Topics_ListByNamespace',
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
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/SBTopicListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.ServiceBus/namespaces/{namespaceName}/topics/{topicName}' => [
                'put' => [
                    'operationId' => 'Topics_CreateOrUpdate',
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
                            'name' => 'topicName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'parameters',
                            'in' => 'body',
                            'required' => TRUE,
                            'schema' => ['$ref' => '#/definitions/SBTopic']
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
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/SBTopic']]]
                ],
                'delete' => [
                    'operationId' => 'Topics_Delete',
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
                            'name' => 'topicName',
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
                    'operationId' => 'Topics_Get',
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
                            'name' => 'topicName',
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
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/SBTopic']]]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.ServiceBus/namespaces/{namespaceName}/topics/{topicName}/authorizationRules' => ['get' => [
                'operationId' => 'Topics_ListAuthorizationRules',
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
                        'name' => 'topicName',
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
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/SBAuthorizationRuleListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.ServiceBus/namespaces/{namespaceName}/topics/{topicName}/authorizationRules/{authorizationRuleName}' => [
                'put' => [
                    'operationId' => 'Topics_CreateOrUpdateAuthorizationRule',
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
                            'name' => 'topicName',
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
                            'schema' => ['$ref' => '#/definitions/SBAuthorizationRule']
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
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/SBAuthorizationRule']]]
                ],
                'get' => [
                    'operationId' => 'Topics_GetAuthorizationRule',
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
                            'name' => 'topicName',
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
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/SBAuthorizationRule']]]
                ],
                'delete' => [
                    'operationId' => 'Topics_DeleteAuthorizationRule',
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
                            'name' => 'topicName',
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
                ]
            ],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.ServiceBus/namespaces/{namespaceName}/topics/{topicName}/authorizationRules/{authorizationRuleName}/ListKeys' => ['post' => [
                'operationId' => 'Topics_ListKeys',
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
                        'name' => 'topicName',
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
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/AccessKeys']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.ServiceBus/namespaces/{namespaceName}/topics/{topicName}/authorizationRules/{authorizationRuleName}/regenerateKeys' => ['post' => [
                'operationId' => 'Topics_RegenerateKeys',
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
                        'name' => 'topicName',
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
                        'schema' => ['$ref' => '#/definitions/RegenerateAccessKeyParameters']
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
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/AccessKeys']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.ServiceBus/namespaces/{namespaceName}/topics/{topicName}/subscriptions' => ['get' => [
                'operationId' => 'Subscriptions_ListByTopic',
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
                        'name' => 'topicName',
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
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/SBSubscriptionListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.ServiceBus/namespaces/{namespaceName}/topics/{topicName}/subscriptions/{subscriptionName}' => [
                'put' => [
                    'operationId' => 'Subscriptions_CreateOrUpdate',
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
                            'name' => 'topicName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'subscriptionName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'parameters',
                            'in' => 'body',
                            'required' => TRUE,
                            'schema' => ['$ref' => '#/definitions/SBSubscription']
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
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/SBSubscription']]]
                ],
                'delete' => [
                    'operationId' => 'Subscriptions_Delete',
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
                            'name' => 'topicName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'subscriptionName',
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
                    'operationId' => 'Subscriptions_Get',
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
                            'name' => 'topicName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'subscriptionName',
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
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/SBSubscription']]]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.ServiceBus/namespaces/{namespaceName}/topics/{topicName}/subscriptions/{subscriptionName}/rules' => ['get' => [
                'operationId' => 'Rules_ListBySubscriptions',
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
                        'name' => 'topicName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'subscriptionName',
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
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/RuleListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.ServiceBus/namespaces/{namespaceName}/topics/{topicName}/subscriptions/{subscriptionName}/rules/{ruleName}' => [
                'put' => [
                    'operationId' => 'Rules_CreateOrUpdate',
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
                            'name' => 'topicName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'subscriptionName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'ruleName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'parameters',
                            'in' => 'body',
                            'required' => TRUE,
                            'schema' => ['$ref' => '#/definitions/Rule']
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
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/Rule']]]
                ],
                'delete' => [
                    'operationId' => 'Rules_Delete',
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
                            'name' => 'topicName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'subscriptionName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'ruleName',
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
                    'operationId' => 'Rules_Get',
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
                            'name' => 'topicName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'subscriptionName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'ruleName',
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
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/Rule']]]
                ]
            ],
            '/subscriptions/{subscriptionId}/providers/Microsoft.ServiceBus/sku/{sku}/regions' => ['get' => [
                'operationId' => 'Regions_ListBySku',
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
                    ],
                    [
                        'name' => 'sku',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/PremiumMessagingRegionsListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/providers/Microsoft.ServiceBus/premiumMessagingRegions' => ['get' => [
                'operationId' => 'PremiumMessagingRegions_List',
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
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/PremiumMessagingRegionsListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.ServiceBus/namespaces/{namespaceName}/eventhubs' => ['get' => [
                'operationId' => 'EventHubs_ListByNamespace',
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
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/EventHubListResult']]]
            ]]
        ],
        'definitions' => [
            'TrackedResource' => [
                'properties' => [
                    'location' => ['type' => 'string'],
                    'tags' => [
                        'type' => 'object',
                        'additionalProperties' => ['type' => 'string']
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => ['location']
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
            'ResourceNamespacePatch' => [
                'properties' => [
                    'location' => ['type' => 'string'],
                    'tags' => [
                        'type' => 'object',
                        'additionalProperties' => ['type' => 'string']
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'SBSku' => [
                'properties' => [
                    'name' => [
                        'type' => 'string',
                        'enum' => [
                            'Basic',
                            'Standard',
                            'Premium'
                        ]
                    ],
                    'tier' => [
                        'type' => 'string',
                        'enum' => [
                            'Basic',
                            'Standard',
                            'Premium'
                        ]
                    ],
                    'capacity' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => ['name']
            ],
            'SBNamespaceProperties' => [
                'properties' => [
                    'provisioningState' => [
                        'type' => 'string',
                        'readOnly' => TRUE
                    ],
                    'createdAt' => [
                        'type' => 'string',
                        'format' => 'date-time',
                        'readOnly' => TRUE
                    ],
                    'updatedAt' => [
                        'type' => 'string',
                        'format' => 'date-time',
                        'readOnly' => TRUE
                    ],
                    'serviceBusEndpoint' => [
                        'type' => 'string',
                        'readOnly' => TRUE
                    ],
                    'metricId' => [
                        'type' => 'string',
                        'readOnly' => TRUE
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'SBNamespace' => [
                'properties' => [
                    'sku' => ['$ref' => '#/definitions/SBSku'],
                    'properties' => ['$ref' => '#/definitions/SBNamespaceProperties']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'SBNamespaceListResult' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/SBNamespace']
                    ],
                    'nextLink' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'SBNamespaceUpdateParameters' => [
                'properties' => [
                    'sku' => ['$ref' => '#/definitions/SBSku'],
                    'properties' => ['$ref' => '#/definitions/SBNamespaceProperties']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'SBAuthorizationRule_properties' => [
                'properties' => ['rights' => [
                    'type' => 'array',
                    'items' => [
                        'type' => 'string',
                        'enum' => [
                            'Manage',
                            'Send',
                            'Listen'
                        ]
                    ]
                ]],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'SBAuthorizationRule' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/SBAuthorizationRule_properties']],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'SBAuthorizationRuleListResult' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/SBAuthorizationRule']
                    ],
                    'nextLink' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'AuthorizationRuleProperties' => [
                'properties' => ['rights' => [
                    'type' => 'array',
                    'items' => [
                        'type' => 'string',
                        'enum' => [
                            'Manage',
                            'Send',
                            'Listen'
                        ]
                    ]
                ]],
                'additionalProperties' => FALSE,
                'required' => ['rights']
            ],
            'AccessKeys' => [
                'properties' => [
                    'primaryConnectionString' => [
                        'type' => 'string',
                        'readOnly' => TRUE
                    ],
                    'secondaryConnectionString' => [
                        'type' => 'string',
                        'readOnly' => TRUE
                    ],
                    'primaryKey' => [
                        'type' => 'string',
                        'readOnly' => TRUE
                    ],
                    'secondaryKey' => [
                        'type' => 'string',
                        'readOnly' => TRUE
                    ],
                    'keyName' => [
                        'type' => 'string',
                        'readOnly' => TRUE
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'RegenerateAccessKeyParameters' => [
                'properties' => [
                    'keyType' => [
                        'type' => 'string',
                        'enum' => [
                            'PrimaryKey',
                            'SecondaryKey'
                        ]
                    ],
                    'key' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => ['keyType']
            ],
            'MessageCountDetails' => [
                'properties' => [
                    'activeMessageCount' => [
                        'type' => 'integer',
                        'format' => 'int64',
                        'readOnly' => TRUE
                    ],
                    'deadLetterMessageCount' => [
                        'type' => 'integer',
                        'format' => 'int64',
                        'readOnly' => TRUE
                    ],
                    'scheduledMessageCount' => [
                        'type' => 'integer',
                        'format' => 'int64',
                        'readOnly' => TRUE
                    ],
                    'transferMessageCount' => [
                        'type' => 'integer',
                        'format' => 'int64',
                        'readOnly' => TRUE
                    ],
                    'transferDeadLetterMessageCount' => [
                        'type' => 'integer',
                        'format' => 'int64',
                        'readOnly' => TRUE
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'SBQueueProperties' => [
                'properties' => [
                    'countDetails' => [
                        '$ref' => '#/definitions/MessageCountDetails',
                        'readOnly' => TRUE
                    ],
                    'createdAt' => [
                        'type' => 'string',
                        'format' => 'date-time',
                        'readOnly' => TRUE
                    ],
                    'updatedAt' => [
                        'type' => 'string',
                        'format' => 'date-time',
                        'readOnly' => TRUE
                    ],
                    'accessedAt' => [
                        'type' => 'string',
                        'format' => 'date-time',
                        'readOnly' => TRUE
                    ],
                    'sizeInBytes' => [
                        'type' => 'integer',
                        'format' => 'int64',
                        'readOnly' => TRUE
                    ],
                    'messageCount' => [
                        'type' => 'integer',
                        'format' => 'int64',
                        'readOnly' => TRUE
                    ],
                    'lockDuration' => [
                        'type' => 'string',
                        'format' => 'duration'
                    ],
                    'maxSizeInMegabytes' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'requiresDuplicateDetection' => ['type' => 'boolean'],
                    'requiresSession' => ['type' => 'boolean'],
                    'defaultMessageTimeToLive' => [
                        'type' => 'string',
                        'format' => 'duration'
                    ],
                    'deadLetteringOnMessageExpiration' => ['type' => 'boolean'],
                    'duplicateDetectionHistoryTimeWindow' => [
                        'type' => 'string',
                        'format' => 'duration'
                    ],
                    'maxDeliveryCount' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'status' => [
                        'type' => 'string',
                        'enum' => [
                            'Active',
                            'Disabled',
                            'Restoring',
                            'SendDisabled',
                            'ReceiveDisabled',
                            'Creating',
                            'Deleting',
                            'Renaming',
                            'Unknown'
                        ]
                    ],
                    'autoDeleteOnIdle' => [
                        'type' => 'string',
                        'format' => 'duration'
                    ],
                    'enablePartitioning' => ['type' => 'boolean'],
                    'enableExpress' => ['type' => 'boolean']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'SBQueue' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/SBQueueProperties']],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'SBQueueListResult' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/SBQueue']
                    ],
                    'nextLink' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'SBTopicProperties' => [
                'properties' => [
                    'sizeInBytes' => [
                        'type' => 'integer',
                        'format' => 'int64',
                        'readOnly' => TRUE
                    ],
                    'createdAt' => [
                        'type' => 'string',
                        'format' => 'date-time',
                        'readOnly' => TRUE
                    ],
                    'updatedAt' => [
                        'type' => 'string',
                        'format' => 'date-time',
                        'readOnly' => TRUE
                    ],
                    'accessedAt' => [
                        'type' => 'string',
                        'format' => 'date-time',
                        'readOnly' => TRUE
                    ],
                    'subscriptionCount' => [
                        'type' => 'integer',
                        'format' => 'int32',
                        'readOnly' => TRUE
                    ],
                    'countDetails' => [
                        '$ref' => '#/definitions/MessageCountDetails',
                        'readOnly' => TRUE
                    ],
                    'defaultMessageTimeToLive' => [
                        'type' => 'string',
                        'format' => 'duration'
                    ],
                    'maxSizeInMegabytes' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'requiresDuplicateDetection' => ['type' => 'boolean'],
                    'duplicateDetectionHistoryTimeWindow' => [
                        'type' => 'string',
                        'format' => 'duration'
                    ],
                    'enableBatchedOperations' => ['type' => 'boolean'],
                    'status' => [
                        'type' => 'string',
                        'enum' => [
                            'Active',
                            'Disabled',
                            'Restoring',
                            'SendDisabled',
                            'ReceiveDisabled',
                            'Creating',
                            'Deleting',
                            'Renaming',
                            'Unknown'
                        ]
                    ],
                    'supportOrdering' => ['type' => 'boolean'],
                    'autoDeleteOnIdle' => [
                        'type' => 'string',
                        'format' => 'duration'
                    ],
                    'enablePartitioning' => ['type' => 'boolean'],
                    'enableExpress' => ['type' => 'boolean']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'SBTopic' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/SBTopicProperties']],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'SBTopicListResult' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/SBTopic']
                    ],
                    'nextLink' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'SBSubscriptionProperties' => [
                'properties' => [
                    'messageCount' => [
                        'type' => 'integer',
                        'format' => 'int64',
                        'readOnly' => TRUE
                    ],
                    'createdAt' => [
                        'type' => 'string',
                        'format' => 'date-time',
                        'readOnly' => TRUE
                    ],
                    'accessedAt' => [
                        'type' => 'string',
                        'format' => 'date-time',
                        'readOnly' => TRUE
                    ],
                    'updatedAt' => [
                        'type' => 'string',
                        'format' => 'date-time',
                        'readOnly' => TRUE
                    ],
                    'countDetails' => [
                        '$ref' => '#/definitions/MessageCountDetails',
                        'readOnly' => TRUE
                    ],
                    'lockDuration' => [
                        'type' => 'string',
                        'format' => 'duration'
                    ],
                    'requiresSession' => ['type' => 'boolean'],
                    'defaultMessageTimeToLive' => [
                        'type' => 'string',
                        'format' => 'duration'
                    ],
                    'deadLetteringOnMessageExpiration' => ['type' => 'boolean'],
                    'duplicateDetectionHistoryTimeWindow' => [
                        'type' => 'string',
                        'format' => 'duration'
                    ],
                    'maxDeliveryCount' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'status' => [
                        'type' => 'string',
                        'enum' => [
                            'Active',
                            'Disabled',
                            'Restoring',
                            'SendDisabled',
                            'ReceiveDisabled',
                            'Creating',
                            'Deleting',
                            'Renaming',
                            'Unknown'
                        ]
                    ],
                    'enableBatchedOperations' => ['type' => 'boolean'],
                    'autoDeleteOnIdle' => [
                        'type' => 'string',
                        'format' => 'duration'
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'SBSubscription' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/SBSubscriptionProperties']],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'SBSubscriptionListResult' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/SBSubscription']
                    ],
                    'nextLink' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'CheckNameAvailability' => [
                'properties' => ['name' => ['type' => 'string']],
                'additionalProperties' => FALSE,
                'required' => ['name']
            ],
            'CheckNameAvailabilityResult' => [
                'properties' => [
                    'message' => [
                        'type' => 'string',
                        'readOnly' => TRUE
                    ],
                    'nameAvailable' => ['type' => 'boolean'],
                    'reason' => [
                        'type' => 'string',
                        'enum' => [
                            'None',
                            'InvalidName',
                            'SubscriptionIsDisabled',
                            'NameInUse',
                            'NameInLockdown',
                            'TooManyNamespaceInCurrentSubscription'
                        ]
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'Operation_display' => [
                'properties' => [
                    'provider' => [
                        'type' => 'string',
                        'readOnly' => TRUE
                    ],
                    'resource' => [
                        'type' => 'string',
                        'readOnly' => TRUE
                    ],
                    'operation' => [
                        'type' => 'string',
                        'readOnly' => TRUE
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'Operation' => [
                'properties' => [
                    'name' => [
                        'type' => 'string',
                        'readOnly' => TRUE
                    ],
                    'display' => ['$ref' => '#/definitions/Operation_display']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'OperationListResult' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/Operation'],
                        'readOnly' => TRUE
                    ],
                    'nextLink' => [
                        'type' => 'string',
                        'readOnly' => TRUE
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'ErrorResponse' => [
                'properties' => [
                    'code' => ['type' => 'string'],
                    'message' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'Action' => [
                'properties' => [
                    'sqlExpression' => ['type' => 'string'],
                    'compatibilityLevel' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'requiresPreprocessing' => ['type' => 'boolean']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'SqlFilter' => [
                'properties' => [
                    'sqlExpression' => ['type' => 'string'],
                    'compatibilityLevel' => [
                        'type' => 'integer',
                        'format' => 'int32',
                        'readOnly' => TRUE
                    ],
                    'requiresPreprocessing' => ['type' => 'boolean']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'CorrelationFilter' => [
                'properties' => [
                    'correlationId' => ['type' => 'string'],
                    'messageId' => ['type' => 'string'],
                    'to' => ['type' => 'string'],
                    'replyTo' => ['type' => 'string'],
                    'label' => ['type' => 'string'],
                    'sessionId' => ['type' => 'string'],
                    'replyToSessionId' => ['type' => 'string'],
                    'contentType' => ['type' => 'string'],
                    'requiresPreprocessing' => ['type' => 'boolean']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'Ruleproperties' => [
                'properties' => [
                    'action' => ['$ref' => '#/definitions/Action'],
                    'filterType' => [
                        'type' => 'string',
                        'enum' => [
                            'SqlFilter',
                            'CorrelationFilter'
                        ]
                    ],
                    'sqlFilter' => ['$ref' => '#/definitions/SqlFilter'],
                    'correlationFilter' => ['$ref' => '#/definitions/CorrelationFilter']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'Rule' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/Ruleproperties']],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'RuleListResult' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/Rule']
                    ],
                    'nextLink' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'SqlRuleAction' => [
                'properties' => [],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'PremiumMessagingRegions_properties' => [
                'properties' => [
                    'code' => [
                        'type' => 'string',
                        'readOnly' => TRUE
                    ],
                    'fullName' => [
                        'type' => 'string',
                        'readOnly' => TRUE
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'PremiumMessagingRegions' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/PremiumMessagingRegions_properties']],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'PremiumMessagingRegionsListResult' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/PremiumMessagingRegions']
                    ],
                    'nextLink' => [
                        'type' => 'string',
                        'readOnly' => TRUE
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'Destination_properties' => [
                'properties' => [
                    'storageAccountResourceId' => ['type' => 'string'],
                    'blobContainer' => ['type' => 'string'],
                    'archiveNameFormat' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'Destination' => [
                'properties' => [
                    'name' => ['type' => 'string'],
                    'properties' => ['$ref' => '#/definitions/Destination_properties']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'CaptureDescription' => [
                'properties' => [
                    'enabled' => ['type' => 'boolean'],
                    'encoding' => [
                        'type' => 'string',
                        'enum' => [
                            'Avro',
                            'AvroDeflate'
                        ]
                    ],
                    'intervalInSeconds' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'sizeLimitInBytes' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'destination' => ['$ref' => '#/definitions/Destination']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'Eventhub_properties' => [
                'properties' => [
                    'partitionIds' => [
                        'type' => 'array',
                        'items' => ['type' => 'string'],
                        'readOnly' => TRUE
                    ],
                    'createdAt' => [
                        'type' => 'string',
                        'format' => 'date-time',
                        'readOnly' => TRUE
                    ],
                    'updatedAt' => [
                        'type' => 'string',
                        'format' => 'date-time',
                        'readOnly' => TRUE
                    ],
                    'messageRetentionInDays' => [
                        'type' => 'integer',
                        'format' => 'int64'
                    ],
                    'partitionCount' => [
                        'type' => 'integer',
                        'format' => 'int64'
                    ],
                    'status' => [
                        'type' => 'string',
                        'enum' => [
                            'Active',
                            'Disabled',
                            'Restoring',
                            'SendDisabled',
                            'ReceiveDisabled',
                            'Creating',
                            'Deleting',
                            'Renaming',
                            'Unknown'
                        ]
                    ],
                    'captureDescription' => ['$ref' => '#/definitions/CaptureDescription']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'Eventhub' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/Eventhub_properties']],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'EventHubListResult' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/Eventhub']
                    ],
                    'nextLink' => [
                        'type' => 'string',
                        'readOnly' => TRUE
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ]
        ]
    ];
}
