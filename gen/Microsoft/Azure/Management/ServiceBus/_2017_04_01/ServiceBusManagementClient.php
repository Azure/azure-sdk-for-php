<?php
namespace Microsoft\Azure\Management\ServiceBus\_2017_04_01;
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
        $this->_Operations_group = new \Microsoft\Azure\Management\ServiceBus\_2017_04_01\Operations($_client);
        $this->_Namespaces_group = new \Microsoft\Azure\Management\ServiceBus\_2017_04_01\Namespaces($_client);
        $this->_Queues_group = new \Microsoft\Azure\Management\ServiceBus\_2017_04_01\Queues($_client);
        $this->_Topics_group = new \Microsoft\Azure\Management\ServiceBus\_2017_04_01\Topics($_client);
        $this->_Subscriptions_group = new \Microsoft\Azure\Management\ServiceBus\_2017_04_01\Subscriptions($_client);
        $this->_Rules_group = new \Microsoft\Azure\Management\ServiceBus\_2017_04_01\Rules($_client);
        $this->_Regions_group = new \Microsoft\Azure\Management\ServiceBus\_2017_04_01\Regions($_client);
        $this->_PremiumMessagingRegions_group = new \Microsoft\Azure\Management\ServiceBus\_2017_04_01\PremiumMessagingRegions($_client);
        $this->_EventHubs_group = new \Microsoft\Azure\Management\ServiceBus\_2017_04_01\EventHubs($_client);
    }
    /**
     * @return \Microsoft\Azure\Management\ServiceBus\_2017_04_01\Operations
     */
    public function getOperations()
    {
        return $this->_Operations_group;
    }
    /**
     * @return \Microsoft\Azure\Management\ServiceBus\_2017_04_01\Namespaces
     */
    public function getNamespaces()
    {
        return $this->_Namespaces_group;
    }
    /**
     * @return \Microsoft\Azure\Management\ServiceBus\_2017_04_01\Queues
     */
    public function getQueues()
    {
        return $this->_Queues_group;
    }
    /**
     * @return \Microsoft\Azure\Management\ServiceBus\_2017_04_01\Topics
     */
    public function getTopics()
    {
        return $this->_Topics_group;
    }
    /**
     * @return \Microsoft\Azure\Management\ServiceBus\_2017_04_01\Subscriptions
     */
    public function getSubscriptions()
    {
        return $this->_Subscriptions_group;
    }
    /**
     * @return \Microsoft\Azure\Management\ServiceBus\_2017_04_01\Rules
     */
    public function getRules()
    {
        return $this->_Rules_group;
    }
    /**
     * @return \Microsoft\Azure\Management\ServiceBus\_2017_04_01\Regions
     */
    public function getRegions()
    {
        return $this->_Regions_group;
    }
    /**
     * @return \Microsoft\Azure\Management\ServiceBus\_2017_04_01\PremiumMessagingRegions
     */
    public function getPremiumMessagingRegions()
    {
        return $this->_PremiumMessagingRegions_group;
    }
    /**
     * @return \Microsoft\Azure\Management\ServiceBus\_2017_04_01\EventHubs
     */
    public function getEventHubs()
    {
        return $this->_EventHubs_group;
    }
    /**
     * @var \Microsoft\Azure\Management\ServiceBus\_2017_04_01\Operations
     */
    private $_Operations_group;
    /**
     * @var \Microsoft\Azure\Management\ServiceBus\_2017_04_01\Namespaces
     */
    private $_Namespaces_group;
    /**
     * @var \Microsoft\Azure\Management\ServiceBus\_2017_04_01\Queues
     */
    private $_Queues_group;
    /**
     * @var \Microsoft\Azure\Management\ServiceBus\_2017_04_01\Topics
     */
    private $_Topics_group;
    /**
     * @var \Microsoft\Azure\Management\ServiceBus\_2017_04_01\Subscriptions
     */
    private $_Subscriptions_group;
    /**
     * @var \Microsoft\Azure\Management\ServiceBus\_2017_04_01\Rules
     */
    private $_Rules_group;
    /**
     * @var \Microsoft\Azure\Management\ServiceBus\_2017_04_01\Regions
     */
    private $_Regions_group;
    /**
     * @var \Microsoft\Azure\Management\ServiceBus\_2017_04_01\PremiumMessagingRegions
     */
    private $_PremiumMessagingRegions_group;
    /**
     * @var \Microsoft\Azure\Management\ServiceBus\_2017_04_01\EventHubs
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
                        '$ref' => '#/definitions/CheckNameAvailability'
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
                            '$ref' => '#/definitions/SBNamespace'
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
                            '$ref' => '#/definitions/SBNamespaceUpdateParameters'
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
                            '$ref' => '#/definitions/SBAuthorizationRule'
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
                        '$ref' => '#/definitions/RegenerateAccessKeyParameters'
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
                            '$ref' => '#/definitions/SBQueue'
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
                            '$ref' => '#/definitions/SBAuthorizationRule'
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
                        '$ref' => '#/definitions/RegenerateAccessKeyParameters'
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
                            '$ref' => '#/definitions/SBTopic'
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
                            '$ref' => '#/definitions/SBAuthorizationRule'
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
                        '$ref' => '#/definitions/RegenerateAccessKeyParameters'
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
                            '$ref' => '#/definitions/SBSubscription'
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
                            '$ref' => '#/definitions/Rule'
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
            'TrackedResource' => ['properties' => [
                'location' => ['type' => 'string'],
                'tags' => [
                    'type' => 'object',
                    'additionalProperties' => ['type' => 'string']
                ]
            ]],
            'Resource' => ['properties' => [
                'id' => ['type' => 'string'],
                'name' => ['type' => 'string'],
                'type' => ['type' => 'string']
            ]],
            'ResourceNamespacePatch' => ['properties' => [
                'location' => ['type' => 'string'],
                'tags' => [
                    'type' => 'object',
                    'additionalProperties' => ['type' => 'string']
                ]
            ]],
            'SBSku' => ['properties' => [
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
            ]],
            'SBNamespaceProperties' => ['properties' => [
                'provisioningState' => ['type' => 'string'],
                'createdAt' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ],
                'updatedAt' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ],
                'serviceBusEndpoint' => ['type' => 'string'],
                'metricId' => ['type' => 'string']
            ]],
            'SBNamespace' => ['properties' => [
                'sku' => ['$ref' => '#/definitions/SBSku'],
                'properties' => ['$ref' => '#/definitions/SBNamespaceProperties']
            ]],
            'SBNamespaceListResult' => ['properties' => [
                'value' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/SBNamespace']
                ],
                'nextLink' => ['type' => 'string']
            ]],
            'SBNamespaceUpdateParameters' => ['properties' => [
                'sku' => ['$ref' => '#/definitions/SBSku'],
                'properties' => ['$ref' => '#/definitions/SBNamespaceProperties']
            ]],
            'SBAuthorizationRule_properties' => ['properties' => ['rights' => [
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
            'SBAuthorizationRule' => ['properties' => ['properties' => ['$ref' => '#/definitions/SBAuthorizationRule_properties']]],
            'SBAuthorizationRuleListResult' => ['properties' => [
                'value' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/SBAuthorizationRule']
                ],
                'nextLink' => ['type' => 'string']
            ]],
            'AuthorizationRuleProperties' => ['properties' => ['rights' => [
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
            'AccessKeys' => ['properties' => [
                'primaryConnectionString' => ['type' => 'string'],
                'secondaryConnectionString' => ['type' => 'string'],
                'primaryKey' => ['type' => 'string'],
                'secondaryKey' => ['type' => 'string'],
                'keyName' => ['type' => 'string']
            ]],
            'RegenerateAccessKeyParameters' => ['properties' => [
                'keyType' => [
                    'type' => 'string',
                    'enum' => [
                        'PrimaryKey',
                        'SecondaryKey'
                    ]
                ],
                'key' => ['type' => 'string']
            ]],
            'MessageCountDetails' => ['properties' => [
                'activeMessageCount' => [
                    'type' => 'integer',
                    'format' => 'int64'
                ],
                'deadLetterMessageCount' => [
                    'type' => 'integer',
                    'format' => 'int64'
                ],
                'scheduledMessageCount' => [
                    'type' => 'integer',
                    'format' => 'int64'
                ],
                'transferMessageCount' => [
                    'type' => 'integer',
                    'format' => 'int64'
                ],
                'transferDeadLetterMessageCount' => [
                    'type' => 'integer',
                    'format' => 'int64'
                ]
            ]],
            'SBQueueProperties' => ['properties' => [
                'countDetails' => ['$ref' => '#/definitions/MessageCountDetails'],
                'createdAt' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ],
                'updatedAt' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ],
                'accessedAt' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ],
                'sizeInBytes' => [
                    'type' => 'integer',
                    'format' => 'int64'
                ],
                'messageCount' => [
                    'type' => 'integer',
                    'format' => 'int64'
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
            ]],
            'SBQueue' => ['properties' => ['properties' => ['$ref' => '#/definitions/SBQueueProperties']]],
            'SBQueueListResult' => ['properties' => [
                'value' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/SBQueue']
                ],
                'nextLink' => ['type' => 'string']
            ]],
            'SBTopicProperties' => ['properties' => [
                'sizeInBytes' => [
                    'type' => 'integer',
                    'format' => 'int64'
                ],
                'createdAt' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ],
                'updatedAt' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ],
                'accessedAt' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ],
                'subscriptionCount' => [
                    'type' => 'integer',
                    'format' => 'int32'
                ],
                'countDetails' => ['$ref' => '#/definitions/MessageCountDetails'],
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
            ]],
            'SBTopic' => ['properties' => ['properties' => ['$ref' => '#/definitions/SBTopicProperties']]],
            'SBTopicListResult' => ['properties' => [
                'value' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/SBTopic']
                ],
                'nextLink' => ['type' => 'string']
            ]],
            'SBSubscriptionProperties' => ['properties' => [
                'messageCount' => [
                    'type' => 'integer',
                    'format' => 'int64'
                ],
                'createdAt' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ],
                'accessedAt' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ],
                'updatedAt' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ],
                'countDetails' => ['$ref' => '#/definitions/MessageCountDetails'],
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
            ]],
            'SBSubscription' => ['properties' => ['properties' => ['$ref' => '#/definitions/SBSubscriptionProperties']]],
            'SBSubscriptionListResult' => ['properties' => [
                'value' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/SBSubscription']
                ],
                'nextLink' => ['type' => 'string']
            ]],
            'CheckNameAvailability' => ['properties' => ['name' => ['type' => 'string']]],
            'CheckNameAvailabilityResult' => ['properties' => [
                'message' => ['type' => 'string'],
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
            ]],
            'Operation_display' => ['properties' => [
                'provider' => ['type' => 'string'],
                'resource' => ['type' => 'string'],
                'operation' => ['type' => 'string']
            ]],
            'Operation' => ['properties' => [
                'name' => ['type' => 'string'],
                'display' => ['$ref' => '#/definitions/Operation_display']
            ]],
            'OperationListResult' => ['properties' => [
                'value' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/Operation']
                ],
                'nextLink' => ['type' => 'string']
            ]],
            'ErrorResponse' => ['properties' => [
                'code' => ['type' => 'string'],
                'message' => ['type' => 'string']
            ]],
            'Action' => ['properties' => [
                'sqlExpression' => ['type' => 'string'],
                'compatibilityLevel' => [
                    'type' => 'integer',
                    'format' => 'int32'
                ],
                'requiresPreprocessing' => ['type' => 'boolean']
            ]],
            'SqlFilter' => ['properties' => [
                'sqlExpression' => ['type' => 'string'],
                'compatibilityLevel' => [
                    'type' => 'integer',
                    'format' => 'int32'
                ],
                'requiresPreprocessing' => ['type' => 'boolean']
            ]],
            'CorrelationFilter' => ['properties' => [
                'correlationId' => ['type' => 'string'],
                'messageId' => ['type' => 'string'],
                'to' => ['type' => 'string'],
                'replyTo' => ['type' => 'string'],
                'label' => ['type' => 'string'],
                'sessionId' => ['type' => 'string'],
                'replyToSessionId' => ['type' => 'string'],
                'contentType' => ['type' => 'string'],
                'requiresPreprocessing' => ['type' => 'boolean']
            ]],
            'Ruleproperties' => ['properties' => [
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
            ]],
            'Rule' => ['properties' => ['properties' => ['$ref' => '#/definitions/Ruleproperties']]],
            'RuleListResult' => ['properties' => [
                'value' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/Rule']
                ],
                'nextLink' => ['type' => 'string']
            ]],
            'SqlRuleAction' => ['properties' => []],
            'PremiumMessagingRegions_properties' => ['properties' => [
                'code' => ['type' => 'string'],
                'fullName' => ['type' => 'string']
            ]],
            'PremiumMessagingRegions' => ['properties' => ['properties' => ['$ref' => '#/definitions/PremiumMessagingRegions_properties']]],
            'PremiumMessagingRegionsListResult' => ['properties' => [
                'value' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/PremiumMessagingRegions']
                ],
                'nextLink' => ['type' => 'string']
            ]],
            'Destination_properties' => ['properties' => [
                'storageAccountResourceId' => ['type' => 'string'],
                'blobContainer' => ['type' => 'string'],
                'archiveNameFormat' => ['type' => 'string']
            ]],
            'Destination' => ['properties' => [
                'name' => ['type' => 'string'],
                'properties' => ['$ref' => '#/definitions/Destination_properties']
            ]],
            'CaptureDescription' => ['properties' => [
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
            ]],
            'Eventhub_properties' => ['properties' => [
                'partitionIds' => [
                    'type' => 'array',
                    'items' => ['type' => 'string']
                ],
                'createdAt' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ],
                'updatedAt' => [
                    'type' => 'string',
                    'format' => 'date-time'
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
            ]],
            'Eventhub' => ['properties' => ['properties' => ['$ref' => '#/definitions/Eventhub_properties']]],
            'EventHubListResult' => ['properties' => [
                'value' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/Eventhub']
                ],
                'nextLink' => ['type' => 'string']
            ]]
        ]
    ];
}
