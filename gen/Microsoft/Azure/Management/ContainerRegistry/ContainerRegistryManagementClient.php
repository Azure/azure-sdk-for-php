<?php
namespace Microsoft\Azure\Management\ContainerRegistry;
final class ContainerRegistryManagementClient
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
        $this->_Registries_group = new \Microsoft\Azure\Management\ContainerRegistry\Registries($_client);
        $this->_Operations_group = new \Microsoft\Azure\Management\ContainerRegistry\Operations($_client);
        $this->_Replications_group = new \Microsoft\Azure\Management\ContainerRegistry\Replications($_client);
        $this->_Webhooks_group = new \Microsoft\Azure\Management\ContainerRegistry\Webhooks($_client);
    }
    /**
     * @return \Microsoft\Azure\Management\ContainerRegistry\Registries
     */
    public function getRegistries()
    {
        return $this->_Registries_group;
    }
    /**
     * @return \Microsoft\Azure\Management\ContainerRegistry\Operations
     */
    public function getOperations()
    {
        return $this->_Operations_group;
    }
    /**
     * @return \Microsoft\Azure\Management\ContainerRegistry\Replications
     */
    public function getReplications()
    {
        return $this->_Replications_group;
    }
    /**
     * @return \Microsoft\Azure\Management\ContainerRegistry\Webhooks
     */
    public function getWebhooks()
    {
        return $this->_Webhooks_group;
    }
    /**
     * @var \Microsoft\Azure\Management\ContainerRegistry\Registries
     */
    private $_Registries_group;
    /**
     * @var \Microsoft\Azure\Management\ContainerRegistry\Operations
     */
    private $_Operations_group;
    /**
     * @var \Microsoft\Azure\Management\ContainerRegistry\Replications
     */
    private $_Replications_group;
    /**
     * @var \Microsoft\Azure\Management\ContainerRegistry\Webhooks
     */
    private $_Webhooks_group;
    const _SWAGGER_OBJECT_DATA = [
        'host' => 'management.azure.com',
        'paths' => [
            '/subscriptions/{subscriptionId}/providers/Microsoft.ContainerRegistry/checkNameAvailability' => ['post' => [
                'operationId' => 'Registries_CheckNameAvailability',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-06-01-preview']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'registryNameCheckRequest',
                        'in' => 'body',
                        'required' => TRUE,
                        '$ref' => '#/definitions/RegistryNameCheckRequest'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/RegistryNameStatus']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.ContainerRegistry/registries/{registryName}' => [
                'get' => [
                    'operationId' => 'Registries_Get',
                    'parameters' => [
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-06-01-preview']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'registryName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/Registry']]]
                ],
                'put' => [
                    'operationId' => 'Registries_Create',
                    'parameters' => [
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-06-01-preview']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'registryName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'registry',
                            'in' => 'body',
                            'required' => TRUE,
                            '$ref' => '#/definitions/Registry'
                        ]
                    ],
                    'responses' => [
                        '200' => ['schema' => ['$ref' => '#/definitions/Registry']],
                        '201' => ['schema' => ['$ref' => '#/definitions/Registry']]
                    ]
                ],
                'delete' => [
                    'operationId' => 'Registries_Delete',
                    'parameters' => [
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-06-01-preview']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'registryName',
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
                'patch' => [
                    'operationId' => 'Registries_Update',
                    'parameters' => [
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-06-01-preview']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'registryName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'registryUpdateParameters',
                            'in' => 'body',
                            'required' => TRUE,
                            '$ref' => '#/definitions/RegistryUpdateParameters'
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/Registry']]]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.ContainerRegistry/registries' => ['get' => [
                'operationId' => 'Registries_ListByResourceGroup',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-06-01-preview']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/RegistryListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/providers/Microsoft.ContainerRegistry/registries' => ['get' => [
                'operationId' => 'Registries_List',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-06-01-preview']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/RegistryListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.ContainerRegistry/registries/{registryName}/listCredentials' => ['post' => [
                'operationId' => 'Registries_ListCredentials',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-06-01-preview']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'registryName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/RegistryListCredentialsResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.ContainerRegistry/registries/{registryName}/regenerateCredential' => ['post' => [
                'operationId' => 'Registries_RegenerateCredential',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-06-01-preview']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'registryName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'regenerateCredentialParameters',
                        'in' => 'body',
                        'required' => TRUE,
                        '$ref' => '#/definitions/RegenerateCredentialParameters'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/RegistryListCredentialsResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.ContainerRegistry/registries/{registryName}/listUsages' => ['get' => [
                'operationId' => 'Registries_ListUsages',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-06-01-preview']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'registryName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/RegistryUsageListResult']]]
            ]],
            '/providers/Microsoft.ContainerRegistry/operations' => ['get' => [
                'operationId' => 'Operations_List',
                'parameters' => [[
                    'name' => 'api-version',
                    'in' => 'query',
                    'required' => TRUE,
                    'type' => 'string',
                    'enum' => ['2017-06-01-preview']
                ]],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/OperationListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.ContainerRegistry/registries/{registryName}/replications/{replicationName}' => [
                'get' => [
                    'operationId' => 'Replications_Get',
                    'parameters' => [
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-06-01-preview']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'registryName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'replicationName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/Replication']]]
                ],
                'put' => [
                    'operationId' => 'Replications_CreateOrUpdate',
                    'parameters' => [
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-06-01-preview']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'registryName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'replicationName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'replication',
                            'in' => 'body',
                            'required' => TRUE,
                            '$ref' => '#/definitions/Replication'
                        ]
                    ],
                    'responses' => [
                        '200' => ['schema' => ['$ref' => '#/definitions/Replication']],
                        '201' => ['schema' => ['$ref' => '#/definitions/Replication']]
                    ]
                ],
                'delete' => [
                    'operationId' => 'Replications_Delete',
                    'parameters' => [
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-06-01-preview']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'registryName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'replicationName',
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
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.ContainerRegistry/registries/{registryName}/replications' => ['get' => [
                'operationId' => 'Replications_List',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-06-01-preview']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'registryName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/ReplicationListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.ContainerRegistry/registries/{registryName}/webhooks/{webhookName}' => [
                'get' => [
                    'operationId' => 'Webhooks_Get',
                    'parameters' => [
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-06-01-preview']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'registryName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'webhookName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/Webhook']]]
                ],
                'put' => [
                    'operationId' => 'Webhooks_Create',
                    'parameters' => [
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-06-01-preview']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'registryName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'webhookName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'webhookCreateParameters',
                            'in' => 'body',
                            'required' => TRUE,
                            '$ref' => '#/definitions/WebhookCreateParameters'
                        ]
                    ],
                    'responses' => [
                        '200' => ['schema' => ['$ref' => '#/definitions/Webhook']],
                        '201' => ['schema' => ['$ref' => '#/definitions/Webhook']]
                    ]
                ],
                'delete' => [
                    'operationId' => 'Webhooks_Delete',
                    'parameters' => [
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-06-01-preview']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'registryName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'webhookName',
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
                'patch' => [
                    'operationId' => 'Webhooks_Update',
                    'parameters' => [
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-06-01-preview']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'registryName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'webhookName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'webhookUpdateParameters',
                            'in' => 'body',
                            'required' => TRUE,
                            '$ref' => '#/definitions/WebhookUpdateParameters'
                        ]
                    ],
                    'responses' => [
                        '200' => ['schema' => ['$ref' => '#/definitions/Webhook']],
                        '201' => ['schema' => ['$ref' => '#/definitions/Webhook']]
                    ]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.ContainerRegistry/registries/{registryName}/webhooks' => ['get' => [
                'operationId' => 'Webhooks_List',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-06-01-preview']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'registryName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/WebhookListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.ContainerRegistry/registries/{registryName}/webhooks/{webhookName}/ping' => ['post' => [
                'operationId' => 'Webhooks_Ping',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-06-01-preview']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'registryName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'webhookName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/EventInfo']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.ContainerRegistry/registries/{registryName}/webhooks/{webhookName}/getCallbackConfig' => ['post' => [
                'operationId' => 'Webhooks_GetCallbackConfig',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-06-01-preview']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'registryName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'webhookName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/CallbackConfig']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.ContainerRegistry/registries/{registryName}/webhooks/{webhookName}/listEvents' => ['post' => [
                'operationId' => 'Webhooks_ListEvents',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-06-01-preview']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'registryName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'webhookName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/EventListResult']]]
            ]]
        ],
        'definitions' => [
            'RegistryNameCheckRequest' => [
                'properties' => [
                    'name' => ['type' => 'string'],
                    'type' => ['type' => 'string']
                ],
                'required' => [
                    'name',
                    'type'
                ]
            ],
            'RegistryNameStatus' => [
                'properties' => [
                    'nameAvailable' => ['type' => 'boolean'],
                    'reason' => ['type' => 'string'],
                    'message' => ['type' => 'string']
                ],
                'required' => []
            ],
            'OperationDisplayDefinition' => [
                'properties' => [
                    'provider' => ['type' => 'string'],
                    'resource' => ['type' => 'string'],
                    'operation' => ['type' => 'string'],
                    'description' => ['type' => 'string']
                ],
                'required' => []
            ],
            'OperationDefinition' => [
                'properties' => [
                    'name' => ['type' => 'string'],
                    'display' => ['$ref' => '#/definitions/OperationDisplayDefinition']
                ],
                'required' => []
            ],
            'OperationListResult' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/OperationDefinition']
                    ],
                    'nextLink' => ['type' => 'string']
                ],
                'required' => []
            ],
            'Sku' => [
                'properties' => [
                    'name' => [
                        'type' => 'string',
                        'enum' => [
                            'Basic',
                            'Managed_Basic',
                            'Managed_Standard',
                            'Managed_Premium'
                        ]
                    ],
                    'tier' => [
                        'type' => 'string',
                        'enum' => [
                            'Basic',
                            'Managed'
                        ]
                    ]
                ],
                'required' => ['name']
            ],
            'Status' => [
                'properties' => [
                    'displayStatus' => ['type' => 'string'],
                    'message' => ['type' => 'string'],
                    'timestamp' => [
                        'type' => 'string',
                        'format' => 'date-time'
                    ]
                ],
                'required' => []
            ],
            'StorageAccountProperties' => [
                'properties' => ['id' => ['type' => 'string']],
                'required' => ['id']
            ],
            'RegistryProperties' => [
                'properties' => [
                    'loginServer' => ['type' => 'string'],
                    'creationDate' => [
                        'type' => 'string',
                        'format' => 'date-time'
                    ],
                    'provisioningState' => [
                        'type' => 'string',
                        'enum' => [
                            'Creating',
                            'Updating',
                            'Deleting',
                            'Succeeded',
                            'Failed',
                            'Canceled'
                        ]
                    ],
                    'status' => ['$ref' => '#/definitions/Status'],
                    'adminUserEnabled' => ['type' => 'boolean'],
                    'storageAccount' => ['$ref' => '#/definitions/StorageAccountProperties']
                ],
                'required' => []
            ],
            'Registry' => [
                'properties' => [
                    'sku' => ['$ref' => '#/definitions/Sku'],
                    'properties' => ['$ref' => '#/definitions/RegistryProperties']
                ],
                'required' => ['sku']
            ],
            'RegistryPropertiesUpdateParameters' => [
                'properties' => [
                    'adminUserEnabled' => ['type' => 'boolean'],
                    'storageAccount' => ['$ref' => '#/definitions/StorageAccountProperties']
                ],
                'required' => []
            ],
            'RegistryUpdateParameters' => [
                'properties' => [
                    'tags' => [
                        'type' => 'object',
                        'additionalProperties' => ['type' => 'string']
                    ],
                    'sku' => ['$ref' => '#/definitions/Sku'],
                    'properties' => ['$ref' => '#/definitions/RegistryPropertiesUpdateParameters']
                ],
                'required' => []
            ],
            'RegistryListResult' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/Registry']
                    ],
                    'nextLink' => ['type' => 'string']
                ],
                'required' => []
            ],
            'RegistryPassword' => [
                'properties' => [
                    'name' => [
                        'type' => 'string',
                        'enum' => [
                            'password',
                            'password2'
                        ]
                    ],
                    'value' => ['type' => 'string']
                ],
                'required' => []
            ],
            'RegistryListCredentialsResult' => [
                'properties' => [
                    'username' => ['type' => 'string'],
                    'passwords' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/RegistryPassword']
                    ]
                ],
                'required' => []
            ],
            'RegenerateCredentialParameters' => [
                'properties' => ['name' => [
                    'type' => 'string',
                    'enum' => [
                        'password',
                        'password2'
                    ]
                ]],
                'required' => ['name']
            ],
            'RegistryUsage' => [
                'properties' => [
                    'name' => ['type' => 'string'],
                    'limit' => [
                        'type' => 'integer',
                        'format' => 'int64'
                    ],
                    'currentValue' => [
                        'type' => 'integer',
                        'format' => 'int64'
                    ],
                    'unit' => [
                        'type' => 'string',
                        'enum' => [
                            'Count',
                            'Bytes'
                        ]
                    ]
                ],
                'required' => []
            ],
            'RegistryUsageListResult' => [
                'properties' => ['value' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/RegistryUsage']
                ]],
                'required' => []
            ],
            'ReplicationProperties' => [
                'properties' => [
                    'provisioningState' => [
                        'type' => 'string',
                        'enum' => [
                            'Creating',
                            'Updating',
                            'Deleting',
                            'Succeeded',
                            'Failed',
                            'Canceled'
                        ]
                    ],
                    'status' => ['$ref' => '#/definitions/Status']
                ],
                'required' => []
            ],
            'Replication' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/ReplicationProperties']],
                'required' => []
            ],
            'ReplicationListResult' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/Replication']
                    ],
                    'nextLink' => ['type' => 'string']
                ],
                'required' => []
            ],
            'WebhookProperties' => [
                'properties' => [
                    'status' => [
                        'type' => 'string',
                        'enum' => [
                            'enabled',
                            'disabled'
                        ]
                    ],
                    'scope' => ['type' => 'string'],
                    'actions' => [
                        'type' => 'array',
                        'items' => [
                            'type' => 'string',
                            'enum' => [
                                'push',
                                'delete'
                            ]
                        ]
                    ],
                    'provisioningState' => [
                        'type' => 'string',
                        'enum' => [
                            'Creating',
                            'Updating',
                            'Deleting',
                            'Succeeded',
                            'Failed',
                            'Canceled'
                        ]
                    ]
                ],
                'required' => ['actions']
            ],
            'Webhook' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/WebhookProperties']],
                'required' => []
            ],
            'WebhookPropertiesCreateParameters' => [
                'properties' => [
                    'serviceUri' => ['type' => 'string'],
                    'customHeaders' => [
                        'type' => 'object',
                        'additionalProperties' => ['type' => 'string']
                    ],
                    'status' => [
                        'type' => 'string',
                        'enum' => [
                            'enabled',
                            'disabled'
                        ]
                    ],
                    'scope' => ['type' => 'string'],
                    'actions' => [
                        'type' => 'array',
                        'items' => [
                            'type' => 'string',
                            'enum' => [
                                'push',
                                'delete'
                            ]
                        ]
                    ]
                ],
                'required' => [
                    'serviceUri',
                    'actions'
                ]
            ],
            'WebhookCreateParameters' => [
                'properties' => [
                    'tags' => [
                        'type' => 'object',
                        'additionalProperties' => ['type' => 'string']
                    ],
                    'location' => ['type' => 'string'],
                    'properties' => ['$ref' => '#/definitions/WebhookPropertiesCreateParameters']
                ],
                'required' => ['location']
            ],
            'WebhookPropertiesUpdateParameters' => [
                'properties' => [
                    'serviceUri' => ['type' => 'string'],
                    'customHeaders' => [
                        'type' => 'object',
                        'additionalProperties' => ['type' => 'string']
                    ],
                    'status' => [
                        'type' => 'string',
                        'enum' => [
                            'enabled',
                            'disabled'
                        ]
                    ],
                    'scope' => ['type' => 'string'],
                    'actions' => [
                        'type' => 'array',
                        'items' => [
                            'type' => 'string',
                            'enum' => [
                                'push',
                                'delete'
                            ]
                        ]
                    ]
                ],
                'required' => []
            ],
            'WebhookUpdateParameters' => [
                'properties' => [
                    'tags' => [
                        'type' => 'object',
                        'additionalProperties' => ['type' => 'string']
                    ],
                    'properties' => ['$ref' => '#/definitions/WebhookPropertiesUpdateParameters']
                ],
                'required' => []
            ],
            'WebhookListResult' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/Webhook']
                    ],
                    'nextLink' => ['type' => 'string']
                ],
                'required' => []
            ],
            'EventInfo' => [
                'properties' => ['id' => ['type' => 'string']],
                'required' => []
            ],
            'CallbackConfig' => [
                'properties' => [
                    'serviceUri' => ['type' => 'string'],
                    'customHeaders' => [
                        'type' => 'object',
                        'additionalProperties' => ['type' => 'string']
                    ]
                ],
                'required' => ['serviceUri']
            ],
            'Target' => [
                'properties' => [
                    'mediaType' => ['type' => 'string'],
                    'size' => [
                        'type' => 'integer',
                        'format' => 'int64'
                    ],
                    'digest' => ['type' => 'string'],
                    'length' => [
                        'type' => 'integer',
                        'format' => 'int64'
                    ],
                    'repository' => ['type' => 'string'],
                    'url' => ['type' => 'string'],
                    'tag' => ['type' => 'string']
                ],
                'required' => []
            ],
            'Request' => [
                'properties' => [
                    'id' => ['type' => 'string'],
                    'addr' => ['type' => 'string'],
                    'host' => ['type' => 'string'],
                    'method' => ['type' => 'string'],
                    'useragent' => ['type' => 'string']
                ],
                'required' => []
            ],
            'Actor' => [
                'properties' => ['name' => ['type' => 'string']],
                'required' => []
            ],
            'Source' => [
                'properties' => [
                    'addr' => ['type' => 'string'],
                    'instanceID' => ['type' => 'string']
                ],
                'required' => []
            ],
            'EventContent' => [
                'properties' => [
                    'id' => ['type' => 'string'],
                    'timestamp' => [
                        'type' => 'string',
                        'format' => 'date-time'
                    ],
                    'action' => ['type' => 'string'],
                    'target' => ['$ref' => '#/definitions/Target'],
                    'request' => ['$ref' => '#/definitions/Request'],
                    'actor' => ['$ref' => '#/definitions/Actor'],
                    'source' => ['$ref' => '#/definitions/Source']
                ],
                'required' => []
            ],
            'EventRequestMessage' => [
                'properties' => [
                    'content' => ['$ref' => '#/definitions/EventContent'],
                    'headers' => [
                        'type' => 'object',
                        'additionalProperties' => ['type' => 'string']
                    ],
                    'method' => ['type' => 'string'],
                    'requestUri' => ['type' => 'string'],
                    'version' => ['type' => 'string']
                ],
                'required' => []
            ],
            'EventResponseMessage' => [
                'properties' => [
                    'content' => ['type' => 'string'],
                    'headers' => [
                        'type' => 'object',
                        'additionalProperties' => ['type' => 'string']
                    ],
                    'reasonPhrase' => ['type' => 'string'],
                    'statusCode' => ['type' => 'string'],
                    'version' => ['type' => 'string']
                ],
                'required' => []
            ],
            'Event' => [
                'properties' => [
                    'eventRequestMessage' => ['$ref' => '#/definitions/EventRequestMessage'],
                    'eventResponseMessage' => ['$ref' => '#/definitions/EventResponseMessage']
                ],
                'required' => []
            ],
            'EventListResult' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/Event']
                    ],
                    'nextLink' => ['type' => 'string']
                ],
                'required' => []
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
                'required' => ['location']
            ]
        ]
    ];
}
