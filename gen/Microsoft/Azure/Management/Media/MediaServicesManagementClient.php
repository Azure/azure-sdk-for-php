<?php
namespace Microsoft\Azure\Management\Media;
final class MediaServicesManagementClient
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
        $this->_MediaService_group = new \Microsoft\Azure\Management\Media\MediaService($_client);
    }
    /**
     * @return \Microsoft\Azure\Management\Media\MediaService
     */
    public function getMediaService()
    {
        return $this->_MediaService_group;
    }
    /**
     * @var \Microsoft\Azure\Management\Media\MediaService
     */
    private $_MediaService_group;
    const _SWAGGER_OBJECT_DATA = [
        'host' => 'management.azure.com',
        'paths' => [
            '/subscriptions/{subscriptionId}/providers/Microsoft.Media/CheckNameAvailability' => ['post' => [
                'operationId' => 'MediaService_CheckNameAvailability',
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
                        'enum' => ['2015-10-01']
                    ],
                    [
                        'name' => 'CheckNameAvailabilityInput',
                        'in' => 'body',
                        'required' => TRUE,
                        'schema' => ['$ref' => '#/definitions/CheckNameAvailabilityInput']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/CheckNameAvailabilityOutput']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Media/mediaservices' => ['get' => [
                'operationId' => 'MediaService_ListByResourceGroup',
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
                        'enum' => ['2015-10-01']
                    ],
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/MediaServiceCollection']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Media/mediaservices/{mediaServiceName}' => [
                'get' => [
                    'operationId' => 'MediaService_Get',
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
                            'enum' => ['2015-10-01']
                        ],
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'mediaServiceName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/MediaService']]]
                ],
                'put' => [
                    'operationId' => 'MediaService_Create',
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
                            'enum' => ['2015-10-01']
                        ],
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'mediaServiceName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'MediaService',
                            'in' => 'body',
                            'required' => TRUE,
                            'schema' => ['$ref' => '#/definitions/MediaService']
                        ]
                    ],
                    'responses' => ['201' => ['schema' => ['$ref' => '#/definitions/MediaService']]]
                ],
                'delete' => [
                    'operationId' => 'MediaService_Delete',
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
                            'enum' => ['2015-10-01']
                        ],
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'mediaServiceName',
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
                'patch' => [
                    'operationId' => 'MediaService_Update',
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
                            'enum' => ['2015-10-01']
                        ],
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'mediaServiceName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'MediaService',
                            'in' => 'body',
                            'required' => TRUE,
                            'schema' => ['$ref' => '#/definitions/MediaService']
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/MediaService']]]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Media/mediaservices/{mediaServiceName}/regenerateKey' => ['post' => [
                'operationId' => 'MediaService_RegenerateKey',
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
                        'enum' => ['2015-10-01']
                    ],
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'mediaServiceName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'RegenerateKeyInput',
                        'in' => 'body',
                        'required' => TRUE,
                        'schema' => ['$ref' => '#/definitions/RegenerateKeyInput']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/RegenerateKeyOutput']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Media/mediaservices/{mediaServiceName}/listKeys' => ['post' => [
                'operationId' => 'MediaService_ListKeys',
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
                        'enum' => ['2015-10-01']
                    ],
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'mediaServiceName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/ServiceKeys']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Media/mediaservices/{mediaServiceName}/syncStorageKeys' => ['post' => [
                'operationId' => 'MediaService_SyncStorageKeys',
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
                        'enum' => ['2015-10-01']
                    ],
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'mediaServiceName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'SyncStorageKeysInput',
                        'in' => 'body',
                        'required' => TRUE,
                        'schema' => ['$ref' => '#/definitions/SyncStorageKeysInput']
                    ]
                ],
                'responses' => ['200' => []]
            ]]
        ],
        'definitions' => [
            'ApiEndpoint' => [
                'properties' => [
                    'endpoint' => ['type' => 'string'],
                    'majorVersion' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'ApiError' => [
                'properties' => [
                    'code' => ['type' => 'string'],
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
                    'NameAvailable' => ['type' => 'boolean'],
                    'Reason' => [
                        'type' => 'string',
                        'enum' => [
                            'None',
                            'Invalid',
                            'AlreadyExists'
                        ]
                    ],
                    'Message' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'StorageAccount' => [
                'properties' => [
                    'id' => ['type' => 'string'],
                    'isPrimary' => ['type' => 'boolean']
                ],
                'additionalProperties' => FALSE,
                'required' => [
                    'id',
                    'isPrimary'
                ]
            ],
            'MediaServiceProperties' => [
                'properties' => [
                    'apiEndpoints' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/ApiEndpoint']
                    ],
                    'storageAccounts' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/StorageAccount']
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'MediaService' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/MediaServiceProperties']],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'MediaServiceCollection' => [
                'properties' => ['value' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/MediaService']
                ]],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'RegenerateKeyInput' => [
                'properties' => ['keyType' => [
                    'type' => 'string',
                    'enum' => [
                        'Primary',
                        'Secondary'
                    ]
                ]],
                'additionalProperties' => FALSE,
                'required' => ['keyType']
            ],
            'RegenerateKeyOutput' => [
                'properties' => ['key' => ['type' => 'string']],
                'additionalProperties' => FALSE,
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
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'ServiceKeys' => [
                'properties' => [
                    'primaryAuthEndpoint' => ['type' => 'string'],
                    'secondaryAuthEndpoint' => ['type' => 'string'],
                    'primaryKey' => ['type' => 'string'],
                    'secondaryKey' => ['type' => 'string'],
                    'scope' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'SyncStorageKeysInput' => [
                'properties' => ['id' => ['type' => 'string']],
                'additionalProperties' => FALSE,
                'required' => ['id']
            ]
        ]
    ];
}
