<?php
namespace Microsoft\Azure\Management\IotHub;
final class IotHubClient
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
        $this->_Operations_group = new \Microsoft\Azure\Management\IotHub\Operations($_client);
        $this->_IotHubResource_group = new \Microsoft\Azure\Management\IotHub\IotHubResource($_client);
    }
    /**
     * @return \Microsoft\Azure\Management\IotHub\Operations
     */
    public function getOperations()
    {
        return $this->_Operations_group;
    }
    /**
     * @return \Microsoft\Azure\Management\IotHub\IotHubResource
     */
    public function getIotHubResource()
    {
        return $this->_IotHubResource_group;
    }
    /**
     * @var \Microsoft\Azure\Management\IotHub\Operations
     */
    private $_Operations_group;
    /**
     * @var \Microsoft\Azure\Management\IotHub\IotHubResource
     */
    private $_IotHubResource_group;
    const _SWAGGER_OBJECT_DATA = [
        'host' => 'management.azure.com',
        'paths' => [
            '/providers/Microsoft.Devices/operations' => ['get' => [
                'operationId' => 'Operations_List',
                'parameters' => [[
                    'name' => 'api-version',
                    'in' => 'query',
                    'required' => TRUE,
                    'type' => 'string',
                    'enum' => ['2017-07-01']
                ]],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/OperationListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Devices/IotHubs/{resourceName}' => [
                'get' => [
                    'operationId' => 'IotHubResource_Get',
                    'parameters' => [
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-07-01']
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
                            'name' => 'resourceName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/IotHubDescription']]]
                ],
                'put' => [
                    'operationId' => 'IotHubResource_CreateOrUpdate',
                    'parameters' => [
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-07-01']
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
                            'name' => 'resourceName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'iotHubDescription',
                            'in' => 'body',
                            'required' => TRUE,
                            'schema' => ['$ref' => '#/definitions/IotHubDescription']
                        ]
                    ],
                    'responses' => [
                        '201' => ['schema' => ['$ref' => '#/definitions/IotHubDescription']],
                        '200' => ['schema' => ['$ref' => '#/definitions/IotHubDescription']]
                    ]
                ],
                'delete' => [
                    'operationId' => 'IotHubResource_Delete',
                    'parameters' => [
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-07-01']
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
                            'name' => 'resourceName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => [
                        '202' => ['schema' => ['$ref' => '#/definitions/IotHubDescription']],
                        '200' => ['schema' => ['$ref' => '#/definitions/IotHubDescription']],
                        '204' => [],
                        '404' => ['schema' => ['$ref' => '#/definitions/ErrorDetails']]
                    ]
                ]
            ],
            '/subscriptions/{subscriptionId}/providers/Microsoft.Devices/IotHubs' => ['get' => [
                'operationId' => 'IotHubResource_ListBySubscription',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-07-01']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/IotHubDescriptionListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Devices/IotHubs' => ['get' => [
                'operationId' => 'IotHubResource_ListByResourceGroup',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-07-01']
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
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/IotHubDescriptionListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Devices/IotHubs/{resourceName}/IotHubStats' => ['get' => [
                'operationId' => 'IotHubResource_GetStats',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-07-01']
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
                        'name' => 'resourceName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/RegistryStatistics']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Devices/IotHubs/{resourceName}/skus' => ['get' => [
                'operationId' => 'IotHubResource_GetValidSkus',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-07-01']
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
                        'name' => 'resourceName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/IotHubSkuDescriptionListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Devices/IotHubs/{resourceName}/eventHubEndpoints/{eventHubEndpointName}/ConsumerGroups' => ['get' => [
                'operationId' => 'IotHubResource_ListEventHubConsumerGroups',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-07-01']
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
                        'name' => 'resourceName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'eventHubEndpointName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/EventHubConsumerGroupsListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Devices/IotHubs/{resourceName}/eventHubEndpoints/{eventHubEndpointName}/ConsumerGroups/{name}' => [
                'get' => [
                    'operationId' => 'IotHubResource_GetEventHubConsumerGroup',
                    'parameters' => [
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-07-01']
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
                            'name' => 'resourceName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'eventHubEndpointName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'name',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/EventHubConsumerGroupInfo']]]
                ],
                'put' => [
                    'operationId' => 'IotHubResource_CreateEventHubConsumerGroup',
                    'parameters' => [
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-07-01']
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
                            'name' => 'resourceName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'eventHubEndpointName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'name',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/EventHubConsumerGroupInfo']]]
                ],
                'delete' => [
                    'operationId' => 'IotHubResource_DeleteEventHubConsumerGroup',
                    'parameters' => [
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-07-01']
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
                            'name' => 'resourceName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'eventHubEndpointName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'name',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => ['200' => []]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Devices/IotHubs/{resourceName}/jobs' => ['get' => [
                'operationId' => 'IotHubResource_ListJobs',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-07-01']
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
                        'name' => 'resourceName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/JobResponseListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Devices/IotHubs/{resourceName}/jobs/{jobId}' => ['get' => [
                'operationId' => 'IotHubResource_GetJob',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-07-01']
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
                        'name' => 'resourceName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'jobId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/JobResponse']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Devices/IotHubs/{resourceName}/quotaMetrics' => ['get' => [
                'operationId' => 'IotHubResource_GetQuotaMetrics',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-07-01']
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
                        'name' => 'resourceName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/IotHubQuotaMetricInfoListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/providers/Microsoft.Devices/checkNameAvailability' => ['post' => [
                'operationId' => 'IotHubResource_CheckNameAvailability',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-07-01']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'operationInputs',
                        'in' => 'body',
                        'required' => TRUE,
                        'schema' => ['$ref' => '#/definitions/OperationInputs']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/IotHubNameAvailabilityInfo']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Devices/IotHubs/{resourceName}/listkeys' => ['post' => [
                'operationId' => 'IotHubResource_ListKeys',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-07-01']
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
                        'name' => 'resourceName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/SharedAccessSignatureAuthorizationRuleListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Devices/IotHubs/{resourceName}/IotHubKeys/{keyName}/listkeys' => ['post' => [
                'operationId' => 'IotHubResource_GetKeysForKeyName',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-07-01']
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
                        'name' => 'resourceName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'keyName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/SharedAccessSignatureAuthorizationRule']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Devices/IotHubs/{resourceName}/exportDevices' => ['post' => [
                'operationId' => 'IotHubResource_ExportDevices',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-07-01']
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
                        'name' => 'resourceName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'exportDevicesParameters',
                        'in' => 'body',
                        'required' => TRUE,
                        'schema' => ['$ref' => '#/definitions/ExportDevicesRequest']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/JobResponse']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Devices/IotHubs/{resourceName}/importDevices' => ['post' => [
                'operationId' => 'IotHubResource_ImportDevices',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-07-01']
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
                        'name' => 'resourceName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'importDevicesParameters',
                        'in' => 'body',
                        'required' => TRUE,
                        'schema' => ['$ref' => '#/definitions/ImportDevicesRequest']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/JobResponse']]]
            ]]
        ],
        'definitions' => [
            'SharedAccessSignatureAuthorizationRule' => [
                'properties' => [
                    'keyName' => ['type' => 'string'],
                    'primaryKey' => ['type' => 'string'],
                    'secondaryKey' => ['type' => 'string'],
                    'rights' => [
                        'type' => 'string',
                        'enum' => [
                            'RegistryRead',
                            'RegistryWrite',
                            'ServiceConnect',
                            'DeviceConnect',
                            'RegistryRead, RegistryWrite',
                            'RegistryRead, ServiceConnect',
                            'RegistryRead, DeviceConnect',
                            'RegistryWrite, ServiceConnect',
                            'RegistryWrite, DeviceConnect',
                            'ServiceConnect, DeviceConnect',
                            'RegistryRead, RegistryWrite, ServiceConnect',
                            'RegistryRead, RegistryWrite, DeviceConnect',
                            'RegistryRead, ServiceConnect, DeviceConnect',
                            'RegistryWrite, ServiceConnect, DeviceConnect',
                            'RegistryRead, RegistryWrite, ServiceConnect, DeviceConnect'
                        ]
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => [
                    'keyName',
                    'rights'
                ]
            ],
            'IpFilterRule' => [
                'properties' => [
                    'filterName' => ['type' => 'string'],
                    'action' => [
                        'type' => 'string',
                        'enum' => [
                            'Accept',
                            'Reject'
                        ]
                    ],
                    'ipMask' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => [
                    'filterName',
                    'action',
                    'ipMask'
                ]
            ],
            'EventHubProperties' => [
                'properties' => [
                    'retentionTimeInDays' => [
                        'type' => 'integer',
                        'format' => 'int64'
                    ],
                    'partitionCount' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'partitionIds' => [
                        'type' => 'array',
                        'items' => ['type' => 'string']
                    ],
                    'path' => ['type' => 'string'],
                    'endpoint' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'RoutingServiceBusQueueEndpointProperties' => [
                'properties' => [
                    'connectionString' => ['type' => 'string'],
                    'name' => ['type' => 'string'],
                    'subscriptionId' => ['type' => 'string'],
                    'resourceGroup' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => [
                    'connectionString',
                    'name'
                ]
            ],
            'RoutingServiceBusTopicEndpointProperties' => [
                'properties' => [
                    'connectionString' => ['type' => 'string'],
                    'name' => ['type' => 'string'],
                    'subscriptionId' => ['type' => 'string'],
                    'resourceGroup' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => [
                    'connectionString',
                    'name'
                ]
            ],
            'RoutingEventHubProperties' => [
                'properties' => [
                    'connectionString' => ['type' => 'string'],
                    'name' => ['type' => 'string'],
                    'subscriptionId' => ['type' => 'string'],
                    'resourceGroup' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => [
                    'connectionString',
                    'name'
                ]
            ],
            'RoutingStorageContainerProperties' => [
                'properties' => [
                    'connectionString' => ['type' => 'string'],
                    'name' => ['type' => 'string'],
                    'subscriptionId' => ['type' => 'string'],
                    'resourceGroup' => ['type' => 'string'],
                    'containerName' => ['type' => 'string'],
                    'fileNameFormat' => ['type' => 'string'],
                    'batchFrequencyInSeconds' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'maxChunkSizeInBytes' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'encoding' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => [
                    'connectionString',
                    'name',
                    'containerName'
                ]
            ],
            'RoutingEndpoints' => [
                'properties' => [
                    'serviceBusQueues' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/RoutingServiceBusQueueEndpointProperties']
                    ],
                    'serviceBusTopics' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/RoutingServiceBusTopicEndpointProperties']
                    ],
                    'eventHubs' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/RoutingEventHubProperties']
                    ],
                    'storageContainers' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/RoutingStorageContainerProperties']
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'RouteProperties' => [
                'properties' => [
                    'name' => ['type' => 'string'],
                    'source' => [
                        'type' => 'string',
                        'enum' => [
                            'DeviceMessages',
                            'TwinChangeEvents',
                            'DeviceLifecycleEvents',
                            'DeviceJobLifecycleEvents'
                        ]
                    ],
                    'condition' => ['type' => 'string'],
                    'endpointNames' => [
                        'type' => 'array',
                        'items' => ['type' => 'string']
                    ],
                    'isEnabled' => ['type' => 'boolean']
                ],
                'additionalProperties' => FALSE,
                'required' => [
                    'name',
                    'source',
                    'endpointNames',
                    'isEnabled'
                ]
            ],
            'FallbackRouteProperties' => [
                'properties' => [
                    'source' => ['type' => 'string'],
                    'condition' => ['type' => 'string'],
                    'endpointNames' => [
                        'type' => 'array',
                        'items' => ['type' => 'string']
                    ],
                    'isEnabled' => ['type' => 'boolean']
                ],
                'additionalProperties' => FALSE,
                'required' => [
                    'source',
                    'endpointNames',
                    'isEnabled'
                ]
            ],
            'RoutingProperties' => [
                'properties' => [
                    'endpoints' => ['$ref' => '#/definitions/RoutingEndpoints'],
                    'routes' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/RouteProperties']
                    ],
                    'fallbackRoute' => ['$ref' => '#/definitions/FallbackRouteProperties']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'StorageEndpointProperties' => [
                'properties' => [
                    'sasTtlAsIso8601' => [
                        'type' => 'string',
                        'format' => 'duration'
                    ],
                    'connectionString' => ['type' => 'string'],
                    'containerName' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => [
                    'connectionString',
                    'containerName'
                ]
            ],
            'MessagingEndpointProperties' => [
                'properties' => [
                    'lockDurationAsIso8601' => [
                        'type' => 'string',
                        'format' => 'duration'
                    ],
                    'ttlAsIso8601' => [
                        'type' => 'string',
                        'format' => 'duration'
                    ],
                    'maxDeliveryCount' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'FeedbackProperties' => [
                'properties' => [
                    'lockDurationAsIso8601' => [
                        'type' => 'string',
                        'format' => 'duration'
                    ],
                    'ttlAsIso8601' => [
                        'type' => 'string',
                        'format' => 'duration'
                    ],
                    'maxDeliveryCount' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'CloudToDeviceProperties' => [
                'properties' => [
                    'maxDeliveryCount' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'defaultTtlAsIso8601' => [
                        'type' => 'string',
                        'format' => 'duration'
                    ],
                    'feedback' => ['$ref' => '#/definitions/FeedbackProperties']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'OperationsMonitoringProperties' => [
                'properties' => ['events' => [
                    'type' => 'object',
                    'additionalProperties' => [
                        'type' => 'string',
                        'enum' => [
                            'None',
                            'Error',
                            'Information',
                            'Error, Information'
                        ]
                    ]
                ]],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'IotHubProperties' => [
                'properties' => [
                    'authorizationPolicies' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/SharedAccessSignatureAuthorizationRule']
                    ],
                    'ipFilterRules' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/IpFilterRule']
                    ],
                    'provisioningState' => ['type' => 'string'],
                    'hostName' => ['type' => 'string'],
                    'eventHubEndpoints' => [
                        'type' => 'object',
                        'additionalProperties' => ['$ref' => '#/definitions/EventHubProperties']
                    ],
                    'routing' => ['$ref' => '#/definitions/RoutingProperties'],
                    'storageEndpoints' => [
                        'type' => 'object',
                        'additionalProperties' => ['$ref' => '#/definitions/StorageEndpointProperties']
                    ],
                    'messagingEndpoints' => [
                        'type' => 'object',
                        'additionalProperties' => ['$ref' => '#/definitions/MessagingEndpointProperties']
                    ],
                    'enableFileUploadNotifications' => ['type' => 'boolean'],
                    'cloudToDevice' => ['$ref' => '#/definitions/CloudToDeviceProperties'],
                    'comments' => ['type' => 'string'],
                    'operationsMonitoringProperties' => ['$ref' => '#/definitions/OperationsMonitoringProperties'],
                    'features' => [
                        'type' => 'string',
                        'enum' => [
                            'None',
                            'DeviceManagement'
                        ]
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'IotHubSkuInfo' => [
                'properties' => [
                    'name' => [
                        'type' => 'string',
                        'enum' => [
                            'F1',
                            'S1',
                            'S2',
                            'S3'
                        ]
                    ],
                    'tier' => [
                        'type' => 'string',
                        'enum' => [
                            'Free',
                            'Standard'
                        ]
                    ],
                    'capacity' => [
                        'type' => 'integer',
                        'format' => 'int64'
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => [
                    'name',
                    'capacity'
                ]
            ],
            'IotHubDescription' => [
                'properties' => [
                    'subscriptionid' => ['type' => 'string'],
                    'resourcegroup' => ['type' => 'string'],
                    'etag' => ['type' => 'string'],
                    'properties' => ['$ref' => '#/definitions/IotHubProperties'],
                    'sku' => ['$ref' => '#/definitions/IotHubSkuInfo']
                ],
                'additionalProperties' => FALSE,
                'required' => [
                    'subscriptionid',
                    'resourcegroup',
                    'sku'
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
                'additionalProperties' => FALSE,
                'required' => ['location']
            ],
            'SharedAccessSignatureAuthorizationRuleListResult' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/SharedAccessSignatureAuthorizationRule']
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
            'ErrorDetails' => [
                'properties' => [
                    'Code' => ['type' => 'string'],
                    'HttpStatusCode' => ['type' => 'string'],
                    'Message' => ['type' => 'string'],
                    'Details' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'IotHubQuotaMetricInfo' => [
                'properties' => [
                    'Name' => ['type' => 'string'],
                    'CurrentValue' => [
                        'type' => 'integer',
                        'format' => 'int64'
                    ],
                    'MaxValue' => [
                        'type' => 'integer',
                        'format' => 'int64'
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'IotHubQuotaMetricInfoListResult' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/IotHubQuotaMetricInfo']
                    ],
                    'nextLink' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'RegistryStatistics' => [
                'properties' => [
                    'totalDeviceCount' => [
                        'type' => 'integer',
                        'format' => 'int64'
                    ],
                    'enabledDeviceCount' => [
                        'type' => 'integer',
                        'format' => 'int64'
                    ],
                    'disabledDeviceCount' => [
                        'type' => 'integer',
                        'format' => 'int64'
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'JobResponse' => [
                'properties' => [
                    'jobId' => ['type' => 'string'],
                    'startTimeUtc' => [
                        'type' => 'string',
                        'format' => 'date-time-rfc1123'
                    ],
                    'endTimeUtc' => [
                        'type' => 'string',
                        'format' => 'date-time-rfc1123'
                    ],
                    'type' => [
                        'type' => 'string',
                        'enum' => [
                            'unknown',
                            'export',
                            'import',
                            'backup',
                            'readDeviceProperties',
                            'writeDeviceProperties',
                            'updateDeviceConfiguration',
                            'rebootDevice',
                            'factoryResetDevice',
                            'firmwareUpdate'
                        ]
                    ],
                    'status' => [
                        'type' => 'string',
                        'enum' => [
                            'unknown',
                            'enqueued',
                            'running',
                            'completed',
                            'failed',
                            'cancelled'
                        ]
                    ],
                    'failureReason' => ['type' => 'string'],
                    'statusMessage' => ['type' => 'string'],
                    'parentJobId' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'JobResponseListResult' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/JobResponse']
                    ],
                    'nextLink' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'IotHubCapacity' => [
                'properties' => [
                    'minimum' => [
                        'type' => 'integer',
                        'format' => 'int64'
                    ],
                    'maximum' => [
                        'type' => 'integer',
                        'format' => 'int64'
                    ],
                    'default' => [
                        'type' => 'integer',
                        'format' => 'int64'
                    ],
                    'scaleType' => [
                        'type' => 'string',
                        'enum' => [
                            'Automatic',
                            'Manual',
                            'None'
                        ]
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'IotHubSkuDescription' => [
                'properties' => [
                    'resourceType' => ['type' => 'string'],
                    'sku' => ['$ref' => '#/definitions/IotHubSkuInfo'],
                    'capacity' => ['$ref' => '#/definitions/IotHubCapacity']
                ],
                'additionalProperties' => FALSE,
                'required' => [
                    'sku',
                    'capacity'
                ]
            ],
            'EventHubConsumerGroupsListResult' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['type' => 'string']
                    ],
                    'nextLink' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'EventHubConsumerGroupInfo' => [
                'properties' => [
                    'tags' => [
                        'type' => 'object',
                        'additionalProperties' => ['type' => 'string']
                    ],
                    'id' => ['type' => 'string'],
                    'name' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'IotHubSkuDescriptionListResult' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/IotHubSkuDescription']
                    ],
                    'nextLink' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'IotHubDescriptionListResult' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/IotHubDescription']
                    ],
                    'nextLink' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'OperationInputs' => [
                'properties' => ['Name' => ['type' => 'string']],
                'additionalProperties' => FALSE,
                'required' => ['Name']
            ],
            'IotHubNameAvailabilityInfo' => [
                'properties' => [
                    'nameAvailable' => ['type' => 'boolean'],
                    'reason' => [
                        'type' => 'string',
                        'enum' => [
                            'Invalid',
                            'AlreadyExists'
                        ]
                    ],
                    'message' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'ExportDevicesRequest' => [
                'properties' => [
                    'ExportBlobContainerUri' => ['type' => 'string'],
                    'ExcludeKeys' => ['type' => 'boolean']
                ],
                'additionalProperties' => FALSE,
                'required' => [
                    'ExportBlobContainerUri',
                    'ExcludeKeys'
                ]
            ],
            'ImportDevicesRequest' => [
                'properties' => [
                    'InputBlobContainerUri' => ['type' => 'string'],
                    'OutputBlobContainerUri' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => [
                    'InputBlobContainerUri',
                    'OutputBlobContainerUri'
                ]
            ]
        ]
    ];
}
